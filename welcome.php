<?php

require "funcs/session.php";
?>
<!doctype html>
<html lang="en">
<head>
    <?php include "templates/head.php"; ?>
</head>
<body>
<?php echo "<h1>Selamat Datang, " . $_SESSION['username'] ."!". "</h1>"; ?>
<button class="rounded-full bg-blue-500 px-5 py-3 mb-3
font-semibold text-white transition duration-200 hover:bg-blue-600
active:bg-blue-700">
    <a href="funcs/logout.php">Logout</a>
</button>
</body>
</html>
