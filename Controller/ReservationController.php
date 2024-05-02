<?php
include_once 'Controller.php';
include_once '../Model/Repository/ReservationRepository.php';

Class Reservationcontroller extends Controller{

    protected ReservationRepository $reservationRepository;

    public function __construct()
    {
        $reservationRepository = new ReservationRepository();
        parent::__construct($reservationRepository);
        $this->reservationRepository = $reservationRepository;
    }
}