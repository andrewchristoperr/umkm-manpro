<?php
include 'connect.php';

$kategori_umkm = $_POST['kategori'];
$_SESSION['kategori'] = $kategori_umkm;
if (isset($_SESSION['kategori'])) {
    if ($_SESSION['kategori'] != 'All') {
        $kategori_umkm = $_SESSION['kategori'];
        $query = "SELECT * FROM umkmm WHERE kategori_umkm = '$kategori_umkm'";
        $stmt = $conn->query($query)->fetchAll();
    } else {
        $query = "SELECT * FROM umkmm";
        $stmt = $conn->query($query)->fetchAll();
    }
} else {
    $query = "SELECT * FROM umkmm";
    $stmt = $conn->query($query)->fetchAll();
}


echo json_encode($stmt);

