<?php

$id = $_GET['id'];

$sql = "DELETE FROM artikel WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo 'Hapus Data Berhasil';
}
$conn->close();
