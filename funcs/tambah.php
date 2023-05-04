<?php
require "koneksi.php";
error_reporting(0);
session_start();

if (isset($_POST['tambah'])) {
    $judul = $_POST['inputJudul'];
    $deskripsi = $_POST['inputDeskripsi'];
    $tempo = $_POST['inputTempo'];

    $query = "insert into tasks (id, judul, deskripsi, tgl_tempo, status) values (NULL, '$judul', '$deskripsi', '$tempo', 0)";

    mysqli_query($conn, $query);
    echo "<script>alert('Todo telah ditambahkan')</script>";
}