<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/CinemaRepository.php';


class CinemaController extends Controller {

    protected CinemaRepository $cinemaRepository;
    
    public function __construct()
    {
        $cinemaRepository = new CinemaRepository();
        parent::__construct($cinemaRepository);
        $this->cinemaRepository = $cinemaRepository;
    }
    
    private function setRoomsByCinema($cinema){
        $rooms = $this->cinemaRepository->getRoomsByCinemaId($cinema->getId());
        $cinema->setRooms($rooms);
    }
    
    public function all()
    {
        $cinemas = parent::all();
        foreach($cinemas as $cinema)  {
            $this->setRoomsByCinema($cinema);
        }      
        $data = $cinemas;
        return $data;
    }
    public function one(int $id){
        $cinema = parent ::one($id);
        $this->setRoomsByCinema($cinema);
        return $cinema;

    }
}