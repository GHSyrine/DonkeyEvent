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

    public function view($view, $filters = []){
        if(array_key_exists('category', $filters)){
            $movies = $this->movieRepository->getMoviesByCategoryId($filters["category"]);
        } else {
            $movies = $this->movieRepository->getAll();
        }
        parent::view($view, $movies);
    }
}