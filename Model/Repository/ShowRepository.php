<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Show.php";

class ShowRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "show");
    }

    public function getMoviesByShowId($id){
        $tables=[`cinema`.`show`];
        $foreignkeys =['show.movie_id'];
        $movies =$this->getByFilterJoinTables($tables, $foreignkeys, "*", "show.movie_id=$id");
        return $movies;
    }
}
