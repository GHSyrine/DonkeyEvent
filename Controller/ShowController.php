<?php

require_once 'Controller.php';
require_once '../Model/Repository/ShowRepository.php';

class ShowController extends Controller {

    public function __construct()
    {
        $showRepository = new ShowRepository();
        parent::__construct($showRepository);
    }
    
}