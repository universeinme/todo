<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', 'root', 'todo_app');

// Get the task ID from the query string
$id = $_GET['id'];

// Query the database for the task with the given ID
$result = mysqli_query($conn, "SELECT * FROM tasks WHERE id = $id");

// Convert the task data to JSON and output it
echo json_encode(mysqli_fetch_assoc($result));