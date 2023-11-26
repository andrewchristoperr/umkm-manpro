<?php
require '../connect.php';
session_start();

$umkm_id = $_POST['id'];
$date = $_POST['date'];
$tanggalDefault = "-01";
$tanggalLengkap = $date . $tanggalDefault;

$pendapatan = $_POST['pendapatan'];
$pengeluaran = $_POST['pengeluaran'];
$omzet = $_POST['omzet'];

$insert = "INSERT INTO umkm_monthly_report (umkm_id, date, omzet, pendapatan, pengeluaran) VALUES ('$umkm_id', '$tanggalLengkap', '$omzet', '$pendapatan', '$pengeluaran')";
$insert = $conn->query($insert);

$result = 1;
echo $result;
?>