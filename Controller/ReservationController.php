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

    private function setSeanceAndCustomerAndSeatsByReservation($reservation) 
    {
        $infos = $this->reservationRepository->getSeanceAndCustomerAndSeatsByReservationId($reservation->getId());
        $reservation->setSeance($infos[0]);
        $reservation->setCustomer($infos[1]);
        $reservation->setSeats($infos[2]);
        return $reservation;
    }
    
    public function all()
    {
        $reservations = parent::all();
        foreach($reservations as $reservation){
            $this->setSeanceAndCustomerAndSeatsByReservation($reservation);
         }
         return $reservation;
    }
    public function one(int $id)
    {
        $reservation =parent::one($id);
        $this->setSeanceAndCustomerAndSeatsByReservation($reservation);

        return $reservation;
    }
    public function reserve()
    {
        $movieName =$_POST['movieName'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $roomTitle=$_POST['roomtitle'];
        $seats=$_POST['seats'];
        $name=$_POST['name'];
        $firstname=$_POST['firstname'];
        $email=$_POST['email'];
        $seanceId=$_POST['seanceId'];
        $lastOrder=$this->reservationRepository->getLastOrder();
        require_once '../DonkeyEvent/Model/Repository/CustomerRepository.php';
        $customerRepository = new CustomerRepository();
        $customerRepository->insertIntoTable("firstname, lastname, email", $firstname. ",". $name.",". $email);
        $customerId=$customerRepository->getLastCustomerId();
        foreach ($seats as $seat){
        $this->reservationRepository->insertIntoTable('orderNum, seance_id, seat_id, customer_id', $lastOrder+1, $seanceId, $seat, $customerId);
        return $lastOrder+1;
    }
}
}