<?php

$routes = [
    'GET' => [
        '/' => 'HomeController@index',
        '/about' => 'HomeController@about',
        '/user/login' => 'UserController@login',
        '/user/register' => 'UserController@showRegisterForm',
    ],
    'POST' => [
        '/register' => 'UserController@register',
    ]
];