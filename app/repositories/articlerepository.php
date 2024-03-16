<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class ArticleRepository extends Repository
{
    public function getAll()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM articles");
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "Models\Article");
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function insert($article)
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO articles (id, title, description, price, stock, category) VALUES (:id, :title, :description, :price, :stock, :category)");
            $statement->bindParam(":id", $article->id);
            $statement->bindParam(":title", $article->title);
            $statement->bindParam(":description", $article->description);
            $statement->bindParam(":price", $article->price);
            $statement->bindParam(":stock", $article->stock);
            $statement->bindParam(":category", $article->category);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getArticleById($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM articles WHERE id = :id");
            $statement->bindParam(":id", $id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "Models\Article");
            return $statement->fetch();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function update($article)
    {
        try {
            $statement = $this->connection->prepare("UPDATE articles SET stock = :stock WHERE id = :id");
            $statement->bindParam(":id", $article->id);
            $statement->bindParam(":stock", $article->stock);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateStock($article)
    {
        try {
            $statement = $this->connection->prepare("UPDATE articles SET stock = :stock WHERE id = :id");
            $statement->bindParam(":id", $article->id);
            $statement->bindParam(":stock", $article->stock);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}

