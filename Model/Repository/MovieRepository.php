<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Movie.php";
require_once "../DonkeyEvent/Model/Entity/Category.php";


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
    public function getCategoriesByMovieId($id){
        $tables = ["category", "movie_category", "movie", "movie_category"];
        $foreignKeys = ['category.id = movie_category.category_id', 'movie.id = movie_category.movie_id'];
        $categories = $this->getByFilterJoinTables($tables, $foreignKeys, "category.name", "movie.id = $id");
        return $categories;
    }

}
