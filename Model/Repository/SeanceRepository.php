<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Seance.php";

class SeanceRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "seance");
    }

    public function getRoomAndSeatBySeanceId($id)
    {
        require_once "../DonkeyEvent/Model/Entity/Room.php";
        require_once "../DonkeyEvent/Model/Entity/Seat.php";
        
        $tables=["room", "seance", "seat"];
        $foreignkeys =['seance.room_id = room.id', 'seat.seance_id = seance.id'];
        $rooms = $this->getByFilterJoinTables($tables, $foreignkeys, "room.*", "seance.id=$id");
        $rooms = $rooms[0];

        $tables=["seat", "seance", "room"];
        $foreignkeys =['seat.seance_id = seance.id', 'seance.room_id = room.id'];
        $seats = $this->getByFilterJoinTables($tables, $foreignkeys, "seat.*", "seance.id=$id");
        return [$rooms, $seats];
    }

    public function getMovieBySeanceId($id)
    {
        require_once "../DonkeyEvent/Model/Entity/Movie.php";
        
        $tables=["movie", "seance"];
        $foreignkeys =['movie.id = seance.movie_id'];
        $movies = $this->getByFilterJoinTables($tables, $foreignkeys, "movie.*", "seance.id=$id");
        return $movies;
    }
}
