<?php
require 'connect.php';

session_start();

$id = $_POST['id'];
$startYear = $_POST['starYear'];
$endYear = $_POST['endYear'];

$query = "SELECT * FROM umkm_monthly_report WHERE umkm_id = ? AND YEAR(date) BETWEEN ? AND ? ORDER BY date";
$search = $conn->prepare($query);
$search->execute([$id, $startYear, $endYear]);

$rows = $search->fetchAll();

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

$response = [
    'bulan' => $bulan,
    'pendapatan' => $pendapatan,
    'pengeluaran' => $pengeluaran,
    'omzet' => $omzet,
];


echo json_encode($response);

?>  