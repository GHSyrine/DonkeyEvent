<?php

class EntityRepository
{
    protected PDO|null $pdo;
    protected string $table;

    public function __construct(PDO|null $pdo, string $table)
    {

        if ($pdo) {
            $this->pdo = $pdo;
        } else {
            $this->pdo = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
        }
        $this->table = $table;
    }

    /**
     * @return array exemple : [0 => Cinema, 1 => Cinema, 2 => Cinema]
     */

    public function getAll() : array
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table");
        $statement->execute();
        $this->table = ucfirst($this->table);
        return $statement->fetchAll(PDO::FETCH_CLASS, $this->table::class);
    }

    /**
     * @param int $id exemple : 1
     * @return object exemple : Cinema {id: 1, name: "Cinema 1", address: "1 rue de Paris"}
     */

    public function getById(int $id) : object
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $this->table = ucfirst($this->table);
        return $statement->fetch(PDO::FETCH_CLASS, $this->table::class);
    }

    /**
     * @param string $columns exemple : "name = 'Cinema 1', address = '1 rue de Paris'"
     * @param string $filtre exemple : "id = 1"
     * @return void
     */

    public function updateTable(string $columns, string $filtre) : void
    {
        $query = "UPDATE $this->table SET :columns WHERE :filtre";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":columns", $columns);
        $statement->bindValue(":filtre", $filtre);
        $statement->execute();
    }

    /**
     * @param string $filtre exemple : "id = 1"
     * @return void
     */

    public function deleteFromTable(string $filtre) : void
    {
        $query = "DELETE FROM $this->table WHERE :filtre";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(":filtre", $filtre);
        $statement->execute();
    }

    /**
     * @param string $columns exemple : "name, address"
     * @param string $values exemple : "'Cinema 1', '1 rue de Paris'"
     * @return void
     */

    public function insertIntoTable(string $columns, string $values) : void
    {
        $query = "INSERT INTO $this->table (:columns) VALUES (:values)";
        $statement = $this->pdo->prepare($query);
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

    protected function getByFiltreJoinTables(array $tables, array $foreignKeys, string $columns, string $filtre): array
    {
        // Construction de la requête pour sélectionner les colonnes de la première table
        $query = "SELECT $columns FROM {$tables[0]}";
    
        // Boucle sur les tables suivantes pour les joindre
        for ($i = 1; $i < count($tables); $i++) {
            if(!empty($foreignKeys[$i-1])){
                $query .= " INNER JOIN {$tables[$i]} ON {$foreignKeys[$i-1]}";
            }
        }
    
        // Ajouter le filtre
        if($filtre !== ''){
            $query .= " WHERE $filtre";
        }
        // Préparation de la requête
        $statement = $this->pdo->prepare($query);
  
        // Exécution de la requête avec les valeurs liées
        $statement->execute();
        // Retourner les résultats
        return $statement->fetchAll(PDO::FETCH_CLASS, ucfirst($tables[0]));
    }
    

}
