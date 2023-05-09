<?php
function edit($data) {
    global $conn;

    $username = $_SESSION['username'];

    // ambil semua data
    $id = $data["id"];
    $user_id = htmlspecialchars($data["user_id"]);
    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $tgl_tempo = htmlspecialchars($data["tgl_tempo"]);
    $status = $data["status"];

    $query = "UPDATE tasks SET judul = '$judul', deskripsi = '$deskripsi', tgl_tempo = '$tgl_tempo', status = $status WHERE id = $id and user_id = $user_id ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}