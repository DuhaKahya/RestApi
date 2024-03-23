<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class RolesRepository extends Repository
{
    public function getAll($offset = null, $limit = null)
    {
        try {
            $query = "SELECT * FROM Roles";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Roles');
            $roles = $stmt->fetchAll();

            return $roles;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Roles WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Roles');
            $role = $stmt->fetch();

            return $role;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function insert($role)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO Roles (name) VALUES (?)"); 

            $stmt->execute([$role->name]);

            $role->id = $this->connection->lastInsertId();

            return $role;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function update($role, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE Roles SET name = ? WHERE id = ?"); // Aanpassing van de tabelnaam

            $stmt->execute([$role->name, $id]);

            return $role;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM Roles WHERE id = :id"); // Aanpassing van de tabelnaam
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return;
        } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }
}

?>
