<?php
include_once 'Controller.php';
include_once '../Model/Repository/ReservationRepository.php';

Class Reservationcontroller extends Controller{
    public function __construct()
    {
        $reservationRepository = new ReservationRepository();
        parent::__construct($reservationRepository);
    }
}