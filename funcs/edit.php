<?php

function edit($data)
{
  global $conn;

  // narik data
  $queryNarik = "SELECT * from tasks WHERE id='".$_GET['id']."'";

  $update = "UPDATE INTO tasks SET user_id = '$pilihUser', judul = '$judul', deskripsi = '$deskripsi', tgl_tempo = '$tempo' WHERE id= '$id'";

  mysqli_query($conn, $update);

  return mysqli_affected_rows($conn);

}