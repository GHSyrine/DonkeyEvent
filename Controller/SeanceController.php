<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/SeanceRepository.php';

class SeanceController extends Controller
{

    protected SeanceRepository $seanceRepository;

    public function __construct()
    {
        $seanceRepository = new SeanceRepository();
        parent::__construct($seanceRepository);
        $this->seanceRepository = $seanceRepository;
    }
}
