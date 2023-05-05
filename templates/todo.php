<!-- product card -->
<?php

/*session_start();*/
// set variabel id
$id = $_SESSION['username'];

// narik data
$query = "SELECT tasks.id, users.username, tasks.judul, tasks.deskripsi, tasks.tgl_tempo, tasks.status FROM users INNER JOIN tasks ON users.id=tasks.id WHERE users.username='$id'";
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
    <a href="#"
       class="flex flex-col bg-white drop-shadow hover:drop-shadow-lg hover:opacity-70 rounded-md break-words">
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
    </a>
<?php }
} else {
    echo "<span>Daftar dulu</span>";
} ?>