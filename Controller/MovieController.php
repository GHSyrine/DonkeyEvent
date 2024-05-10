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

    private function setCategoriesByMovie($movie){
        $categories = $this->movieRepository->getCategoriesByMovieId($movie->getId());
        $movie->setCategories($categories);
    }

    private function setSeancesByMovie($movie)
    {
        $seances = $this->movieRepository->getSeancesByMovieId($movie->getId());
        foreach($seances as $seance){
            $seance->setDate($this->formatDate($seance->getDate()));
        }
        $movie->setSeances($seances);
    }

    private function formatDate($datetime){
        return date("l H:i", strtotime($datetime));
    }

    public function all()
    {
        $movies = parent::all();
        foreach($movies as $movie){
            $this->setCategoriesByMovie($movie);
        }
        return $movies;
    }

    public function one(int $id){
        $movie = parent::one($id);
        $this->setCategoriesByMovie($movie);
        $this->setSeancesByMovie($movie);
        return $movie;
    }

    public function find()
    {
        $data = parent::findEntity("name");
        return $data;
    }
}