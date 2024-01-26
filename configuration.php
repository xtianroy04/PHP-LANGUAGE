<?php

// Configuration //
$servername = "localhost";
$username = "root";
$password = "";
$database = "php";

// Sa pag connect
$connect = new mysqli($servername, $username, $password, $database);
if (!$connect) {
die("Connection failed: " . mysqli_connect_error());
}

?>