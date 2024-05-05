<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/RoomRepository.php';
require_once '../DonkeyEvent/Model/Repository/ShowRepository.php';
require_once '../DonkeyEvent/Model/Repository/MovieRepository.php';

class RoomController extends Controller {

    protected RoomRepository $roomRepository;
    protected ShowRepository $showRepository;
    protected MovieRepository $movieRepository;


    public function __construct()
    {
        $roomRepository = new RoomRepository();
        $movieRepository = new MovieRepository();
        $showRepository = new ShowRepository();

        parent::__construct($roomRepository);

        $this->roomRepository = $roomRepository;
        $this->movieRepository =$movieRepository;
        $this->showRepository = $showRepository;
    }

    private function setMoviesByRoom($room){
        $movies = $this ->roomRepository->getMoviesByRoomId($room->getId());
        $room->setMovies($movies);
    }
    private function setShowsByRoom($room){
        $shows = $this->roomRepository->getShowsByRoomId($room->getId());
        $room ->setShows($shows);
    }
    private function formatDate($datetime){
        return date("l H:i", strtotime($datetime));
    }
    public function all()
    {
        $rooms = parent::all();
        foreach ($rooms as $room) {
            $this->setShowsByRoom($room);
            $this->setMoviesByRoom($room);
        }
    
        $data['rooms'] = $rooms;
        $data['shows'] = $this->showRepository->getAll();
        $data['movies'] = $this->movieRepository->getAll();
    
        return $data;
    }
    public function one(int $id){
        $room = parent ::one($id);
        $this->setShowsByRoom($room);
        $this->setMoviesByRoom($room);
        return $room;
    }


}