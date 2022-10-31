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

$limit      = 1;
$pageNumber = ceil($allProduct / $limit);
$skip       = $limit * ($page - 1);
$sql        = "SELECT * FROM products WHERE name LIKE '%$search%'
           LIMIT $limit OFFSET $skip";
$result     = mysqli_query($connect, $sql);

echo "
      <table border='1' width='100%'>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Description</th>
              <th>Price (VND)</th>
              <th>Image</th>
              <th>Created At</th>
              <th>Updated At</th>
          </tr>";
while ($each = mysqli_fetch_array($result)) {
    echo "
          <tr>
              <td>
                  <a style='color: black; text-decoration: none' href='?action=detail&id=$each[id]'>
                  $each[id]
                  </a>
              </td>
              <td>
                  <a style='color: black; text-decoration: none' href='?action=detail&id=$each[id]'>
                  $each[name]
                  </a>
              </td>
              <td>$each[email]</td>
              <td style='text-align: right'>$each[phone]</td>
              <td>" . substr($each['description'], 0, 50) . "</td>
              <td style='text-align: right'>$each[price]</td>
              <td>
                  <img src='images/$each[image]' height='100px'>
              </td>
              <td style='text-align: center'>$each[created_at]</td>
              <td style='text-align: center'>$each[updated_at]</td>
          </tr>
    </table>";
}

echo "<div class='pagination'>";
if ($page > 1) {
    echo "<a href='?page=1&search=$search'>First</a>";
    echo "<a href='?page=" . ($page - 1) . "&search=$search'>Previous</a>";
}
for ($i = 1; $i <= $pageNumber; $i++) {
    if ($i == $page) {
        echo "<a class='active' href='?page=$i&search=$search'>$i</a>";
    } else {
        echo "<a href='?page=$i&search=$search'>$i</a>";
    }
}
if ($page < $pageNumber) {
    echo "<a href='?page=" . ($page + 1) . "&search=$search'>Next</a>";
    echo "<a href='?page=$pageNumber&search=$search'>Last</a>";
}
echo "</div>";
