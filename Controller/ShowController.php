<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/ShowRepository.php';
require_once '../DonkeyEvent/Model/Repository/MovieRepository.php';
class ShowController extends Controller {

    protected ShowRepository $showRepository;
    protected MovieRepository $movieRepository;

    public function __construct()
    {
        $showRepository = new ShowRepository();
        $movieRepository = new MovieRepository();

        parent::__construct($showRepository);

        $this->showRepository = $showRepository;
        $this->movieRepository =$movieRepository;

    }
    private function setMoviesByShow($show){
        $movies = $this ->showRepository->getMoviesByShowId($show->getId());
        $show->setMovies($movies);
    }
    private function formatDate($datetime){
        return date("l H:i", strtotime($datetime));
    }
    public function all()
    {
        $shows = parent::all();
        foreach ($shows as $show) {
            $this->setMoviesByShow($show);
        }
        $data['movies'] = $this->movieRepository->getAll();

    }
    public function one(int $id){
        $show = parent ::one($id);
        $this->setMoviesByShow($show);
        return $show;
    }
}