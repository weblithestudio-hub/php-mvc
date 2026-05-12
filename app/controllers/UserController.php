<?php

class UserController {

    public function login() {
        render('user/login');
    }

    public function register() {
        render('user/register');
    }

    public function registerUser() {
        
        var_dump($_POST);

    }
}