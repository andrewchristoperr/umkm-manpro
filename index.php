<?php
require "connect.php";
session_start();

if (isset($_SESSION['kategori'])) {
  if ($_SESSION['kategori'] != 'All') {
    $kategori_umkm = $_SESSION['kategori'];
    $query = "SELECT * FROM umkmm WHERE kategori_umkm = '$kategori_umkm'";
    $stmt = $conn->query($query)->fetchAll();
  } else {
    $query = "SELECT * FROM umkmm";
    $stmt = $conn->query($query)->fetchAll();
  }
} else {
  $query = "SELECT * FROM umkmm";
  $stmt = $conn->query($query)->fetchAll();
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Sweet Alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">

</head>

<body>

  <?php include "template/header.php"; ?>

  <main id="main">

    <!-- ======= News Section ======= -->
    <div id="news" class="news">
      <div id="about" class="news">
        <div class="container">
          <div class="section-title" data-aos="fade-in" data-aos-delay="100"></div>
          <h3>Berita</h3>
          <div id="carouselExampleIndicators" class="carousel slide custom-carousel" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <a href="https://www.surabaya.go.id/id/berita/65135/pemkot-surabaya-targetkan-62-ri" target="_blank">
                  <div class="row">
                    <div class="col-md-6 p-0 carousel-text-container">
                      <div class="carousel-text">
                        <p class="carousel-text-title">WALI KOTA ERI CAHYADI BERI REWARD</p>
                        <p class="carousel-text-description">Wali Kota Surabaya Eri Cahyadi memberikan reward kepada 10 UMKM yang telah lolos verifikasi dan mendapatkan bantuan dari Pemkot Surabaya. Reward berupa uang tunai sebesar Rp 5 juta diberikan langsung oleh Wali Kota Eri Cahyadi di Balai Kota Surabaya, Senin (27/9/2021).</p>
                        <p class="carousel-text-date">Sabtu, 28 Oktober 2023</p>
                      </div>
                    </div>
                    <div class="col-md-6 p-0">
                      <img src="./assets/img/berita/berita-1.jpg" class="w-100" alt="...">
                    </div>
                  </div>
                </a>
              </div>
              <div class="carousel-item">
                <a href="https://www.surabaya.go.id/id/berita/65135/pemkot-surabaya-targetkan-62-ri" target="_blank">
                  <div class="row">
                    <div class="col-md-6 p-0 carousel-text-container">
                      <div class="carousel-text">
                        <p class="carousel-text-title">WALI KOTA ERI CAHYADI BERI REWARD</p>
                        <p class="carousel-text-description">Wali Kota Surabaya Eri Cahyadi memberikan reward kepada 10 UMKM yang telah lolos verifikasi dan mendapatkan bantuan dari Pemkot Surabaya. Reward berupa uang tunai sebesar Rp 5 juta diberikan langsung oleh Wali Kota Eri Cahyadi di Balai Kota Surabaya, Senin (27/9/2021).</p>
                        <p class="carousel-text-date">Sabtu, 28 Oktober 2023</p>
                      </div>
                    </div>
                    <div class="col-md-6 p-0">
                      <img src="./assets/img/berita/berita-1.jpg" class="w-100" alt="...">
                    </div>
                  </div>
                </a>
              </div>
              <div class="carousel-item">
                <a href="https://www.surabaya.go.id/id/berita/65135/pemkot-surabaya-targetkan-62-ri" target="_blank">
                  <div class="row">
                    <div class="col-md-6 p-0 carousel-text-container">
                      <div class="carousel-text">
                        <p class="carousel-text-title">WALI KOTA ERI CAHYADI BERI REWARD</p>
                        <p class="carousel-text-description">Wali Kota Surabaya Eri Cahyadi memberikan reward kepada 10 UMKM yang telah lolos verifikasi dan mendapatkan bantuan dari Pemkot Surabaya. Reward berupa uang tunai sebesar Rp 5 juta diberikan langsung oleh Wali Kota Eri Cahyadi di Balai Kota Surabaya, Senin (27/9/2021).</p>
                        <p class="carousel-text-date">Sabtu, 28 Oktober 2023</p>
                      </div>
                    </div>
                    <div class="col-md-6 p-0">
                      <img src="./assets/img/berita/berita-1.jpg" class="w-100" alt="...">
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- End News Section -->

    <!-- ======= About Section ======= -->
    <div id="about" class="about">
      <div class="container">
        <div class="row no-gutters">
          <div class="content col-xl-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="content">
              <h3>Pencatatan dan Pelaporan UMKM</h3>
              <p>
                Daftarkan UMKM Anda sekarang juga !
              </p>
              <a href="register.php" class="about-btn">Register UMKM<i class="bx bx-chevron-right"></i></a>
            </div>
          </div>

        </div>

      </div>
    </div><!-- End About Section -->

    <!-- ======= Register Section ======= -->
    <section id="register" class="register">
      <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Syarat dan Ketentuan</h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Data UMKM</a></h4>
              <p class="description">Masukkan data UMKM seperti nama, alamat, bidang UMKM, dan lokasi kecamatan</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Berkas</a></h4>
              <p class="description">Lengkapi data dengan Formulir IUPP, Surat Pengantar RT/RW,KTP Pemilik UMKM, NPWP</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Verifikasi</a></h4>
              <p class="description">Setelah menyelesaikan pengunggahan berkas, cek secara berkala status verifikasi UMKM Anda</p>
            </div>
          </div>



        </div>

      </div>
    </section><!-- End Register Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts  section-bg" data-aos="fade-in" data-aos-delay="100">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>UMKM</strong> yang sudah terdaftar</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Pemilik UMKM</strong> yang sudah terdaftar</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Bantuan Diberikan</strong> kepada UMKM</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Kerja Sama</strong> dengan perusahan ternama</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="row section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Daftar UMKM</h2>
          <p>Berbagai UMKM di Kecamatan</p>
        </div>

        <div class="row mb-4 d-flex justify-content-center" data-aos="fade-in" data-aos-delay="100">
          <div class="col-sm col-md-7 mb-4">
            <input type="text" class="form-control" placeholder="Search UMKM" onkeyup="search_umkm()" id="search_bar">
          </div>

          <div class="col-sm col-md-3 mb-4">
            <select class="form-select" aria-label="Default select example" id="dropdown-kategori">
              <option value="All">All Categories</option>
              <option value="Makanan dan Minuman">Makanan dan Minuman</option>
              <option value="Fashion dan Pakaian">Fashion dan Pakaian</option>
              <option value="Kerajinan Tangan">Kerajinan Tangan</option>
              <option value="Pertanian dan Peternakan">Pertanian dan Peternakan</option>
              <option value="Jasa">Jasa</option>
              <option value="Otomotif">Otomotif</option>
            </select>
          </div>

          <div class="col-sm col-md-2 mb-4">
            <button class="btn btn-primary" type="button" id="apply-filters">Apply filters</button>
          </div>

        </div>

        <div class="row" id="list-umkm" data-aos="fade-up">
          <?php
          if ($stmt == null) :
          ?>
            <p>Belum ada data</p>
            <?php
          endif;
          if (!isset($_SESSION['kategori']) || $_SESSION['kategori'] == null) {
            if ($stmt != null) :
              foreach ($stmt as $row) :
            ?>
                <div class="col-lg-3 col-md-4 mb-5">
                  <div class="card h-100" id="card-umkm" style="border-radius: 20px;">

                    <img class="card-img-top" src="image.php?id=<?php echo $row['id'] ?>" alt="Card image cap" style="padding: 10px; border-radius: 25px;">
                    <div class="card-body">
                      <p class="card-text list_umkm"><?php echo $row['nama_umkm']; ?></p>
                      <p class="card-text">Kategori: <?php echo $row['kategori_umkm']; ?></p>
                      <p hidden id="id_umkm" class="id_umkm"><?php echo $row['id'] ?></p>
                      <!-- <button style="float: left;" class="btn btn-primary button_details" id="">Details</button> -->
                    </div>
                  </div>
                </div>
              <?php
              endforeach;
            endif;
          } else {
            if ($stmt != null) :
              foreach ($stmt as $row) :
              ?>
                <div class="col-lg-3 col-md-4 mb-5">
                  <div class="card h-100" id="card-umkm" style="border-radius: 20px;">

                    <img class="card-img-top" src="image.php?id=<?php echo $row['id'] ?>" alt="Card image cap" style="padding: 10px; border-radius: 25px;">
                    <div class="card-body">
                      <p class="card-text list_umkm"><?php echo $row['nama_umkm']; ?></p>
                      <p class="card-text">Kategori: <?php echo $row['kategori_umkm']; ?></p>
                      <p hidden id="id_umkm" class="id_umkm"><?php echo $row['id'] ?></p>
                      <!-- <button style="float: left;" class="btn btn-primary button_details" id="">Details</button> -->
                    </div>
                  </div>
                </div>
          <?php
              endforeach;
            endif;
          }

          ?>
        </div>
      </div>

      </div>
    </section><!--End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Testimonials</h2>
          <p>Berikut berbagai testimoni dari para pelanggan UMKM 🎉</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium
                  quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div>
            End testimonial item -->
    <!-- 
            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis
                  quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div>End testimonial item -->
    <!-- 
            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim
                  tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div>End testimonial item -->

    <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit
                  minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div>End testimonial item -->

    <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa
                  labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section> -->
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up">
              <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="150">
              <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>--><!--End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Jl. Siwalankerto No.121-131, Siwalankerto, Kec. Wonocolo, Surabaya, Jawa Timur 60236</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>manproti9@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+62 812 3456 789</p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.1277129898995!2d112.73498897485095!3d-7.339551872195096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb4867925b0b%3A0xd06ae2d4f0af3f59!2sPetra%20Christian%20University!5e0!3m2!1sen!2sid!4v1697687365818!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6">
            <form action="#" class="php-email-form" id="form-contact">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class=""></div>
                <div class=""></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" id="submit">Send Message</button>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php include "template/footer.php" ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    // $(document).ready(function() {
    //   $('#submit').on('click', function() {
    //     var name = $('#name').val();
    //     var email = $('#email').val();
    //     var subject = $('#subject').val();
    //     var message = $('#message').val();

    //     if (name != '' && email != '' && subject != '' && message != '') {
    //       $.ajax({
    //         url: 'forms/contact.php',
    //         method: 'POST',
    //         data: {
    //           name: name,
    //           email: email,
    //           subject: subject,
    //           message: message
    //         },
    //         success: function(result) {
    //           if (result == 1) {
    //             Swal.fire({
    //               icon: 'success',
    //               title: 'Success',
    //               text: 'Message Sent!'
    //             })
    //           } else if (result == 0) {
    //             Swal.fire({
    //               icon: 'warning',
    //               title: 'Invalid Email',
    //               text: 'Please input a valid email!'
    //             })
    //           }
    //         }
    //       })
    //     } else {

    //     }
    //   })
    // })

    const formToReset = document.getElementById('form-contact');
    formToReset.addEventListener('submit', (e) => {
      e.preventDefault();
      formToReset.reset();
    });

    function search_umkm() {
      var input, filter, cards, card, i, txtValue;
      input = document.getElementById("search_bar");
      filter = input.value.toUpperCase();
      cards = document.getElementById("list-umkm").getElementsByClassName("col-lg-3");

      for (i = 0; i < cards.length; i++) {
        card = cards[i];
        txtValue = card.textContent || card.innerText;

        // If the card contains the search term, display it; otherwise, hide it
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          card.style.display = "";
        } else {
          card.style.display = "none";
        }
      }
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="script.js"></script>
  <script>
    // $(document).ready(function() {
    //   function renderCards(category) {
    //     $.ajax({
    //       url: 'get_cards.php',
    //       method: 'POST',
    //       data: {
    //         category: category
    //       },
    //       dataType: 'json',
    //       success: function(data) {
    //         $('#list-umkm').empty();
    //         data.forEach(function(card) {
    //           const cardHtml = `<div class="card">
    //                                     <h3>${card.nama_umkm}</h3>
    //                                     <p>Category: ${card.kategori_umkm}</p>
    //                                  </div>`;
    //           // const cardHtml = `
    //           //   <div class="col-lg-3 col-md-4 mb-5">
    //           //     <div class="card h-100" id="card-umkm">
    //           //       <img class="card-img-top" src="image.php?id=${card.id}" alt="Card image cap" style="padding: 10px; border-radius: 15px;">
    //           //       <div class="card-body">
    //           //         <p class="card-text list_umkm">${card.nama_umkm}</p>
    //           //         <p class="card-text">${card.kategori_umkm}</p>
    //           //         <p hidden id="id_umkm">${card.id}</p>
    //           //       </div>
    //           //     </div>
    //           //   </div>
    //           //   `;
    //           $('#list-umkm').append(cardHtml);

    //         });
    //       },
    //       error: function(error) {
    //         console.error('Error fetching cards:', error);
    //       }
    //     });
    //   }
    //   renderCards('All');

    //   $('#dropdown-kategori').on('change', function() {
    //     const selectedCategory = $(this).val();
    //     renderCards(selectedCategory);
    //   });
    // });

    $(document).ready(function() {
      $('#apply-filters').on('click', function() {
        var kategori = $('#dropdown-kategori').val();
        if (kategori != null && kategori != "") {
          $.ajax({
            url: 'forms/filter.php',
            method: 'POST',
            data: {
              kategori: kategori
            },
            success: function(result) {
              $('#list-umkm').empty();
              document.getElementById('list-umkm').innerHTML = result;
              <?php session_destroy() ?>
              window.location.reload();
              // $('#list-umkm').load(" #list-umkm");
            }
          })
        }
      });
    });

    let card_umkm = document.querySelectorAll('#card-umkm');
    card_umkm.forEach((elm) => {
      elm.addEventListener("click", (e) => {
        let id_umkm = e.currentTarget.querySelector('#id_umkm').innerHTML;
        if (id_umkm != null) {
          $.ajax({
            url: 'forms/port_details.php',
            method: 'POST',
            data: {
              id_umkm: id_umkm
            },
            success: function(result) {
              location.href = 'portfolio-details.php';
            }
          })
        }
      })
    })
  </script>
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