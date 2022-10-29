<form id='form-search'>
    Search:
    <input type="search" name="search" id="input-search">
</form>
<div id="content">

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
        xhr.open('GET', '?search=' + document.getElementById('input-search').value);
        xhr.send();
    })
</script>