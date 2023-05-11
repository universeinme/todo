<?php
require "session.php";
require "koneksi.php";

$username = $_SESSION['username'];
$query = "SELECT tasks.user_id, users.username, tasks.judul, tasks.deskripsi, tasks.tgl_tempo, tasks.status FROM users INNER JOIN tasks ON users.id=tasks.user_id WHERE users.username='$username'";

$rowId = mysqli_query($conn, $query)->fetch_assoc();
$id = $rowId["user_id"];
$judul = $_POST['inputJudul'];
$deskripsi = $_POST['inputDeskripsi'];
$tempo = $_POST['inputTempo'];
$status = 0;

$stmt = $conn->prepare("INSERT INTO tasks (user_id, judul, deskripsi, tgl_tempo, status) VALUES (?,?,?,?,?)");
$stmt->bind_param("isssi", $id, $judul, $deskripsi, $tempo, $status);

if ($stmt->execute()) {
  echo "<script>alert('Berhasil ditambahkan!')</script>";
  header("location:../welcome.php");
} else {
  echo mysqli_error($conn);
}

$stmt->close();
$conn->close();

/*$pilihUser =mysqli_real_escape_string($conn, $id);
$judul = mysqli_real_escape_string($conn, $data["inputJudul"]);
$deskripsi = mysqli_real_escape_string($conn, $data["inputDeskripsi"]);
$tempo = mysqli_real_escape_string($conn, $data["inputTempo"]);

mysqli_query($conn, "INSERT INTO tasks (user_id, judul, deskripsi, tgl_tempo, status) VALUES ('$pilihUser', '$judul', '$deskripsi', '$tempo', 0)");

return mysqli_affected_rows($conn);*/