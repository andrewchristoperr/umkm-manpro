<?php
require '../connect.php';
session_start();

$umkm_id = $_POST['id'];
$product_id = $_POST['productId'];

$query = "DELETE FROM products WHERE id = ? AND umkm_id = ?";
$delete = $conn->prepare($query);
$delete->execute([$product_id, $umkm_id]);

$result = 1;

echo $result;
?>