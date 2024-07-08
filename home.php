<?php
$sql = "SELECT idjudul, judul, deskripsi, subdeskripsi FROM artikel";
$result = $conn->query($sql);

$artikel = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $artikel[] = $row;
    }
}
?>
<?php foreach ($artikel as $item) : ?>
    <div class="my-4">
        <div class="font-bold text-teal-900 mb-2">
            <a href="artikel.php?<?php echo urlencode($item['idjudul']); ?>" class=""><?php echo $item['judul']; ?></a>
        </div>
        <div class="text-gray-700 mb-2">
            <?php echo $item['deskripsi']; ?>
        </div>
        <div class="text-gray-700 mb-1">
            <?php echo $item['subdeskripsi']; ?>
        </div>
        <div class="bg-green-400 w-fit rounded-lg">
            <a href="artikel.php?<?php echo urlencode($item['idjudul']); ?>" class="p-1">Baca</a>
        </div>
        <br>
        <hr>
    </div>
<?php endforeach; ?>