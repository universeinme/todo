<?php
//memulai session
session_start();
// kalau user udah login redirect ke welcome page
if (!isset($_SESSION['username'])) {
    header("Location: ./welcome.php");
    exit;
}
