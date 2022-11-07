<?php

require_once "Connect.php";

$connect = connect();

function store(
    $code,
    $name,
    $email,
    $phone,
    $description,
    $price,
    $image,
    $createdAt,
    $updatedAt
) {
    global $connect;

    $name        = htmlspecialchars($name);
    $email       = htmlspecialchars($email);
    $phone       = htmlspecialchars($phone);
    $description = htmlspecialchars($description);
    $price       = htmlspecialchars($price);

    $code = strtoupper($code);

    if (strlen($name) > 100 || strlen($email) > 100 || strlen($phone) > 15 || !is_numeric($phone) || !is_numeric($price)) {
        return false;
    }

    $folder        = 'images/';
    $fileExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $fileName      = uniqid() . time() . '.' . $fileExtension;
    $pathFile      = $folder . $fileName;

    if (empty($fileExtension)) {
        $fileName = 'default.png';
    }

    if ($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg' || empty($fileExtension)) {
        move_uploaded_file($image['tmp_name'], $pathFile);

        $sql = "INSERT INTO products (code, name, email, phone, description, price, image, created_at, updated_at)
            VALUES ('$code', '$name', '$email', '$phone', '$description', '$price', '$fileName', '$createdAt', '$updatedAt')";

        mysqli_query($connect, $sql);

        mysqli_close($connect);
    }
}

function detail($id)
{
    global $connect;

    $sql    = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each   = mysqli_fetch_array($result);

    mysqli_close($connect);

    return $each;
}

function update(
    $id,
    $name,
    $email,
    $phone,
    $description,
    $price,
    $newImage,
    $updatedAt
) {
    global $connect;

    $name        = htmlspecialchars($name);
    $email       = htmlspecialchars($email);
    $phone       = htmlspecialchars($phone);
    $description = htmlspecialchars($description);
    $price       = htmlspecialchars($price);

    if (strlen($name) > 100 || strlen($email) > 100 || strlen($phone) > 15 || !is_numeric($phone) || !is_numeric($price)) {
        return false;
    }

    if ($newImage['size'] > 0) {
        $folder        = 'images/';
        $fileExtension = explode('.', $newImage['name'])[1];
        $fileName      = uniqid() . time() . '.' . $fileExtension;
        $pathFile      = $folder . $fileName;

        if ($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg') {
            move_uploaded_file($newImage['tmp_name'], $pathFile);

            $sql = "UPDATE products
                    SET
                    name = '$name',
                    email = '$email',
                    phone = '$phone',
                    description = '$description',
                    image = '$fileName',
                    price = '$price',
                    updated_at = '$updatedAt'
                    WHERE
                    id = $id";

            mysqli_query($connect, $sql);
        }
    } else {
        $fileName = $_POST['old_image'];

        $sql = "UPDATE products
                SET
                name = '$name',
                email = '$email',
                phone = '$phone',
                description = '$description',
                image = '$fileName',
                price = '$price',
                updated_at = '$updatedAt'
                WHERE
                id = $id";

        mysqli_query($connect, $sql);
    }

    mysqli_close($connect);
}

function delete($id)
{
    global $connect;

    $sql = "DELETE FROM products WHERE id = $id";

    mysqli_query($connect, $sql);

    mysqli_close($connect);
}