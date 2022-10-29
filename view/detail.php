<h1>Detail: <?php echo $each['name'] ?></h1>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Information</th>
        <th>Description</th>
        <th>Image</th>
        <th>Expired</th>
        <th>Edit</th>
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
        <td>
            <img height="100px" src="images/<?php echo $each['image'] ?>">
        </td>
        <td>
            Manufacturing Date:
            <?php echo $each['manufacturing_date'] ?>
            <br>
            Expiry Date:
            <?php echo $each['expiry_date'] ?>
        </td>
        <td>
            <a href="?action=edit&id=<?php echo $each['id'] ?>">
                <button>Edit</button>
            </a>
        </td>
    </tr>
</table>