<style>
    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
</style>
<h1>Product</h1>
<a href="?action=create">
    <button>Create</button>
</a>
<div style="text-align: center">
    <form id="form-search">
        Search:
        <input type="search" name="search" id="input-search">
    </form>
</div>
<div id="content">
    <?php require "model/Search.php" ?>
</div>

<script>
    document.getElementById('form-search').addEventListener('submit', function (e) {
        e.preventDefault();
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('content').innerHTML = this.responseText;
            }
        }
        xhr.open('GET', 'model/Search.php?search=' + document.getElementById('input-search').value, true);
        xhr.send();
    });

    document.querySelectorAll('.pagination a').forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('content').innerHTML = this.responseText;
                }
            }
            xhr.open('GET', 'model/Search.php' + this.getAttribute('href'), true);
            xhr.send();
        })
    });
</script>
