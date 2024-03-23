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

        // get user from db
        $user = $this->service->checkUsernamePassword($loginData->username, $loginData->password);

        // if the method returned false, the username and/or password were incorrect
        if (!$user) {
            // handle incorrect credentials
            $this->respondWithError(401, "Incorrect username or password");
            return;
        }

         // generate jwt
         $key = "pindakaas";
         $payload = array(
             "iss" => "http://api.inholland.nl",
             "aud" => "http://www.inholland.nl",
             "sub" => $user->username,
             "iat" => time(),
             "nbf" => time(),
             "exp" => time() + 3600, 
         );
 
         $jwt = \Firebase\JWT\JWT::encode($payload, $key, 'HS256');
 
         // return jwt
         $this->respond($jwt);
    }

    public function register() {
        // read user data from request body
        $userData = $this->createObjectFromPostedJson("Models\\User");
    
        // check if the username is already taken
        $user = $this->service->getByUsername($userData->username);
    
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
