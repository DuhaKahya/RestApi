<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class OrderRepository extends Repository
{
    public function getAll()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM Orders");
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "Models\Order");
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function insert($order)
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO Orders (shoppingcartid) VALUES (:shoppingcartid)");
            $statement->bindParam(":shoppingcartid", $order->shoppingcartid);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
