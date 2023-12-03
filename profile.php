<?php
require 'connect.php';
session_start();

$id = $_SESSION['login'];

if (!isset($_SESSION['login'])) {
  header('location: login.php');
  exit;
} else {
  $sql0 = "SELECT * FROM umkmm WHERE id = $id";
  $stmt = $conn->query($sql0)->fetch();
  if ($stmt != null) {
    if ($stmt['verification_status'] == 2) {
      header('location: profile_waiting.php');
      exit;
    }
  }
}

// Fetch tahun yang ada di umkm_monthly_report untuk di Dropdown & Cari tahun terbesar & terkecil
$queryYears = "SELECT DISTINCT YEAR(date) AS report_year FROM umkm_monthly_report WHERE umkm_id = ? ORDER BY report_year ASC";
$result = $conn->prepare($queryYears);
$result->execute([$id]);
$data = $result->fetchAll();

$startYearOptions = '';
$endYearOptions = '';
$years = [];

if ($data) {
  foreach ($data as $year) {
    $startYearOptions .= '<a class="dropdown-item" id="startYear" href="#">' . $year['report_year'] . '</a>';
    $endYearOptions .= '<a class="dropdown-item" id="endYear" href="#">' . $year['report_year'] . '</a>';
    $years[] = $year['report_year'];
  }
  $minYears = min($years);
  $maxYears = max($years);
}

// Fetch Report Keuangan
$queryAllData = "SELECT date, omzet, pendapatan, pengeluaran FROM umkm_monthly_report WHERE umkm_id = ? ORDER BY date ASC";
$result2 = $conn->prepare($queryAllData);
$result2->execute([$id]);
$allData = $result2->fetchAll();
$monthlyReport = '';
foreach ($allData as $row) {
  $monthlyReport .= '
    <tr>
        <td>' . date('F Y', strtotime($row['date'])) . '</td>
        <td>' . 'Rp ' . number_format($row['omzet'], 0, ',', '.') . '</td>
        <td>' . 'Rp ' . number_format($row['pendapatan'], 0, ',', '.') . '</td>
        <td>' . 'Rp ' . number_format($row['pengeluaran'], 0, ',', '.') . '</td>
    </tr>
    ';
}

// Fetch Bantuan
$sql = "SELECT * FROM bantuan WHERE id_umkm = $id AND status = 1";
$stmt2 = $conn->query($sql)->fetchAll();

// Fetch Produk
$sql2 = "SELECT * FROM products WHERE umkm_id = $id";
$stmt3 = $conn->query($sql2)->fetchAll();

// Fetch Jumlah Produk Terjual untuk Grafik Penjualan (Pie Chart)

$sql_years = "SELECT DISTINCT YEAR(date) as year FROM umkm_products_sold WHERE umkm_id = $id ORDER BY year ASC";
$years = $conn->query($sql_years)->fetchAll(PDO::FETCH_COLUMN);

$productsByYear = [];
$terjualByYear = [];

foreach ($years as $year) {
  $sql_per_year = "SELECT product_name, SUM(jumlah_terjual) as total_sold 
                    FROM umkm_products_sold 
                    WHERE umkm_id = $id AND YEAR(date) = $year 
                    GROUP BY product_name";

  $dataPenjualanPerTahun = $conn->query($sql_per_year)->fetchAll();

  foreach ($dataPenjualanPerTahun as $penjualan) {
    $productsByYear[$year][] = $penjualan['product_name'];
    $terjualByYear[$year][] = $penjualan['total_sold'];
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ManProTI Kelompok 9</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Bootstraps -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Sweet Alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
  <!-- Data Table -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

  <style>
    .modal-pesan {
      position: fixed;
      margin: auto;
      width: 320px;
      height: 100%;
      right: 0px;
    }

    .modal-content {
      height: 100%;
    }

    li a:hover {
      cursor: pointer;
    }

    .subheader {
      color: grey;
      font-size: 13px;
    }

    .notif {
      font-size: 14px;
      font-weight: bold;
    }

    .modal-body .row.content {
      background-color: #E0F4FF;
      padding-top: 15px;
      padding-bottom: 15px;
    }

    .isi-notif {
      font-size: 12px;
      font-weight: normal;
      font-family: "Open Sans", sans-serif;
    }

    .scrollable-container {
      display: flex;
      overflow-x: auto;
      white-space: nowrap;
      scrollbar-width: thin;
      scrollbar-color: #333 #eee;
    }

    .scrollable-container::-webkit-scrollbar {
      width: 6px;
    }

    .scrollable-container::-webkit-scrollbar-thumb {
      background-color: #263f49;
    }

    .scrollable-container::-webkit-scrollbar-track {
      background-color: #eee;
    }

    .profil-img {
      max-width: 100%;
      max-height: 100%;
      border-radius: 50%;
    }

    .col-nama h3 {
      justify-content: center;
    }

    .profil-nama {
      display: flex;
      align-items: center;
      height: 120px;
      font-size: 30px;
    }

    .btn {
      align-items: center;
      justify-content: center;
      display: flex;
      display: inline-block;
      background: #67b0d1;
      border-color: #67b0d1;
      color: #fff;
      border-radius: 50px;
      text-decoration: none;
    }

    .text-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      text-align: center;
      justify-content: center;
      padding: 20px;
    }

    .card {
      width: 400px;
      height: 270px;
      max-width: 100%;
    }

    .card-addnew {
      background-color: #fff;
      justify-content: center;
      color: #333;
    }

    .card-addnew:hover {
      background-color: #67b0d1;
      color: #eee;
    }

    #footer {
      position: relative;
    }

    #main {
      margin-bottom: 100px;
    }

    .col-edit {
      align-items: center;
    }

    .btn-edit {
      background-color: transparent;
      border: 3px solid #67b0d1;
      color: #67b0d1;
    }

    .btn-edit:hover {
      background-color: #67b0d1;
      color: #eee;
    }

    .umkm-info {
      padding: 30px;
      padding-bottom: 20px;
      margin-bottom: 20px;
      box-shadow: 0px 0 30px rgba(47, 77, 90, 0.08);
    }

    .umkm-info h3 {
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #eee;
    }

    .umkm-info ul {
      list-style: none;
      padding: 0;
      font-size: 15px;
    }

    [id*="chartPendapatan"],
    [id*="chartPengeluaran"],
    [id*="chartOmzet"],
    [id*="chartPenjualan"] {
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      padding: 10px;
      border-radius: 10px;
      margin-top: 20px;
    }

    canvas {
      font-family: "Raleway", sans-serif;
    }

    .edit-icon {
      font-size: 20px;
      margin-top: 3px;
    }

    i {
      padding: 5px;
    }

    .btn-filter,
    .btn-filterStartYear,
    .btn-filterEndYear {
      background-color: #67b0d1;
      color: #eee;
    }

    .btn-filter:hover,
    .btn-filterStartYear:hover,
    .btn-filterEndYear:hover {
      background-color: #67b0d1;
      color: #2f4d5a;
    }

    .portfolio-item .card .portfolio-wrap {
      position: relative;
      width: 100%;
      height: 0;
      padding-bottom: 75%;
      /* Adjust the padding-bottom to set the desired aspect ratio (e.g., 75% for 4:3) */
    }

    .portfolio-item .card .portfolio-wrap img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <?php include "template/header_profile.php"; ?>




  <main id="main">
    <!-- Modal Pesan -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-pesan" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close" style="background-color: white; border:none;">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row mb-3">
              <b class="header">Untuk Kamu</b>
            </div>

            <?php
            if ($stmt2 != null) {
              foreach ($stmt2 as $row2) {
                if ($row2['status'] == 1) {
            ?>
                  <div class="row content">
                    <span class="subheader mb-1">Konfirmasi Bantuan <?php echo $row2['tanggal'] ?></span>
                    <span class="notif mb-1">Bantuanmu telah terkonfirmasi !</span>
                    <span class="isi-notif">Harap check pada section bantuan, Terimakasih</span>
                  </div>
              <?php
                }
              }
            } else {
              ?>
              <p>Belum ada notif</p>
            <?php
            }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Lihat Selengkapnya</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Pesan -->

    <section id="akun">
      <div class="container">
        <div class="row">

          <div class="col-lg-2 content d-flex justify-content-center" id="profil-img">
            <img src="assets/img/testimonials/testimonials-2.jpg" class="profil-img" alt="">
          </div>

          <div class="col-lg-4 col-nama d-flex align-items-center">
            <h3 class="profil-nama" id="profil-nama">
              <?php echo $stmt['nama_umkm']; ?>
            </h3>
          </div>

          <div class="col-lg-2">

          </div>
          <div class="col-lg-4 col-edit content d-flex justify-content-center justify-content-lg-end">
            <a href="#editProfile" data-toggle="modal" class="btn btn-edit">Edit Profil</a>
          </div>
        </div>

        <div class="row mt-5 px-3">
          <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Detail</h2>
          </div>
          <div class="umkm-info" id="umkm-info">
            <ul>
              <?php echo '<li><strong>Kategori</strong>: ' . $stmt['kategori_umkm'] . '</li>'; ?>
              <?php echo '<li><strong>Alamat</strong>: ' . $stmt['alamat_umkm'] . '</li>'; ?>
              <?php echo '<li><strong>Kecamatan</strong>: ' . $stmt['kecamatan'] . '</li>'; ?>
              <?php echo '<li><strong>Nomor WhatsApp</strong>: <a href="https://api.whatsapp.com/send?phone=62812345678&text=Halo%20semua!">' . $stmt['notelp_umkm'] . '</a></li>'; ?>
            </ul>
          </div>
        </div>

        <div class="row mt-5 px-3">
          <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Deskripsi</h2>
          </div>
          <div class="umkm-desc" id="umkm-desc">
            <?php echo '<p style="text-align: justify;">' . $stmt['deskripsi_umkm'] . '</p>'; ?>
          </div>
        </div>

      </div>
    </section>

    <!-- Modal Edit Profile -->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfile" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-body p-4 px-5">

            <div class="main-content text-center">

              <a href="#" class="close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><span class="icon-close2"></span></span>
              </a>

              <form action="#">

                <label for="">Nama UMKM</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="namaUMKM" value="<?php echo $stmt['nama_umkm']; ?>" required>
                </div>

                <label for="">Deskripsi UMKM</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="deskripsiUMKM" style="height: 60px;" value="<?php echo $stmt['deskripsi_umkm']; ?>">
                </div>

                <label for="">Kategori UMKM</label>
                <div class="form-group mb-4">
                  <select class="form-select" id="kategoriUMKM" aria-label="Floating label select example" style="text-align: center;">
                    <?php if ($stmt['kategori_umkm'] == "makanan dan minuman") {
                      echo "<option value='makanan dan minuman' selected>Makanan dan Minuman</option>";
                    } else {
                      echo "<option value='makanan dan minuman'>Makanan dan Minuman</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kategori_umkm'] == "fashion dan pakaian") {
                      echo "<option value='fashion dan pakaian' selected>Fashion dan Pakaian</option>";
                    } else {
                      echo "<option value='fashion dan pakaian'>Fashion dan Pakaian</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kategori_umkm'] == "kerajinan tangan") {
                      echo "<option value='kerajinan tangan' selected>Kerajinan Tangan</option>";
                    } else {
                      echo "<option value='kerajinan tangan'>Kerajinan Tangan</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kategori_umkm'] == "pertanian dan peternakan") {
                      echo "<option value='pertanian dan peternakan' selected>Pertanian dan Peternakan</option>";
                    } else {
                      echo "<option value='pertanian dan peternakan'>Pertanian dan Peternakan</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kategori_umkm'] == "jasa") {
                      echo "<option value='jasa' selected>Jasa</option>";
                    } else {
                      echo "<option value='jasa'>Jasa</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kategori_umkm'] == "otomotif") {
                      echo "<option value='otomotif' selected>Otomotif</option>";
                    } else {
                      echo "<option value='otomotif'>Otomotif</option>";
                    }
                    ?>
                  </select>
                </div>

                <label for="">Alamat</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="alamatUMKM" value="<?php echo $stmt['alamat_umkm']; ?>" required>
                </div>

                <label for="">Kecamatan</label>
                <div class="form-group mb-4">
                  <select class="form-select" id="kecamatanUMKM" aria-label="Floating label select example" style="text-align: center;">
                    <?php if ($stmt['kecamatan'] == "Asemrowo") {
                      echo "<option value='Asemrowo' selected>Asemrowo</option>";
                    } else {
                      echo "<option value='Asemrowo'>Asemrowo</option>";
                    }
                    ?>
                    <?php if ($stmt['kecamatan'] == "Benowo") {
                      echo "<option value='Benowo' selected>Benowo</option>";
                    } else {
                      echo "<option value='Benowo'>Benowo</option>";
                    }
                    ?>
                    <?php if ($stmt['kecamatan'] == "Bubutan") {
                      echo "<option value='Bubutan' selected>Bubutan</option>";
                    } else {
                      echo "<option value='Bubutan'>Bubutan</option>";
                    }
                    ?>
                    <?php if ($stmt['kecamatan'] == "Bulak") {
                      echo "<option value='Bulak' selected>Bulak</option>";
                    } else {
                      echo "<option value='Bulak'>Bulak</option>";
                    }
                    ?>
                    <?php if ($stmt['kecamatan'] == "Dukuh Pakis") {
                      echo "<option value='Dukuh Pakis' selected>Dukuh Pakis</option>";
                    } else {
                      echo "<option value='Dukuh Pakis'>Dukuh Pakis</option>";
                    }
                    ?>
                    <?php if ($stmt['kecamatan'] == "Gayungan") {
                      echo "<option value='Gayungan' selected>Gayungan</option>";
                    } else {
                      echo "<option value='Gayungan'>Gayungan</option>";
                    }
                    ?>
                    <?php if ($stmt['kecamatan'] == "Genteng") {
                      echo "<option value='Genteng' selected>Genteng</option>";
                    } else {
                      echo "<option value='Genteng'>Genteng</option>";
                    }
                    ?>
                    <?php if ($stmt['kecamatan'] == "Gubeng") {
                      echo "<option value='Gubeng' selected>Gubeng</option>";
                    } else {
                      echo "<option value='Gubeng'>Gubeng</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Gunung Anyar") {
                      echo "<option value='Gunung Anyar' selected>Gunung Anyar</option>";
                    } else {
                      echo "<option value='Gunung Anyar'>Gunung Anyar</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Jambangan") {
                      echo "<option value='Jambangan' selected>Jambangan</option>";
                    } else {
                      echo "<option value='Jambangan'>Jambangan</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Karang Pilang") {
                      echo "<option value='Karang Pilang' selected>Karang Pilang</option>";
                    } else {
                      echo "<option value='Karang Pilang'>Karang Pilang</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Kenjeran") {
                      echo "<option value='Kenjeran' selected>Kenjeran</option>";
                    } else {
                      echo "<option value='Kenjeran'>Kenjeran</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Krembangan") {
                      echo "<option value='Krembangan' selected>Krembangan</option>";
                    } else {
                      echo "<option value='Krembangan'>Krembangan</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Lakarsantri") {
                      echo "<option value='Lakarsantri' selected>Lakarsantri</option>";
                    } else {
                      echo "<option value='Lakarsantri'>Lakarsantri</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Mulyorejo") {
                      echo "<option value='Mulyorejo' selected>Mulyorejo</option>";
                    } else {
                      echo "<option value='Mulyorejo'>Mulyorejo</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Pabean Cantian") {
                      echo "<option value='Pabean Cantian' selected>Pabean Cantian</option>";
                    } else {
                      echo "<option value='Pabean Cantian'>Pabean Cantian</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Pakal") {
                      echo "<option value='Pakal' selected>Pakal</option>";
                    } else {
                      echo "<option value='Pakal'>Pakal</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Rungkut") {
                      echo "<option value='Rungkut' selected>Rungkut</option>";
                    } else {
                      echo "<option value='Rungkut'>Rungkut</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Sambikerep") {
                      echo "<option value='Sambikerep' selected>Sambikerep</option>";
                    } else {
                      echo "<option value='Sambikerep'>Sambikerep</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Sawahan") {
                      echo "<option value='Sawahan' selected>Sawahan</option>";
                    } else {
                      echo "<option value='Sawahan'>Sawahan</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Semampir") {
                      echo "<option value='Semampir' selected>Semampir</option>";
                    } else {
                      echo "<option value='Semampir'>Semampir</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Simokerto") {
                      echo "<option value='Simokerto' selected>Simokerto</option>";
                    } else {
                      echo "<option value='Simokerto'>Simokerto</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Sukolilo") {
                      echo "<option value='Sukolilo' selected>Sukolilo</option>";
                    } else {
                      echo "<option value='Sukolilo'>Sukolilo</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Sukomanunggal") {
                      echo "<option value='Sukomanunggal' selected>Sukomanunggal</option>";
                    } else {
                      echo "<option value='Sukomanunggal'>Sukomanunggal</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Tambaksari") {
                      echo "<option value='Tambaksari' selected>Tambaksari</option>";
                    } else {
                      echo "<option value='Tambaksari'>Tambaksari</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Tandes") {
                      echo "<option value='Tandes' selected>Tandes</option>";
                    } else {
                      echo "<option value='Tandes'>Tandes</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Tegalsari") {
                      echo "<option value='Tegalsari' selected>Tegalsari</option>";
                    } else {
                      echo "<option value='Tegalsari'>Tegalsari</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Tenggilis Mejoyo") {
                      echo "<option value='Tenggilis Mejoyo' selected>Tenggilis Mejoyo</option>";
                    } else {
                      echo "<option value='Tenggilis Mejoyo'>Tenggilis Mejoyo</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Wiyung") {
                      echo "<option value='Wiyung' selected>Wiyung</option>";
                    } else {
                      echo "<option value='Wiyung'>Wiyung</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Wonocolo") {
                      echo "<option value='Wonocolo' selected>Wonocolo</option>";
                    } else {
                      echo "<option value='Wonocolo'>Wonocolo</option>";
                    }
                    ?>
                    <?php
                    if ($stmt['kecamatan'] == "Wonokromo") {
                      echo "<option value='Wonokromo' selected>Wonokromo</option>";
                    } else {
                      echo "<option value='Wonokromo'>Wonokromo</option>";
                    }
                    ?>
                  </select>
                </div>

                <label for="">Nomor WhatsApp</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="noWhatsApp" value="<?php echo $stmt['notelp_umkm']; ?>" required>
                </div>

                <div class="d-flex">
                  <div class="mx-auto">
                    <button class="btn btn-primary" id="editProfileBtn" data-target="#saveChanges" data-toggle="modal">Edit</button>
                    <!-- <a href="#saveChanges" data-toggle="modal" id="editProfileBtn" class="btn btn-primary">Edit</a> -->
                  </div>
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End of Modal Edit Profile -->

    <!-- Modal Simpan Perubahan Edit Profile -->
    <div class="modal fade" id="saveChanges" aria-hidden="true" aria-labelledby="saveChanges" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-0" data-dismiss="modal">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h3 class="text-center mb-4">Simpan Perubahan?</h3>
            <p class="text-center">Jika anda keluar, perubahan yang dilakukan tidak akan tersimpan</p>
          </div>
          <div class="modal-footer justify-content-center border-0">
            <button class="btn btn-primary mx-3" id="simpanPerubahan" data-bs-dismiss="modal">Simpan</button>
            <button class="btn btn-primary mx-3" id="batalPerubahan" data-dismiss="modal">Batal</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Modal Simpan Perubahan Edit Profile -->


    <!-- ======= Portfolio Section ======= -->
    <div class="container">

      <div class="row px-3">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4 justify-content-center">
          <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Produk</h2>
          </div>
        </div>
      </div>

      <div class="row px-3">
        <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
          <a href="#addProduct" data-toggle="modal" class="btn btn-edit align-self-center align-self-lg-end">Tambah Produk Baru</a>
        </div>
        <div class="col-lg-6 d-flex justify-content-center justify-content-lg-start">
          <a href="#addProductSold" data-toggle="modal" class="btn btn-edit align-self-center align-self-lg-start">Tambah Penjualan Produk</a>
        </div>
      </div>


      <div class="row portfolio" data-aos="fade-up">

        <div class="container">
          <div class="scrollable-container">
            <?php
            $produk = "SELECT * FROM products WHERE umkm_id = $id";
            $result = $conn->query($produk)->fetchAll();
            foreach ($result as $data) :
              $imagePath = $data['foto_produk'];
              if ($imagePath) :
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12 p-3 portfolio-item filter-app">
                  <div class="card card-block card h-100 card-img-top">
                    <div class="portfolio-wrap">
                      <img src="forms/<?= $imagePath ?>" class="img-fluid" alt="">
                      <div class="portfolio-links">
                        <a href="#deleteProduct" data-toggle="modal" title="Delete" class="deleteProdukBtn" data-product-id="<?= $data['id'] ?>"><i class="bx bx-x"></i></a>
                        <a href="#editProduct" data-toggle="modal" title="Edit" class="editProdukBtn" data-product-id-edit="<?= $data['id'] ?>"><i class="bx bx-pencil edit-icon"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif ?>
            <?php endforeach ?>

          </div>
        </div>

      </div>

    </div>
    <!--End Portfolio Section -->

    <!-- Modal Edit Produk -->
    <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="editProduct" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-body p-4 px-5">

            <div class="main-content text-center">

              <a class="close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><span class="icon-close2"></span></span>
              </a>
              <div class="mb-3">
                <h3>Edit Produk</h3>
              </div>

              <form method="POST">

                <label for="">Nama Produk</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="editNama" required>
                </div>

                <label for="">Deskripsi Produk</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="editDesc" style="height: 60px;" placeholder="" required>
                </div>

                <label for="">Harga Produk</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="editHarga" placeholder="" required>
                </div>

                <label for="">Upload Foto Produk</label>
                <div class="form-group mb-4">
                  <input class="form-control" type="file" id="editFoto" name="fotoProduk" required>
                </div>

                <div class="d-flex">
                  <div class="mx-auto">
                    <a href="#" class="btn btn-primary" id="editSubmit">Edit Produk</a>
                  </div>
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Edit Produk -->

    <!-- Modal Delete Produk -->
    <div class="modal fade" id="deleteProduct" aria-hidden="true" aria-labelledby="deleteProduct" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-0" data-dismiss="modal">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h3 class="text-center mb-4">Hapus Produk?</h3>
            <p class="text-center">Anda akan kehilangan data produk secara permanen. Apakah Anda yakin?</p>
          </div>
          <div class="modal-footer justify-content-center border-0">
            <button class="btn btn-primary mx-3" id="yakinDeleteBtn" data-bs-dismiss="modal">Yakin</button>
            <a class="close-btn" data-dismiss="modal" aria-label="Close">
              <button class="btn btn-secondary mx-3" data-bs-dismiss="modal">Tidak</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Modal Delete Produk -->


    <!-- Tabel Laporan Keuangan -->
    <div class="container mt-5">
      <div class="section-title" data-aos="fade-in" data-aos-delay="100">
        <h2>Laporan Keuangan</h2>
      </div>
      <div class="table-responsive rounded-table">
        <table id="tablePendapatan" class="table table-striped nowrap" style="width:100%">
          <thead>
            <tr>
              <th scope="col" class="center-contents">Date</th>
              <th scope="col" class="center-contents">Omzet</th>
              <th scope="col" class="center-contents">Pendapatan</th>
              <th scope="col" class="center-contents">Pengeluaran</th>
            </tr>
          </thead>
          <tbody class="center-contents">
            <?php echo $monthlyReport; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- End of Tabel Laporan Keuangan -->

    <!-- Grafik Laporan Keuangan -->
    <div class="container mt-5">
      <div class="section-title" data-aos="fade-in" data-aos-delay="100">
        <h2>Grafik Laporan Keuangan</h2>
      </div>

      <div class="row px-3 align-items-center">
        <!-- Filter -->
        <div class="col-lg-6">
          <div class="btn-group rounded-pill" role="group" aria-label="Filter buttons">
            <button type="button" class="btn btn-filter" data-filter="all">All</button>
            <button type="button" class="btn btn-filter" data-filter="Omzet">Omzet</button>
            <button type="button" class="btn btn-filter" data-filter="Pendapatan">Pendapatan</button>
            <button type="button" class="btn btn-filter" data-filter="Pengeluaran">Pengeluaran</button>
            <button type="button" class="btn btn-filter" data-filter="Penjualan">Penjualan</button>
          </div>
        </div>

        <!-- Filter Start Year -->
        <div class="col-lg-2">
          <button class="btn btn-filterStartYear dropdown-toggle w-100" type="button" id="startYearFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Start Year
          </button>
          <div class="dropdown-menu startYearDropdown" aria-labelledby="startYearFilter">
            <?php echo $startYearOptions; ?>
          </div>
        </div>
        <!-- End of Filter Start Year -->

        <div class="col-lg-1">
          <hr class="my-1" style="width: 20px; margin:auto;">
        </div>

        <!-- Filter End Year -->
        <div class="col-lg-2">
          <button class="btn btn-filterEndYear dropdown-toggle w-100" type="button" id="endYearFilter" data-toggle="dropdown" aria-expanded="false">
            End Year
          </button>
          <div class="dropdown-menu endYearDropdown" aria-labelledby="endYearFilter">
            <?php echo $endYearOptions; ?>
          </div>
        </div>
        <!-- End of Filter End Year -->

        <!-- Button Go for Filter Year -->
        <div class="col-lg-1">
          <button class="btn btn-go w-100" type="button" id="goFilter" data-toggle="dropdown" aria-expanded="false">
            Go
          </button>
        </div>
        <!-- End of Button Go for Filter Year -->
      </div>

      <!-- Grafik -->
      <div class="laporan" id="laporan">
        <div class="row mt-4 px-3" id="grafik-laporan">

        </div>
      </div>
      <!-- End of Grafik Laporan Keuangan -->
    </div>
    <!-- End Laporan -->

    <!-- Tabel Bantuan -->
    <div class="container mt-5">
      <div class="section-title" data-aos="fade-in" data-aos-delay="100">
        <h2>Pengajuan Bantuan</h2>
      </div>
      <table id="tableBantuan" class="table table-striped nowrap" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Alasan</th>
            <th>Kebutuhan</th>
            <th>Keterangan</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM bantuan";
          $stmt = $conn->query($sql)->fetchAll();
          $no = 1;
          foreach ($stmt as $row) {
          ?>
            <tr>
              <td><?php echo $no ?></td>
              <?php $no++ ?>

              <td><?php echo $row['tanggal'] ?></td>
              <td><?php echo $row['alasan'] ?></td>
              <td><?php echo $row['kebutuhan_dana_nominal'] ?></td>
              <td><?php echo $row['keterangan'] ?></td>
              <td><?php if ($row['status'] == 1) {
                    echo 'Sudah Disetujui';
                  } else {
                    echo 'Belum Disetujui';
                  }

                  ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
    <!-- End of Tabel Bantuan -->

    <!-- Tombol Lapor, Ajukan Bantuan, Settings -->
    <div class="container mt-4">
      <div class="row px-3 ">
        <div class="d-grid col-4">
          <a href="laporPendapatan.php" class="btn btn-primary px-4 py-3">Lapor Pendapatan</a>
        </div>
        <div class="d-grid col-4">
          <a href="bantuan.php" class="btn btn-primary px-4 py-3">Ajukan Bantuan</a>
        </div>
        <div class="d-grid col-4">
          <a href="" class="btn btn-primary px-4 py-3">Settings</a>
        </div>
      </div>
    </div>
    <!-- End of Tombol Lapor, Ajukan Bantuan, Settings -->

    <!-- Modal Tambah Produk -->
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-body p-4 px-5">

            <div class="main-content text-center">

              <a href="#" class="close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><span class="icon-close2"></span></span>
              </a>

              <form method="POST">

                <label for="">Nama Produk</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="namaProduk" placeholder="Masukkan Nama Produk" required>
                </div>

                <label for="">Deskripsi Produk</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="descProduk" style="height: 60px;" placeholder="" required>
                </div>

                <label for="">Harga Produk</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="hargaProduk" style="height: 60px;" placeholder="Rp 35.000" required>
                </div>

                <label for="">Upload Foto Produk</label>
                <div class="form-group mb-4">
                  <input class="form-control" type="file" id="fotoProduk" name="fotoProduk" required>
                </div>

                <div class="d-flex">
                  <div class="mx-auto">
                    <a href="#" class="btn btn-primary" id="tambahProdukBtn">Tambah Produk</a>
                  </div>
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End of Modal Tambah Produk -->

    <!-- Modal Penjualan Produk -->
    <div class="modal fade" id="addProductSold" tabindex="-1" role="dialog" aria-labelledby="addProductSold" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-body p-4 px-5">

            <div class="main-content text-center">

              <a href="#" class="close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><span class="icon-close2"></span></span>
              </a>

              <form action="#">

                <label for="">Nama Produk</label>
                <div class="form-group mb-4">
                  <select class="form-select" id="produkUMKM" aria-label="Floating label select example" style="text-align: center;">
                    <?php
                    if ($stmt3 != null) {
                      foreach ($stmt3 as $product) {
                        echo '<option value="' . $product['nama_produk'] . '">' . $product['nama_produk'] . '</option>';
                      }
                    } else {
                      // Tidak ada produk
                      // echo '<option value="">Tidak ada produk</option>';
                    }
                    ?>
                  </select>
                </div>

                <label for="">Jumlah Produk Terjual</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" id="jumlahProdukTerjual" placeholder="" required>
                </div>

                <div class="d-flex">
                  <div class="mx-auto">
                    <a href="#" class="btn btn-primary" id="tambahProdukTerjualBtn">Tambah</a>
                  </div>
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End of Modal Penjualan Produk -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "template/footer.php"; ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <!-- Chart -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>
  <!-- <script src="https://cdn.canvasjs.com/ga/canvasjs.stock.min.js"></script> -->
  <!-- <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script> -->

  <script>
    new DataTable('#tableBantuan', {
      scrollX: true,
      destroy: true,
      retrieve: true
    });

    new DataTable('#tablePendapatan', {
      scrollX: true,
      destroy: true,
      retrieve: true
    });

    function generateCanvas(xData, yData, chartId, chartTitle, type) {
      var chart = '<div class="col-lg-6 mx-auto">';
      chart += '<canvas id="' + chartId + '"></canvas>'
      chart += '</div>';
      var grafik_laporan = $('#grafik-laporan');
      grafik_laporan.append(chart);

      if (type == 1) {
        generateLineChart(xData, yData, chartId, chartTitle)
      } else {
        generatePieChart(xData, yData, chartId, chartTitle)
      }

    }

    function generateLineChart(xData, yData, chartId, chartTitle) {
      new Chart(chartId, {
        type: "line",
        data: {
          labels: xData,
          datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.1)",
            data: yData
          }]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              ticks: {
                min: Math.min(...yData),
                max: Math.max(...yData)
              }
            }],
          },
          title: {
            display: true,
            text: chartTitle,
            fontColor: 'grey',
            fontSize: 20
          }
        }
      });
    }

    function generatePieChart(xData, yData, chartId, chartTitle) {
      const barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
      ];

      new Chart(chartId, {
        type: "pie",
        data: {
          labels: xData,
          datasets: [{
            backgroundColor: barColors,
            data: yData
          }]
        },
        options: {
          title: {
            display: true,
            text: chartTitle,
            fontColor: 'grey',
            fontSize: 20
          }
        }
      });
    }

    $(document).ready(function() {


      // Dropdown Filter Year
      var selectedStartYear = ''
      var selectedEndYear = ''
      $('.startYearDropdown .dropdown-item').on('click', function(e) {
        e.preventDefault()
        selectedStartYear = $(this).text();
        $('#startYearFilter').text(selectedStartYear);
      });

      $('.endYearDropdown .dropdown-item').on('click', function(e) {
        e.preventDefault()
        selectedEndYear = $(this).text();
        $('#endYearFilter').text(selectedEndYear);
      });

      $('.btn-filter').on('click', function() {
        startYear = parseInt(selectedStartYear, 10);
        endYear = parseInt(selectedEndYear, 10);
        $('[id^="chartPendapatan"]').hide();
        $('[id^="chartPengeluaran"]').hide();
        $('[id^="chartOmzet"]').hide();
        $('[id^="chartPenjualan"]').hide();

        $('canvas').css({
          'width': '',
          'height': ''
        });
        var filter = $(this).data('filter');
        if (filter !== 'all') {
          $('[id^="chart' + filter + '"]').show();
          $('[id^="chart' + filter + '"] canvas').css({
            'width': '800px',
            'height': '400px'
          });
        } else {
          $('[id^="chartPendapatan"]').show();
          $('[id^="chartPengeluaran"]').show();
          $('[id^="chartOmzet"]').show();
          $('[id^="chartPenjualan"]').show();
        }
      });

      // $('.btn-filter').click(function() {
      //   $('.grafik-pendapatan, .grafik-pengeluaran, .grafik-omzet, .grafik-penjualan').hide();
      //   $('canvas').css({
      //     'width': '',
      //     'height': ''
      //   });
      //   var filter = $(this).data('filter');

      //   if (filter !== 'all') {
      //     $('.grafik-' + filter).show();
      //     $('.grafik-' + filter + ' canvas').css({
      //       'width': '800px',
      //       'height': '400px'
      //     });
      //   } else {
      //     $('.grafik-pendapatan, .grafik-pengeluaran, .grafik-omzet, .grafik-penjualan').show();
      //   }
      // });


      // Filter Grafik All/Omzet/Pendapatan/Pengeluaran/Penjualan
      $('#goFilter').on('click', function() {
        if (selectedStartYear != '' && selectedEndYear != '') {
          startYear = parseInt(selectedStartYear, 10);
          endYear = parseInt(selectedEndYear, 10);
          $('[id^="chartPendapatan"]').hide();
          $('[id^="chartPengeluaran"]').hide();
          $('[id^="chartOmzet"]').hide();
          $('[id^="chartPenjualan"]').hide();

          $('[id^="chartPendapatan"][id*="' + startYear + '"][id*="' + endYear + '"]').show();
          $('[id^="chartPengeluaran"][id*="' + startYear + '"][id*="' + endYear + '"]').show();
          $('[id^="chartOmzet"][id*="' + startYear + '"][id*="' + endYear + '"]').show();
          $('[id^="chartPenjualan"][id*="' + startYear + '"][id*="' + endYear + '"]').show();
        } else {
          // alert
        }
      });

      // Grafik Omzet, Pendapatan, Pengeluaran (Line Chart)
      var id = <?php echo $id; ?>;
      <?php
      if (isset($minYears)) {
          echo "minYears = $minYears;";
      } else {
          echo "minYears = 0;";
      }

      if (isset($maxYears)) {
          echo "maxYears = $maxYears;";
      } else {
          echo "maxYears = 0;";
      }
      ?>
      var grafik_laporan = $('#grafik-laporan');
      grafik_laporan.empty();

      $.ajax({
        url: "getReportProcess.php",
        type: "POST",
        data: {
          id: id,
          startYear: minYears,
          endYear: maxYears
        },
        success: function(result) {

          var response = JSON.parse(result);
          Object.keys(response.dataByYear).forEach(function(year) {
            var dataBulan = response.dataByYear[year].bulan;
            var dataOmzet = response.dataByYear[year].omzet;
            var dataPendapatan = response.dataByYear[year].pendapatan;
            var dataPengeluaran = response.dataByYear[year].pengeluaran;

            generateCanvas(dataBulan, dataPendapatan, "chartPendapatan" + year, "Pendapatan " + year, 1);
            generateCanvas(dataBulan, dataOmzet, "chartOmzet" + year, "Omzet " + year, 1);
            generateCanvas(dataBulan, dataPengeluaran, "chartPengeluaran" + year, "Pengeluaran " + year, 1);
          });
        }
      });

      // Grafik Penjualan (Pie Chart)
      <?php foreach ($years as $tahun) : ?>
        generateCanvas(<?php echo json_encode($productsByYear[$tahun]); ?>, <?php echo json_encode($terjualByYear[$tahun]); ?>, "chartPenjualan<?php echo $tahun; ?>", "Penjualan Produk <?php echo $tahun; ?>", 0);
      <?php endforeach; ?>


      // Tambah Produk
      $('#tambahProdukBtn').on('click', function() {
        event.preventDefault();
        var form_profile = new FormData();

        var namaProduk = $('#namaProduk').val();
        var deskripsiProduk = $('#descProduk').val();
        var hargaProduk = $('#hargaProduk').val();
        var fotoProduk = $('#fotoProduk')[0].files;
        var umkm_id = <?php echo $id; ?>;

        form_profile.append('umkm_id', umkm_id);
        form_profile.append('namaProduk', namaProduk);
        form_profile.append('deskripsiProduk', deskripsiProduk);
        form_profile.append('hargaProduk', hargaProduk);
        form_profile.append('fotoProduk', fotoProduk[0]);

        if (namaProduk != '' && hargaProduk != '' && fotoProduk != '') {
          $.ajax({
            url: "forms/add_new_product.php",
            method: 'POST',
            data: form_profile,
            contentType: false,
            processData: false,
            success: function(result) {
              if (result == 1) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Produk Baru Berhasil Ditambahkan!'
                }).then(function() {
                  window.location.reload();
                });
                // window.location.href = "index.php";
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Error!'
                });
              }

            }
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error!'
          });
        }


      });

      // Tambah Penjualan Produk
      $('#tambahProdukTerjualBtn').on('click', function() {
        var namaProduk = $('#produkUMKM').val();
        var jumlahProdukTerjual = $('#jumlahProdukTerjual').val();
        jumlahProdukTerjual = parseInt(jumlahProdukTerjual, 10);

        $.ajax({
          url: "forms/add_product_sold.php",
          type: "POST",
          data: {
            id: id,
            namaProduk: namaProduk,
            jumlahProdukTerjual: jumlahProdukTerjual
          },
          success: function(result) {
            if (result == 1) {
              Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Berhasil menambahkan penjualan produk',
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal menambahkan penjualan produk!'
              });
            }
          }
        });
      });

      // Delete Produk
      $('.deleteProdukBtn').on('click', function() {
        var productId = $(this).data('product-id');

        $('#yakinDeleteBtn').on('click', function() {
          $.ajax({
            url: "forms/delete_product.php",
            type: "POST",
            data: {
              id: id,
              productId: productId
            },
            success: function(result) {
              if (result == 1) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Berhasil menghapus produk!',
                })
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal',
                  text: 'Gagal menghapus produk!'
                });
              }
            }
          });
        });

      });

      // Edit Profile
      $('#editProfileBtn').on('click', function() {
        var namaUMKM_edited = $('#namaUMKM').val();
        var deskripsiUMKM_edited = $('#deskripsiUMKM').val();
        var kategoriUMKM_edited = $('#kategoriUMKM').val();
        var alamatUMKM_edited = $('#alamatUMKM').val();
        var kecamatanUMKM_edited = $('#kecamatanUMKM').val();
        var noWhatsApp_edited = $('#noWhatsApp').val();
        var id = <?php echo $id; ?>;

        $('#simpanPerubahan').on('click', function() {
          $.ajax({
            url: "forms/edit_profile.php",
            type: "POST",
            data: {
              id: id,
              namaUMKM: namaUMKM_edited,
              deskripsiUMKM: deskripsiUMKM_edited,
              kategoriUMKM: kategoriUMKM_edited,
              alamatUMKM: alamatUMKM_edited,
              kecamatanUMKM: kecamatanUMKM_edited,
              noWhatsApp: noWhatsApp_edited
            },
            success: function(result) {
              if (result == 1) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Berhasil update profile!',
                })
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal',
                  text: 'Gagal update profile!'
                });
              }
            }
          });
        });


      });

    });

    // Edit Produk
    $('.editProdukBtn').on('click', function() {
      var productId = $(this).data('product-id-edit');

      $('#editSubmit').on('click', function() {
        event.preventDefault();
        var form_edit = new FormData();

        var editNama = $('#editNama').val();
        var editDesc = $('#editDesc').val();
        var editHarga = $('#editharga').val();
        var editFoto = $('#editFoto')[0].files;
        var umkm_id = <?php echo $id; ?>;

        form_edit.append('productId', productId);
        form_edit.append('editNama', editNama);
        form_edit.append('editDesc', editDesc);
        form_edit.append('editHarga', editHarga);
        form_edit.append('editFoto', editFoto[0]);
        form_edit.append('umkm_id', umkm_id);

        if (editNama != '' && editHarga != '' && editFoto != '') {
          $.ajax({
            url: "forms/edit_product.php",
            method: "POST",
            data: form_edit,
            contentType: false,
            processData: false,
            success: function(result) {
              console.log(result);
              alert(result);
              if (result == 1) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Berhasil edit produk!',
                }).then(function() {
                  window.location.reload();
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal',
                  text: 'Gagal edit produk!'
                });
              }
            }
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error!'
          });
        }

      });

    });
  </script>

</body>

</html>