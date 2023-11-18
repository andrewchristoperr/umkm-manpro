<?php
require '../connect.php';

session_start();
$image =  addslashes(file_get_contents($_FILES['foto_umkm']['tmp_name']));
// $image =  $_FILES['foto_umkm']['tmp_name'];
$_SESSION['foto_umkm'] = $image;

echo json_encode(['status' => 'success']);

?>
