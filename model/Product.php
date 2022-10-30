<?php

require_once "Connect.php";

$connect = connect();

function store(
    $name,
    $email,
    $phone,
    $description,
    $price,
    $image,
    $created_at
)
{
    global $connect;

    $folder        = 'images/';
    $fileExtension = explode('.', $image['name'])[1];
    $fileName      = uniqid() . time() . '.' . $fileExtension;
    $pathFile      = $folder . $fileName;

    move_uploaded_file($image['tmp_name'], $pathFile);

    $sql = "INSERT INTO products (name, email, phone, description, price, image, created_at)
            VALUES ('$name', '$email', '$phone', '$description', '$price', '$fileName', '$created_at')";

    mysqli_query($connect, $sql);

    mysqli_close($connect);
}

function detail($id)
{
    global $connect;

    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);

    return $each;
}

function update(
    $id,
    $name,
    $email,
    $phone,
    $description,
    $newImage,
    $manufacturingDate,
    $expiryDate
)
{
    global $connect;

    if ($newImage['size'] > 0) {
        $folder        = 'images/';
        $fileExtension = explode('.', $newImage['name'])[1];
        $fileName      = uniqid() . time() . '.' . $fileExtension;
        $pathFile      = $folder . $fileName;

        move_uploaded_file($newImage['tmp_name'], $pathFile);
    } else {
        $fileName = $_POST['old_image'];
    }

    $sql = "UPDATE products
    SET
    name = '$name',
    email = '$email',
    phone = '$phone',
    description = '$description',
    image = '$fileName',
    manufacturing_date = '$manufacturingDate',
    expiry_date = '$expiryDate'
    WHERE
    id = $id";

    mysqli_query($connect, $sql);
}

function delete($id)
{
    global $connect;

    $sql = "DELETE FROM products WHERE id = $id";
    $result = mysqli_query($connect, $sql);

    return $result;
}