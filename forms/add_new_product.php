<?php
require '../connect.php';
session_start();

$umkm_id = $_POST['id'];
$name = $_POST['namaProduk'];
$description = $_POST['deskripsiProduk'];
$price = $_POST['hargaProduk'];
$photo = $_POST['fotoProduk'];

$insert = "INSERT INTO umkm_products (umkm_id, name, description, price, photo_url) VALUES ('$umkm_id', '$name', '$description', '$price', '$photo')";
$insert = $conn->query($insert);

$result = 1;
echo $result;
?>