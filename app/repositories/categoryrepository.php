<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class CategoryRepository extends Repository
{
    function getAll()
    {
        try {
            $query = "SELECT * FROM Category";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
    
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Category');
            $categories = $stmt->fetchAll();
    
            return $categories;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    

    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Category WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Category');
            $product = $stmt->fetch();

            return $product;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insert($category)
    {
        try {
            $stmt = $this->connection->prepare("INSERT into Category (name) VALUES (?)");

            $stmt->execute([$category->name]);

            $category->id = $this->connection->lastInsertId();

            return $category;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function update($category, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE Category SET name = ? WHERE id = ?");

            $stmt->execute([$category->name, $id]);

            return $category;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function delete($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM Category WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return;
        } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }
}
