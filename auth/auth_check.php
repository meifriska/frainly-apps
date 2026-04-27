<?php
session_start();

if (!isset($_SESSION['user']['id_user'])) {
    header("Location: auth/login.php");
    exit;
}