<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class UserRepository extends Repository
{
    function checkUsernamePassword($username, $password)
    {
        try {
            // retrieve the user with the given username
            $stmt = $this->connection->prepare("SELECT id, username, password, roleId FROM User WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\User');
            $user = $stmt->fetch();

            // verify if the user exists
            if (!$user) {
                return false;
            }

            // verify if the password matches
            if (!password_verify($password, $user->password)) {
                return false;
            }

            // do not pass the password hash to the caller
            $user->password = "";

            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // hash the password (currently uses bcrypt)
    function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // verify the password hash
    function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }


    public function getAll(){
        $statement = $this->connection->prepare("SELECT * FROM User");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Models\User");
        return $statement->fetchAll();
    }

    public function insert($user) {

        $statement = $this->connection->prepare("INSERT INTO User (username, password, email, name, adres, phonenumber, roleId) 
        VALUES (:username, :password, :email, :name, :adres, :phonenumber, :roleId)");
    
        $statement->bindParam(":username", $user->username);
        $statement->bindParam(":password", $user->password);
        $statement->bindParam(":email", $user->email);
        $statement->bindParam(":name", $user->name);
        $statement->bindParam(":adres", $user->adres);
        $statement->bindParam(":phonenumber", $user->phonenumber);
        $statement->bindParam(":roleId", $user->roleId); 
    
        $statement->execute();
        return $user;
    }

    public function getUserByUsername($username) {
        try {
            $statement = $this->connection->prepare("SELECT COUNT(*) FROM User WHERE username = :username");
            $statement->bindParam(":username", $username);
            $statement->execute();
    
            // Fetch the count of matching users
            $count = $statement->fetchColumn();
    
            // Return true if at least one user exists, otherwise false
            return $count > 0;
        } catch (PDOException $e) {
            // Log or handle the error as needed
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }
    
    

    
}
