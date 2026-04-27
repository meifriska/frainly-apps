<?php
require '../vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;

$phpWord = new PhpWord();
$section = $phpWord->addSection();

// ===== AMBIL DATA =====
$nomor = $_POST['nomor'];
$maksud = $_POST['maksud'];
$tanggal = $_POST['tanggal'];

$nama = $_POST['nama'] ?? [];
$nip = $_POST['nip'] ?? [];
$jabatan = $_POST['jabatan'] ?? [];

// ===== STYLE =====
$center = ['alignment' => Jc::CENTER];
$right = ['alignment' => Jc::RIGHT];

// ===== KOP =====
$section->addText('PEMERINTAH PROVINSI JAWA TIMUR', ['bold'=>true], $center);
$section->addText('BADAN PENGEMBANGAN SUMBER DAYA MANUSIA', ['bold'=>true], $center);
$section->addText('Jalan Balongsari Tama, Tandes, Surabaya', [], $center);
$section->addText('Telp (031) 7412278', [], $center);

// garis
$section->addText('________________________________________', [], $center);
$section->addTextBreak();

// ===== JUDUL =====
$section->addText('SURAT TUGAS', ['bold'=>true, 'underline'=>'single'], $center);
$section->addText("Nomor : $nomor", [], $center);
$section->addTextBreak();

// ===== DASAR =====
$tableDasar = $section->addTable();
$tableDasar->addRow();
$tableDasar->addCell(1500)->addText('Dasar');
$tableDasar->addCell(500)->addText(':');
$tableDasar->addCell(8000)->addText(
    "1. Dokumen Pelaksanaan Anggaran (DPA-SKPD)\n".
    "2. Surat DPRD Provinsi Jawa Timur"
);

$section->addTextBreak();

// ===== MEMERINTAHKAN =====
$section->addText('MEMERINTAHKAN', ['bold'=>true], $center);
$section->addTextBreak();

// ===== KEPADA (MULTI PEGAWAI) =====
$tablePegawai = $section->addTable();

$tablePegawai->addRow();
$tablePegawai->addCell(1500)->addText('Kepada');
$tablePegawai->addCell(500)->addText(':');

$cell = $tablePegawai->addCell(8000);

// loop pegawai
for ($i=0; $i<count($nama); $i++) {
    $cell->addText(($i+1).". Nama : ".$nama[$i]);
    $cell->addText("   NIP : ".$nip[$i]);
    $cell->addText("   Jabatan : ".$jabatan[$i]);
    $cell->addTextBreak();
}

$section->addTextBreak();

// ===== UNTUK =====
$tableUntuk = $section->addTable();
$tableUntuk->addRow();
$tableUntuk->addCell(1500)->addText('Untuk');
$tableUntuk->addCell(500)->addText(':');
$tableUntuk->addCell(8000)->addText($maksud);

$section->addTextBreak(2);

// ===== PENUTUP =====
$section->addText('Demikian untuk dilaksanakan dengan penuh tanggung jawab.');

$section->addTextBreak(3);

// ===== TTD =====
$section->addText("Surabaya, $tanggal", [], $right);
$section->addText("Kepala Badan", [], $right);
$section->addTextBreak(4);
$section->addText("Nama Pejabat", ['bold'=>true], $right);
$section->addText("NIP. XXXXXXXX", [], $right);

// ===== OUTPUT =====
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="surat_tugas.docx"');

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save("php://output");