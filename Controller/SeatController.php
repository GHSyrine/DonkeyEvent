<?php
require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/SeatRepository.php';
class Seatcontroller extends Controller{

    protected SeatRepository $seatRepository;

    public function __construct()
    {
        $seatRepository = new SeatRepository();
        parent::__construct($seatRepository);
        $this->seatRepository = $seatRepository;
    }
}