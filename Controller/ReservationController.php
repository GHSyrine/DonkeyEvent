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
    public function one(int $orderNum)
    {
        $reservations = $this->reservationRepository->getReservationByOrderNum($orderNum);
        foreach($reservations as $reservation){
            $this->setSeanceAndCustomerAndSeatsByReservation($reservation);
        }
        
        return $reservations;
    }

    public function reserve()
    {
        $movieName =$_POST['movieName'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $roomTitle=$_POST['roomTitle'];
        $seats=$_POST['seats'];
        $seats = explode(",",$seats);
        $name=$_POST['lastname'];
        $firstname=$_POST['firstname'];
        $email=$_POST['email'];
        $seanceId=$_POST['seanceId'];
        $lastOrder=$this->reservationRepository->getLastOrder();
        require_once '../DonkeyEvent/Model/Repository/CustomerRepository.php';
        $customerRepository = new CustomerRepository();
        require_once '../DonkeyEvent/Model/Repository/SeatRepository.php';
        $seatRepository = new SeatRepository();
        $customerRepository->insert([["firstname", PDO::PARAM_STR], ["lastname", PDO::PARAM_STR], ["email", PDO::PARAM_STR]], [$firstname, $name, $email]);
        $customerId=$customerRepository->getLastCustomerId();
        $customerId=$customerId[0];
        $orderNum = $lastOrder[0]+1;
        foreach ($seats as $seat){
            $seatRepository->insert([["number", PDO::PARAM_STR], ["customer_id", PDO::PARAM_INT], ["seance_id", PDO::PARAM_INT]], [$seat, $customerId, $seanceId]);
            $seatId = $seatRepository->getLastId();
            $seatId = $seatId[0];
            $this->reservationRepository->insert([["orderNum", PDO::PARAM_INT], ["seance_id", PDO::PARAM_INT], ["seat_id", PDO::PARAM_INT], ["customer_id", PDO::PARAM_INT]], [$orderNum, $seanceId, $seatId ,$customerId]);
        }
        return $orderNum;
    }
}
