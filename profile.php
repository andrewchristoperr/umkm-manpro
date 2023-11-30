<?php
require 'connect.php';
session_start();

if (!isset($_SESSION['login'])) {
  header('location: login.php');
  exit;
}

$id = $_SESSION['login'];

$queryYears = "SELECT DISTINCT YEAR(date) AS report_year FROM umkm_monthly_report WHERE umkm_id = ? ORDER BY report_year ASC";
$result = $conn->prepare($queryYears);
$result->execute([$id]);
$data = $result->fetchAll();

$startYearOptions = '';
$endYearOptions = '';
$years = [];
foreach ($data as $year) {
  $startYearOptions .= '<a class="dropdown-item" id="startYear" href="#">' . $year['report_year'] . '</a>';
  $endYearOptions .= '<a class="dropdown-item" id="endYear" href="#">' . $year['report_year'] . '</a>';
  $years[] = $year['report_year'];
}
$minYears = min($years);
$maxYears = max($years);

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

$sql = "SELECT * FROM bantuan WHERE id_umkm = $id AND status = 1";
$stmt2 = $conn->query($sql)->fetchAll();


$sql2 = "SELECT * FROM umkm_products WHERE umkm_id = $id";
$stmt3 = $conn->query($sql2)->fetchAll();

$productsByYear = [];
$terjualByYear = [];

// Loop untuk setiap tahun dari $minYears hingga $maxYears
for ($year = $minYears; $year <= $maxYears; $year++) {
    $productsByYear[$year] = [];
    $terjualByYear[$year] = [];
    
    // Loop untuk setiap produk pada tahun tertentu
    foreach ($stmt3 as $products) {
        // Cek apakah produk tersebut dijual pada tahun yang sedang diiterasi
        if ($products['tahun'] == $year) {
            $productsByYear[$year][] = $products['name'];
            $terjualByYear[$year][] = $products['jumlah_terjual'];
        }
    }
}

$productsByYearJSON = json_encode($productsByYear);
$terjualByYearJSON = json_encode($terjualByYear);

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
    .modal-dialog {
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

  </style>
</head>

<body>

  <?php include "template/header_profile.php"; ?>


  <main id="main">
    <!-- Modal Pesan -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
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

            </h3>
          </div>

          <div class="col-lg-2">

          </div>
          <div class="col-lg-4 col-edit content d-flex justify-content-center justify-content-lg-end">
            <a href="editProfile.php" class="btn btn-edit">Edit Profil</a>
          </div>
        </div>

        <div class="row mt-5 px-3">
          <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Detail</h2>
          </div>
          <div class="umkm-info" id="umkm-info">
          </div>
        </div>

        <div class="row mt-5 px-3">
          <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Deskripsi</h2>
          </div>
          <div class="umkm-desc" id="umkm-desc">
          </div>
        </div>

      </div>
    </section>

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
        <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end">
          <a href="#add" data-toggle="modal" class="btn btn-edit align-self-center align-self-lg-start">Tambah
            Produk</a>
        </div>
      </div>


      <div class="row portfolio" data-aos="fade-up">

        <div class="container">
          <div class="scrollable-container">

            <div class="col-lg-4 col-md-6 col-sm-12 p-3 portfolio-item filter-app">
              <div class="card card-block">
                <div class="portfolio-wrap">
                  <img src="assets/img/produk/produk4.jpg" class="img-fluid" alt="">
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-x"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-pencil edit-icon"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 p-3 portfolio-item filter-app">
              <div class="card card-block">
                <div class="portfolio-wrap">
                  <img src="assets/img/produk/produk8.jpg" class="img-fluid" alt="">
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-x"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-pencil edit-icon"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 p-3 portfolio-item filter-app">
              <div class="card card-block">
                <div class="portfolio-wrap">
                  <img src="assets/img/produk/produk6.jpg" class="img-fluid" alt="">
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-x"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-pencil edit-icon"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 p-3 portfolio-item filter-app">
              <div class="card card-block">
                <div class="portfolio-wrap">
                  <img src="assets/img/produk/produk3.jpg" class="img-fluid" alt="">
                  <div class="portfolio-links">
                    <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-x"></i></a>
                    <a href="#" data-toggle="modal" data-target="#editModal" title="Edit Produk"><i class="bx bx-pencil edit-icon"></i></a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
    <!--End Portfolio Section -->

    <!-- Modal Edit Produk -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editProduct" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-body p-4 px-5">

            <div class="main-content text-center">

              <a href="#" class="close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><span class="icon-close2"></span></span>
              </a>

              <form action="#">

                <label for="">Edit Nama Produk</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" placeholder="Masukkan Nama Produk">
                </div>

                <div class="d-flex">
                  <div class="mx-auto">
                    <a href="#" class="btn btn-primary">Edit Produk</a>
                  </div>
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Edit Produk -->


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



      <!-- <div class="row mt-4 px-3">
        <div class="col-lg-6 mx-auto grafik-pendapatan" id="grafik-pendapatan">
          <h3 class="text-center">Total Pendapatan Tahun 2023</h3>
          <canvas id="chartPendapatan"></canvas>
        </div>

        <div class="col-lg-6 mx-auto grafik-pengeluaran" id="grafik-pengeluaran">
          <h3 class="text-center">Total Pengeluaran Tahun 2023</h3>
          <canvas id="chartPengeluaran"></canvas>
        </div>
      </div>

      <div class="row mt-3 px-3">
        <div class="col-lg-6 mx-auto grafik-omzet" id="grafik-omzet">
          <h3 class="text-center">Total Omzet Tahun 2023</h3>
          <canvas id="chartOmzet"></canvas>
        </div>

        <div class="col-lg-6 mx-auto grafik-penjualan" id="grafik-penjualan">
          <h3 class="text-center">Penjualan Produk</h3>
          <canvas id="chartProduk"></canvas>
        </div>
      </div> -->
    </div>
    <!-- End Laporan -->

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
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
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
                  <input type="text" class="form-control text-center" placeholder="Masukkan Nama Produk" required>
                </div>

                <label for="">Deskripsi Produk</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" style="height: 60px;" placeholder="" required>
                </div>

                <label for="">Harga Produk</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" style="height: 60px;" placeholder="Rp 35.000" required>
                </div>

                <label for="">Upload Foto Produk</label>
                <div class="form-group mb-4">
                  <input class="form-control" type="file" id="formulir" name="formulir" required>
                </div>

                <div class="d-flex">
                  <div class="mx-auto">
                    <a href="#" class="btn btn-primary">Tambah Produk</a>
                  </div>
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Tambah Produk -->

    <!-- Modal Edit Produk -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editProduct" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-body p-4 px-5">

            <div class="main-content text-center">

              <a href="#" class="close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><span class="icon-close2"></span></span>
              </a>

              <form action="#">

                <label for="">Edit Nama Produk</label>
                <div class="form-group mb-4">
                  <input type="text" class="form-control text-center" placeholder="Masukkan Nama Produk">
                </div>

                <div class="d-flex">
                  <div class="mx-auto">
                    <a href="#" class="btn btn-primary">Edit Produk</a>
                  </div>
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Edit Produk -->

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

      if (type==1){
        generateLineChart(xData, yData, chartId, chartTitle)
      }else {
        generatePieChart(xData,yData,chartId,chartTitle)
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

    // new Chart("chartProduk", {
    //   type: "pie",
    //   data: {
    //     labels: xValues4,
    //     datasets: [{
    //       backgroundColor: barColors,
    //       data: yValues4
    //     }]
    //   },
    //   options: {
    //     title: {
    //       display: true,
    //       text: "Top 5 Penjualan Produk Tahun 2023",
    //       fontColor: 'grey',
    //       fontSize: 28,
    //       font: {
    //         // family: "Raleway",
    //         // weight: 'bold',
    //       }
    //     }
    //   }
    // });

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

      // Ambil & tampilin data-data profil UMKM
      var id = "<?php echo $_SESSION['login']; ?>";
      $.ajax({
        url: "getProfileProcess.php",
        type: "POST",
        data: {
          id: id
        },
        success: function(data) {
          var dataObj = JSON.parse(data);
          var namaUMKM = dataObj.nama_umkm;
          umkmInfo = '<ul>';
          umkmInfo += '<li><strong>Kategori</strong>: ' + dataObj.kategori_umkm + '</li>';
          umkmInfo += '<li><strong>Alamat</strong>: ' + dataObj.alamat_umkm + '</li>';
          umkmInfo += '<li><strong>Kecamatan</strong>: ' + dataObj.kecamatan + '</li>';
          umkmInfo += '<li><strong>Nomor WhatsApp</strong>: <a href="https://api.whatsapp.com/send?phone=62812345678&text=Halo%20semua!">' + dataObj.notelp_umkm + '</a></li>';
          umkmInfo += '</ul>';

          var deskripsi = '<p style="text-align: justify;">' + dataObj.deskripsi_umkm + '</p>';

          document.getElementById('profil-nama').innerHTML = namaUMKM;
          document.getElementById('umkm-info').innerHTML = umkmInfo;
          document.getElementById('umkm-desc').innerHTML = deskripsi;
        }
      });


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
        // $('[id^="chartProduk"]').hide();

        $('canvas').css({
          'width': '',
          'height': ''
        });
        var filter = $(this).data('filter');
        console.log(filter)
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
          // $('[id^="chartProduk"]').show();
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

      $('#goFilter').on('click', function() {
        if (selectedStartYear != '' && selectedEndYear != '') {
          startYear = parseInt(selectedStartYear, 10);
          endYear = parseInt(selectedEndYear, 10);
          $('[id^="chartPendapatan"]').hide();
          $('[id^="chartPengeluaran"]').hide();
          $('[id^="chartOmzet"]').hide();
          // $('[id^="chartProduk"]').hide();

          $('[id^="chartPendapatan"][id*="' + startYear + '"][id*="' + endYear + '"]').show();
          $('[id^="chartPengeluaran"][id*="' + startYear + '"][id*="' + endYear + '"]').show();
          $('[id^="chartOmzet"][id*="' + startYear + '"][id*="' + endYear + '"]').show();
          // $('[id^="chartProduk"][id*="' + startYear + '"][id*="' + endYear + '"]').show();
        } else {
          // alert
        }
      });

      var minYears = <?php echo $minYears; ?>;
      var maxYears = <?php echo $maxYears; ?>;
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

      

      var productsByYear = <?php echo $productsByYearJSON; ?>;
      var terjualByYear = <?php echo $terjualByYearJSON; ?>;
      for (year = minYears; year <= maxYears; year++) {
        console.log(productsByYear[year]);
        generateCanvas(productsByYear[year], terjualByYear[year], "chartPenjualan" + year, "Penjualan Produk " + year, 0)
      }
      
      

    });
  </script>

</body>

</html>