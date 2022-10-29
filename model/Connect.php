<?php

function connect()
{
    $connect = mysqli_connect("localhost", "root", "", "php_project");
    mysqli_set_charset($connect, "utf8");

    return $connect;
}