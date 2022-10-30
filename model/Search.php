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

foreach ($result as $each) {
    return json_encode($each);
}

// echo "
// <div id='content'>
// <h1>Product</h1>
//             <a href='?action=create'>
//                 <button>Create</button>
//             </a>
//             <div style='text-align: center'>
//                 <form id='form-search'>
//                     <input type='text' name='search' placeholder='Search' id='input-search'>
//                 </form>
//             </div>
//             <div>
//                 <table border='1' width='100%' id='table-data'>
//                     <tr>
//                         <th>ID</th>
//                         <th>Name</th>
//                         <th>Email</th>
//                         <th>Phone</th>
//                         <th>Description</th>
//                         <th>Price (VND)</th>
//                         <th>Image</th>
//                         <th>Created At</th>
//                         <th>Updated At</th>
//                     </tr>";
// while ($each = mysqli_fetch_array($result)) {
//     echo "<tr>
//                             <td>
//                                 <a style='color: black; text-decoration: none' href='?action=detail&id=$each[id]'>
//                                 $each[id]
//                                 </a>
//                             </td>
//                             <td>
//                                 <a style='color: black; text-decoration: none' href='?action=detail&id=$each[id]'>
//                                 $each[name]
//                                 </a>
//                             </td>
//                             <td>$each[email]</td>
//                             <td style='text-align: right'>$each[phone]</td>
//                             <td>$each[description]</td>
//                             <td style='text-align: right'>$each[price]</td>
//                             <td>
//                                 <img src='images/$each[image]' height='100px'>
//                             </td>
//                             <td style='text-align: center'>$each[created_at]</td>
//                             <td style='text-align: center'>$each[updated_at]</td>
//                         </tr>";
// }
// echo "</table>
//             </div>";
