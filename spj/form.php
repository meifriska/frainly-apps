<?php
include __DIR__ . '/../auth/auth_check.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form SPJ</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/spj.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

<aside class="sidebar">
    <div class="logo">
        <h5>Frainly Apps</h5>
        <small>SUPER APPS</small>
    </div>

    <ul class="menu">
        <li><a href="../index.php" class="text-decoration-none text-dark">Dashboard</a></li>
        <li>Monitor Pelatihan</li>
        <li>Administrasi Penghitung Cepat</li>
        <li class="active">SPJ / Laporan</li>
    </ul>

    <div style="position:absolute; bottom:25px;">
        <p>Help Center</p>
        <a href="../auth/logout.php" class="logout">Logout</a>
    </div>
</aside>

<div class="main">

<div class="header">
    <input type="text" class="search" placeholder="Search data...">

    <div class="header-right">
        <div class="icon-box"><i class="bi bi-bell"></i></div>
        <div class="icon-box"><i class="bi bi-gear"></i></div>
        <span><?= $_SESSION['nama']; ?></span>
        <img src="https://i.pravatar.cc/40" class="avatar">
    </div>
</div>

<!-- 🔥 WRAPPER UTAMA (INI KUNCI FIX) -->
<div class="wrapper mt-3">

    <!-- ================= LEFT ================= -->
    <div class="form-section">

        <!-- CARD -->
        <div class="card-box mb-3">
            <h5 class="fw-bold">Automated Data Entry</h5>

            <small>MODULE</small><br>
            <b>SPJ Responsibility</b><br><br>

            <small>STATUS</small><br>
            <span class="text-success">● Draft Mode</span>
        </div>

        <!-- TAB -->
        <div class="tabs mb-3">
            <div class="tab active"><i class="bi bi-file-earmark-text"></i> Surat Tugas</div>
            <div class="tab"><i class="bi bi-layers"></i> Lembar 1</div>
            <div class="tab"><i class="bi bi-receipt"></i> Kwitansi</div>
            <div class="tab"><i class="bi bi-journal-text"></i> Rincian</div>
        </div>

        <!-- FORM -->
        <div class="card-box">

        <h5>Data Surat Tugas</h5>

        <form>
        <div class="row">

        <div class="col-md-6 mb-3">
        <label>Nomor Surat</label>
        <input type="text" id="nomor" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
        <label>Tanggal Terbit</label>
        <input type="date" id="tanggal" class="form-control">
        </div>


        </div>

        <button type="button" class="btn btn-sm btn-primary" onclick="tambahPegawai()">
        + Tambah Pegawai
        </button>

        </div>

        <div class="col-md-12 mb-3">
        <label>Maksud Perjalanan Dinas</label>
        <textarea id="maksud" class="form-control"></textarea>
        </div>

        <div class="col-md-6 mb-3">
        <label>Alat Angkut</label>
        <input type="text" id="angkut" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
        <label>Lama Perjalanan</label>
        <input type="text" id="lama" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
        <label>Tempat Berangkat</label>
        <input type="text" id="berangkat" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
        <label>Tempat Tujuan</label>
        <input type="text" id="tujuan" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
        <label>Tanggal Berangkat</label>
        <input type="date" id="tgl_berangkat" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
        <label>Tanggal Kembali</label>
        <input type="date" id="tgl_kembali" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
        <label>Instansi</label>
        <input type="text" id="instansi" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
        <label>Mata Anggaran</label>
        <input type="text" id="anggaran" class="form-control">
        </div>

        </div>

        <div class="d-flex justify-content-between mt-3">
        <button type="reset" class="btn btn-light">Reset</button>
        <button class="btn btn-primary">Save</button>
        </div>

        </form>

        </div>

    </div>

    <!-- ================= RIGHT ================= -->
    <div class="preview-section">

        <!-- 🔥 LIVE PREVIEW -->
        <div class="card-box mb-2 d-flex justify-content-between align-items-center">
            <span class="text-success fw-bold">● LIVE PREVIEW</span>

            <div class="d-flex gap-2">
                <button onclick="window.print()" class="btn btn-sm btn-light">
                    <i class="bi bi-printer"></i> Print
                </button>

                <form method="POST" action="export_word.php">
                    <input type="hidden" name="nomor" id="nomor_hidden">
                    <input type="hidden" name="maksud" id="maksud_hidden">
                    <input type="hidden" name="tanggal" id="tanggal_hidden">

                    <button class="btn btn-sm btn-primary">
                        Download Word
                    </button>
                </form>
            </div>
        </div>

        <!-- 🔥 PREVIEW SURAT -->
        <div class="preview-box" style="font-size:13px; font-family:'Times New Roman';">

        <center>
        <b>PEMERINTAH PROVINSI JAWA TIMUR</b><br>
        <b>BADAN PENGEMBANGAN SUMBER DAYA MANUSIA</b><br>
        <span style="font-size:12px;">
        Jalan Balongsari Tama, Tandes, Surabaya<br>
        Telp (031) 7412278
        </span>
        <hr style="border:2px solid black;">
        <br>

        <b><u>SURAT TUGAS</u></b><br>
        Nomor : <span id="p_nomor"></span>
        </center>

        <br>

        <table width="100%">
        <tr>
        <td width="60">Dasar</td>
        <td width="10">:</td>
        <td>
        1. Dokumen Pelaksanaan Anggaran (DPA-SKPD)<br>
        2. Surat DPRD Provinsi Jawa Timur
        </td>
        </tr>
        </table>

        <br>

        <center><b>MEMERINTAHKAN</b></center>

        <br>

        <table width="100%">
        <tr>
        <td width="100">Kepada</td>
        <td width="10">:</td>
        <td id="pegawai_list"></td>
        </tr>
        </table>

        <br>

        <table width="100%">
        <tr>
        <td width="60">Untuk</td>
        <td width="10">:</td>
        <td><span id="p_maksud"></span></td>
        </tr>
        </table>

        <br><br>

        Demikian untuk dilaksanakan dengan penuh tanggung jawab.

        <br><br>

        <div style="text-align:right;">
        Surabaya, <span id="p_tanggal"></span><br>
        Kepala Badan<br><br><br><br>

        <b>Nama Pejabat</b><br>
        NIP. XXXXXXXX
        </div>

        </div>

    </div>

</div>

</div>

<!-- SCRIPT -->
<script>
document.getElementById("nomor").oninput = e => p_nomor.innerText = e.target.value;
document.getElementById("maksud").oninput = e => p_maksud.innerText = e.target.value;
document.getElementById("tanggal").oninput = e => p_tanggal.innerText = e.target.value;

function tambahPegawai() {
    const container = document.getElementById("pegawai-container");

    const div = document.createElement("div");
    div.classList.add("pegawai-item","mb-3");

    div.innerHTML = `
        <label>Nama</label>
        <input type="text" class="form-control nama">
        <label>NIP</label>
        <input type="text" class="form-control nip">
        <label>Jabatan</label>
        <input type="text" class="form-control jabatan">
    `;

    container.appendChild(div);
}

document.addEventListener("input", function () {
    const names = document.querySelectorAll(".nama");
    const nips = document.querySelectorAll(".nip");
    const jabatans = document.querySelectorAll(".jabatan");

    let html = "";

    names.forEach((el, i) => {
        html += `
        ${i+1}. Nama : ${el.value || '-'}<br>
        NIP : ${nips[i].value || '-'}<br>
        Jabatan : ${jabatans[i].value || '-'}<br><br>
        `;
    });

    document.getElementById("pegawai_list").innerHTML = html;
});
</script>

<script>
document.addEventListener("input", function () {
    document.getElementById("nomor_hidden").value = nomor.value;
    document.getElementById("maksud_hidden").value = maksud.value;
    document.getElementById("tanggal_hidden").value = tanggal.value;
});
</script>

</body>
</html>