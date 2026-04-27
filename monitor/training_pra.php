<?php
include '../auth/auth_check.php';
require_once __DIR__ . '/../config/koneksi.php';

$id = intval($_GET['id']);
$data = mysqli_query($koneksi, "SELECT * FROM program WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pra Pelaksanaan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/monitor_tahun.css">

    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<div class="app">

<?php include __DIR__ . '/../layout/sidebar.php'; ?>


<!-- MAIN -->
<main class="main">

<!-- HEADER -->
<div class="top-header">
    <input type="text" class="search" placeholder="Search...">

    <div class="header-icons">
        <i class="bi bi-bell"></i>
        <i class="bi bi-gear"></i>
        <span><?= $_SESSION['nama'] ?? 'Admin'; ?></span>
        <img src="https://i.pravatar.cc/40" class="avatar">
    </div>
</div>

<!-- TITLE -->
<div class="title">
    <small>TAHAP 1</small>
    <h2>Pra Pelaksanaan - <?= $d['nama_program'] ?></h2>
    <p>Pengelolaan awal sebelum pelatihan dimulai</p>
</div>

<!-- FORM -->
<div class="card" style="margin-top:20px;">
    <h5>Input Dokumen Pra Pelatihan</h5>

    <div style="display:flex; gap:10px; margin-top:10px;">
        <input type="text" class="form-control" placeholder="Nama Dokumen">
        
        <select class="form-control">
            <option>Belum Jalan</option>
            <option>Proses</option>
            <option>Selesai</option>
        </select>

        <button class="btn-add">Tambah</button>
    </div>
</div>

<!-- LIST -->
<div class="card" style="margin-top:20px;">
    <h5>Daftar Dokumen</h5>

    <table class="table mt-3">
        <tr>
            <th>Nama</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <tr>
            <td>Surat Izin</td>
            <td><span class="badge bg-danger">Belum Jalan</span></td>
            <td>
                <button class="btn btn-sm btn-light">Lihat</button>
                <button class="btn btn-sm btn-primary">Upload</button>
            </td>
        </tr>

        <tr>
            <td>Rencana Kegiatan</td>
            <td><span class="badge bg-warning">Proses</span></td>
            <td>
                <button class="btn btn-sm btn-light">Lihat</button>
                <button class="btn btn-sm btn-primary">Upload</button>
            </td>
        </tr>

    </table>
</div>

<!-- PROGRESS -->
<div class="card" style="margin-top:20px;">
    <h5>Progress Pra Pelaksanaan</h5>

    <div class="progress" style="margin-top:10px;">
        <div style="width:100%"></div>
    </div>

    <small>100% Complete</small>
</div>

</main>
</div>

</body>
</html>