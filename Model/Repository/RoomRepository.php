<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Room.php";
require_once "../DonkeyEvent/Model/Entity/Show.php";
require_once "../DonkeyEvent/Model/Entity/Movie.php";



class RoomRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "room");
    }
    public function getShowsByRoomId(int $id)
    {
        $tables =["show"];
        $foreignkeys =['show.room_id'];
        $shows = $this->getByFilterJoinTables($tables, $foreignkeys, "*", "show.room_id=$id");
        return $shows;
    }

   
    
}