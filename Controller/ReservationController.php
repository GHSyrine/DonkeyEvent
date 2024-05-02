<?php
include_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/ReservationRepository.php';

Class Reservationcontroller extends Controller{

    protected ReservationRepository $reservationRepository;

    public function __construct()
    {
        $reservationRepository = new ReservationRepository();
        parent::__construct($reservationRepository);
        $this->reservationRepository = $reservationRepository;
    }
}