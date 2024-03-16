<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;
use Models\Article;

class ArticleRepository extends Repository
{
    public function getAll($offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT article.*, category.name as category_name FROM articles AS article INNER JOIN categories AS category ON article.category_id = category.id";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
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
            $query = "SELECT article.*, category.name as category_name FROM articles AS article INNER JOIN categories AS category ON article.category_id = category.id WHERE article.id = :id";
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
            $stmt = $this->connection->prepare("INSERT INTO articles (title, description, price, stock, category_id) VALUES (?, ?, ?, ?, ?)");

            $stmt->execute([$article->title, $article->description, $article->price, $article->stock, $article->category_id]);

            $article->id = $this->connection->lastInsertId();

            return $this->getOne($article->id);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function update($article, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE articles SET title = ?, description = ?, price = ?, stock = ?, category_id = ? WHERE id = ?");

            $stmt->execute([$article->title, $article->description, $article->price, $article->stock, $article->category_id, $id]);

            return $this->getOne($id);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM articles WHERE id = :id");
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

        // Opmerking: Je moet de categoriegegevens mogelijk ophalen vanuit de database en instellen in het artikelobject.

        return $article;
    }
}

?>