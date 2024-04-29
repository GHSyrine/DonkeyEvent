<?php

require_once "Entity.php";

class Category extends Entity{
    private string $name;
    private array $movies =[];

 
    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getMovies()
    {
        return $this->movies;
    }

 
    public function setMovies($movies)
    {
        $this->movies = $movies;

        return $this;
    }
}
    