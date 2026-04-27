<?php
require_once __DIR__ . '/../../config/koneksi.php';

if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $tahun = intval($_POST['tahun']);

    mysqli_query($koneksi, "UPDATE tahun SET tahun='$tahun' WHERE id='$id'");
}

header("Location: ../tahun.php");