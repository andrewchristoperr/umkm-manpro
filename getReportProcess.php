<?php
require 'connect.php';

session_start();

$id = $_POST['id'];
$startYear = $_POST['startYear'];
$endYear = $_POST['endYear'];

$query = "SELECT * FROM umkm_monthly_report WHERE umkm_id = ? AND YEAR(date) BETWEEN ? AND ? ORDER BY date";
$search = $conn->prepare($query);
$search->execute([$id, $startYear, $endYear]);

$rows = $search->fetchAll();

$dataByYear = [];

foreach ($rows as $row) {
    $year = date('Y', strtotime($row['date']));

    // Inisialisasi array untuk tahun tertentu jika belum ada
    if (!isset($dataByYear[$year])) {
        $dataByYear[$year] = [
            'bulan' => [],
            'pendapatan' => [],
            'pengeluaran' => [],
            'omzet' => [],
        ];
    }

    // Tambahkan data ke array sesuai dengan tahun
    $dataByYear[$year]['bulan'][] = date('F', strtotime($row['date']));
    $dataByYear[$year]['pendapatan'][] = $row['pendapatan'];
    $dataByYear[$year]['pengeluaran'][] = $row['pengeluaran'];
    $dataByYear[$year]['omzet'][] = $row['omzet'];
}

$response = [
    'dataByYear' => $dataByYear,
];


echo json_encode($response);


?>  