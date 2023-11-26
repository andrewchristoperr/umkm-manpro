<?php 
require "connect"
  session_start();
  
  if(!isset($_SESSION['login'])){
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
  foreach ($data as $year) {
    $startYearOptions .= '<a class="dropdown-item" id="startYear" href="#">' . $year['report_year'] . '</a>';
    $endYearOptions .= '<a class="dropdown-item" id="endYear" href="#">' . $year['report_year'] . '</a>';
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

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Sweet Alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">

  <style>
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

    #chartPendapatan,
    #chartPengeluaran,
    #chartOmzet,
    #chartProduk {
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      padding: 20px;
      border-radius: 10px;
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
            <!-- <ul>
              <li><strong>Kategori</strong>: Kerajinan Tangan</li>
              <li><strong>Alamat</strong>: Jl. Arif Rahman Hakim 1</li>
              <li><strong>Kecamatan</strong>: Wonocolo</li>
              <li><strong>Nomor WhatsApp</strong>: <a href="https://api.whatsapp.com/send?phone=62812345678&text=Halo%20semua!">0812345678</a></li>
            </ul> -->
          </div>
        </div>

        <div class="row mt-5 px-3">
          <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Deskripsi</h2>
          </div>
          <div class="umkm-desc" id="umkm-desc">
            <!-- <p style="text-align: justify;">UMKM Pandan Wangi adalah sebuah usaha kecil menengah yang berfokus pada
              kategori kerajinan tangan dengan spesialisasi dalam produk-produk berbahan dasar pandan. Kami membuat
              berbagai macam barang seni dan kerajinan, mulai dari anyaman pandan tradisional hingga kreasi modern yang
              memadukan teknik tradisional dengan desain kontemporer. Produk unggulan kami meliputi tas tangan,
              keranjang, dan dekorasi rumah dari pandan yang memberikan sentuhan eksotis dan alami. Pandan Wangi
              menonjolkan keunikan setiap karya kami melalui penggunaan warna-warna cerah dan pola anyaman yang rumit.
              Dengan memadukan keahlian tradisional dengan inovasi desain, kami tidak hanya menciptakan produk
              berkualitas tinggi tetapi juga berperan dalam melestarikan warisan budaya lokal serta memberikan
              kontribusi positif terhadap perkembangan ekonomi lokal.</p> -->
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
                  <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
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
                  <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
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
                  <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
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
                  <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
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


    <!-- Laporan -->
    <div class="container mt-5">
      <div class="section-title" data-aos="fade-in" data-aos-delay="100">
        <h2>Laporan Pendapatan</h2>
      </div>

      <div class="row px-3 align-items-center">
        <div class="col-lg-6">
          <div class="btn-group rounded-pill" role="group" aria-label="Filter buttons">
            <button type="button" class="btn btn-filter" data-filter="all">All</button>
            <button type="button" class="btn btn-filter" data-filter="omzet">Omzet</button>
            <button type="button" class="btn btn-filter" data-filter="pendapatan">Pendapatan</button>
            <button type="button" class="btn btn-filter" data-filter="pengeluaran">Pengeluaran</button>
            <button type="button" class="btn btn-filter" data-filter="penjualan">Penjualan</button>
          </div>
        </div>

        <div class="col-lg-2">
          <button class="btn btn-filterStartYear dropdown-toggle w-100" type="button" id="startYearFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Start Year
          </button>
          <div class="dropdown-menu startYearDropdown" aria-labelledby="startYearFilter">
            <?php echo $startYearOptions; ?>
          </div>
        </div>

        <div class="col-lg-1">
          <hr class="my-1" style="width: 20px; margin:auto;">
        </div>

        <div class="col-lg-2">
          <button class="btn btn-filterEndYear dropdown-toggle w-100" type="button" id="endYearFilter" data-toggle="dropdown" aria-expanded="false">
            End Year
          </button>
          <div class="dropdown-menu endYearDropdown" aria-labelledby="endYearFilter">
            <?php echo $endYearOptions; ?>
          </div>
        </div>

        <div class="col-lg-1">
          <button class="btn btn-go w-100" type="button" id="goFilter" data-toggle="dropdown" aria-expanded="false">
            Go
          </button>
        </div>

      </div>

      <div class="row mt-4 px-3">
        <div class="col-lg-6 mx-auto grafik-pendapatan" id="grafik-pendapatan">
          <!-- <h3 class="text-center">Total Pendapatan Tahun 2023</h3> -->
          <canvas id="chartPendapatan"></canvas>
        </div>
        <!-- <div class="col-lg-1">

          </div> -->
        <div class="col-lg-6 mx-auto grafik-pengeluaran" id="grafik-pengeluaran">
          <!-- <h3 class="text-center">Total Pengeluaran Tahun 2023</h3> -->
          <canvas id="chartPengeluaran"></canvas>
        </div>
      </div>

      <div class="row mt-3 px-3">
        <div class="col-lg-6 mx-auto grafik-omzet" id="grafik-omzet">
          <!-- <h3 class="text-center">Total Omzet Tahun 2023</h3> -->
          <canvas id="chartOmzet"></canvas>
        </div>

        <div class="col-lg-6 mx-auto grafik-penjualan" id="grafik-penjualan">
          <!-- <h3 class="text-center">Penjualan Produk</h3> -->
          <canvas id="chartProduk"></canvas>
        </div>
      </div>
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
                  <input type="text" class="form-control text-center" placeholder="Masukkan Nama Produk">
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

  <script>
    const xValues = ["Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15, 10];

    new Chart("chartPendapatan", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              min: 6,
              max: 16
            }
          }],
        },
        title: {
          display: true,
          text: "Total Pendapatan Tahun 2023",
          fontColor: 'grey',
          fontSize: 28,
          font: {
            // family: "Raleway",
            // weight: 'bold',
          }
        }
      }
    });

    const xValues2 = ["Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const yValues2 = [8, 9, 14, 9, 9, 10, 7, 8, 10, 11, 14, 15];

    new Chart("chartPengeluaran", {
      type: "line",
      data: {
        labels: xValues2,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(178,34,33,1.0)",
          borderColor: "rgba(178,34,33,0.1)",
          data: yValues2
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              min: 6,
              max: 16
            }
          }],
        },
        title: {
          display: true,
          text: "Total Pengeluaran Tahun 2023",
          fontColor: 'grey',
          fontSize: 28,
          font: {
            // family: "Raleway",
            // weight: 'bold',
          }
        }
      }
    });

    const xValues3 = ["Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const yValues3 = [10, 12, 11, 9, 10, 14, 13, 11, 14, 14, 15, 12];

    new Chart("chartOmzet", {
      type: "line",
      data: {
        labels: xValues3,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(138, 43, 226,1.0)",
          borderColor: "rgba(138, 43, 226,0.1)",
          data: yValues3
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              min: 6,
              max: 16
            }
          }],
        },
        title: {
          display: true,
          text: "Total Omzet Tahun 2023",
          fontColor: 'grey',
          fontSize: 28,
          font: {
            // family: "Raleway",
            // weight: 'bold',
          }
        }
      }
    });

    const xValues4 = ["Buku", "Tas", "Baju", "Pensil", "Jepit"];
    const yValues4 = [55, 49, 44, 24, 15];
    const barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];

    new Chart("chartProduk", {
      type: "pie",
      data: {
        labels: xValues4,
        datasets: [{
          backgroundColor: barColors,
          data: yValues4
        }]
      },
      options: {
        title: {
          display: true,
          text: "Top 5 Penjualan Produk Tahun 2023",
          fontColor: 'grey',
          fontSize: 28,
          font: {
            // family: "Raleway",
            // weight: 'bold',
          }
        }
      }
    });

    $(document).ready(function() {

      // Ambil & tampilin data-data profil UMKM
      var id = "<?php echo $_SESSION['login']; ?>"; 
      $.ajax({
        url: "getProfileProcess.php",
        type: "POST",
        data: {
            id: id
        },
        success: function(data){
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

      // Grafik
      $('.grafik-pendapatan, .grafik-pengeluaran, .grafik-omzet, .grafik-penjualan').show();

      $('.btn-filter').click(function() {
        $('.grafik-pendapatan, .grafik-pengeluaran, .grafik-omzet, .grafik-penjualan').hide();
        $('canvas').css({
          'width': '',
          'height': ''
        });
        var filter = $(this).data('filter');

        if (filter !== 'all') {
          $('.grafik-' + filter).show();
          $('.grafik-' + filter + ' canvas').css({
            'width': '800px',
            'height': '400px'
          });
        } else {
          $('.grafik-pendapatan, .grafik-pengeluaran, .grafik-omzet, .grafik-penjualan').show();
        }
      });
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

    $('#goFilter').on('click', function() {
      if (selectedStartYear != '' && selectedEndYear != '') {
        startYear = parseInt(selectedStartYear, 10);
        endYear = parseInt(selectedEndYear, 10);

        $.ajax({
          url: "getReportProcess.php",
          type: "POST",
          data: {
            id: id,
            startYear: startYear,
            endYear: endYear
          },
          success: function(result){

            var response = JSON.parse(result);
            var bulan = response.bulan;
            var pendapatan = response.pendapatan;
            var pengeluaran = response.pengeluaran;
            var omzet = response.omzet;

            var dataArray = [];

            for (var i = 0; i < bulan.length; i++) {
                dataArray.push({
                    'bulan': bulan[i],
                    'pendapatan': pendapatan[i],
                    'pengeluaran': pengeluaran[i],
                    'omzet': omzet[i]
                });
            }

          }
        });
      } else {
        // alert
      }
    });

  </script>

</body>

</html>