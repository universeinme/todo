<?php
require "koneksi.php";
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //get the task id and other form data
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $description = $_POST['deskripsi'];
    $tgl_tempo = $_POST['tgl_tempo'];
    $completed = $_POST['status'];

    // Prepare the SQL statement to update the task
    $stmt = $conn->prepare("UPDATE INTO tasks set judul=?, deskripsi=?, tgl_tempo=?, status=? WHERE id=?");

    // Bind the parameters and execute the statement
    $stmt->bind_param('sssii', $judul, $deskripsi, $tgl_tempo, $status, $id);
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $stmt->close();

    // Return a JSON response indicating a success
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
}*/
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$completed = isset($_POST['completed']) && $_POST['completed'] === 'completed' ? 1 : 0;

// Update the task in the database
mysqli_query($conn, "UPDATE tasks SET judul = '$title', deskripsi = '$description', tgl_tempo = '$date', completed = $completed WHERE id = $id");

header("location: ../welcome.php");
die();