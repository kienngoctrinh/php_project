<?php

require_once "Connect.php";

$connect = connect();

$page = $_GET['page'] ?? 1;

$search = $_GET['search'] ?? '';

$sql        = "SELECT COUNT(*) FROM products
        WHERE name LIKE '%$search%'";
$result     = mysqli_query($connect, $sql);
$each       = mysqli_fetch_array($result);
$allProduct = $each['COUNT(*)'];

$limit      = 2;
$pageNumber = ceil($allProduct / $limit);
$skip       = $limit * ($page - 1);
$sql        = "SELECT * FROM products WHERE name LIKE '%$search%'
           LIMIT $limit OFFSET $skip";
$result     = mysqli_query($connect, $sql);

echo "<table border='1'>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
        </tr>";

if (isset($search)) {
    while ($each = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>{$each['id']}</td>
            <td>{$each['name']}</td>
            <td><img src='images/{$each['image']}' width='100px' height='100px'></td>
        </tr>";
    }
}

