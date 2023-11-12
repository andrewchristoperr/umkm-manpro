<?php
require '../connect.php';
session_start();

$umkm_id = $_SESSION['id'];
$bulan_lapor = $_POST['bulan_lapor'];
$tanggalDefault = "-01";
$tanggalLengkap = $bulan_lapor . $tanggalDefault;
$pendapatan = $_POST['pendapatan'];
$pengeluaran = $_POST['pengeluaran'];
$omzet = $_POST['omzet'];

$insert = "INSERT INTO umkm_monthly_income (income, date, umkm_id) VALUES ('$pendapatan', '$tanggalLengkap', '$umkm_id')";
$insert = $conn->query($insert);

$result = 1;
echo $result;
?>