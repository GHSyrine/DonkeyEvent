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
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = $this->userRepository->getUserByEmail($email);
                if ($user) {
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['user'] = $user;
                        header("Location:../Template/home.php");
                        exit;
                    } else {
                        $_SESSION['error'] = "Le mot de passe saisi est incorrect";
                    }
                } else {
                    $_SESSION['error'] = "L'email saisi est incorrect";
                }
            } else {
                $_SESSION['error'] = "Veuillez saisir l'email et le mot de passe";
            }
        }
        header("Location: /Template/user.html.php");
       
    }

    public function logout()
    {
        session_destroy();
        header("Location: /Template/cinema/all");
        exit();
    }
}