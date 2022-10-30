<!--<h1>Product</h1>-->
<!--<a href="?action=create">-->
<!--    <button>Create</button>-->
<!--</a>-->
<!--<table border="1" width="100%">-->
<!--    <tr>-->
<!--        <th>ID</th>-->
<!--        <th>Name</th>-->
<!--        <th>Email</th>-->
<!--        <th>Phone</th>-->
<!--        <th>Description</th>-->
<!--        <th>Price</th>-->
<!--        <th>Image</th>-->
<!--        <th>Created At</th>-->
<!--        <th>Updated At</th>-->
<!--    </tr>-->
<!--    --><?php //foreach ($result as $each) { ?>
<!--        <tr>-->
<!--            <td>-->
<!--                <a style="color: black; text-decoration: none" href="?action=detail&id=--><?php //echo $each['id'] ?><!--">-->
<!--                --><?php //echo $each['id'] ?>
<!--                </a>-->
<!--            </td>-->
<!--            <td>-->
<!--                <a style="color: black; text-decoration: none" href="?action=detail&id=--><?php //echo $each['id'] ?><!--">-->
<!--                --><?php //echo $each['name'] ?>
<!--                </a>-->
<!--            </td>-->
<!--            <td>--><?php //echo $each['email'] ?><!--</td>-->
<!--            <td>--><?php //echo $each['phone'] ?><!--</td>-->
<!--            <td>--><?php //echo $each['description'] ?><!--</td>-->
<!--            <td>--><?php //echo number_format($each['price']) ?><!-- VND</td>-->
<!--            <td>-->
<!--                <img src="images/--><?php //echo $each['image'] ?><!--" height="100px">-->
<!--            </td>-->
<!--            <td>--><?php //echo $each['created_at'] ?><!--</td>-->
<!--            <td>--><?php //echo $each['updated_at'] ?><!--</td>-->
<!--        </tr>-->
<!--    --><?php //} ?>
<!--</table>-->
<table id="table-data"></table>
<script>
    let data = JSON.parse('<?php echo json_encode($each) ?>');
    console.log(data);
</script>
