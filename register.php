<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = '';
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $email = '';
}

if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
} else {
    $password = '';
}

if (isset($_SESSION['nama_umkm'])) {
    $nama_umkm = $_SESSION['nama_umkm'];
} else {
    $nama_umkm = '';
}

if (isset($_SESSION['notelp_umkm'])) {
    $notelp_umkm = $_SESSION['notelp_umkm'];
} else {
    $notelp_umkm = '';
}

if (isset($_SESSION['alamat_umkm'])) {
    $alamat_umkm = $_SESSION['alamat_umkm'];
} else {
    $alamat_umkm = '';
}

if (isset($_SESSION['kecamatan'])) {
    $kecamatan = $_SESSION['kecamatan'];
} else {
    $kecamatan = '';
}

if (isset($_SESSION['foto_umkm'])) {
    // $foto_umkm = $_SESSION['nama_foto_umkm'];
    $foto_umkm = $_SESSION['foto_umkm'];
} else {
    $foto_umkm = '';
}


if (isset($_SESSION['kategori_umkm'])) {
    $kategori_umkm = $_SESSION['kategori_umkm'];
} else {
    $kategori_umkm = '';
}

if (isset($_SESSION['deskripsi_umkm'])) {
    $deskripsi_umkm = $_SESSION['deskripsi_umkm'];
} else {
    $deskripsi_umkm = '';
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

        .next {
            background: #67b0d1;
            border: 0;
            padding: 10px 24px;
            color: #fff;
            transition: 0.4s;
            display: block;
            position: absolute;
            bottom: 5px;
            right: 5px;
            margin: 15px;
        }

        .button:hover {
            background: #8ec4dd;
        }

        .form-control {
            border-bottom-width: 2px;
        }

        label {
            font-family: "Raleway", sans-serif;
            font-weight: 600;
        }

        /* .main {
            background-image: url("assets/img/about-bg.jpg");
            background-size: cover;
            padding: 60px 0;
            position: relative;
        } */

        .pasar {
            background: url('assets/img/pasar2.jpg');
            background-size: cover;
            position: relative;
            padding-top: 100px;
        }

        #main {
            margin-top: 0px;
            padding-top: 0px;
        }

        #validation-txt {
            color: red;
            font-size: 17px;
        }

        #validation-txt-username {
            font-size: 17px;
        }
    </style>

</head>

<body>
    <?php include "template/header.php"; ?>

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="pasar d-flex justify-content-center">
            <div class="container border mt-5 mb-5">
                <div class="row">
                    <div class="content d-flex align-items-stretch" data-aos="fade">
                        <div class="container">
                            <div class="row mb-5 d-flex justify-content-center mt-2">
                                <h3 class="text-center">Register Your UMKM</h3>
                            </div>

                            <form class="row d-flex justify-content-center php-email-form uk-form needs-validation" method="POST" id="form-register" novalidate>
                                <div class="col-md-5">
                                    <div class="mb-4">
                                        <label for="formFile" class="form-label mb-3">Username</label>

                                        <?php if (isset($_SESSION['username'])) {
                                            echo '<div class="input-group has-validation">
                                                    <input class="form-control" type="text" id="username" name="username" required value="' . $username . '">
                                                </div>
                                                <div id="validation-txt-username">
                                                </div>';
                                        } else {
                                            echo '<div class="input-group has-validation">
                                                    <input class="form-control" type="text" id="username" name="username" required value="">
                                                </div>
                                                <div id="validation-txt-username">
                                                </div>';
                                        }
                                        ?>


                                    </div>

                                    <div class="mb-4">
                                        <label for="formFile" class="form-label mb-3">Email</label>
                                        <?php if (isset($_SESSION['email'])) {
                                            echo "<input class='form-control' type='text' id='email' name='email' required value='$email'>";
                                        } else {
                                            echo "<input class='form-control' type='text' id='email' name='email' required value=''>";
                                        }
                                        ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="formFile" class="form-label mb-3">Password</label>
                                        <?php if (isset($_SESSION['password'])) {
                                            echo '<div class="input-group has-validation">
                                                    <input class="form-control" type="password" id="password" name="password" required value="' . $password . '" onkeyup="validate()">
                                                    <span class="input-group-text" id="showhide" onClick="viewPassword()">Show</span>
                                                </div>
                                                    <div id="validation-txt">
                                                </div>';
                                        } else {
                                            echo '<div class="input-group has-validation">
                                                    <input class="form-control" type="password" id="password" name="password" required value="" onkeyup="validate()">
                                                    <span class="input-group-text" id="showhide" onClick="viewPassword()">Show</span>
                                                </div>
                                                    <div id="validation-txt">
                                                </div>';
                                        }
                                        ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="formFile" class="form-label mb-3">Nama UMKM</label>
                                        <?php if (isset($_SESSION['nama_umkm'])) {
                                            echo "<input class='form-control' type='text' id='nama_umkm' name='nama_umkm' required value='$nama_umkm'>";
                                        } else {
                                            echo "<input class='form-control' type='text' id='nama_umkm' name='nama_umkm' required value=''>";
                                        }
                                        ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="formFile" class="form-label mb-3">Nomor Telp / WA</label>
                                        <?php if (isset($_SESSION['notelp_umkm'])) {
                                            echo "<input class='form-control' type='tel' id='notelp_umkm' name='notelp_umkm' required value='$notelp_umkm'>";
                                        } else {
                                            echo "<input class='form-control' type='tel' id='notelp_umkm' name='notelp_umkm' required value=''>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="mb-4">
                                        <label for="formFile" class="form-label mb-3">Alamat</label>
                                        <?php if (isset($_SESSION['alamat_umkm'])) {
                                            echo "<input class='form-control' type='text' id='alamat_umkm' name='alamat_umkm' required value='$alamat_umkm'>";
                                        } else {
                                            echo "<input class='form-control' type='text' id='alamat_umkm' name='alamat_umkm' required value=''>";
                                        }
                                        ?>
                                    </div>

                                    <div class="mb-4">
                                        <label for="" class="form-label mb-3">Kecamatan</label>
                                        <!-- <label for="" style="font-size: 25px; color: red;" class="form-label">*</label> -->

                                        <select class='form-select' aria-label='Default select example' name='kecamatan' id='kecamatan' required>
                                            <option disabled selected hidden>Pilih Kecamatan</option>
                                            <?php if ($_SESSION['kecamatan'] == "Asemrowo") {
                                                echo "<option value='Asemrowo' selected>Asemrowo</option>";
                                            } else {
                                                echo "<option value='Asemrowo'>Asemrowo</option>";;
                                            }
                                            ?>
                                            <?php if ($_SESSION['kecamatan'] == "Benowo") {
                                                echo "<option value='Benowo' selected>Benowo</option>";
                                            } else {
                                                echo "<option value='Benowo'>Benowo</option>";;
                                            }
                                            ?>
                                            <?php if ($_SESSION['kecamatan'] == "Bubutan") {
                                                echo "<option value='Bubutan' selected>Bubutan</option>";
                                            } else {
                                                echo "<option value='Bubutan'>Bubutan</option>";;
                                            }
                                            ?>
                                            <?php if ($_SESSION['kecamatan'] == "Bulak") {
                                                echo "<option value='Bulak' selected>Bulak</option>";
                                            } else {
                                                echo "<option value='Bulak'>Bulak</option>";;
                                            }
                                            ?>
                                            <?php if ($_SESSION['kecamatan'] == "Dukuh Pakis") {
                                                echo "<option value='Dukuh Pakis' selected>Dukuh Pakis</option>";
                                            } else {
                                                echo "<option value='Dukuh Pakis'>Dukuh Pakis</option>";;
                                            }
                                            ?>
                                            <?php if ($_SESSION['kecamatan'] == "Gayungan") {
                                                echo "<option value='Gayungan' selected>Gayungan</option>";
                                            } else {
                                                echo "<option value='Gayungan'>Gayungan</option>";;
                                            }
                                            ?>
                                            <?php if ($_SESSION['kecamatan'] == "Genteng") {
                                                echo "<option value='Genteng' selected>Genteng</option>";
                                            } else {
                                                echo "<option value='Genteng'>Genteng</option>";;
                                            }
                                            ?>
                                            <?php if ($_SESSION['kecamatan'] == "Gubeng") {
                                                echo "<option value='Gubeng' selected>Gubeng</option>";
                                            } else {
                                                echo "<option value='Gubeng'>Gubeng</option>";;
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Gunung Anyar") {
                                                echo "<option value='Gunung Anyar' selected>Gunung Anyar</option>";
                                            } else {
                                                echo "<option value='Gunung Anyar'>Gunung Anyar</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Jambangan") {
                                                echo "<option value='Jambangan' selected>Jambangan</option>";
                                            } else {
                                                echo "<option value='Jambangan'>Jambangan</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Karang Pilang") {
                                                echo "<option value='Karang Pilang' selected>Karang Pilang</option>";
                                            } else {
                                                echo "<option value='Karang Pilang'>Karang Pilang</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Kenjeran") {
                                                echo "<option value='Kenjeran' selected>Kenjeran</option>";
                                            } else {
                                                echo "<option value='Kenjeran'>Kenjeran</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Krembangan") {
                                                echo "<option value='Krembangan' selected>Krembangan</option>";
                                            } else {
                                                echo "<option value='Krembangan'>Krembangan</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Lakarsantri") {
                                                echo "<option value='Lakarsantri' selected>Lakarsantri</option>";
                                            } else {
                                                echo "<option value='Lakarsantri'>Lakarsantri</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Mulyorejo") {
                                                echo "<option value='Mulyorejo' selected>Mulyorejo</option>";
                                            } else {
                                                echo "<option value='Mulyorejo'>Mulyorejo</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Pabean Cantian") {
                                                echo "<option value='Pabean Cantian' selected>Pabean Cantian</option>";
                                            } else {
                                                echo "<option value='Pabean Cantian'>Pabean Cantian</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Pakal") {
                                                echo "<option value='Pakal' selected>Pakal</option>";
                                            } else {
                                                echo "<option value='Pakal'>Pakal</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Rungkut") {
                                                echo "<option value='Rungkut' selected>Rungkut</option>";
                                            } else {
                                                echo "<option value='Rungkut'>Rungkut</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Sambikerep") {
                                                echo "<option value='Sambikerep' selected>Sambikerep</option>";
                                            } else {
                                                echo "<option value='Sambikerep'>Sambikerep</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Sawahan") {
                                                echo "<option value='Sawahan' selected>Sawahan</option>";
                                            } else {
                                                echo "<option value='Sawahan'>Sawahan</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Semampir") {
                                                echo "<option value='Semampir' selected>Semampir</option>";
                                            } else {
                                                echo "<option value='Semampir'>Semampir</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Simokerto") {
                                                echo "<option value='Simokerto' selected>Simokerto</option>";
                                            } else {
                                                echo "<option value='Simokerto'>Simokerto</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Sukolilo") {
                                                echo "<option value='Sukolilo' selected>Sukolilo</option>";
                                            } else {
                                                echo "<option value='Sukolilo'>Sukolilo</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Sukomanunggal") {
                                                echo "<option value='Sukomanunggal' selected>Sukomanunggal</option>";
                                            } else {
                                                echo "<option value='Sukomanunggal'>Sukomanunggal</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Tambaksari") {
                                                echo "<option value='Tambaksari' selected>Tambaksari</option>";
                                            } else {
                                                echo "<option value='Tambaksari'>Tambaksari</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Tandes") {
                                                echo "<option value='Tandes' selected>Tandes</option>";
                                            } else {
                                                echo "<option value='Tandes'>Tandes</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Tegalsari") {
                                                echo "<option value='Tegalsari' selected>Tegalsari</option>";
                                            } else {
                                                echo "<option value='Tegalsari'>Tegalsari</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Tenggilis Mejoyo") {
                                                echo "<option value='Tenggilis Mejoyo' selected>Tenggilis Mejoyo</option>";
                                            } else {
                                                echo "<option value='Tenggilis Mejoyo'>Tenggilis Mejoyo</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Wiyung") {
                                                echo "<option value='Wiyung' selected>Wiyung</option>";
                                            } else {
                                                echo "<option value='Wiyung'>Wiyung</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Wonocolo") {
                                                echo "<option value='Wonocolo' selected>Wonocolo</option>";
                                            } else {
                                                echo "<option value='Wonocolo'>Wonocolo</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kecamatan'] == "Wonokromo") {
                                                echo "<option value='Wonokromo' selected>Wonokromo</option>";
                                            } else {
                                                echo "<option value='Wonokromo'>Wonokromo</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="formFile" class="form-label mb-3">Foto UMKM</label>

                                        <?php if (isset($_SESSION['foto_umkm'])) {
                                            echo "<input class='form-control' type='file' id='foto_umkm' name='foto_umkm' required value='$foto_umkm'>";
                                        } else {
                                            echo "<input class='form-control' type='file' id='foto_umkm' name='foto_umkm' required>";
                                        }
                                        ?>

                                    </div>

                                    <div class="mb-4">
                                        <label for="" class="form-label mb-3">Kategori UMKM</label>
                                        <!-- <label for="" style="font-size: 25px; color: red;" class="form-label">*</label> -->
                                        <?php ?>
                                        <select class="form-select" aria-label="Default select example" name="kategori_umkm" id="kategori_umkm" required>
                                            <option value="" disabled selected hidden>Pilih Kategori</option>
                                            <?php if ($_SESSION['kategori_umkm'] == "Makanan dan Minuman") {
                                                echo "<option value='Makanan dan Minuman' selected>Makanan dan Minuman</option>";
                                            } else {
                                                echo "<option value='Makanan dan Minuman'>Makanan dan Minuman</option>";;
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kategori_umkm'] == "Fashion dan pakaian") {
                                                echo "<option value='Fashion dan Pakaian' selected>Fashion dan Pakaian</option>";
                                            } else {
                                                echo "<option value='Fashion dan Pakaian'>Fashion dan Pakaian</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kategori_umkm'] == "Kerajinan tangan") {
                                                echo "<option value='Kerajinan tangan' selected>Kerajinan tangan</option>";
                                            } else {
                                                echo "<option value='Kerajinan tangan'>Kerajinan Tangan</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kategori_umkm'] == "Pertanian dan Peternakan") {
                                                echo "<option value='Pertanian dan Peternakan' selected>Pertanian dan Peternakan</option>";
                                            } else {
                                                echo "<option value='Pertanian dan Peternakan'>Pertanian dan Peternakan</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kategori_umkm'] == "Jasa") {
                                                echo "<option value='Jasa' selected>Jasa</option>";
                                            } else {
                                                echo "<option value='Jasa'>Jasa</option>";
                                            }
                                            ?>
                                            <?php
                                            if ($_SESSION['kategori_umkm'] == "Otomotif") {
                                                echo "<option value='Otomotif' selected>Otomotif</option>";
                                            } else {
                                                echo "<option value='Otomotif'>Otomotif</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label mb-3">Deskripsi UMKM (optional)</label>
                                        <?php if (isset($_SESSION['deskripsi_umkm'])) {
                                            echo "<textarea class='form-control' type='text' id='deskripsi_umkm' name='deskripsi_umkm' value='$deskripsi_umkm'></textarea>";
                                        } else {
                                            echo "<textarea class='form-control' type='text' id='deskripsi_umkm' name='deskripsi_umkm' value=''></textarea>";
                                        }
                                        ?>
                                    </div>

                                </div>

                                <div class="row mt-5">
                                    <div class="col-md-10">
                                        <button type="submit" class="next" id="next" value="Next" name="next">Next</button>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>


    <?php include "template/footer.php"; ?>


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
            $('#username').keyup(function() {
                var username = $('#username').val();

                if (username != '') {
                    $.ajax({
                        url: 'forms/usernamecheck.php',
                        method: 'POST',
                        data: {
                            username: username,
                        },
                        success: function(result) {
                            if (result == 2) {
                                $("#validation-txt-username").text("Username telah tersedia!");
                                $("#validation-txt-username").css("color", "red");
                            }
                            if (result == 1) {
                                $("#validation-txt-username").text("Username bisa digunakan");
                                $("#validation-txt-username").css("color", "green");
                                // history.replaceState({},"upload_berkas.php");
                            }
                        }
                    })
                }
            })
        })

        function validate() {
            var validationField = document.getElementById('validation-txt');
            var password = document.getElementById('password');

            var content = password.value;
            var errors = [];
            console.log(content);
            if (content.length < 8) {
                errors.push("Kata sandi Anda minimal harus 8 karakter.<br>");
            }
            if (content.search(/[a-z]/i) < 0) {
                errors.push("Kata sandi Anda harus mengandung setidaknya satu huruf.<br>");
            }
            if (content.search(/[0-9]/i) < 0) {
                errors.push("Kata sandi Anda harus mengandung setidaknya satu angka.<br>");

            }
            if (errors.length > 0) {
                validationField.innerHTML = errors.join('');

                return false;
            }
            validationField.innerHTML = errors.join('');
            return true;
        }

        function viewPassword() {
            var passwordInput = document.getElementById('password');
            var passStatus = document.getElementById('showhide');

            if (passwordInput.type == 'password') {
                passwordInput.type = 'text';
                passStatus.textContent = 'Hide';

            } else {
                passwordInput.type = 'password';
                passStatus.textContent = 'Show';
            }
        }

        $(document).ready(function() {
            $('#next').on('click', function() {
                event.preventDefault();
                // let foto_umkm = new FormData();
                // foto_umkm.append('foto_umkm', $('#foto_umkm').prop('files')[0]);
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var nama_umkm = $('#nama_umkm').val();
                var notelp_umkm = $('#notelp_umkm').val();
                var alamat_umkm = $('#alamat_umkm').val();
                var kecamatan = $('#kecamatan').val();
                var foto_umkm = $('#foto_umkm').val();
                var kategori_umkm = $('#kategori_umkm').val();
                var deskripsi_umkm = $('#deskripsi_umkm').val();

                if (username != '' && email != '' && password != '' && nama_umkm != '' && notelp_umkm != '' && alamat_umkm != '' && kecamatan != '' && foto_umkm != '' && kategori_umkm != '') {
                    $.ajax({
                        url: 'forms/form_register.php',
                        method: 'POST',
                        data: {
                            username: username,
                            email: email,
                            password: password,
                            nama_umkm: nama_umkm,
                            notelp_umkm: notelp_umkm,
                            alamat_umkm: alamat_umkm,
                            kecamatan: kecamatan,
                            foto_umkm: foto_umkm,
                            kategori_umkm: kategori_umkm,
                            deskripsi_umkm: deskripsi_umkm
                        },
                    })
                } else {
                    // alert("Mohon Lengkapi Data!");
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        timer: 10000,
                        text: 'Mohon Lengkapi Data!'
                    });

                }
            })
        })
    </script>

</body>

</html>