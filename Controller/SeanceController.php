<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/SeanceRepository.php';

class SeanceController extends Controller
{

    protected SeanceRepository $seanceRepository;

    public function __construct()
    {
        $seanceRepository = new SeanceRepository();
        parent::__construct($seanceRepository);
        $this->seanceRepository = $seanceRepository;
    }

    private function setRoomsAndSeatsBySeance($seance)
    {
        $infos = $this->seanceRepository->getRoomAndSeatBySeanceId($seance->getId());
        $seance->setRoom($infos[0]);
        $seance->setSeats($infos[1]);
        return $seance;
    }

    private function setMovieBySeance($seance)
    {
        $movie = $this->seanceRepository->getMovieBySeanceId($seance->getId());
        $seance->setMovies($movie);
        return $seance;
    }

    public function all()
    {
        $seances = parent::all();
        foreach ($seances as $seance) {
            $this->setRoomsAndSeatsBySeance($seance);
        }
        return $seances;
    }

    public function one(int $id)
    {
        $seance = parent::one($id);
        $this->setRoomsAndSeatsBySeance($seance);
        return $seance;
    }

    public function reserve(int $id){
        $seance = parent::one($id);
        $this->setRoomsAndSeatsBySeance($seance);
        $this->setMovieBySeance($seance);
        foreach($_POST as $key => $value){
            if($value == "on"){
                $seats[] = $key;
            }
        }
        $seance->setSeats($seats);
        return $seance;
    }
}
