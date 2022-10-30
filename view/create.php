<style>
    li {
        color: red;
    }
</style>
<div id="alert-error"></div>
<form action="?action=store" method="post" enctype="multipart/form-data" id="form-submit">
    Name
    <input type="text" name="name">
    <br>
    Email
    <input type="email" name="email">
    <br>
    Phone
    <input type="text" name="phone">
    <br>
    Description
    <textarea name="description"></textarea>
    <br>
    Price
    <input type="text" name="price">
    <br>
    Image
    <input type="file" name="image" value="images/default.jpg">
    <br>
    <button>Create</button>
</form>
<script>
    document.getElementById('form-submit').addEventListener('submit', function (e) {
        e.preventDefault();
        let name = document.querySelector('input[name="name"]').value;
        let email = document.querySelector('input[name="email"]').value;
        let phone = document.querySelector('input[name="phone"]').value;
        let image = document.querySelector('input[name="image"]').value;
        let regexName = /^[a-zA-Z ]+$/;
        let regexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        let regexPhone = /^(03|05|07|08|09)+([0-9]{8})\b$/;
        // let regexImage = /(\.jpg|\.jpeg|\.png)$/i;
        if (!regexName.test(name)) {
            document.getElementById('alert-error').innerHTML = '<li>Name is not valid</li>';
        }
        if (!regexEmail.test(email)) {
            document.getElementById('alert-error').innerHTML += '<li>Email is not valid</li>';
        }
        if (!regexPhone.test(phone)) {
            document.getElementById('alert-error').innerHTML += '<li>Phone is not valid</li>';
        }
        // if (!regexImage.test(image) || image === '') {
        //     document.getElementById('alert-error').innerHTML += '<li>Image is not valid</li>';
        // }
        if (regexName.test(name) && regexEmail.test(email) && regexPhone.test(phone)) {
            this.submit();
        }
    });
</script>