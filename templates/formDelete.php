<?php
require $_SERVER['DOCUMENT_ROOT']."todo/funcs/delete.php";
if(isset($_POST['hapus'])) {
  if(hapus($_POST) > 0) {
    echo "<script>alert('Berhasil dihapus!')</script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>
<div
  x-data="hapusDialog()"
  @toggle-hapus-modal.window="hapusModal = !hapusModal"
>
  <!-- overlay -->
  <form
    class="z-10 overflow-y-auto top-0 w-full left-0"
    id="create" action="" method="post"
    x-show="isOpenHapusModal()"
    :class="{ 'hapus-history-modal': isOpenHapusModal() }"
  >
    <!-- dialog -->
    <div
      class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0"
      x-transition:enter="motion-safe:ease-out duration-300"
      x-transition:enter-start="opacity-0 scale-90"
      x-transition:enter-end="opacity-100 scale-100"
      x-show="isOpenHapusModal()"
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
                                        Hapus
                                    </span>
            <button type="button" class="z-50 cursor-pointer float-right" @click="closeHapusModal"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                   fill="none"
                   stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </h4>
          <p>
            <span>Hapus todo ini?</span>
          </p>
          <div class="px-4 py-3 text-right">
            <button type="button" class="py-2 px-4 bg-gray-300 text-white rounded hover:bg-gray-500 mr-2"
                    @click="closeHapusModal"
            ><i class="fas fa-times"></i>
              Cancel
            </button>
            <button type="submit" class="py-2 px-4 bg-red-300 text-white rounded hover:bg-red-500 mr-2" name="hapus"
                    value="hapus">
              <i class="fa-solid fa-trash-can"></i>
              Hapus
            </button>
          </div>
        </div><!-- /dialog -->
  </form><!-- /overlay -->
</div>
