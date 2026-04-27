<?php
include __DIR__ . '/../auth/auth_check.php';
include __DIR__ . '/../layout/sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<title>SPJ Dashboard</title>
<link rel="stylesheet" href="css/sidebar.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="../css/spj.css">

<!-- FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<!-- MAIN -->
<div class="main">

    <!-- HEADER -->
    <div class="header">
        <input type="text" class="search" placeholder="Search data...">

        <div class="header-right">
            <div class="icon-box"><i class="bi bi-bell"></i></div>
            <div class="icon-box"><i class="bi bi-gear"></i></div>

            <span><?= $_SESSION['nama']; ?></span>
            <img src="https://i.pravatar.cc/40" class="avatar">
        </div>
    </div>

    <!-- TITLE -->
    <div class="title">
        <h2>SPJ Administration</h2>
        <p class="subtitle">
            Centralized intelligence portal for Surat Pertanggungjawaban (SPJ).
            Manage data automation and reporting in one environment.
        </p>
    </div>

    <!-- STATS -->
    <div class="stats">

        <div class="stat-card">
            <small>TOTAL DOKUMEN SPJ</small>
            <h4>1,284</h4>
            <small style="color:green;">+12.5% vs last month</small>
        </div>

        <div class="stat-card">
            <small>STATUS ANGGARAN</small>
            <h4>72.4%</h4>
            <div class="progress" style="height:6px;">
                <div class="progress-bar bg-primary" style="width:72%"></div>
            </div>
        </div>

        <div class="stat-card">
            <small>PENDING APPROVAL</small>
            <h4>14</h4>
            <small>Requires review</small>
        </div>

        <div class="stat-card">
            <small>TOTAL PENGELUARAN</small>
            <h4>Rp 4.2B</h4>
            <small>IDR Currency</small>
        </div>

    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- LEFT -->
        <div class="left">
            <div class="card-box">

                <div class="icon-feature">
                    <i class="bi bi-stars"></i>
                </div>

                <h5>Isi Data Otomatis</h5>
                <p>
                    Populate SPJ documents automatically using smart mapping.
                </p>

                <a href="form.php" class="btn-main">Mulai Sekarang</a>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="right">

            <div class="card-box">
                <div class="icon-feature">
                    <i class="bi bi-calculator"></i>
                </div>

                <h5>Hitung Biaya</h5>
                <p>Automated fiscal calculator</p>

                <a href="hitung.php" class="btn-link">Buka Menu →</a>
            </div>

            <div class="card-box">
                <div class="icon-feature">
                    <i class="bi bi-file-earmark-text"></i>
                </div>

                <h5>Isi Data Laporan</h5>
                <p>Finalize your reporting</p>

                <a href="laporan.php" class="btn-link">Mulai Laporan →</a>
            </div>

        </div>

    </div>

</div>

</body>
</html>