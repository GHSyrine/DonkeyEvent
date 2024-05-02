<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Room.php";
require_once "../DonkeyEvent/Model/Entity/cinema.php";

class RoomRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "room");
    }
    public function getRoomsByCinemaId($id){
        $tables =["room", "cinema"];
        $foreignkeys=['cinema.id = room.cinema_id'];
        $rooms =$this->getByFilterJoinTables($tables, $foreignkeys,"room.name", "cinema.id = $id");
        return $rooms;
    }
}