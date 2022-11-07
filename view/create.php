<style>
    li {
        color: red;
    }

    .required {
        color: red;
    }

    .error {
        color: red;
    }
    input {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px;
        width: 20%;
    }
    textarea {
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 20%;
    }
</style>
<a href="/">Back</a>
<form action="<?php if (isset($_GET['id'])) {
    echo '?action=update&id=' . $_GET['id'];
} else {
    echo '?action=store';
}
?>" method="post" enctype="multipart/form-data" id="form-submit">
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?? '' ?>">
    Code
    <span class="required">(*)</span>
    <br>
    <input type="text" name="code" value="<?php echo $each['code'] ?? '' ?>">
    <span class="error"></span>
    <br>
    <br>
    Name
    <span class="required">(*)</span>
    <br>
    <input type="text" name="name" value="<?php echo $each['name'] ?? '' ?>">
    <span class="error"></span>
    <br>
    <br>
    Email
    <span class="required">(*)</span>
    <br>
    <input type="email" name="email" value="<?php echo $each['email'] ?? '' ?>">
    <span class="error"></span>
    <br>
    <br>
    Phone
    <span class="required">(*)</span>
    <br>
    <input type="text" name="phone" value="<?php echo $each['phone'] ?? '' ?>">
    <span class="error"></span>
    <br>
    <br>
    Description
    <br>
    <textarea rows="5" name="description"><?php echo $each['description'] ?? '' ?></textarea>
    <br>
    <br>
    Price
    <span class="required">(*)</span>
    <br>
    <input type="text" name="price" value="<?php echo $each['price'] ?? '' ?>">
    <span class="error"></span>
    <br>
    <br>
    <?php
    if (isset($each['image'])) {
        echo 'Old Image';
        echo '<img height="100px" src="images/' . $each['image'] . '">';
        echo '<input type="hidden" name="old_image" value="' . $each['image'] . '">';
        echo '<br>';
        echo '<br>';
    }
    ?>
    Image
    <br>
    <input type="file" name="image">
    <span class="error"></span>
    <br>
    <br>
    <?php if (isset($_GET['id'])) {
        echo '<button>Update</button>';
    } else {
        echo '<button>Create</button>';
    } ?>
</form>
<script>
    const form = document.getElementById('form-submit');
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const code = document.querySelector('input[name="code"]');
        const name = document.querySelector('input[name="name"]');
        const email = document.querySelector('input[name="email"]');
        const phone = document.querySelector('input[name="phone"]');
        const price = document.querySelector('input[name="price"]');
        const image = document.querySelector('input[name="image"]');
        const error = document.querySelectorAll('.error');
        const regexCode = /^[a-zA-Z0-9-_]+$/;
        const regexName = /^[a-zA-Z ]{2,100}$/;
        const regexEmail = /^([a-zA-Z0-9_\.-]{4,80}\@[\da-z\-]+\.[a-z\.]{2,6})$/;
        const regexPhone = /^(0[3|5|7|8|9])+([0-9]{8})\b$/;
        const regexPrice = /^[1-9]+[0-9]{2,}$/;
        const regexImage = /(\.jpg|\.jpeg|\.png)$/i;
        let check = true;
        if (!regexCode.test(code.value)) {
            error[0].innerHTML = 'Code in valid';
            check = false;
        } else {
            error[0].innerHTML = '';
        }
        if (!regexName.test(name.value)) {
            error[1].innerHTML = 'Name in valid';
            check = false;
        } else {
            error[1].innerHTML = '';
        }
        if (!regexEmail.test(email.value)) {
            error[2].innerHTML = 'Email in valid';
            check = false;
        } else {
            error[2].innerHTML = '';
        }
        if (!regexPhone.test(phone.value)) {
            error[3].innerHTML = 'Phone in valid';
            check = false;
        } else {
            error[3].innerHTML = '';
        }
        if (!regexPrice.test(price.value)) {
            error[4].innerHTML = 'Price in valid';
            check = false;
        } else {
            error[4].innerHTML = '';
        }
        if (image.value === '' || regexImage.test(image.value)) {
            error[5].innerHTML = '';
        } else {
            error[5].innerHTML = 'Image in valid';
            check = false;
        }
        if (check) {
            form.submit();
        }
    });
</script>