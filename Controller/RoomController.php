<?php

require_once 'Controller.php';
require_once '../Model/Repository/RoomRepository.php';

class RoomController extends Controller {

    public function __construct()
    {
        $roomRepository = new RoomRepository();
        parent::__construct($roomRepository);
    }
    
}