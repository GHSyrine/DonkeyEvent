<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Movie.php";
require_once "../DonkeyEvent/Model/Entity/Category.php";
require_once "../DonkeyEvent/Model/Entity/Seance.php";

class MovieRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "movie");
    }

    public function getMoviesByCategoryId($id){
        $tables = ["movie", "movie_category", "category", "movie_category"];
        $foreignKeys = ['movie.id = movie_category.movie_id', 'category.id = movie_category.category_id'];
        $movies = $this->getByFilterJoinTables($tables, $foreignKeys, "movie.*", "category.id = $id");
        return $movies;
    }
    public function getCategoriesByMovieId($id){
        $tables = ["category", "movie_category", "movie", "movie_category"];
        $foreignKeys = ['category.id = movie_category.category_id', 'movie.id = movie_category.movie_id'];
        $categories = $this->getByFilterJoinTables($tables, $foreignKeys, "category.*", "movie.id = $id");
        return $categories;
    }

    public function getSeancesByMovieId($id){
        $tables = ["seance", "movie"];
        $foreignKeys = ['seance.movie_id = movie.id'];
        $seances = $this->getByFilterJoinTables($tables, $foreignKeys, "seance.*", "movie.id = $id");
        return $seances;
    }
}
