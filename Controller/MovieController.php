<?php

require_once 'Controller.php';
require_once '../Model/Repository/MovieRepository.php';

class MovieController extends Controller {

    protected MovieRepository $movieRepository;

    public function __construct()
    {
        $movieRepository = new MovieRepository();
        parent::__construct($movieRepository);
        $this->movieRepository = $movieRepository;
    }

    public function getMoviesByCategory($view, $filters = []){
        $data = $this->movieRepository->getMoviesByCategoryId($filters['id']);
        $this->view($view, $data);
    }
}