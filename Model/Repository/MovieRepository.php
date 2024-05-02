<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Movie.php";

class MovieRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "movie");
    }

    public function getMoviesByCategoryId($id){
        $tables = ["movie", "movie_category", "category", "movie_category"];
        $foreignKeys = ['movie.id = movie_category.movie_id', 'category.id = movie_category.category_id'];
        $movies = $this->getByFilterJoinTables($tables, $foreignKeys, "movie.name", "category.id = $id");
        return $movies;
    }

    public function getShowsByMovie($id){
        $tables = ["movie","show"];
        $foreignKeys = ['movie.id = show.movie_id'];
        $shows = $this->getByFilterJoinTables($tables, $foreignKeys, "*","movie.id = $id");
        return $shows;
    }

}
