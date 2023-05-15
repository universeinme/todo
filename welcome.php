<?php
?>
<!doctype html>
<html lang="en">
<head>
  <?php include "templates/head.php"; ?>
  <title>Slothtledos</title>
</head>
<body class="antialiased bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400 font-light text-gray-500"
      x-data="{ 'showModal': false }">
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
</main>

<!-- Modal popup -->
<div id="edit-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

    <!-- Overlay -->
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <!-- Modal content -->
    <div
      class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
      role="dialog" aria-modal="true" aria-labelledby="modal-headline">

      <!-- Modal header -->
      <div class="bg-gray-50 px-4 py-3 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
          Edit Task
        </h3>
        <button id="close-modal" class="text-gray-500 hover:text-gray-700 absolute top-0 right-0 mt-4 mr-4">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <form action="funcs/edit.php" method="POST">
        <!-- Modal body -->
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <input type="hidden" name="id" id="task-id">
          <label for="task-title">Judul</label>
          <input type="text" name="title" id="task-title"
                 class="w-full bg-gray-100 p-2 mt-2 mb-3 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 required>

          <label for="task-description">Description:</label>
          <textarea name="description" id="task-description"
                    class="block w-full bg-gray-100 p-2 mt-2 mb-3 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required></textarea>

          <label for="task-date">Date:</label>
          <input type="date" name="date" id="task-date"
                 class="block w-full bg-gray-100 p-2 mt-2 mb-3 text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                 required>
        </div>

        <!-- Modal footer -->
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2">
            <i class="fa-solid fa-pen-to-square"></i>
            Update
          </button>
          <button id="cancel-modal" type="button"
                  class="py-2 px-4 bg-gray-300 text-white rounded hover:bg-gray-500 mr-2">
            <i class="fas fa-times"></i>Cancel
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include "templates/js.php"; ?>
</body>
<script>

</script>
</html>
