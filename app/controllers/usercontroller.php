<?php

namespace Controllers;

use Exception;
use Services\UserService;
use \Firebase\JWT\JWT;

class UserController extends Controller
{
    private $service;

    // Initialize services
    function __construct()
    {
        $this->service = new UserService();
    }

    public function login() 
    {
        // Read user data from request body
        $loginData = $this->createObjectFromPostedJson("Models\\User");

        // Get user from DB
        $user = $this->service->checkUsernamePassword($loginData->username, $loginData->password);

        // If the method returned false, the username and/or password were incorrect
        if (!$user) {
            // Handle incorrect credentials
            $this->respondWithError(401, "Incorrect username or password");
            return;
        }

        // Generate JWT
        $key = "duhakahya";
        $payload = array(
            "iss" => "http://api.inholland.nl",
            "aud" => "http://www.inholland.nl",
            "sub" => $user->username,
            "iat" => time(),
            "nbf" => time(),
            "exp" => time() + 3600, 
            "roleId" => $user->roleId,
            "id" => $user->id,
        );

        $jwt = \Firebase\JWT\JWT::encode($payload, $key, 'HS256');

        $response = new \stdClass();
        $response->token = $jwt;
        $response->roleId = $user->roleId;
        $response->id = $user->id;

        // Return response object
        $this->respond($response);
    }

    public function register() 
    {
        // Read user data from request body
        $userData = $this->createObjectFromPostedJson("Models\\User");

        // Check if the username is already taken
        $user = $this->service->getUserByUsername($userData->username);

        // If the method returned a user, the username is already taken
        if ($user) {
            // Handle username already taken
            $this->respondWithError(409, "Username already taken");
            return;
        }

        // Hash the password
        $hashedPassword = password_hash($userData->password, PASSWORD_DEFAULT);
        // Set the hashed password to the user data
        $userData->password = $hashedPassword;

        // Insert user into DB
        $user = $this->service->insert($userData);

        // Return the user
        $this->respond($user);
    }
}
