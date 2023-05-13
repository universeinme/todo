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
    <div id="task-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
        <?php include "templates/todo.php"; ?>
    </div>
    <div class="flex flex-col justify-end items-end fixed select-none sticky">
        <div class="absolute flex items-center justify-center align-middle top-8">
            <button class="drop-shadow-md bg-white h-10 w-20 rounded-full align-middle font-semibold" x-data
                    @click="$dispatch('toggle-create-modal')"
            >
                Create
            </button>
        </div>
        <?php include "templates/formBuat.php"; ?>
    </div>
    <?php /*include "templates/formDelete.php"; */ ?>
</main>
<?php /*include "templates/formEdit.php";*/ ?>
<div
    x-data="editDialog(
    )"
    @toggle-edit-modal.window="editModal = !editModal"

>
    <!-- overlay -->
    <form
        class="z-10 overflow-y-auto top-0 w-full left-0"
        id="edit-form"
        x-show="isOpenEditModal()"
        :class="{ 'edit-history-modal': isOpenEditModal() }"
        x-on:edit-task.window="setData($event.detail)"
    >
        <!-- dialog -->
        <div
            class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-show="isOpenEditModal()"
        >
            <div class="fixed inset-0 transition-opacity">
                <div class="mt-14 absolute inset-0 bg-gray-900 opacity-50"/>
            </div>
            <span class="sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

            <!--Modal Inner-->
            <div
                class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <!--Title / Close-->
                    <h4 class="mr-3 text-black max-w-none text-semibold mb-2 pb-2 border-b-2">
            <span class="font-semibold">
              Edit
            </span>
                        <button type="button" class="z-50 cursor-pointer float-right" @click="closeEditModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </h4>
                    <!--judul-->
                    <label for="inputJudul">Judul</label>
                    <textarea rows="1" class="w-full bg-gray-100 p-2 mt-2 mb-3 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="inputJudul"><?php echo $task['judul']; ?></textarea>
                    <!--deskripsi-->
                    <label for="inputDeskripsi">Deskripsi</label>
                    <textarea rows="2" class="block w-full bg-gray-100 p-2 mt-2 mb-3 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="inputDeskripsi"><?php echo $task['deskripsi']; ?></textarea>
                    <!--Tanggal Tempo-->
                    <label for="inputTanggal">Tempo: </label>
                    <input type="date" id="inputTanggal" value="<?php echo $task['tgl_tempo']; ?>">
                </div>
                <div class="bg-gray-200 px-4 py-3 text-right">
                    <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" @click="closeEditModal">
                        <i class="fas fa-times"></i>
                        Cancel
                    </button>
                    <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2" @click.prevent="editTask(<?php echo $task['id']; ?>)">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Update
                    </button>
                </div>
            </div><!-- /dialog -->
    </form><!-- /overlay -->
</div>
<?php include "templates/js.php"; ?>
</body>
</html>
