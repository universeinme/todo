<?php

$server = "localhost";
$user = "root";
$pass = "root";
$database = "todo_app";
global $conn;
$conn = mysqli_connect($server, $user, $pass, $database);

// checking
if(!$conn){
    die("Error: Connection Error." . mysqli_connect_error());
}
