<?php
$current = basename($_SERVER['PHP_SELF']);
$url = $_SERVER['REQUEST_URI'];
?>

<aside class="sidebar">

    <!-- LOGO -->
    <div class="logo">
        <h5>Frainly Apps</h5>
        <small>SUPER APPS</small>
        <p><i class="bi bi-person-circle"></i> <?= $_SESSION['user']['nama'] ?></p>
    </div>

<ul class="menu">

    <li class="<?= ($current == 'index.php' && strpos($url, 'monitor') === false) ? 'active' : '' ?>">
        <i class="bi bi-grid"></i>
        <a href="/frainly-apps/index.php">Dashboard</a>
    </li>

    <!-- 🔥 MONITOR -->
    <li class="<?= (strpos($url, 'monitor') !== false) ? 'active' : '' ?>">
        <i class="bi bi-bar-chart"></i>
        <a href="/frainly-apps/monitor/tahun.php?id_tahun=1">Monitor Pelahyhgsaytihan</a>
    </li>

    <!-- 🔥 ADMIN -->
    <li class="<?= (strpos($url, 'administrasi') !== false) ? 'active' : '' ?>">
        <i class="bi bi-calculator"></i>
        <a href="/frainly-apps/administrasi/index.php">Administrasi Penghitung Cepat</a>
    </li>

    <!-- 🔥 SPJ -->
    <li class="<?= (strpos($url, 'spj') !== false) ? 'active' : '' ?>">
        <i class="bi bi-file-earmark-text"></i>
        <a href="/frainly-apps/spj/index.php">SPJ / Laporan</a>
    </li>

</ul>

    <!-- BOTTOM -->
    <div class="sidebar-bottom">
        <p><i class="bi bi-question-circle"></i> Help Center</p>
        <a href="../auth/logout.php">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>

</aside>

