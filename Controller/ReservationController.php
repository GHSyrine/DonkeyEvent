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
        $roomTitle=$_POST['roomTitle'];
        $seats=$_POST['seats'];
        $seats = explode(",",$seats);
        $name=$_POST['lastname'];
        $firstname=$_POST['firstname'];
        $email=$_POST['email'];
        $seanceId=$_POST['seanceId'];
        var_dump($seanceId);
        $lastOrder=$this->reservationRepository->getLastOrder();
        require_once '../DonkeyEvent/Model/Repository/CustomerRepository.php';
        $customerRepository = new CustomerRepository();
        $customerRepository->insert([["firstname", PDO::PARAM_STR], ["lastname", PDO::PARAM_STR], ["email", PDO::PARAM_STR]], [$firstname, $name, $email]);
        $customerId=$customerRepository->getLastCustomerId();
        $orderNum = $lastOrder[0]+1;
        foreach ($seats as $seat){
        $this->reservationRepository->insert([["orderNum", PDO::PARAM_INT], ["seance_id", PDO::PARAM_INT], ["seat_id", PDO::PARAM_INT], ["customer_id", PDO::PARAM_INT]], [$orderNum, $seanceId, $customerId[0], $seat]);
        }
        return $orderNum;
    }
}
