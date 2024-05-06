<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Cinema.php";

class CinemaRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "cinema");
    }
    public function getRoomsByCinemaId(int $id): array
    {
    $tables = ["room"];
    $foreignkeys = ['room.cinema_id'];
    $rooms = $this->getByFilterJoinTables($tables, $foreignkeys, "*", "room.cinema_id=$id");
    
    return $rooms;
}
}
