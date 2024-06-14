<?php

require_once __DIR__.'/../repository/UserRepository.php';
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {

    public function index() {

        session_start();
        
        if (isset($_SESSION['user'])) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/mainMenu");
            exit();

        }

        $this -> render('login');
    }

    public function login() {

        session_start();

        $userRepository = new UserRepository();

        if (isset($_SESSION['user'])) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/mainMenu");
            exit();

        }

        if(!$this->isPost()) {

            return $this->render('login');

        }
  


        $login = $_POST["login"];
        $password = $_POST["password"];
        $user = $userRepository->getUser($login);

        if(!$user) {
            return $this->render('login', ['messages' => ['No such user']]);
        }

        if ($user->getLogin() !== $login) {

            return $this->render('login', ['messages' => ['No such login']]);

        }

        if ($user->getPassword() !== $password) {

            return $this->render('login', ['messages' => ['Wrong password']]);
            
        }

        
        $_SESSION['user'] = $user;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/mainMenu");
    }

    public function signUp() {

        session_start();

        if (isset($_SESSION['user'])) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/mainMenu");
            exit();

        }

        if(!$this->isPost()) {
            return $this->render('signUp');
        }

        $login = $_POST["login"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        if ($password !== $confirmPassword) {
            return $this->render('signUp', ['messages' => ['Passwords do not match!']]);
        }

        $userRepository = new UserRepository();
        $existingUser = $userRepository->getUser($login);

        if($existingUser) {
            return $this->render('signUp', ['messages' => ['Somebody has that name!']]);
        }
        

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User(null, $login, $email, $hashedPassword, null, null, null, null, null, null);
        $userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You have been successfully registered!']]);
    }

    public function logout() {

        session_start();
        session_unset();
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
    
}