<?php
require_once 'Controller.php';
require_once '../Model/Repository/UserRepository.php';

Class UserController extends Controller{
    public function __construct()
    {
        $userRepository = new UserRepository();
        parent::__construct($userRepository);
    }
}