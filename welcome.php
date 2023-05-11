<?php

?>
<!doctype html>
<html lang="en">
<head>
    <?php include "templates/head.php"; ?>
    <title>Slothtledos</title>
</head>
<body class="antialiased bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400 font-light text-gray-500" x-data="{ 'showModal': false }">
<nav class="flex justify-around py-4 bg-white/80 backdrop-blur-md shadow-md w-full fixed top-0 left-0 right-0 z-10">
    <?php include "templates/navbarlogged.php"; ?>
</nav>
<main class="px-10 py-20">
    <!--Todo-->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
        <?php include "templates/todo.php"; ?>
    </div>
    <div class="flex flex-col justify-end items-end fixed select-none sticky">
        <div class="absolute flex items-center justify-center align-middle top-8">
            <button class="drop-shadow-md bg-white h-10 w-20 rounded-full align-middle font-semibold"
                    x-data @click="$dispatch('toggle-create-modal')"
            >
                Create
            </button>
        </div>
        <?php include "templates/formBuat.php"; ?>
    </div>
    <?php include "templates/formDelete.php"; ?>
</main>
<?php include "templates/formEdit.php"; ?>
<?php include "templates/js.php"; ?>
</body>
</html>