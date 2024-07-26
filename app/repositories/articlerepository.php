<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;
use Models\Article;
use Models\Category;

class ArticleRepository extends Repository
{
    public function getAll()
    {
        try {
            $query = "SELECT article.*, Category.name as category_name FROM Articles AS article INNER JOIN Category ON article.Category_id = Category.id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
    
            $articles = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $articles[] = $this->rowToArticle($row);
            }
    
            return $articles;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    

    public function getOne($id)
    {
        try {
            $query = "SELECT article.*, Category.name as category_name FROM Articles AS article INNER JOIN Category ON article.Category_id = Category.id WHERE article.id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $article = $this->rowToArticle($row);

            return $article;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function insert($article)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO Articles (title, description, price, stock, category_id, image) VALUES (?, ?, ?, ?, ?, ?)");

            $stmt->execute([$article->title, $article->description, $article->price, $article->stock, $article->category_id, $article->image]);

            $article->id = $this->connection->lastInsertId();

            return $this->getOne($article->id);

        } catch (PDOException $e) {
            echo $e;
        }
    }
    

    public function update($article, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE Articles SET title = ?, description = ?, price = ?, stock = ?, category_id = ?, image = ? WHERE id = ?");

            $stmt->execute([$article->title, $article->description, $article->price, $article->stock, $article->category_id, $article->image, $id]);

            return $this->getOne($id);

        } catch (PDOException $e) {
            echo $e;
        }
    }


    public function delete($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM Articles WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return;
        } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }
    

    private function rowToArticle($row) {
        $article = new Article();
        $article->id = $row['id'];
        $article->title = $row['title'];
        $article->description = $row['description'];
        $article->price = $row['price'];
        $article->stock = $row['stock'];
        $article->category_id = $row['category_id'];
        $article->category_name = $row['category_name'];
        $article->image = $row['image']; 

        return $article;
    }
}

?>
