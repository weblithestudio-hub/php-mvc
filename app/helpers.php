<?php

// BASE URL

function base_url($path = '') {

    if (defined('BASE_URL')) {
        return BASE_URL . ltrim($path, '/');
    }

    $protocol = (
        !empty($_SERVER['HTTPS']) &&
        $_SERVER['HTTPS'] !== 'off'
    ) ? 'https://' : 'http://';

    $host = $_SERVER['HTTP_HOST'];

    return $protocol . $host . '/' . ltrim($path, '/');
}

// file system restore

function base_path($path = '') {
    return realpath(__DIR__ . '/../') . ($path ? '/' . ltrim($path, '/') : '');
}


// return view system

function views_path($path = '') {
    return base_path() . '/app/views/' . ltrim($path, '/');
}

// Redirects the user to a specified URL with optional query parameters.

function redirect($path = '', $queryParams = []){
    $url = base_url($path);

    if(!empty($queryParams)) {
        $url .= "?" . http_build_query($queryParams);
    }

    header("Location: " . $url);
    exit();
}

// Renders a view file with optional data and layout support.

function render($view, $data = [], $layout = 'layout') {

    extract($data);

    ob_start();

    $viewFile = views_path($view . '.php');

    if (!file_exists($viewFile)) {
        die("View file not found: " . $viewFile);
    }

    require $viewFile;

    $content = ob_get_clean();

    $layoutFile = views_path($layout . '.php');

    if (!file_exists($layoutFile)) {
        die("Layout file not found: " . $layoutFile);
    }

    require $layoutFile;
}

function config($key) {

    $config = require base_path('config/config.php');

    $keys = explode('.', $key);
    $value = $config;

    foreach($keys as $k) {
        if(!isset($value[$k])){
            throw new Exception(message: "Config key '{$k}' not found");
        }
        $value = $value[$k];
    }
    return $value;
}