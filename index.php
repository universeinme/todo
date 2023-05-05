<?php
require "funcs/koneksi.php";
require "funcs/registrasi.php";
require "funcs/login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "templates/head.php"; ?>
</head>

<body
    class="antialiased bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400 font-light text-gray-500">

<?php include "templates/navbar.php" ?>

<main class="px-10 py-20">

    <!--Todo-->
    <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
        <?php include "templates/todo.php"; ?>
    </div>
</main>

<!--form daftar-->
<form action="" method="post" id="daftar" class="z-10 overflow-y-auto top-0 w-full left-0 hidden">
    <div
        class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75"/>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">
                    &#8203;
                </span>
        <div
            class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <label for="username">Username</label>
                <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3"
                       id="username" name="username" required/>

                <label for="email">Email</label>
                <input type="email" class="w-full bg-gray-100 p-2 mt-2 mb-3"
                       id="email" name="email" required/>

                <label for="password">Password</label>
                <input type="password" class="w-full bg-gray-100 p-2 mt-2 mb-3"
                       id="password" name="password" required/>
            </div>

            <div class="bg-gray-200 px-4 py-3 text-right">
                <button type="button"
                        class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                        onclick="toggleDaftar()"><i class="fas fa-times"></i>
                    Cancel
                </button>

                <button type="submit" name="daftar"
                        class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"
                        value="Registrasi">
                    <i class="fa-solid fa-user-plus"></i>
                    Daftar
                </button>
            </div>
        </div>
    </div>
    </div>
</form>

<!-- Login form -->
<form class="z-10 overflow-y-auto top-0 w-full left-0 hidden" id="login" action="" method="post">
    <div
        class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75"/>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">
                &#8203;
            </span>
        <div
            class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                <!-- label id -->
                <label for="email">Email</label>
                <input type="email" class="w-full bg-gray-100 p-2 mt-2 mb-3"
                       id="email" name="email" value="" required/>

                <!-- label pwd -->
                <label for="password">Password</label>
                <input type="password" class="w-full bg-gray-100 p-2 mt-2 mb-3"
                       id="password" name="password" value="" required/>
            </div>

            <div class="bg-gray-200 px-4 py-3 text-right">

                <button type="button"
                        class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                        onclick="toggleLogin()"><i class="fas fa-times"></i>
                    Cancel
                </button>

                <button type="submit"
                        class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"
                        name="login" id="login">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login
                </button>
            </div>
        </div>
    </div>
    </div>
</form>

<!--form create-->
<form class="z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal" action="" method="post">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75"/>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">
            &#8203;
        </span>
        <div
            class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                <!--judul-->
                <label for="inputJudul">Judul</label>
                <textarea rows="1"
                          class="w-full bg-gray-100 p-2 mt-2 mb-3 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          id="inputJudul" name="inputJudul" placeholder="Judul"></textarea>

                <!--deskripsi-->
                <label for="inputDeskripsi">Deskripsi</label>
                <textarea rows="2"
                          class="block w-full bg-gray-100 p-2 mt-2 mb-3 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          id="inputDeskripsi" name="inputDeskripsi" placeholder="Deskripsi"></textarea>

                <!--Tanggal Tempo-->
                <label for="inputTanggal">Tempo: </label>
                <input type="date" id="inputTanggal" name="inputTempo" placeholder="Tanggal Tempo">
            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
                <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                        onclick="toggleCreate()">
                    <i class="fas fa-times"></i>
                    Cancel
                </button>
                <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2" name="tambah" value="tambah">
                    <i class="fa-solid fa-plus"></i>
                    Create
                </button>
            </div>
        </div>
    </div>
</form>

</body>

</html>
