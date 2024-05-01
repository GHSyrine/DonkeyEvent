<?php

require_once "EntityRepository.php";

class CategoryRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "category");
    }

    public function getMoviesByCategoryId($id){
        $tables = ["movie", "movie_category", "category", "movie_category"];
        $foreignKeys = ['movie.id = movie_category.movie_id', 'category.id = movie_category.category_id'];
        $movies = $this->getByFiltreJoinTables($tables, $foreignKeys, "movie.name", "category.id = $id");
        return $movies;
    }

}

