<?php

require_once __DIR__ . '/../app/init.php';

$routes = [
    '' => 'HomeController@index',
    'testing' => 'HomeController@index@testing',
];

if(array_key_exists('testing', $routes)) {
    echo "Letezik";
} else {
    echo "Nem letezik";
}