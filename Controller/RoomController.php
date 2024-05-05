<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/RoomRepository.php';
require_once '../DonkeyEvent/Model/Repository/ShowRepository.php';

class RoomController extends Controller {

    protected RoomRepository $roomRepository;
    protected ShowRepository $showRepository;

    public function __construct()
    {
        $roomRepository = new RoomRepository();
        parent::__construct($roomRepository);
        $this->roomRepository = $roomRepository;
    }
    private function setShowsByRoom($room){
        $shows = $this->roomRepository->getShowsByRoomId($room->getId());
        $room ->setShows($shows);
    }
    public function all()
    {
        $rooms= parent::all();
        foreach ($rooms as $room) {
            $this->setShowsByRoom($room);
        }
        $data['room']=$rooms;
        $data['shows']=$this->showRepository->getAll();
        return $data;
    }
    public function one(int $id){
        $room = parent ::one($id);
        $this->setShowsByRoom($room);
        return $room;
    }


}