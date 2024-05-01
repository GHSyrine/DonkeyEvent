<?php
require_once 'Controller.php';
require_once '../Model/Repository/SeatRepository.php';
class Seatcontroller extends Controller{
    public function __construct()
    {
        $seatRepository = new SeatRepository();
        parent::__construct($seatRepository);
    }
}