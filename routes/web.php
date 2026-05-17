<?php

$routes = [
    'GET' => [
        '/' => 'HomeController@index',
        '/about' => 'HomeController@about',
        '/user/login' => 'UserController@loginForm',
        '/user/register' => 'UserController@showRegisterForm',
        '/dashboard' => 'AdminController@dashboard',
    ],
    'POST' => [
        '/user/register' => 'UserController@register',
        '/user/login' => 'UserController@login',
    ]
];