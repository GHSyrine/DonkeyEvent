<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/RoomRepository.php';

class RoomController extends Controller {

    protected RoomRepository $roomRepository;

    public function __construct()
    {
        $roomRepository = new RoomRepository();
        parent::__construct($roomRepository);
        $this->roomRepository = $roomRepository;
    }
    
}