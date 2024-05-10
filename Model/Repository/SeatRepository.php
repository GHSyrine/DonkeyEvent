<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Seat.php";

class SeatRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "seat");
    }

    public function getLastId()
    {
        $statement = $this->pdo->prepare("SELECT id FROM $this->table ORDER BY id desc limit 1");
        $statement->execute();
        $this->table = ucfirst($this->table);
        return $statement->fetch();
    }
}