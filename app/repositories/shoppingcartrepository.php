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
            $statement = $this->connection->prepare("SELECT * FROM shoppingcart");
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
            $statement = $this->connection->prepare("INSERT INTO shoppingcart (userid, articleid, quantity, price, totalprice, status) VALUES (:userid, :articleid, :quantity, :price, :totalprice, 'unpaid')");

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
            $statement = $this->connection->prepare("DELETE FROM shoppingcart WHERE id = :id");
            $statement->bindParam(":id", $id);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getShoppingCartById($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM shoppingcart WHERE id = :id");
            $statement->bindParam(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "Models\ShoppingCart");
            return $statement->fetch();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateStatus($id, $status)
    {
        try {
            $statement = $this->connection->prepare("UPDATE shoppingcart SET status = :status WHERE id = :id");
            $statement->bindParam(":id", $id);
            $statement->bindParam(":status", $status);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
