<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/CinemaRepository.php';
require_once '../DonkeyEvent/Model/Repository/RoomRepository.php';


class CinemaController extends Controller {

    protected CinemaRepository $cinemaRepository;
    protected RoomRepository $roomRepository;
    
    public function __construct()
    {
        $cinemaRepository = new CinemaRepository();
        $roomRepository = new RoomRepository();
        
        parent::__construct($cinemaRepository);
        
        $this->cinemaRepository = $cinemaRepository;
        $this->roomRepository = $roomRepository;
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
        $data['cinemas']=$cinemas;
        $data['rooms'] =$this->roomRepository->getAll();
        return $data;
    }
    public function one(int $id){
        $cinema = parent ::one($id);
        $this->setRoomsByCinema($cinema);
        return $cinema;

    }
}

   
    