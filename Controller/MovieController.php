<?php

require_once 'Controller.php';
require_once '../Model/Repository/MovieRepository.php';

class MovieController extends Controller {

    public function __construct()
    {
        $movieRepository = new MovieRepository();
        parent::__construct($movieRepository);
    }
    
}