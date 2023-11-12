<?php
require "../connect.php";
session_start();

$kategori_umkm = $_POST['kategori'];
$_SESSION['kategori'] = $kategori_umkm;

echo $_SESSION['kategori'];
?>
