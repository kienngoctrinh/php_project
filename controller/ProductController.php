<?php

switch ($action) {
    case '':
        require 'view/index.php';
        break;
    case 'create':
        require "model/Product.php";
        $each = detail($id);
        require 'view/create.php';
        break;
    case 'store':
        $code        = $_POST['code'];
        $name        = $_POST['name'];
        $email       = $_POST['email'];
        $phone       = $_POST['phone'];
        $description = $_POST['description'] ?? '';
        $price       = $_POST['price'];
        $image       = $_FILES['image'];
        $createdAt   = date('Y-m-d H:i:s');
        $updatedAt   = date('Y-m-d H:i:s');

        require "model/Product.php";
        store($code, $name, $email, $phone, $description, $price, $image, $createdAt, $updatedAt);
        header('location: index.php');
        break;
    case 'detail':
        require "model/Product.php";
        $each = detail($id);
        require 'view/detail.php';
        break;
    case 'update':
        $id          = $_POST['id'];
        $name        = $_POST['name'];
        $email       = $_POST['email'];
        $phone       = $_POST['phone'];
        $description = $_POST['description'] ?? '';
        $price       = $_POST['price'];
        $newImage    = $_FILES['image'];
        $updatedAt   = date('Y-m-d H:i:s');

        require "model/Product.php";
        update($id, $name, $email, $phone, $description, $price, $newImage, $updatedAt);
        header('location: index.php?action=detail&id=' . $id);
        break;
    case 'delete':
        require "model/Product.php";
        delete($id);
        header('location: index.php');
        break;
    default:
        // echo 'Loi controller';
        require "404.php";
        break;
}