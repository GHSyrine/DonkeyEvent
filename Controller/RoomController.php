<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/RoomRepository.php';

class RoomController extends Controller
{
    protected RoomRepository $roomRepository;

    public function __construct()
    {
        $roomRepository = new RoomRepository();
        parent::__construct($roomRepository);
        $this->roomRepository = $roomRepository;
    }

    private function setMoviesAndSeancesByRoom($room)
    {
        $infos = $this->roomRepository->getMoviesAndSeancesByRoomId($room->getId());
        $room->setMovies($infos[0]);
        $room->setSeances($infos[1]);
        return $room;
    }

    public function all()
    {
        $rooms = parent::all();
        foreach ($rooms as $room) {
            $this->setMoviesAndSeancesByRoom($room);
        }
        return $rooms;
    }

    public function one(int $id)
    {
        $room = parent::one($id);
        $this->setMoviesAndSeancesByRoom($room);
        return $room;
    }
}
