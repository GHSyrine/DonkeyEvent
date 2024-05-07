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

    private function setMoviesAndShowsByRoom($room)
    {
        $infos = $this->roomRepository->getMoviesAndShowsByRoomId($room->getId());
        $room->setMovies($infos[0]);
        $room->setShows($infos[1]);
        return $room;
    }

    public function all()
    {
        $rooms = parent::all();
        foreach ($rooms as $room) {
            $this->setMoviesAndShowsByRoom($room);
        }
        $data = $rooms;
        return $data;
    }

    public function one(int $id)
    {
        $room = parent::one($id);
        $this->setMoviesAndShowsByRoom($room);
        return $room;
    }
}
