<?php

class UserController {

    public function login() {
        render('user/login');
    }

    public function register() {
        render('user/register');
    }

}