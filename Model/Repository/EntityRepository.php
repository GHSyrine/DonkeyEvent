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

    /**
     * @param array $tables exemple : ["cinema", "movie"]
     * @param array $foreignKeys exemple : ["cinema.id = movie.cinema_id"]
     * @param string $columns exemple : "cinema.name, movie.title"
     * @param string $filtre exemple : "cinema.id = 1"
     * @return array exemple : [0 => Cinema, 1 => Movie, 2 => Movie
     */

    public function getByFiltreJoinTables(array $tables, array $foreignKeys, string $columns, string $filtre) : array
    {
        // récuperer les colonnes de la première table
        $query = "SELECT :columns FROM :tables[0]";

        // boucler sur les tables d'après pour les joindre
        for ($i = 1; $i < count($tables); $i++) {
            $query .= " JOIN :tables[$i] ON :foreignKeys[$i]";
        }

        // ajouter le filtre
        $query .= " WHERE :filtre";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":columns", $columns);

        // boucler sur les tables pour les lier
        for ($i = 0; $i < count($tables); $i++) {
            $statement->bindValue(":tables[$i]", $tables[$i]);
        }

        // boucler sur les foreignKeys pour les lier
        for ($i = 1; $i < count($tables); $i++) {
            $statement->bindValue(":foreignKeys[$i]", $foreignKeys[$i]);
        }

        // lier le filtre
        $statement->bindValue(":filtre", $filtre);
        $statement->execute();

        // retourner les résultats
        return $statement->fetchAll(PDO::FETCH_CLASS, $tables[0]::class);
    }

}