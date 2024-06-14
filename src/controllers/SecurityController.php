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

        if (!password_verify($password, $user->getPassword())) {

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


        //EMPTY
        if( empty($login) || empty($email) || empty($password) || empty($confirmPassword)){
            return $this->render('signUp', ['messages' => ['All fields must be filled!']]);
        }
        
        //IF REAL EMAIL
        $regex = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}$/';

        if(!preg_match($regex, $email)){
            return $this->render('signUp', ['messages' => ['Not a real email!']]);
        }

        //LOGIN
        $regex = '/^[A-Za-z]{4,10}$/';
        if(!preg_match($regex, $login)){
            return $this->render('signUp', ['messages' => ['Login must be 4-10 characters, only letters!']]);
        }

        //PASSWORD
        $regex = '/^(?=.*\d)[A-Za-z\d]{6,}$/';
        if(!preg_match($regex, $password)){
            return $this->render('signUp', ['messages' => ['Password has to be min. 6 characters including 1 number!']]);
        }

        //SAME PASSWORDS
        if ($password !== $confirmPassword) {
            return $this->render('signUp', ['messages' => ['Passwords do not match!']]);
        }

        $userRepository = new UserRepository();
        $existingUser = $userRepository->getUser($login);

        if($existingUser) {
            return $this->render('signUp', ['messages' => ['Somebody has that name!']]);
        }
        

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User(0, $login, $email, $hashedPassword, 0, '', 0, 0, 0, 0);
        $userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You have been successfully registered!']]);
    }

    public function options() {

        session_start();
        if (!isset($_SESSION['user'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

        return $this->render('options');

    }

    public function changePassword() {

        session_start();
        if (!isset($_SESSION['user'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }

        if (!$this->isPost()) {
            return $this->render('options');
        }

        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];


        //SAME PASSWORD
        if ($newPassword !== $confirmPassword) {
            return $this->render('options', ['messages' => ['Passwords do not match']]);
        }

        //PASSWORD REQ
        $regex = '/^(?=.*\d)[A-Za-z\d]{6,}$/';
        if(!preg_match($regex, $newPassword)){
            return $this->render('options', ['messages' => ['Password has to be min. 6 characters including 1 number!']]);
        }

        $userRepository = new UserRepository();
        $userRepository->updatePassword($_SESSION['user']->getUserId(), $newPassword);

        return $this->render('options', ['messages' => ['Password changed successfully']]);

    }

    public function logout() {

        session_start();
        session_unset();
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
    
}