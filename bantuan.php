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

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include "template/header.php"; ?>
    <!-- End of Header -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="pasar d-flex justify-content-center">
            <div class="container border mt-5 mb-5">
                <div class="row">
                    <div class="content d-flex align-items-stretch" data-aos="fade">
                        <div class="container">
                            <div class="row mb-5 d-flex justify-content-center mt-2">
                                <h3 class="text-center">Pengajuan Bantuan</h3>
                            </div>
                            <form class="row d-flex justify-content-center" action="#" method="post">
                                <div class="col-md-10">
                                    <div class="mb-4">
                                        <label for="formFile" class="form-label">Alasan Permintaan Bantuan</label>
                                        <input class="form-control" type="text" id="tujuanBantuan" name="tujuanBantuan" required >
                                    </div>

                                    <div class="mb-4">
                                        <label for="formFile" class="form-label">Dokumen Pendukung</label>
                                        <input class="form-control" type="text" id="pendapatan" name="pendapatan" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="formFile" class="form-label">Kebutuhan</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="tendaCheckbox">
                                            <label class="form-check-label" for="tendaCheckbox">Tenda</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="gerobakCheckbox">
                                            <label class="form-check-label" for="gerobakCheckbox">Gerobak</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="spandukCheckbox">
                                            <label class="form-check-label" for="spandukCheckbox">Spanduk</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="danaCheckbox" onchange="toggleInput()">
                                            <label class="form-check-label" for="danaCheckbox">Dana</label>
                                        </div>
                                        <!-- Input Dana -->
                                        <div id="danaInput" class="form-group mt-2 mb-2 hidden">
                                            <input class="form-control" type="text" id="danaAmount" name="danaAmount" placeholder="Masukkan Nominal">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="lainnyaCheckbox" onchange="toggleInput()">
                                            <label class="form-check-label" for="lainnyaCheckbox">Lainnya</label>
                                        </div>
                                        <!-- Input Lainnya -->
                                        <div id="lainnyaInput" class="form-group mt-2 mb-2 hidden">
                                            <input class="form-control" type="text" id="lainnya" name="lainnya" placeholder="Masukkan Kebutuhan Lainnya">
                                        </div>
                                    </div>

                                    <div class="d-grid mx-auto">
                                        <button class="button" type="submit" id="submit" name="submit">Ajukan Bantuan</button>
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

    <script>
        function toggleInput() {
            var danaCheckbox = document.getElementById('danaCheckbox');
            var danaInput = document.getElementById('danaInput');
            var lainnyaCheckbox = document.getElementById('lainnyaCheckbox');
            var lainnyaInput = document.getElementById('lainnyaInput');

            if (danaCheckbox.checked) {
                danaInput.classList.remove('hidden');
            } else {
                danaInput.classList.add('hidden');
            }

            if (lainnyaCheckbox.checked) {
                lainnyaInput.classList.remove('hidden');
            } else {
                lainnyaInput.classList.add('hidden');
            }
        }
    </script>
</body>

</html>
