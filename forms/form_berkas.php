<?php
require '../connect.php';

session_start();

$_SESSION['formulir'] = file_get_contents($_POST['formulir']);
$_SESSION['surat_pengantar'] = file_get_contents($_POST['surat_pengantar']);
$_SESSION['ktp'] = file_get_contents($_POST['ktp']);
$_SESSION['npwp'] = file_get_contents($_POST['npwp']);

$username = $_SESSION['username'];
$nama_umkm = $_SESSION['nama_umkm'];
$notelp_umkm = $_SESSION['notelp_umkm'];
$alamat_umkm = $_SESSION['alamat_umkm'];
$kecamatan = $_SESSION['kecamatam'];
$foto_umkm = $_SESSION['foto_umkm'];
$kategori_umkm = $_SESSION['kategori_umkm'];
$deskripsi_umkm = $_SESSION['deskripsi_umkm'];
$formulir = $_SESSION['formulir'];
$surat_pengantar = $_SESSION['surat_pengantar'];
$ktp = $_SESSION['ktp'];
$npwp = $_SESSION['npwp'];


$insert = "INSERT INTO umkmm (username, nama_umkm, notelp_umkm, alamat_umkm, kecamatan, foto_umkm, kategori_umkm, deskripsi_umkm, formulir, surat_pengantar, ktp, npwp) 
          VALUES ('$username', '$nama_umkm', '$notelp_umkm', '$alamat_umkm', '$kecamatan', '$foto_umkm', '$kategori_umkm', '$deskripsi_umkm', '$formulir', '$surat_pengantar', '$ktp', '$npwp')";
$insert = $conn->query($insert);

$result = 1;
echo $result;
