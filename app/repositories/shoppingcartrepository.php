<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class ShoppingCartRepository extends Repository
{
    public function getAll()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM Shoppingcart");
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "Models\ShoppingCart");
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function insert($shoppingCart)
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO Shoppingcart (userid, articleid, quantity, price, totalprice, status) VALUES (:userid, :articleid, :quantity, :price, :totalprice, 'unpaid')");

            $statement->bindParam(":userid", $shoppingCart->userid);
            $statement->bindParam(":articleid", $shoppingCart->articleid);
            $statement->bindParam(":quantity", $shoppingCart->quantity);
            $statement->bindParam(":price", $shoppingCart->price);
            $statement->bindParam(":totalprice", $shoppingCart->totalprice);

            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function delete($id)
    {
        try {
            $statement = $this->connection->prepare("DELETE FROM Shoppingcart WHERE id = :id");
            $statement->bindParam(":id", $id);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getOne($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM Shoppingcart WHERE id = :id");
            $statement->bindParam(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "Models\ShoppingCart");
            return $statement->fetch();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateStatus($id, $status) {
        try {
            $statement = $this->connection->prepare("UPDATE Shoppingcart SET status = :status WHERE id = :id");
            $statement->bindParam(":status", $status);
            $statement->bindParam(":id", $id);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateStock($articleId, $quantity) {
        try {
            $statement = $this->connection->prepare("UPDATE Articles SET stock = stock - :quantity WHERE id = :articleId");
            $statement->bindParam(":quantity", $quantity);
            $statement->bindParam(":articleId", $articleId);
            $statement->execute();

            
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    
    
    
    

}
