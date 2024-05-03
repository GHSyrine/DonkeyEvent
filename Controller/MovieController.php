<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/MovieRepository.php';
require_once '../DonkeyEvent/Model/Repository/CategoryRepository.php';

class MovieController extends Controller {

    protected MovieRepository $movieRepository;

    protected CategoryRepository $categoryRepository;
    public function __construct()
    {
        $movieRepository = new MovieRepository();
        $categoryRepository = new CategoryRepository();

        parent::__construct($movieRepository);

        $this->movieRepository = $movieRepository;
        $this->categoryRepository= $categoryRepository;
    }

    // @todo refactor / rename / move
    private function setCategoriesByMovie($movie){
        $categories = $this->movieRepository->getCategoriesByMovieId($movie->getId());
        $movie->setCategories($categories);
    }
    public function all(){
        $movies = parent::all();
        foreach($movies as $movie){
            $this->setCategoriesByMovie($movie);
        }
        $data['movies'] = $movies;
        // Toutes les catégories qui existent
        $data['categories'] = $this->categoryRepository->getAll();
        return $data;
    }

    public function one(int $id){
        $movie = parent::one($id);
        $this->setCategoriesByMovie($movie);
        return $movie;
    }

    public function getMoviesByCategory($view, $filters = []){
        $movies = $this->movieRepository->getMoviesByCategoryId($filters['id']);
        $this->getView($view, $movies);
    }

    public function getMovie($view, $id){
        $movie = $this->movieRepository->getById($id);
        $this->getView($view, $movie);
    }

    public function getShowsByMovieId($view, $filters = []){
        $shows = $this->movieRepository->getShowsByMovieId($filters['id']);
        $this->getView($view, $shows);
    }

}