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
            $stmt = $this->connection->prepare("SELECT id, username, password FROM User WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\User');
            $user = $stmt->fetch();

            // verify if the password matches the hash in the database
            $result = $this->verifyPassword($password, $user->password);

            if (!$result)
                return false;

            // do not pass the password hash to the caller
            $user->password = "";

            return $user;
        } catch (PDOException $e) {
            echo $e;
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
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        return $statement->fetchAll();
    }

    

    public function getUserByUsername($username) {
        $statement = $this->connection->prepare("SELECT * FROM User WHERE username = :username");
        $statement->bindParam(":username", $username);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        return $statement->fetch();
    }

    public function insert($user) {
        
        $statement = $this->connection->prepare("INSERT INTO User (username, password, email, name, adres, phonenumber, registrationdate) 
        VALUES (:username, :password, :email, :name, :adres, :phonenumber, CURRENT_TIMESTAMP)");

        $statement->bindParam(":username", $user->username);
        $statement->bindParam(":password", $user->password);
        $statement->bindParam(":email", $user->email);
        $statement->bindParam(":name", $user->name);
        $statement->bindParam(":adres", $user->adres);
        $statement->bindParam(":phonenumber", $user->phonenumber);
        
        $statement->execute();
    }
}
