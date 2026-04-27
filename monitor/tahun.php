<?php
session_start();
require_once __DIR__ . '/../config/koneksi.php';

// tambah tahun
if (isset($_POST['tambah'])) {
    $tahun = intval($_POST['tahun']);
    mysqli_query($koneksi, "INSERT INTO tahun (tahun) VALUES ('$tahun')");
    echo "<script>window.location='tahun.php#grid'</script>";
}

// ambil data
$data = mysqli_query($koneksi, "SELECT * FROM tahun ORDER BY tahun DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Monitoring Tahun</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/monitor_tahun.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<!-- MAIN -->
<div class="main">

    <!-- TOP HEADER -->
    <div class="top-header">
        <input type="text" class="search" placeholder="Search monitoring data...">

        <div class="header-icons">
            <i class="bi bi-bell"></i>
            <i class="bi bi-gear"></i>

            <span><?= $_SESSION['nama'] ?? 'Super Admin'; ?></span>
            <img src="https://i.pravatar.cc/40" class="avatar">
        </div>
    </div>

    <!-- TITLE -->
    <div class="title">
        <h2>Pilih Tahun Monitoring</h2>
        <p>
            Mohon kesediaan Anda untuk melengkapi data masa berlaku tahun serta memasukkan rincian rencana 
            pelatihan yang akan datang pada kolom yang telah tersedia. Apabila saat ini data tersebut belum 
            terdaftar atau belum ada di dalam sistem, mohon untuk segera melakukan penginputan secara mandiri
             guna memastikan kelengkapan administrasi Anda. Kami menghargai kerja sama Anda dalam memperbarui 
             informasi ini agar seluruh jadwal kegiatan dapat terdata dengan akurat.
        </p>
    </div>

    <!-- ACTION -->
    <div class="top-bar">

        <button class="btn-add" onclick="toggleForm()">+ Tambah Tahun</button>

        <div class="tabs">
            <button class="active-tab">Active</button>
            <button>Archived</button>
        </div>

    </div>

    <!-- FORM TAMBAH -->
    <div id="formTahun" class="form-box">
        <form method="POST">
            <input type="number" name="tahun" placeholder="Masukkan Tahun" required>
            <button type="submit" name="tambah">Simpan</button>
        </form>
    </div>
    <div id="editBox" class="form-box" style="display:none;">
        <form method="POST" action="aksi/edit_tahun.php">
            <input type="hidden" name="id" id="edit_id">
            <input type="number" name="tahun" id="edit_tahun" required>
            <button type="submit" name="update">Update</button>
        </form>
    </div>

    <!-- GRID -->
   <div class="grid" id="grid">

        <?php while($d = mysqli_fetch_assoc($data)) {

            $tahun_now = date('Y');

            if ($d['tahun'] == $tahun_now) {
                $status = "ACTIVE";
                $class = "active";
                $desc = "Ongoing Assessment";
            } elseif ($d['tahun'] < $tahun_now) {
                $status = "ARCHIVED";
                $class = "";
                $desc = "Final Completion";
            } else {
                $status = "PLANNED";
                $class = "";
                $desc = "Future Planning";
            }

            $progress = rand(60,95);
        ?>

        <div class="card <?= $class ?>">
            <div class="badge"><?= $status ?></div>

            <div class="icon-box">📊</div>

            <h3><?= $d['tahun'] ?></h3>
            <p><?= $desc ?>: <?= $progress ?>%</p>

            <div class="progress">
                <div style="width: <?= $progress ?>%"></div>
            </div>

                <div class="card-action">
                    <a href="program.php?id_tahun=<?= $d['id'] ?>">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="#" onclick="editTahun(<?= $d['id'] ?>, <?= $d['tahun'] ?>)">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <a href="aksi/hapus_tahun.php?id=<?= $d['id'] ?>" onclick="return confirm('Yakin?')">
                        <i class="bi bi-trash"></i>
                    </a>
                </div>
        </div>

        <?php } ?>

    </div>

</div>

<script>
function toggleForm() {
    let f = document.getElementById("formTahun");
    f.style.display = (f.style.display === "block") ? "none" : "block";
}
</script>
<script>
function editTahun(id, tahun) {
    document.getElementById("editBox").style.display = "block";
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_tahun").value = tahun;
}
</script>
<script>
if (window.location.hash === "#grid") {
    document.getElementById("grid").scrollIntoView({
        behavior: "smooth"
    });
}
</script>

</body>
</html>