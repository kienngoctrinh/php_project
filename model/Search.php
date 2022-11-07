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
$sql        = "SELECT * FROM products WHERE name LIKE '%$search%' or code = '$search'
               ORDER BY id DESC LIMIT $limit OFFSET $skip";
$result     = mysqli_query($connect, $sql);

echo "
      <table border='1' width='100%'>
      <thead style='background-color: #b4a1a1'>
          <tr>
              <th>ID</th>
              <th>Code</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Description</th>
              <th>Price (VND)</th>
              <th>Image</th>
              <th>Created At</th>
              <th>Updated At</th>
          </tr>
          </thead>";
if (mysqli_num_rows($result) > 0) {
    foreach ($result as $each) {
        echo "
          <tbody>
          <tr>
              <td>$each[id]</td>
              <td>$each[code]</td>
              <td>
                  <a href='/detail/$each[id]'>
                  $each[name]
                  </a>
              </td>
              <td>$each[email]</td>
              <td style='text-align: right'>$each[phone]</td>
              <td style='width: 500px'>
              <span class='text'>
                  $each[description]
              </span>
              </td>
              <td style='text-align: right'>" . number_format($each['price']) . "</td>
              <td style='text-align: center'>
                  <img src='images/$each[image]' style='width: 150px; height: 150px; object-fit: contain;'>
              </td>
              <td style='text-align: center'>$each[created_at]</td>
              <td style='text-align: center'>$each[updated_at]</td>
          </tr>
          </tbody>
          ";
    }
} else {
    echo "
          <tbody>
              <tr>
                  <td colspan='10'><h1 style='text-align: center'>NOT FOUND DATA</h1></td>
              </tr>
          </tbody>
          ";
}

echo "</table>";

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

echo '<script>
        document.getElementById("form-search").addEventListener("submit", function (e) {
            e.preventDefault();
            let search = document.getElementById("input-search").value;
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                    pagination();
                }
            }
            xhr.open("GET", "model/Search.php?search=" + search, true);
            xhr.send();
        });
        pagination();
        function pagination() {
            document.querySelectorAll(".pagination a").forEach(function (item) {
                item.addEventListener("click", function (e) {
                    e.preventDefault();
                    let page = this.getAttribute("href");
                    let xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("content").innerHTML = this.responseText;
                            pagination();
                        }
                    }
                    xhr.open("GET", "model/Search.php" + page, true);
                    xhr.send();
                })
            })
        }
</script>';
