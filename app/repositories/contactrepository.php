<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class ContactRepository extends Repository
{
 

    public function create($contact)
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO ContactPage (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
            
            $statement->bindParam(":name", $contact->name);
            $statement->bindParam(":email", $contact->email);
            $statement->bindParam(":subject", $contact->subject);
            $statement->bindParam(":message", $contact->message);
            
            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}

?>
