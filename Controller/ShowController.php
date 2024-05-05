<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/ShowRepository.php';

class ShowController extends Controller {

    protected ShowRepository $showRepository;

    public function __construct()
    {
        $showRepository = new ShowRepository();
        parent::__construct($showRepository);
        $this->showRepository = $showRepository;
    }
}