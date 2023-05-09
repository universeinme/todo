<?php ?>
<div
  x-data="editDialog()"
  @toggle-edit-modal.window="editModal = !editModal"
>
  <!-- overlay -->
  <form
    class="z-10 overflow-y-auto top-0 w-full left-0"
    id="create" action="" method="post"
    x-show="isOpenEditModal()"
    :class="{ 'edit-history-modal': isOpenEditModal() }"
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
            <button type="button" class="z-50 cursor-pointer float-right" @click="closeEditModal"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                   fill="none"
                   stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </h4>
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
                  @click="closeEditModal"
          ><i class="fas fa-times"></i>
            Cancel
          </button>
          <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2" name="update"
                  value="update">
            <i class="fa-solid fa-pen-to-square"></i>
            Update
          </button>
        </div>
      </div><!-- /dialog -->
  </form><!-- /overlay -->
</div>
