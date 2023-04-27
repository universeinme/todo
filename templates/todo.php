<?php
require_once "funcs/koneksi.php";

// narik data
$ambilData = mysqli_query($conn, "SELECT * FROM tasks ORDER BY tgl_tempo DESC");
?>
<!-- grid container -->
<?php
// narik baris berikutnya ditampilin as array yg seasosiasi
while ($data = mysqli_fetch_assoc($ambilData)) {
    $judul = $data['judul'];
    $deskripsi = $data['deskripsi'];
    $tempo = $data['tgl_tempo'];
}
?>
<div
    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
    <!-- product card -->
    <a href="#"
       class="flex flex-col bg-white drop-shadow hover:drop-shadow-lg hover:opacity-70 rounded-md break-words">
        <div class="border-gray-300 border-b-2 border-solid flex flex-col relative m-1 px-2">
            <h2 class="font-semibold">
                <?php echo "$judul"; ?>
            </h2>
        </div>
        <div class="border-gray-100 border-b-2 border-solid flex flex-col relative px-2 m-1 inline-block align-middle">
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
</div>