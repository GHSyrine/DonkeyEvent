<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Room.php";

class RoomRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "room");
    }

        public function getMoviesAndSeancesByRoomId($id){
            require_once "../DonkeyEvent/Model/Entity/Seance.php";
            require_once "../DonkeyEvent/Model/Entity/Movie.php";
            
            $tables=["seance", "room", "movie"];
            $foreignkeys =['seance.room_id = room.id', 'seance.movie_id=movie.id'];
            
            $seances = $this->getByFilterJoinTables($tables, $foreignkeys, "seance.*", "room.id=$id");
            $tables=["movie", "seance", "room"];
            $foreignkeys =['movie.id = seance.movie_id', 'seance.room_id=room.id'];

            $movies =$this->getByFilterJoinTables($tables, $foreignkeys, "movie.*", "room.id=$id");
            $infos =[$movies, $seances];
            return $infos;
        }
        
    }

   
    
