<?php
require '../connect.php';

session_start();

// $image = $_FILES['foto_umkm']['tmp_name'];
// $image = file_get_contents(($_FILES['foto_umkm']['tmp_name']));

$_SESSION['username'] = $_POST['username'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['nama_umkm'] = $_POST['nama_umkm'];
$_SESSION['notelp_umkm'] = $_POST['notelp_umkm'];
$_SESSION['alamat_umkm'] = $_POST['alamat_umkm'];
$_SESSION['kecamatan'] = $_POST['kecamatan'];
$_SESSION['kategori_umkm'] = $_POST['kategori_umkm'];
$_SESSION['deskripsi_umkm'] = $_POST['deskripsi_umkm'];


// $username = $_SESSION['username'];
// $select = "SELECT username FROM umkmm WHERE username = '$username'";
// $select = $conn->query($select);
// if($select->rowCount() > 0)
// {
//     $result = 2;
// }
// else{
//     $result = 1; 
// }



?>