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
        require_once "../DonkeyEvent/Model/Entity/Room.php";
        $tables = ["room", "cinema"];
        $foreignkeys = ['room.cinema_id = cinema.id'];
        $rooms = $this->getByFilterJoinTables($tables, $foreignkeys, "room.*", "room.cinema_id=$id");

        return $rooms;
    }
}
