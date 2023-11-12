<?php
require "connect.php";
session_start();

if (isset($_SESSION['id_umkm'])) {
  $id_umkm = $_SESSION['id_umkm'];
  $query = "SELECT * FROM umkmm WHERE id = '$id_umkm'";
  $stmt = $conn->query($query);
  $data = $stmt->fetch();
  // echo $_SESSION['id_umkm'];
}
// echo $_SESSION['id_umkm'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UMKM Details</title>
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

  <!-- =======================================================
  * Template Name: Squadfree
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php include "template/header.php" ?>

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 class="mt-2">UMKM Details</h2>
          <ol>
            <li><a href=index.html>Home</a></li>
            <li>UMKM Details</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4 d-flex justify-content-center">

          <div class="col-md-10">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="image.php?id=<?php echo $data['id'] ?>" alt="" style="object-fit:; width: 90%;">
                </div>

                <div class="swiper-slide">
                  <img src="image.php?id=<?php echo $data['id'] ?>" alt="" style="object-fit:; width: 90%;">
                </div>

                <div class="swiper-slide">
                  <img src="image.php?id=<?php echo $data['id'] ?>" alt="" style="object-fit:; width: 90%;">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-md-10">
            <div class="portfolio-info">
              <h3><?php echo $data['nama_umkm'] ?></h3>
              <ul>
                <li><strong>Kategori</strong>: <?php echo $data['kategori_umkm'] ?> </li>
                <!-- <li><strong>Rating</strong>: 5.4</li> -->
                <li><strong>Alamat</strong>: <?php echo $data['alamat_umkm'] ?></li>
                <li><strong>Nomor WhatsApp</strong>: <a href="https://api.whatsapp.com/send?phone=62812345678&text=Halo%20semua!">0812345678</a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Sekilas tentang UMKM Pandan Wangi</h2>
              <p>
                <?php echo $data['deskripsi_umkm'] ?>
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

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
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/ -->
        Designed by <a href="https://bootstrapmade.com/">ManproTI9</a>
      </div>
    </div>
  </footer><!-- End Footer -->

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

</body>

</html>