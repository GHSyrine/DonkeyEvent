<?php

require_once 'Controller.php';
require_once 'Model/Repository/MovieRepository.php';

class MovieController extends Controller {

    private $movieRepository;

    public function __construct()
    {
        $this->movieRepository = new MovieRepository();
        parent::__construct($this->movieRepository);
    }

    public function getMoviesByCategory($id){
        $movies = $this->movieRepository->getMoviesByCategoryId($id);
        parent::view("movies", $movies);
    }

    public function getMovie($id){
        $movie = $this->movieRepository->getById($id);
        parent::view("movie-detail", $movie);
    }

}