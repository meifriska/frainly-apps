<?php
require_once __DIR__ . '/../../config/koneksi.php';

$id = intval($_GET['id']);
$id_tahun = intval($_GET['id_tahun']);

mysqli_query($koneksi, "DELETE FROM program WHERE id='$id'");

header("Location: ../program.php?id_tahun=$id_tahun");
exit;