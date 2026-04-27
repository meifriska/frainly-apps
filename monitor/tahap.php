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
<title>Tahap Program</title>

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

        <!-- HEADER (COPY PERSIS) -->
        <div class="top-header">
            <input type="text" class="search" placeholder="Search program...">

            <div class="header-icons">
                <i class="bi bi-bell"></i>
                <i class="bi bi-gear"></i>

                <span><?= $_SESSION['nama'] ?? 'Super Admin'; ?></span>
                <img src="https://i.pravatar.cc/40" class="avatar">
            </div>
        </div>

        <!-- TITLE -->
        <div class="title">
            <small>ADMINISTRATIVE PORTAL</small>
            <h2><?= $d['nama_program'] ?></h2>
            <p>
                Monitoring tahapan pelatihan dari awal hingga akhir untuk memastikan
                setiap proses berjalan dengan optimal.
            </p>
        </div>

        <!-- GRID (PAKAI STYLE YANG SUDAH ADA) -->
        <div class="grid" style="margin-top:25px;">

            <!-- PRA -->
            <div class="card" style="cursor:pointer"
                onclick="window.location='training_pra.php?id=<?= $id ?>'">
                <div class="badge">TAHAP 1</div>

                <div class="icon-box">📘</div>

                <h3>Pra Pelaksanaan</h3>
                <p>Persiapan program sebelum dimulai</p>

                <div class="progress">
                    <div style="width:100%"></div>
                </div>
                
                <small>100% Complete</small>

            </div>

            <!-- PELAKSANAAN -->
            <div class="card ">
                <div class="badge">TAHAP 2</div>

                <div class="icon-box">📊</div>

                <h3>Pelaksanaan</h3>
                <p>Proses pelatihan berlangsung</p>

                <div class="progress">
                    <div style="width:<?= $d['progress'] ?>%"></div>
                </div>

                <small><?= $d['progress'] ?>% Progress</small>
            </div>

            <!-- PASCA -->
            <div class="card">
                <div class="badge">TAHAP 3</div>

                <div class="icon-box">📋</div>

                <h3>Pasca Pelatihan</h3>
                <p>Evaluasi dan tindak lanjut</p>

                <div class="progress">
                    <div style="width:0%"></div>
                </div>

                <small>0% Pending</small>
            </div>

        </div>

    </main>

</div>

</body>
</html>