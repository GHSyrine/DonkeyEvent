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
    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            var_dump($_POST);
            $user = $this->userRepository->getUserByEmail($email);
            var_dump($user);           
            if ($user) {
                
                if ($password == $user->getPassword()) {
                    $_SESSION['login'] = $email;
                    header("Location:../home");
                    var_dump($_SESSION);           

                    return;
                } 
                else 
                {

                    $_SESSION['errorPassword'] = "Le mot de passe saisi est incorrect";
                }
            } 
        }
    }

    public function logout()
    {
session_unset('login');
        header("Location: /");
        exit();
    }
}

?>
