<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "complain";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Field to connect database" . mysqli_connect_error());
}