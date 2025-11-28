<?php

$server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "news_website";

$conn = mysqli_connect($server, $db_username, $db_password, $db_name);
if (!$conn) {
    die("Database not connected successfully: " . mysqli_connect_error());
}
