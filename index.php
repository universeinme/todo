<?php
require "funcs/koneksi.php";
require "funcs/registrasi.php";
require "funcs/login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "templates/head.php"; ?>
  <?php include "templates/js.php"; ?>
  <title>Slothtledos</title>
</head>
<body
  class="antialiased bg-gradient-to-r from-pink-300 via-sky-300 to-indigo-400 font-light text-gray-500" x-data="{isOpen: false}">
<?php include "templates/navbar.php" ?>
<main class="px-10 py-20">
  <!--Todo-->
  <div
    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
    <?php include "templates/todo.php"; ?>
    <?php include "templates/formDaftar.php"; ?>
    <?php include "templates/formLogin.php"; ?>
  </div>
</main>
</body>
</html>
