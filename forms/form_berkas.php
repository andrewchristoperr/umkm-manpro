<?php
require '../connect.php';

session_start();

// $_SESSION['formulir'] = addslashes(file_get_contents($_FILES['formulir']['tmp_name']));
// $_SESSION['surat_pengantar'] =addslashes(file_get_contents( $_FILES['surat_pengantar']['tmp_name']));
// $_SESSION['ktp'] = addslashes(file_get_contents($_FILES['ktp']['tmp_name']));
// $_SESSION['npwp'] = addslashes(file_get_contents($_FILES['npwp']['tmp_name'])); 

$_SESSION['formulir'] = $_POST['formulir'];
$_SESSION['surat_pengantar'] = $_POST['surat_pengantar'];
$_SESSION['ktp'] = $_POST['ktp'];
$_SESSION['npwp'] = $_POST['npwp'];

$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$nama_umkm = $_SESSION['nama_umkm'];
$notelp_umkm = $_SESSION['notelp_umkm'];
$alamat_umkm = $_SESSION['alamat_umkm'];
$kecamatan = $_SESSION['kecamatan'];
$foto_umkm = $_SESSION['foto_umkm'];
$kategori_umkm = $_SESSION['kategori_umkm'];
$deskripsi_umkm = $_SESSION['deskripsi_umkm'];
$formulir = $_SESSION['formulir'];
$surat_pengantar = $_SESSION['surat_pengantar'];
$ktp = $_SESSION['ktp'];
$npwp = $_SESSION['npwp'];

$insert = "INSERT INTO umkmm (username, email, password, nama_umkm, notelp_umkm, alamat_umkm, kecamatan, foto_umkm, kategori_umkm, deskripsi_umkm, formulir, surat_pengantar, ktp, npwp) 
          VALUES ('$username', '$email', '$password', '$nama_umkm', '$notelp_umkm', '$alamat_umkm', '$kecamatan', '$foto_umkm', '$kategori_umkm', '$deskripsi_umkm', '$formulir', '$surat_pengantar', '$ktp', '$npwp')";
$insert = $conn->query($insert);

echo json_encode(['status' => 'success', 'msg' => 'Berhasil Submit!']);
session_destroy();

?>
