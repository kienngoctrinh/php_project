<form action="?action=update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
    Name
    <input type="text" name="name" value="<?php echo $each['name'] ?>">
    <br>
    Email
    <input type="email" name="email" value="<?php echo $each['email'] ?>">
    <br>
    Phone
    <input type="text" name="phone" value="<?php echo $each['phone'] ?>">
    <br>
    Description
    <textarea name="description"><?php echo $each['description'] ?></textarea>
    <br>
    Old Image
    <img height="100px" src="images/<?php echo $each['image'] ?>">
    <input type="hidden" name="old_image" value="<?php echo $each['image'] ?>">
    <br>
    New Image
    <input type="file" name="new_image">
    <br>
    Manufacturing Date
    <input type="date" name="manufacturing_date" value="<?php echo $each['manufacturing_date'] ?>">
    <br>
    Expiry Date
    <input type="date" name="expiry_date" value="<?php echo $each['expiry_date'] ?>">
    <br>
    <button>Update</button>
</form>