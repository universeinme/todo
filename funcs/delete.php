<?php
require $_SERVER['DOCUMENT_ROOT']."todo/funcs/koneksi.php";
function hapus($id_todo) {
  global $conn;

  mysqli_query($conn, "DELETE FROM tasks WHERE id = $id_todo");
  return mysqli_affected_rows($conn);
}