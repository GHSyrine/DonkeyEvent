<?php

class EntityRepository {

    private $pdo;

    public function __construct($pdo) {

        if ($pdo) {
            $this->pdo = $pdo;
        } else {
            $this->pdo = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
        }
    }

    public function getAll($table) {
        $statement = $this->pdo->prepare("SELECT * FROM :table");
        $statement->bindParam(":table", $table);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, $table::class);
    }

    public function getById($table, $id) {
        $statement = $this->pdo->prepare("SELECT * FROM :table WHERE id = :id");
        $statement->bindParam(":table", $table);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, $table::class);
    }
    public function updateTable($table, $columns, $filtre){
    $query = "UPDATE $table SET $columns WHERE $filtre";
    $statement =$this->pdo->prepare($query);
    $statement ->bindValue(":table", $table);
    $statement ->bindValue(":columns", $columns);
    $statement ->bindValue(":filtre", $filtre);
    $statement ->execute();
    }
    public function deleteFromTable($table, $filtre){
        $query = "DELETE FROM $table WHERE $filtre"; 
        $statement =$this ->pdo ->prepare($query);
        $statement ->bindValue(":table", $table);
        $statement ->bindValue (":filre", $filtre);
        $statement ->execute();
    }
}
