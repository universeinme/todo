<?php

?>
<!-- Logo Container -->
<div class="flex items-center">
    <a class="cursor-pointer">
        <h3 class="text-2xl font-medium font-semibold">
            Slothtledos
        </h3>
    </a>
</div>

<!-- Icon Menu Section -->
<div class="flex items-center space-x-5">
    <!-- Register -->
    <a class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300">
        <span>
            <?php echo "<h3>Welcome, <strong>" . $_SESSION['username'] ."!". "</strong></h3>"; ?>
        </span>
    </a>

    <!-- Login -->
    <a class="flex text-gray-600 hover:text-blue-500 cursor-pointer transition-colors duration-300" href="./funcs/logout.php">
        <i class="fa-solid fa-arrow-right-from-bracket"> Logout</i>
    </a>
</div>
