<?php

//Creating the database connection
$serverName = "localhost";
$userName = "root";
$pwd = "";
$dbName = "login_db";

$conn = mysqli_connect($serverName, $userName, $pwd, $dbName);
 if (!$conn) {
    die("Connection failed!" . mysqli_connection_error());
 } else {
    echo "Connection successful";
 }