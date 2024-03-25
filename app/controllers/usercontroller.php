<?php

namespace Controllers;

use Exception;
use Services\UserService;
use \Firebase\JWT\JWT;

class UserController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new UserService();
    }

    public function login() {

        // read user data from request body
        $loginData = $this->createObjectFromPostedJson("Models\\User");

        // check if login data is valid
        if (!$loginData) {
            $this->respondWithError(400, "Invalid login data");
            return;
        }

        // get user from db
        $user = $this->service->checkUsernamePassword($loginData->username, $loginData->password);

        // if the method returned false, the username and/or password were incorrect
        if (!$user) {
            // handle incorrect credentials
            $this->respondWithError(401, "Incorrect username or password");
            return;
        }

         // generate jwt
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

        // return response object
        $this->respond($response);
    }

    public function register() {
        // read user data from request body
        $userData = $this->createObjectFromPostedJson("Models\\User");

        // check if the username is already taken
        $user = $this->service->getUserByUsername($userData->username);
    
        // if the method returned a user, the username is already taken
        if ($user) {
            // handle username already taken
            $this->respondWithError(409, "Username already taken");
            return;
        }
    
        // Hash the password
        $hashedPassword = password_hash($userData->password, PASSWORD_DEFAULT);
        // Set the hashed password to the user data
        $userData->password = $hashedPassword;
    
        // insert user into db
        $user = $this->service->insert($userData);
    
        // return the user
        $this->respond($user);
    }
    
    

}
