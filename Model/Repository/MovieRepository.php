<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Movie.php";
require_once "../DonkeyEvent/Model/Entity/Category.php";
require_once "../DonkeyEvent/Model/Entity/Show.php";

class MovieRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "movie");
    }

    public function getCategoriesByMovieId($id){
        $tables = ["category", "movie_category", "movie", "movie_category"];
        $foreignKeys = ['category.id = movie_category.category_id', 'movie.id = movie_category.movie_id'];
        $categories = $this->getByFilterJoinTables($tables, $foreignKeys, "category.name", "movie.id = $id");
        return $categories;
    }


    public function getShowsByMovieId($id){
        $tables = ["show", "movie"];
        $foreignKeys = ['show.movie_id = movie.id'];
        $shows = $this->getByFilterJoinTables($tables, $foreignKeys, "*", "movie.id = $id");
        return $shows;
    }
}
