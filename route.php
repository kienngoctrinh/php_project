<?php

$controller = $_GET['controller'] ?? '';
$action = $_GET['action'] ?? '';

switch ($controller) {
    case '':
        require 'controller/ProductController.php';
        break;
    default:
        echo 'Loi route';
        break;
}