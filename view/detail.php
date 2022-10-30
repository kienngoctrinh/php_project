<h1>Detail Product: <?php echo $each['name'] ?></h1>
<a href="index.php">Back</a>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Information</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th colspan="2">Action</th>
    </tr>
    <tr>
        <td><?php echo $each['id'] ?></td>
        <td>
            Name:
            <?php echo $each['name'] ?>
            <br>
            Email:
            <?php echo $each['email'] ?>
            <br>
            Phone:
            <?php echo $each['phone'] ?>
            <br>
        </td>
        <td><?php echo $each['description'] ?></td>
        <td><?php echo number_format($each['price']) ?> VND</td>
        <td>
            <img height="100px" src="images/<?php echo $each['image'] ?>">
        </td>
        <td>
            <a href="?action=edit&id=<?php echo $each['id'] ?>">
                <button>Edit</button>
            </a>
        </td>
        <td>
            <a href="?action=delete&id=<?php echo $each['id'] ?>">
                <button>Delete</button>
            </a>
        </td>
    </tr>
</table>