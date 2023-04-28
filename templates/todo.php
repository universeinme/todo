<!-- product card -->
<?php

// narik data
$limitData = "SELECT * FROM tasks ORDER BY tgl_tempo DESC limit 10";
$query = mysqli_query($conn, $limitData);

// narik baris berikutnya ditampilin as array yg seasosiasi
while ($data = mysqli_fetch_assoc($query)) {
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
<?php } ?>
