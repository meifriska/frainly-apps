<?php
session_start();
require_once __DIR__ . '/../config/koneksi.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
$data = mysqli_fetch_assoc($query);

if ($data && $password == $data['password']) {

    $_SESSION['user'] = $data;

    header("Location: ../index.php"); // ✅ FIX
    exit;

} else {
    echo "Login gagal!";
}