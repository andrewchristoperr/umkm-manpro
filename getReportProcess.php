<?php
require 'connect.php';

session_start();

$id = $_POST['id'];

$query = "SELECT * FROM umkm_monthly_report WHERE umkm_id = ? AND YEAR(date) = YEAR(CURDATE()) ORDER BY MONTH(date)";
$search = $conn->prepare($query);
$search->execute([$id]);

$row = $search->fetchAll();

$bulan = [];
$pendapatan = [];
$pengeluaran = [];
$omzet = [];

foreach ($rows as $row) {
    $bulan[] = date('F', strtotime($row['date']));
    $pendapatan[] = $row['pendapatan'];
    $pengeluaran[] = $row['pengeluaran'];
    $omzet[] = $row['omzet'];
}

?>  