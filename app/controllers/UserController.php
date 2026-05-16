<?php

class UserController {

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function loginForm() {
        render('user/login');
    }

    public function showRegisterForm() {
        render('user/register');
    }

    public function register() {

        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $passwordConfirmation = $_POST['password_confirmation'] ?? '';

        if(empty($username) || empty($email) || empty($password)){

            $_SESSION['error'] = 'Minden mező kötelező';

            redirect('/user/register');
        }

        if($password !== $passwordConfirmation){

            $_SESSION['error'] = 'A jelszavak nem egyeznek';

            redirect('/user/register');
        }

        $user = new User();

        $user->username = $username;
        $user->email = $email;
        $user->password = $password;

        if($user->store()){

            $_SESSION['success'] = 'Sikeres regisztráció';

            redirect('/');
        }

        $_SESSION['error'] = 'Hiba történt';

        redirect('/user/register');
    }

    public function login(){

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if(empty($email) || empty($password)){
            $_SESSION['error'] = 'Minden mező kötelező';
            redirect('/user/login');
        }

        $this->userModel->email = $email;
        $this->userModel->password = $password;

        if($this->userModel->login()){
            $_SESSION['username'] = $this->userModel->username;
            $_SESSION['id'] = $this->userModel->id;
            redirect('/');
        }

        $_SESSION['error'] = 'Hibás belépési adatok';
        redirect('/user/login');
    }
}