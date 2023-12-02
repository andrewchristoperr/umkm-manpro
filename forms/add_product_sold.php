<?php
require '../connect.php';
session_start();

$umkm_id = $_POST['id'];
$product_name = $_POST['namaProduk'];
$jumlah_terjual = $_POST['jumlahProdukTerjual'];

$query = "SELECT id FROM umkm_products WHERE name = ?";
$search = $conn->prepare($query);
$search->execute([$product_name]);
$product_id = $search->fetchColumn();

$insert = "INSERT INTO umkm_products_sold (umkm_id, product_id, product_name, jumlah_terjual) VALUES ('$umkm_id', '$product_id', '$product_name', '$jumlah_terjual')";
$insert = $conn->query($insert);

$result = 1;

echo $result;
?>