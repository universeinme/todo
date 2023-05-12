<!-- product card -->
<?php
require "funcs/koneksi.php";
// set variabel id
$id = $_SESSION['username'];

// narik data
$query = "SELECT tasks.id, users.username, tasks.user_id, tasks.judul, tasks.deskripsi, tasks.tgl_tempo, tasks.status FROM users INNER JOIN tasks ON users.id=tasks.user_id WHERE users.username='$id'";

$tampilNarik = mysqli_query($conn, $query);
?>

<!--// narik baris berikutnya ditampilin as array yg seasosiasi-->
<?php
foreach($tampilNarik as $task) { ?>
  <div id="task-<?php echo $task['id']; ?>" class="task-card flex flex-col bg-white drop-shadow hover:drop-shadow-lg  rounded-md break-words">
    <div class="border-gray-300 border-b-2 border-solid flex flex-col relative m-1 px-2">
      <h2 class="font-semibold">
        <?php echo $task['judul']; ?>
      </h2>
    </div>
    <div class="border-gray-100 border-b-2 border-solid flex flex-col relative px-2 m-1 inline-block align-middle">
      <span class="relative">
        <?php echo $task['deskripsi']; ?>
      </span>
    </div>
    <div class="px-2 m-1">
      <span class="relative">
        Tempo: <?php echo $task['tgl_tempo']; ?>
      </span>
    </div>
    <div class="px-2 m-1 mb-2">
      <button class="edit-btn group relative w-16 overflow-hidden rounded-lg bg-white shadow" x-data @click="$dispatch('toggle-edit-modal')">
        <div class="absolute inset-0 w-3 bg-sky-300 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
        <span class="relative text-black group-hover:text-white">Edit</span>
      </button>
      <button class="delete-btn group relative w-16 overflow-hidden rounded-lg bg-white shadow float-right" onclick="hapusTask(<?php echo $task['id']; ?>)">
        <div class="absolute inset-0 w-3 bg-red-300 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
        <span class="relative text-black group-hover:text-white" >Delete</span>
      </button>
    </div>
  </div>
<?php } ?>
