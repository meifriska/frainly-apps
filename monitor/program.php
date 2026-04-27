<?php
session_start();
require_once __DIR__ . '/../config/koneksi.php';

$id_tahun = intval($_GET['id_tahun']);

// ambil data tahun
$tahun = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tahun WHERE id='$id_tahun'"));

// tambah program
if (isset($_POST['tambah'])) {

    $nama = $_POST['nama_program'];
    $status = $_POST['status'];
    $progress = intval($_POST['progress']);

    mysqli_query($koneksi, "
        INSERT INTO program (id_tahun, nama_program, status, progress)
        VALUES ('$id_tahun', '$nama', '$status', '$progress')
    ") or die(mysqli_error($koneksi));

    echo "<script>window.location='program.php?id_tahun=$id_tahun#grid'</script>";
}

// ambil data program
$data = mysqli_query($koneksi, "
    SELECT * FROM program 
    WHERE id_tahun='$id_tahun'
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Program Pelatihan</title>

    <!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/monitor_tahun.css">
    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<!-- MAIN -->
<div class="main">

    <!-- HEADER (SAMA STYLE) -->
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
        <h2>Pilih Tahun Monitoring</h2>
        <p>
            Mohon kesediaan Anda untuk melengkapi rincian rencana 
            pelatihan yang akan datang pada kolom yang telah tersedia. Apabila saat ini data tersebut belum 
            terdaftar atau belum ada di dalam sistem, mohon untuk segera melakukan penginputan secara mandiri
             guna memastikan kelengkapan administrasi Anda. Kami menghargai kerja sama Anda dalam memperbarui 
             informasi ini agar seluruh jadwal kegiatan dapat terdata dengan akurat.
        </p>
    </div>



    <!-- FORM TAMBAH -->
    <div class="form-program">
        <form method="POST" style="display:flex; gap:10px;">
            
            <input type="text" name="nama_program" placeholder="Nama Program" required>

            <select name="status">
                <option value="Aktif">Aktif</option>
                <option value="Selesai">Selesai</option>
                <option value="Rencana">Rencana</option>
            </select>

            <input type="number" name="progress" placeholder="Progress %" required>

            <button type="submit" name="tambah">+ Tambah</button>

        </form>
    </div>

    <div id="editBox" style="display:none; margin-top:15px;">

        <form method="POST" action="aksi/edit_program.php">

            <input type="hidden" name="id" id="edit_id">
            <input type="hidden" name="id_tahun" value="<?= $id_tahun ?>">

            <input type="text" name="nama_program" id="edit_nama" required>

            <select name="status" id="edit_status">
                <option value="Aktif">Aktif</option>
                <option value="Selesai">Selesai</option>
                <option value="Rencana">Rencana</option>
            </select>

            <input type="number" name="progress" id="edit_progress" required>

            <button type="submit" name="update">Update</button>

        </form>

    </div>

    <div class="grid" id="grid">

        <?php while($d = mysqli_fetch_assoc($data)) { ?>

        <div class="card">

            <div class="icon-box">📊</div>

            <h3><?= $d['nama_program'] ?></h3>
            <p><?= $d['status'] ?></p>

            <div class="progress">
                <div style="width: <?= $d['progress'] ?>%"></div>
            </div>

            <small><?= $d['progress'] ?>% Complete</small>

            <!-- ACTION -->
            <div class="card-action">
                <a href="tahap.php?id=<?= $d['id'] ?>">
                    <i class="bi bi-eye"></i>
                </a>

                <a href="#"
                    onclick="editProgram(
                        <?= $d['id'] ?>,
                        '<?= addslashes($d['nama_program']) ?>',
                        '<?= $d['status'] ?>',
                        <?= $d['progress'] ?>
                    )">
                        <i class="bi bi-pencil"></i>
                </a>

                <a href="aksi/hapus_program.php?id=<?= $d['id'] ?>&id_tahun=<?= $id_tahun ?>"
                    onclick="return confirm('Yakin hapus program ini?')">
                    <i class="bi bi-trash"></i>
                </a>
            </div>

        </div>

        <?php } ?>

    </div>

</div>
<script>
function editProgram(id, nama, status, progress) {

    document.getElementById("editBox").style.display = "block";

    document.getElementById("edit_id").value = id;
    document.getElementById("edit_nama").value = nama;
    document.getElementById("edit_status").value = status;
    document.getElementById("edit_progress").value = progress;

    window.scrollTo({ top: 0, behavior: "smooth" });
}
</script>

</body>
</html>