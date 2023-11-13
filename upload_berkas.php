<?php
session_start();
require "connect.php";
// $username = $_SESSION['username'];
// $nama_umkm = $_SESSION['nama_umkm'];
// $notelp_umkm = $_SESSION['notelp_umkm'];
// $alamat_umkm = $_SESSION['alamat_umkm'];
// $kecamatan = $_SESSION['kecamatan'];
// $foto_umkm = $_SESSION['foto_umkm'];
// $kategori_umkm = $_SESSION['kategori_umkm'];
// $deskripsi_umkm = $_SESSION['deskripsi_umkm'];

// if (isset($_POST['submit'])) {
//     if (isset($_POST['formulir'])) {
//         $formulir = $_POST['formulir'];
//         if (isset($_POST['surat_pengantar'])) {
//             $surat_pengantar = $_POST['surat_pengantar'];
//             if (isset($_POST['ktp'])) {
//                 $ktp = $_POST['ktp'];
//                 if (isset($_POST['npwp'])) {
//                     $npwp = $_POST['npwp'];
//                     $query = "INSERT INTO umkm (owner_user_id, nama_umkm, notelp_umkm, alamat_umkm, kecamatan, foto_umkm, kategori_umkm, deskripsi_produk, formulir, surat_pengantar, ktp, npwp) VALUES ('$username', '$nama_umkm', '$notelp_umkm', '$alamat_umkm', '$kecamatan', '$foto_umkm', '$kategori_umkm', '$deskripsi_umkm', '$formulir', '$surat_pengantar', '$ktp', '$npwp')";
//                     $result = $conn->query($query);
//                 }
//             }
//         }
//     }
// }

// if (isset($_SESSION['formulir'])) {
//   $formulir = $_SESSION['formulir'];
// } else {
//   $formulir = '';
// }

// if (isset($_SESSION['nama_umkm'])) {
//   $nama_umkm = $_SESSION['nama_umkm'];
// } else {
//   $nama_umkm = '';
// }

// if (isset($_SESSION['surat_pengantar'])) {
//   $surat_pengantar = $_SESSION['surat_pengantar'];
// } else {
//   $surat_pengantar = '';
// }

// if (isset($_SESSION['ktp'])) {
//   $ktp = $_SESSION['ktp'];
// } else {
//   $alamat_umkm = '';
// }
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Sweet Alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">

  <style>
    #footer {
      position: relative;
    }

    .border {
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
      margin-right: 15px;
      margin-left: 15px;
      position: relative;
    }

    #main {
      margin-top: 0px;
      padding-top: 0px;
    }

    .button {
      background: #67b0d1;
      border: 0;
      padding: 10px 24px;
      color: #fff;
      transition: 0.4s;
    }

    .button:hover {
      background: #8ec4dd;
    }

    .next {
      background: #67b0d1;
      border: 0;
      padding: 10px 24px;
      color: #fff;
      transition: 0.4s;
      display: block;
      position: absolute;
      bottom: 5px;
      left: 15px;
      margin: 15px;
    }

    .form-control {
      border-bottom-width: 2px;
    }

    label {
      font-family: "Raleway", sans-serif;
      font-weight: 600;
    }

    .pasar {
      background: url('assets/img/pasar2.jpg');
      background-size: cover;
      position: relative;
      padding-top: 100px;
    }
  </style>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between position-relative">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>UMKMANJALITA</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="#">Favourite</a></li>
          <li><a class="nav-link scrollto" href="profile.html">Account</a></li>
          <li>
            <div class="box">
              <div class="container-4">
                <input type="search" id="search" placeholder="Search..." />
                <button class="icon"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="pasar d-flex justify-content-center">
      <div class="container border mt-5 mb-5">
        <div class="row">
          <div class="content d-flex align-items-stretch" data-aos="fade">
            <div class="container">
              <div class="row mb-5 d-flex justify-content-center mt-2">
                <h3 class="text-center">Upload Berkas</h3>
              </div>
              <form class="row d-flex justify-content-center" action="#" method="post">
                <div class="col-md-10">
                  <div class="mb-4">
                    <label for="formFile" class="form-label">Formulir Permohonan UMKM</label>
                    <input class="form-control" type="file" id="formulir" name="formulir" required>
                  </div>

                  <div class="mb-4">
                    <label for="formFile" class="form-label">Surat Pengantar</label>
                    <input class="form-control" type="file" id="surat_pengantar" name="surat_pengantar" required>
                  </div>

                  <div class="mb-4">
                    <label for="formFile" class="form-label">KTP</label>
                    <input class="form-control" type="file" id="ktp" name="ktp" required>
                  </div>

                  <div class="mb-5">
                    <label for="formFile" class="form-label">NPWP</label>
                    <input class="form-control" type="file" id="npwp" name="npwp" required>
                  </div>

                  <div class="d-grid mx-auto">
                    <button class="button" type="submit" id="submit" name="submit">Submit</button>
                  </div>
                </div>

                <div class="row" style="margin-top: 90px;">
                  <div class="col-md-10">
                    <a href="register.php" class="next">Prev</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>



  </main>


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Info Kecamatan</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
              <p>
                Jl. Siwalankerto No.121-131, Siwalankerto, Kec. Wonocolo, Surabaya, Jawa Timur 60236<br><br>
                <strong>Phone:</strong>+62 812 3456 789<br>
                <strong>Email:</strong> manproti9@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="https://twitter.com/info_surabaya?spm=a2o4j.home.sns.d_twr.579953e0jUysxl" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/kecamatangayungan?spm=a2o4j.home.sns.d_fbk.579953e0jUysxl" target="_blank"" class=" facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/kecamatan.tandes/?spm=a2o4j.home.sns.d_ins.579953e0jUysxl" target="_blank"" class=" instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-whatsapp"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Register</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Bidang/Sektor UMKM</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Food & Drink</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Fashion</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Agriculture</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Inn</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Others</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Notifikasi Pemberitahuan</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>ManproTI Kelompok 9</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
        Designed by <a href="https://bootstrapmade.com/">ManproTI9</a>
      </div>
    </div>
  </footer>End Footer -->
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
        <script>
          $(document).ready(function() {
            $('#submit').on('click', function() {
              var formulir = $('#formulir').val();
              var surat_pengantar = $('#surat_pengantar').val();
              var ktp = $('#ktp').val();
              var npwp = $('#npwp').val();

              if (formulir != '' && surat_pengantar != '' && ktp != '' && npwp != '') {
                $.ajax({
                  url: 'forms/form_berkas.php',
                  method: 'POST',
                  data: {
                    formulir: formulir,
                    surat_pengantar: surat_pengantar,
                    ktp: ktp,
                    npwp: npwp,
                  },
                  success: function(result) {
                    if (result == 1) {
                      alert('Register berhasil!');
                      Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Submit Success!'
                      });
                    }

                  }
                })
              } 
              else {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Mohon Lengkapi Data!'
                });
              }
            })
          })
        </script>
</body>



</html>