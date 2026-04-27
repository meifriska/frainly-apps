<?php include '../config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SPJ</title>
    <link rel="stylesheet" href="../css/spj2.css">
</head>
<body>

<?php include '../layout/sidebar.php'; ?>

<div class="main">

    <div class="header">Automated Data Entry</div>
    <div class="subheader">SPJ Responsibility • Draft Mode</div>

    <div class="tabs">
        <a href="#" class="active">Surat Tugas</a>
        <a href="#">Lembar 1</a>
        <a href="#">Kwitansi</a>
    </div>

    <div class="flex">

        <!-- FORM -->
        <div class="form-area card">
            <h3>Data Surat Tugas</h3>

            <div class="grid">

                <div>
                    <label>Nomor Surat</label>
                    <input type="text" id="nomor">
                </div>

                <div>
                    <label>Tanggal Terbit</label>
                    <input type="date" id="tanggal">
                </div>

                <!-- 🔥 DROPDOWN PEGAWAI -->
                <div>
                    <label>Pilih Pegawai</label>
                    <select id="pegawai">
                        <option value="">-- Pilih Pegawai --</option>

                        <?php
                        $q = mysqli_query($koneksi, "SELECT * FROM pegawai");
                        while($p = mysqli_fetch_assoc($q)):
                        ?>
                        <option 
                            data-nama="<?= $p['nama'] ?>"
                            data-nip="<?= $p['nip'] ?>"
                            data-jabatan="<?= $p['jabatan'] ?>"
                        >
                            <?= $p['nama'] ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- 🔥 AUTO FILL -->
                <div>
                    <label>Nama Pegawai</label>
                    <input type="text" id="nama" readonly>
                </div>

                <div>
                    <label>NIP / Jabatan</label>
                    <input type="text" id="nip" readonly>
                </div>

                <div class="full">
                    <label>Maksud Perjalanan</label>
                    <textarea id="maksud"></textarea>
                </div>

                <div>
                    <label>Alat Angkut</label>
                    <input type="text" id="angkut">
                </div>

                <div>
                    <label>Lama Perjalanan</label>
                    <input type="number" id="lama">
                </div>

                <div>
                    <label>Dari</label>
                    <input type="text" id="dari">
                </div>

                <div>
                    <label>Ke</label>
                    <input type="text" id="ke">
                </div>

            </div>

            <div class="actions">
                <button class="btn btn-secondary" type="reset">Reset Form</button>
                <button class="btn btn-primary">Save Changes</button>
            </div>
        </div>

        <div class="preview-area card">
            <h3>Live Preview</h3>

            <div class="preview-box" id="preview" style="font-family:'Times New Roman'; font-size:12pt;">
                <center>
                    <b>SURAT TUGAS</b>
                </center>
                <p>Nomor: -</p>
                <p>Nama: -</p>
            </div>
        </div>

    </div>

</div>

<script>

document.getElementById("pegawai").addEventListener("change", function(){

    let opt = this.options[this.selectedIndex];

    document.getElementById("nama").value = opt.dataset.nama || "";
    document.getElementById("nip").value = 
        (opt.dataset.nip || "") + " / " + (opt.dataset.jabatan || "");

    updatePreview();
});


// 🔥 LISTENER INPUT
const fields = ["nomor","tanggal","nama","nip","maksud","angkut","lama","dari","ke"];

fields.forEach(id => {
    document.getElementById(id).addEventListener("input", updatePreview);
});


// 🔥 UPDATE PREVIEW
function updatePreview(){
    document.getElementById("preview").innerHTML = `
        <center><b>SURAT TUGAS</b></center>
        <p>Nomor: ${nomor.value || '-'}</p>
        <p>Nama: ${nama.value || '-'}</p>
        <p>NIP: ${nip.value || '-'}</p>
        <p>${maksud.value || '-'}</p>
        <p>${dari.value || '-'} → ${ke.value || '-'}</p>
        <p>Lama: ${lama.value || '-'} Hari</p>
    `;
}

</script>

</body>
</html>