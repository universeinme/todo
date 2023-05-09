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
    <div
        x-data="isDialogOpen()"
        @toggle-modal.window="modal = !modal"
    >
      <!-- overlay -->
      <form
          action="" method="post" id="daftar"
          class="z-10 overflow-y-auto top-0 w-full left-0"
          x-show="isOpen()"
          :class="{ 'user-history-modal': isOpen() }"
      >
        <!-- dialog -->
        <div
            class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-show="isOpen()"
        >
          <div class="fixed inset-0 transition-opacity">
            <div class="mt-14 absolute inset-0 bg-gray-900 opacity-50"/>
          </div>
          <span class="sm:inline-block sm:align-middle sm:h-screen" @click.away="close">&#8203;</span>
          <!--Modal Inner-->
          <div
              class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
              role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

              <!--Title / Close-->
              <h4 class="mr-3 text-black max-w-none text-semibold mb-2 pb-2 border-b-2">
                                    <span class="font-semibold">
                                        Daftar
                                    </span>
                <button type="button" class="z-50 cursor-pointer float-right"
                        @click="close"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                       fill="none"
                       stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                  </svg>
                </button>
              </h4>
              <label for="username">Username</label>
              <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="username" name="username"
                     required/>

              <label for="email">Email</label>
              <input type="email" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="email" name="email"
                     required/>

              <label for="password">Password</label>
              <input type="password" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="password"
                     name="password" required/>
            </div>

            <div class="bg-gray-200 px-4 py-3 text-right">
              <button type="button"
                      class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
              ><i class="fas fa-times"></i>
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
        </div><!-- /dialog -->
      </form><!-- /overlay -->
    </div>


    <div
        x-data="reassignDialog()"
        @toggle-reassign-modal.window="reassignmodal = !reassignmodal"
    >
      <!-- overlay -->
      <form
          class="z-10 overflow-y-auto top-0 w-full left-0"
          id="login" action="" method="post"
          style="background-color: rgba(0, 0, 0, 0.75);display:none"
          x-show="isOpenReassign()"
          :class="{ 'reassign-history-modal': isOpenReassign() }"
      >
        <!-- dialog -->
        <div
            class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-show="isOpenReassign()"
        >
          <div class="fixed inset-0 transition-opacity">
            <div class="mt-14 absolute inset-0 bg-gray-900 opacity-50"/>
          </div>
          <span class="sm:inline-block sm:align-middle sm:h-screen" @click.away="closeReassign">&#8203;</span>

          <!--Modal Inner-->
          <div
              class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
              role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

              <!--Title / Close-->
              <h4 class="mr-3 text-black max-w-none text-semibold mb-2 pb-2 border-b-2">
                                    <span class="font-semibold">
                                        Daftar
                                    </span>
                <button type="button" class="z-50 cursor-pointer float-right"
                        @click="close"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                       fill="none"
                       stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                  </svg>
                </button>
              </h4>
              <label for="email">Email</label>
              <input type="email" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="email" name="email" value="" required/>
              <label for="password">Password</label>
              <input type="password" class="w-full bg-gray-100 p-2 mt-2 mb-3" id="password" name="password" value=""
                     required/>
            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
              <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                      @click="close"
              ><i class="fas fa-times"></i>
                Cancel
              </button>
              <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"
                      name="login" id="login">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login
              </button>
            </div>
          </div><!-- /dialog -->
      </form><!-- /overlay -->
    </div>
</main>
</body>
</html>
