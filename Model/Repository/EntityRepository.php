<?php

class EntityRepository
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {

        if ($pdo) {
            $this->pdo = $pdo;
        } else {
            $this->pdo = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
        }
    }

    /**
     * @param string $table exemple : "cinema"
     * @return array exemple : [0 => Cinema, 1 => Cinema, 2 => Cinema]
     */

    public function getAll(string $table) : array
    {
        $statement = $this->pdo->prepare("SELECT * FROM :table");
        $statement->bindParam(":table", $table);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, $table::class);
    }

    /**
     * @param string $table exemple : "cinema"
     * @param int $id exemple : 1
     * @return object exemple : Cinema {id: 1, name: "Cinema 1", address: "1 rue de Paris"}
     */

    public function getById(string $table, int $id) : object
    {
        $statement = $this->pdo->prepare("SELECT * FROM :table WHERE id = :id");
        $statement->bindParam(":table", $table);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_CLASS, $table::class);
    }

    /**
     * @param string $table exemple : "cinema"
     * @param string $columns exemple : "name = 'Cinema 1', address = '1 rue de Paris'"
     * @param string $filtre exemple : "id = 1"
     * @return void
     */

    public function updateTable(string $table, string $columns, string $filtre) : void
    {
        $query = "UPDATE :table SET :columns WHERE :filtre";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":table", $table);
        $statement->bindValue(":columns", $columns);
        $statement->bindValue(":filtre", $filtre);
        $statement->execute();
    }

    /**
     * @param string $table exemple : "cinema"
     * @param string $filtre exemple : "id = 1"
     * @return void
     */

    public function deleteFromTable(string $table, string $filtre) : void
    {
        $query = "DELETE FROM :table WHERE :filtre";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":table", $table);
        $statement->bindValue(":filtre", $filtre);
        $statement->execute();
    }

    /**
     * @param string $table exemple : "cinema"
     * @param string $columns exemple : "name, address"
     * @param string $values exemple : "'Cinema 1', '1 rue de Paris'"
     * @return void
     */

    public function insertIntoTable(string $table, string $columns, string $values) : void
    {
        $query = "INSERT INTO :table (:columns) VALUES (:values)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":table", $table);
        $statement->bindValue(":columns", $columns);
        $statement->bindValue(":values", $values);
        $statement->execute();
    }

}