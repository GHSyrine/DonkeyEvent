<?php
require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/UserRepository.php';

Class UserController extends Controller{

    protected UserRepository $userRepository;

    public function __construct()
    {
        $userRepository = new UserRepository();
        parent::__construct($userRepository);
        $this->userRepository = $userRepository;
    }
}