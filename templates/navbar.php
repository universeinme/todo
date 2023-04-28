<?php
?>
<!-- nav bar -->
<nav class="flex justify-around py-4 bg-white/80
             backdrop-blur-md shadow-md w-full
             fixed top-0 left-0 right-0 z-10">

    <!-- Logo Container -->
    <div class="flex items-center">
        <a class="cursor-pointer">
            <h3 class="text-2xl font-medium font-semibold">
                Slothtledos
            </h3>
        </a>
    </div>
    <div class="flex items-center space-x-5">
        <!-- Register -->
        <a class="flex text-gray-600 hover:text-blue-500
                   cursor-pointer transition-colors duration-300"
           onclick="toggleDaftar()">
            <i class="fa-solid fa-user-plus"> Daftar</i>
        </a>
        <a class="flex text-gray-600 hover:text-blue-500
                   cursor-pointer transition-colors duration-300"
           onclick="toggleLogin()">
            <i class="fa-solid fa-user-astronaut"> Masuk</i>
        </a>
    </div>
</nav>



