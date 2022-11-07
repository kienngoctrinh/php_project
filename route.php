<?php

$controller = '';
$action = $_GET['action'] ?? '';

$url = $_SERVER['REQUEST_URI'];
$params = array_filter(explode('/', $url), 'strlen');
$action = $params[2] ?? '';
$id = $params[3] ?? '';

switch ($controller) {
    case '':
        require 'controller/ProductController.php';
        break;
    default:
        // echo 'Loi route';
        require "404.php";
        break;
}