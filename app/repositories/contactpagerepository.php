<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class ContactPageRepository extends Repository
{
    public function getAll()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM ContactPage");
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "Models\ContactPage");
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function insert($contactPage)
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO ContactPage (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
            
            $statement->bindParam(":name", $contactPage->name);
            $statement->bindParam(":email", $contactPage->email);
            $statement->bindParam(":subject", $contactPage->subject);
            $statement->bindParam(":message", $contactPage->message);
            
            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}

?>
