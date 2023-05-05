<?php

function tambah($data) {
    global $conn;

    $username = $_SESSION['username'];
    $query = "SELECT tasks.id, users.username, tasks.judul, tasks.deskripsi, tasks.tgl_tempo, tasks.status FROM users INNER JOIN tasks ON users.id=tasks.id WHERE users.username='$username'";

    $rowId = mysqli_query($conn, $query)->fetch_assoc();
    $id = $rowId["id"];

    $pilihUser =mysqli_real_escape_string($conn, $id);
    $judul = mysqli_real_escape_string($conn, $data["inputJudul"]);
    $deskripsi = mysqli_real_escape_string($conn, $data["inputDeskripsi"]);
    $tempo = mysqli_real_escape_string($conn, $data["inputTempo"]);

    mysqli_query($conn, "INSERT INTO tasks (id, judul, deskripsi, tgl_tempo, status) VALUES ('$pilihUser', '$judul', '$deskripsi', '$tempo', 0)");

    return mysqli_affected_rows($conn);
}
