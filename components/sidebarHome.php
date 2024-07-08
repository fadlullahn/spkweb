<?php
$sql = "SELECT idjudul, judul FROM artikel";
$result = $conn->query($sql);

$artikel = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $artikel[] = $row;
    }
}
?>

<div>
    <h2 class="font-bold text-lg">Kumpulan Sistem Penunjang Keputusan</h2>
    <ul class="list-disc list-inside pl-8">
        <?php
        foreach ($artikel as $artikel) {
            echo '<li><a href="artikel.php?' . $artikel['idjudul'] . '" class="text-blue-500 hover:underline">' . $artikel['judul'] . '</a></li>';
        }
        ?>
    </ul>
</div>