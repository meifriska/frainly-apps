<?php
include 'auth/auth_check.php';
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Frainly Apps</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="css/monitor_tahun.css">
<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php include __DIR__ . '/layout/sidebar.php'; ?>

<div class="app">

    <!-- MAIN -->
    <main class="main">

        <!-- HEADER -->
        <div class="topbar">
            <input type="text" placeholder="Search">

            <div class="right">
                <span>Head Admin</span>
                <img src="https://i.pravatar.cc/40">
            </div>
        </div>

        <!-- TITLE -->
        <div class="title-box">
            <small>OVERVIEW</small>
            <h2>Dashboard</h2>
        </div>

        <!-- ROW 1 -->
        <div class="row1">

            <!-- MONITOR -->
            <div class="card monitor">
                <div class="card-head">
                    <h6>Monitoring Pelatihan</h6>
                    <button>Lihat Selengkapnya</button>
                </div>

                <div class="item">
                    <p>Data Science Fundamentals Batch III</p>
                    <div class="bar">
                        <div style="width:95%"></div>
                    </div>
                    <span>95%</span>
                </div>

                <div class="item">
                    <p>Leadership Workshop 2024</p>
                    <div class="bar">
                        <div style="width:80%"></div>
                    </div>
                    <span>80%</span>
                </div>
            </div>

            <!-- SPJ -->
            <div class="card spj">
                <h5>Buat Laporan SPJ Baru</h5>
                <p>Initiate the standard administrative reporting protocol now.</p>
                <button>Buat →</button>
            </div>

        </div>

        <!-- ROW 2 -->
        <div class="row2">

            <!-- ADMIN -->
            <div class="card admin">
                <h6>ADMINISTRASI</h6>

                <div class="money">
                    <small>PENGELUARAN</small>
                    <h3>Rp 1.428M</h3>
                    <span>+20%</span>
                </div>

                <div class="list">
                    <p>Batch_A12_Jakarta</p>
                    <p>Batch_B09_Surabaya</p>
                </div>
            </div>

            <!-- REPORT -->
            <div class="card report">
                <h6>SPJ & Reports Radar</h6>

                <div class="doc">
                    <p>Quarterly Financial Sync</p>
                    <small>Requested 1d ago</small>
                </div>

                <div class="doc">
                    <p>Operational Assets Audit</p>
                    <small>Requested 1d ago</small>
                </div>
            </div>

        </div>

    </main>

</div>

</body>
</html>