<h1>Detail Product: <?php echo $each['name'] ?></h1>
<a href="index.php">Back</a>
<table border="1" width="100%">
    <thead style="background-color: #b4a1a1">
    <tr>
        <th>ID</th>
        <th>Information</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $each['id'] ?></td>
        <td>
            Code:
            <?php echo $each['code'] ?>
            <br>
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
        <td style='width: 700px'><?php echo $each['description'] ?></td>
        <td style="text-align: right"><?php echo number_format($each['price']) ?> VND</td>
        <td style="text-align: center">
            <img style='width: 150px; height: 150px; object-fit: contain;' src="images/<?php echo $each['image'] ?>">
        </td>
        <td>
            <a href="/create/<?php echo $each['id'] ?>">
                <button>Edit</button>
            </a>
        </td>
        <td>
            <a href="?action=delete&id=<?php echo $each['id'] ?>">
                <button id="btn-delete">Delete</button>
            </a>
        </td>
    </tr>
    </tbody>
</table>
<script>
    document.getElementById('btn-delete').onclick = function () {
        return confirm('Are you sủe?');
    }
</script>