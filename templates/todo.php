<!-- product card -->
<?php

/*session_start();*/
// set variabel id
$id = $_SESSION['username'];

// narik data
$query = "SELECT tasks.id, users.username, tasks.judul, tasks.deskripsi, tasks.tgl_tempo, tasks.status FROM users INNER JOIN tasks ON users.id=tasks.user_id WHERE users.username='$id'";

$tampilNarik = mysqli_query($conn, $query);
?>

<!--// narik baris berikutnya ditampilin as array yg seasosiasi-->
<?php
if (mysqli_num_rows($tampilNarik) > 0) {

  while ($data = mysqli_fetch_assoc($tampilNarik)) {
    $judul = $data['judul'];
    $deskripsi = $data['deskripsi'];
    $tempo = $data['tgl_tempo'];
    ?>
    <div
      class="flex flex-col bg-white drop-shadow hover:drop-shadow-lg  rounded-md break-words">
      <div class="border-gray-300 border-b-2 border-solid flex flex-col relative m-1 px-2">
        <h2 class="font-semibold">
          <?php echo "$judul"; ?>
        </h2>
      </div>
      <div
        class="border-gray-100 border-b-2 border-solid flex flex-col relative px-2 m-1 inline-block align-middle">
                <span class="relative">
                    <?php echo "$deskripsi"; ?>
                </span>
      </div>
      <div class="px-2 m-1">
            <span class="relative">
                Tempo: <?php echo "$tempo"; ?>
            </span>
      </div>
      <div class="px-2 m-1">
        <button class="group relative w-16 overflow-hidden rounded-lg bg-white shadow">
          <div
            class="absolute inset-0 w-3 bg-sky-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
          <span class="relative text-black group-hover:text-white">
                Edit
            </span>
        </button>
        <button class="group relative w-16 overflow-hidden rounded-lg bg-white shadow float-right">
          <div
            class="absolute inset-0 w-3 bg-red-300 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
          <span class="relative text-black group-hover:text-white">Delete</span>
        </button>
      </div>
    </div>
  <?php }
} else {
  echo "<span>Daftar dulu</span>";
} ?>