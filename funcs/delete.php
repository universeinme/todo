<?php
require "koneksi.php";
$id = $_POST['id'];

$q = "DELETE FROM tasks WHERE id = '$id'";
$res = mysqli_query($conn, $q);
if ($res) {
    echo "<script>alert('Berhasil dihapus!')</script>";
    header("location:../welcome.php");
} else {
  echo "<script>alert('Gagal Menghapus')</script>";
}
