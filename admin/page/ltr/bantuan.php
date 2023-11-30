<?php
require "../../../connect.php";

$sql = "SELECT * FROM bantuan WHERE status = 2";
$stmt = $conn->query($sql)->fetchAll();

?>
<!DOCTYPE html>
<html dir="page" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Nice lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Nice admin lite design, Nice admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Nice Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin Kecamatan</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/niceadmin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <style>
        .page-wrapper {
            background: #f2f4f5;
            position: relative;
            transition: 0.2s ease-in;
            display: block;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="pendaftaran.html" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text text-white" alt="homepage">
                                KECAMATAN
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->

                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 me-1"></i>
                                    <div class="ms-1 d-none d-sm-block">
                                        <span>Search</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <!-- <a class="dropdown-item" href="profile.html"><i class="ti-user me-1 ms-1"></i> -->
                                <a class="dropdown-item" href="account.html">
                                    Akun</a>
                                <!-- <a class="dropdown-item" href=""><i class="ti-wallet me-1 ms-1"></i> -->
                                <a class="dropdown-item" href="">
                                    Pengaturan</a>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pendaftaran.php" aria-expanded="false">
                                <i class="mdi mdi-folder-multiple"></i>
                                <span class="hide-menu">Pendaftaran</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="umkm.php" aria-expanded="false">
                                <i class="mdi mdi-folder-multiple"></i>
                                <span class="hide-menu">List UMKM</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="umkm_tolak.php" aria-expanded="false">
                                <i class="mdi mdi-folder-multiple"></i>
                                <span class="hide-menu">List UMKM yang tertolak</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="bantuan.php" aria-expanded="false">
                                <i class="mdi mdi-folder-multiple"></i>
                                <span class="hide-menu">Bantuan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../../logout.php" aria-expanded="false">
                                <i class="mdi mdi-archive"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="account.html" aria-expanded="false">
                                <i class="mdi mdi-account"></i>
                                <span class="hide-menu">Akun</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.html" aria-expanded="false">
                                <i class="mdi mdi-file"></i>
                                <span class="hide-menu">Blank</span>
                            </a>
                        </li> -->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Verifikasi Bantuan UMKM</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Kecamatan</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Bantuan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tabel Bantuan</h4>
                                <h6 class="card-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                            <!-- <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama UMKM</th>
                                            <th scope="col">Tanggal Pengajuan</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Pandan Wangi</td>
                                            <td>06/09/2019</td>
                                            <td>
                                                <a href="detail-bantuan.php" class="btn btn-outline-info">Rincian</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success">Terima</button>
                                                <button type="button" class="btn btn-outline-danger">Tolak</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Pandan Wangi</td>
                                            <td>06/09/2019</td>
                                            <td>
                                                <a href="detail-bantuan.html" class="btn btn-outline-info">Rincian</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success">Terima</button>
                                                <button type="button" class="btn btn-outline-danger">Tolak</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Pandan Wangi</td>
                                            <td>06/09/2019</td>
                                            <td>
                                                <a href="detail-bantuan.html" class="btn btn-outline-info">Rincian</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success">Terima</button>
                                                <button type="button" class="btn btn-outline-danger">Tolak</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> -->

                            <div class="table-responsive" style="padding: 10px;">
                                <table class="table table-hover nowrap" id="tableBantuan" style="width: 100%;">
                                    <thead id="thead-tableBantuan" class="nowrap" style="width: 100%;">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Tanggal Pengajuan</th>
                                            <th scope="col">Nama UMKM</th>
                                            <th scope="col">Alasan</th>
                                            <th scope="col">Dokumen Pendukung</th>
                                            <th scope="col">Kebutuhan Dana</th>
                                            <th scope="col">Kebutuhan Rincian</th>
                                            <th scope="col">Kebutuhan Tenda</th>
                                            <th scope="col">Kebutuhan Gerobak</th>
                                            <th scope="col">Kebutuhan Spanduk</th>
                                            <th scope="col">Kebutuhan Lainnya</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-tableBantuan">
                                        <?php
                                        if ($stmt != null) {
                                            $no = 0;
                                            foreach ($stmt as $data) {
                                                $no++;
                                                $id = $data['id_umkm'];
                                                $nama_umkm = "SELECT nama_umkm FROM umkmm WHERE id = $id";
                                                $nama_umkm = $conn->query($nama_umkm)->fetch();
                                                echo '
                                                <tr>
                                                    <td>' . $no . '</td>
                                                    <td>' . $data['tanggal'] . '</td>
                                                    <td>' . $nama_umkm['nama_umkm'] . '</td>
                                                    <td>' . $data['alasan'] . '</td>
                                                    <td>' . $data['dokumen_pendukung'] . '</td>
                                                    <td>' . $data['kebutuhan_dana_nominal'] . '</td>
                                                    <td>' . $data['kebutuhan_dana_rincian'] . '</td>
                                                    <td>' . $data['kebutuhan_tenda'] . '</td>
                                                    <td>' . $data['kebutuhan_gerobak'] . '</td>
                                                    <td>' . $data['kebutuhan_spanduk'] . '</td>
                                                    <td>' . $data['kebutuhan_lainnya_ket'] . '</td>
                                                    <td>' . $data['keterangan'] . '</td>
                                                    <td>
                                                    <button class="btn btn-outline-success" onclick="terimaBantuan(' . $data['id'] . ')">Terima</button>
                                                    <button class="btn btn-outline-danger" onclick="tolakBantuan(' . $data['id'] . ')">Tolak</button>
                                                    </td>
                                                </tr>
                                                ';
                                        ?>
                                                

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Semua Hak Dilindungi oleh Kecamatan. Dirancang dan Dikembangkan oleh
                <a href="">Kecamatan</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <script>
        let table = new DataTable('#tableBantuan', {
            paging: true,
            scrollX: true

        });

        function tolakBantuan(id) {
            $.ajax({
                url: 'api/prosesTolakBantuan.php',
                method: "POST",
                data: {
                    id: id
                },
                success: function(result) {
                    document.getElementById('tbody-tableBantuan').innerHTML = result;
                }
            })
        }

        function terimaBantuan(id) {
            $.ajax({
                url: 'api/prosesTerimaBantuan.php',
                method: "POST",
                data: {
                    id: id
                },
                success: function(result) {
                    document.getElementById('tbody-tableBantuan').innerHTML = result;
                }
            })
        }
    </script>
</body>

</html>