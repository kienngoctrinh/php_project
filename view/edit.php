<style>
    li {
        color: red;
    }
</style>
<a href="?action=detail&id=<?php echo $each['id'] ?>">Back</a>
<div id="alert-error"></div>
<form action="?action=update" method="post" enctype="multipart/form-data" id="form-submit">
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
    Price
    <input type="text" name="price" value="<?php echo $each['price'] ?>">
    <br>
    Old Image
    <img height="100px" src="images/<?php echo $each['image'] ?>">
    <input type="hidden" name="old_image" value="<?php echo $each['image'] ?>">
    <br>
    New Image
    <input type="file" name="new_image">
    <br>
    <button>Update</button>
</form>
<script>
    const form = document.getElementById('form-submit');
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const name = document.querySelector('input[name="name"]');
        const email = document.querySelector('input[name="email"]');
        const phone = document.querySelector('input[name="phone"]');
        const price = document.querySelector('input[name="price"]');
        const image = document.querySelector('input[name="new_image"]');
        const alertError = document.getElementById('alert-error');
        const regexName = /^[a-zA-Z ]+$/;
        const regexEmail = /^([a-z0-9_\.-]+\@[\da-z\.-]+\.[a-z\.]{2,6})$/;
        const regexPhone = /^(0[3|5|7|8|9])+([0-9]{8})\b$/;
        const regexPrice = /^[1-9]+[0-9]{2,}$/;
        const regexImage = /(\.jpg|\.jpeg|\.png)$/i;
        let error = '';
        if (!regexName.test(name.value)) {
            error += '<li>Name is invalid</li>';
        }
        if (!regexEmail.test(email.value)) {
            error += '<li>Email is invalid</li>';
        }
        if (!regexPhone.test(phone.value)) {
            error += '<li>Phone is invalid</li>';
        }
        if (!regexPrice.test(price.value)) {
            error += '<li>Price is invalid</li>';
        }
        if (image.value === '' || regexImage.test(image.value)) {
            if (error === '') {
                form.submit();
            } else {
                alertError.innerHTML = error;
            }
        } else {
            error += '<li>Image is invalid</li>';
            alertError.innerHTML = error;
        }
        if (error !== '') {
            alertError.innerHTML = error;
        } else {
            form.submit();
        }
    });
</script>