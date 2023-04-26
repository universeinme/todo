<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "todo_app";

$conn = mysqli_connect($server, $user, $pass, $database);

// checking
if(!$conn){
    die("Error: Connection Error." . mysqli_connect_error());
}
