<?php
require "koneksi.php";
error_reporting(0);
session_start();

global $conn;
$id = $_GET['id'];
$pilihKolom = "SELECT * from todo_app.users where  id = '$id'";
$hasilKolom = mysqli_query($conn, $pilihKolom);

if (mysqli_num_rows($hasilKolom)) {
  $dataUser = mysqli_fetch_array($hasilKolom);
  $id_user = $dataUser['id'];

  if (isset($_POST['tambah']) && $_POST['tambah']) {

    $judul = $_POST['inputJudul'];
    $deskripsi = $_POST['inputDeskripsi'];
    $tempo = $_POST['inputTempo'];

    $tambahTodo = "insert into tasks (id, judul, deskripsi, tgl_tempo, status) values ($id_user, '$judul', '$deskripsi', '$tempo', 0)";

    $berhasilTambah = mysqli_query($conn, $tambahTodo);
    if ($berhasilTambah) {
      echo "<script>alert('Todo telah ditambahkan')</script>";
    } else {
      echo "error" . mysqli_error($conn);
      die;
    }
  }
}
?>
<div class="flex flex-col justify-end items-end fixed select-none sticky">
  <div class="absolute flex items-center justify-center align-middle top-8">
    <button onclick="toggleCreate()"
            class="drop-shadow-md bg-white h-10 w-20 rounded-full align-middle font-semibold">
      Create
    </button>
  </div>
</div>