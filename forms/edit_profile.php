<?php
require '../connect.php';
session_start();

$umkm_id = $_POST['id'];
$nama_umkm = $_POST['namaUMKM'];
$deskripsi_umkm = $_POST['deskripsiUMKM'];
$kategori_umkm = $_POST['kategoriUMKM'];
$alamat_umkm = $_POST['alamatUMKM'];
$kecamatan = $_POST['kecamatanUMKM'];
$notelp_umkm = $_POST['noWhatsApp'];

$query = "UPDATE umkmm SET nama_umkm = ?, deskripsi_umkm = ?, kategori_umkm = ?, alamat_umkm = ?, kecamatan = ?, notelp_umkm = ? WHERE id = ?";
$update = $conn->prepare($query);
$update->execute([$nama_umkm, $deskripsi_umkm, $kategori_umkm, $alamat_umkm, $kecamatan, $notelp_umkm, $umkm_id]);

$result = 1;

echo $result;
?>