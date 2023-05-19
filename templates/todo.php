<?php
require "funcs/koneksi.php";
// set variabel id
$id = $_SESSION['username'];

// narik data
$query = "SELECT tasks.id, users.username, tasks.user_id, tasks.judul, tasks.deskripsi, tasks.tgl_tempo, tasks.completed FROM users INNER JOIN tasks ON users.id=tasks.user_id WHERE users.username='$id'";

$tampilNarik = mysqli_query($conn, $query);
?>

<!--// narik baris berikutnya ditampilin as array yg seasosiasi-->
<?php
if (mysqli_num_rows($tampilNarik) >0 ) {
  foreach ($tampilNarik as $task) { ?>
    <?php $id = $task['id']; ?>
    <div
         class="task-card flex flex-col bg-white drop-shadow hover:drop-shadow-lg  rounded-md break-words">
      <div class="border-gray-300 border-b-2 border-solid flex flex-col relative m-1 px-2">
        <h2 class="task-title font-semibold">
          <?php echo $task['judul']; ?>
        </h2>
      </div>
      <div class="border-gray-100 border-b-2 border-solid flex flex-col relative px-2 m-1 inline-block align-middle">
        <p class="task-description relative">
          <?php echo $task['deskripsi']; ?>
        </p>
      </div>
      <div class="grid grid-cols-4 px-2 m-1">
        <p class="col-span-2 task-date">
          Tempo: <?php echo $task['tgl_tempo']; ?>
        </p>
        <div class="col-span-2 place-self-end float-right">
          <input id="status" class="task-completed peer/draft" type="checkbox" name="status" <?php if ($task['completed'] == '1') {
            echo 'checked';
          } else {
            echo 'unchecked';
          }?>>
          <label for="status draft" class="px-1 peer-checked:underline peer-checked:underline-offset-2 peer-checked/draft:font-semibold peer-checked/draft:transition-colors duration-300 peer-checked/draft:ease-in-out peer-checked/draft:bg-sky-300">
            <span>Done</span>
          </label>
        </div>
      </div>
      <div class="px-2 m-1 mb-2">
        <button id="open-modal" type="button" class="group relative w-16 overflow-hidden rounded-lg bg-white shadow" onclick="editTask(<?php echo $id; ?>)" data-task-id="<?php echo $id; ?>">
          <div class="absolute inset-0 w-3 bg-sky-300 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
          <span class="relative text-black group-hover:text-white">Edit</span>
        </button>
        <button class="delete-btn group relative w-16 overflow-hidden rounded-lg bg-white shadow float-right" x-data @click="hapusTask(<?php echo $task['id']; ?>)">
          <div class="absolute inset-0 w-3 bg-red-300 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
          <span class="relative text-black group-hover:text-white">Delete</span>
        </button>
      </div>
    </div>
  <?php }
} else {
  echo "<span>Daftar Dulu</span>"; ?>
<?php } ?>


