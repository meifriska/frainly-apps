<?php
require_once __DIR__ . '/../../config/koneksi.php';

$id = intval($_GET['id']);

mysqli_query($koneksi, "DELETE FROM tahun WHERE id='$id'");

header("Location: ../tahun.php");