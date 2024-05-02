<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/MovieRepository.php';

class MovieController extends Controller {

    protected MovieRepository $movieRepository;

    public function __construct()
    {
        $movieRepository = new MovieRepository();
        parent::__construct($movieRepository);
        $this->movieRepository = $movieRepository;
    }

    public function getMoviesByCategory($view, $filters = []){
        $movies = $this->movieRepository->getMoviesByCategoryId($filters['id']);
        $this->getView($view, $movies);
    }

    public function getMovie($view, $id){
        $movie = $this->movieRepository->getById($id);
        $this->getView($view, $movie);
    }

}