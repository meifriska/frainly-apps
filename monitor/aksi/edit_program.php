<?php
require_once __DIR__ . '/../../config/koneksi.php';

$id = intval($_POST['id']);
$id_tahun = intval($_POST['id_tahun']);
$nama = $_POST['nama_program'];
$status = $_POST['status'];
$progress = intval($_POST['progress']);

mysqli_query($koneksi, "
    UPDATE program 
    SET nama_program='$nama', status='$status', progress='$progress'
    WHERE id='$id'
");

// balik ke halaman semula
header("Location: ../program.php?id_tahun=$id_tahun");
exit;