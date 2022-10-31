<style>
    li {
        color: red;
    }
    .required {
        color: red;
    }
</style>
<a href="index.php">Back</a>
<div id="alert-error"></div>
<form action="?action=store" method="post" enctype="multipart/form-data" id="form-submit">
    Name
    <span class="required">(*)</span>
    <input type="text" name="name">
    <br>
    Email
    <span class="required">(*)</span>
    <input type="email" name="email">
    <br>
    Phone
    <span class="required">(*)</span>
    <input type="text" name="phone">
    <br>
    Description
    <textarea name="description"></textarea>
    <br>
    Price
    <span class="required">(*)</span>
    <input type="text" name="price">
    <br>
    Image
    <input type="file" name="image">
    <br>
    <button>Create</button>
</form>
<script>
    const form = document.getElementById('form-submit');
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const name = document.querySelector('input[name="name"]');
        const email = document.querySelector('input[name="email"]');
        const phone = document.querySelector('input[name="phone"]');
        const price = document.querySelector('input[name="price"]');
        const image = document.querySelector('input[name="image"]');
        const alertError = document.getElementById('alert-error');
        const regexName = /^[a-zA-Z ]{2,100}$/;
        const regexEmail = /^([a-zA-Z0-9_\.-]{4,80}\@[\da-z\-]+\.[a-z\.]{2,6})$/;
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
        if (regexImage.test(image.value) || image.value === '') {
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