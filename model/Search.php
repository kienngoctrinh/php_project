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

<<<<<<< HEAD
if (isset($search)) {
    echo "
    <table border='1' width='100%' id='table-index'>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Description</th>
        <th>Image</th>
        <th>Manufacturing Date</th>
        <th>Expiry Date</th>
        <th>Action</th>
    </tr>
    </thead>";
    echo "<tbody>";
    while ($each = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
            <td>$each[id]</td>
            <td>$each[name]</td>
            <td>$each[email]</td>
            <td>$each[phone]</td>
            <td>$each[description]</td>
            <td><img src='images/$each[image]' height='100px'></td>
            <td>$each[manufacturing_date]</td>
            <td>$each[expiry_date]</td>
            <td>
                <a href='?action=detail&id=$each[id]'>Detail</a>
            </td>
          </tr>";
    }
    echo "</tbody>";

    echo "</table>";
}
=======
// if (isset($_GET['search'])) {
//     while ($each = mysqli_fetch_array($result)) {
//         echo "<tr>
//             <td>{$each['id']}</td>
//             <td>
//                 Name: {$each['name']}
//                 <br>
//                 Email: {$each['email']}
//                 <br>
//                 Phone: {$each['phone']}
//                 <br>
//             </td>
//             <td>{$each['description']}</td>
//             <td>
//                 <img height='100px' src='images/{$each['image']}'>
//             </td>
//             <td>
//                 Manufacturing Date: {$each['manufacturing_date']}
//                 <br>
//                 Expiry Date: {$each['expiry_date']}
//             </td>
//             <td>
//                 <a href='?action=detail&id={$each['id']}'>
//                     Detail
//                 </a>
//             </td>
//             <td>
//                 <a href='?action=delete&id={$each['id']}'>
//                     Delete
//                 </a>
//             </td>
//         </tr>";
//     }
// }
>>>>>>> 55824a4a7809cc4c3fd38e3792791201f274490b
