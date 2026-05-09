<?php

// BASE URL

function base_url($path = '') {

    if(defined('BASE_URL')) {
        return BASE_URL . ltrim($path, '/');
    }

    // https:// or http://

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' )|| $_SERVER['SERVER_PORT'] == 443 ? "https://" : 'http://';

    // example : google.com

    $host = $_SERVER['HTTP_HOST'];

    // /blogs

    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

    return $protocol . $host . $base . '/' . ltrim($path, '/');

}

// file system restore

function base_path($path = '') {
    return realpath(__DIR__ . '/../' . ltrim($path, '/'));
}


// return view system

function views_path($path = '') {
    return base_path('app/views/' . ltrim($path, '/'));
}

function render($view, $data = [], $layout = 'layout') {

    extract($data);

    ob_start();

    require __DIR__ . '/views/' . $view . '.php';

    $content = ob_get_clean();

    require __DIR__ . "/views/" . $layout . ".php";

}