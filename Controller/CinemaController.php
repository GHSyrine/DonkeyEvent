<?php

require_once 'Controller.php';
require_once '../Model/Repository/CinemaRepository.php';

class CinemaController extends Controller {

    public function __construct()
    {
        $cinemaRepository = new CinemaRepository();
        parent::__construct($cinemaRepository);
    }
    
}