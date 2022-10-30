<?php

switch ($action) {
    case '':
        require "model/Search.php";
        require 'view/index.php';
        break;
    case 'create':
        require 'view/create.php';
        break;
    case 'store':
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $description = $_POST['description'] ?? null;
        $price = $_POST['price'];
        $image = $_FILES['image'];
        $created_at = date('Y-m-d H:i:s');

        require "model/Product.php";
        store($name, $email, $phone, $description, $price, $image, $created_at);
        header('location: index.php');
        break;
    case 'detail':
        require "model/Product.php";
        $id = $_GET['id'];
        $each = detail($id);
        require 'view/detail.php';
        break;
    case 'edit':
        require "model/Product.php";
        $id = $_GET['id'];
        $each = detail($id);
        require 'view/edit.php';
        break;
    case 'update':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $description = $_POST['description'];
        $newImage = $_FILES['new_image'];
        $manufacturingDate = $_POST['manufacturing_date'];
        $expiryDate = $_POST['expiry_date'];

        require "model/Product.php";
        update($id, $name, $email, $phone, $description, $newImage, $manufacturingDate, $expiryDate);
        header('location: index.php?action=detail&id=' . $id);
        break;
    case 'delete':
        $id = $_GET['id'];
        require "model/Product.php";
        delete($id);
        header('location: index.php');
        break;
    default:
        echo 'Loi controller';
        break;
}