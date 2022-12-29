<?php

$controller = '';
$action = $_GET['action'] ?? '';

$url = $_SERVER['REQUEST_URI'];
$params = explode('/', $url);
$action = $params[1] ?? '';
$id = $params[2] ?? '';

switch ($controller) {
    case '':
        require 'controller/ProductController.php';
        break;
    default:
        require "404.php";
        break;
}