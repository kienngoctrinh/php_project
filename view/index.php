<style>
    .text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .pagination {
        text-align: right;
        margin-top: 20px;
    }

    .pagination a {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
        pointer-events: none;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
</style>
<h1>Product</h1>
<a href="/create">
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
