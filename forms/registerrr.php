<?php
require '../connect.php';
session_start();

$username = $_POST['username'];
$select = "SELECT username FROM umkmm WHERE username = '$username'";
$select = $conn->query($select);
if ($select->rowCount() > 0) {
    $result = 2;
    echo json_encode(["status" => "2"]);
} 
else {
    $list_file = array($_FILES['foto_umkm'], $_FILES['formulir'], $_FILES['surat_pengantar'], $_FILES['ktp'], $_FILES['npwp']);
    $list_type = array("foto_umkm", "formulir", "surat_pengantar", "ktp", "npwp");
    $list_file_type = array("foto_umkm", "formulir", "surat_pengantar", "ktp", "npwp");
    $list_file_upload = [];
    $list_file_path = [];
    for ($i = 0; $i < sizeof($list_file); $i++) {
        if (isset($list_file[$i])) {
            $img_name = $list_file[$i]['name'];
            $img_size = $list_file[$i]['size'];
            $error = $list_file[$i]['error'];

            if ($error === 0) {
                if ($img_size > 2000000) {
                    $em = "File size is to big! Please upload a file with a size below 2MB";
                    $error = array('error' => 1, 'em' => $em, 'type' => 'size', 'file' => $list_type[$i]);
                    echo json_encode($error);

                    exit();
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png", "pdf");

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        # rename
                        $new_img_name = strtolower($_POST['username']).'_'.$list_file_type[$i] . '.' . $img_ex_lc;

                        # path
                        $path = "register/" . $list_type[$i] . "/";
                        $img_upload_path = $path . $new_img_name;

                        array_push($list_file_path, $img_upload_path);
                        array_push($list_file_upload, $new_img_name);
                    } else {
                        $em = "File type does not match. Please upload files with type: jpg, jpeg, png, or pdf.";
                        $error = array('error' => 1, 'em' => $em, 'type' => 'extensions', 'file' => $list_type[$i]);
                        echo json_encode($error);

                        exit();
                    }
                }
            } else {
                $em = "An unknown error occured, please try again later";
                $error = array('error' => 1, 'em' => $em, 'type' => 'unknown', 'file' => $list_jenis_berkas[$i]);
                echo json_encode($error);

                exit();
            }
        }
    }

    if (sizeof($list_file_upload) == 5) {
        for ($i = 0; $i < sizeof($list_file); $i++) {
            $tmp_name = $list_file[$i]['tmp_name'];
            move_uploaded_file($tmp_name, $list_file_path[$i]);
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nama_umkm = $_POST['nama_umkm'];
        $notelp_umkm = $_POST['notelp_umkm'];
        $alamat_umkm = $_POST['alamat_umkm'];
        $kecamatan = $_POST['kecamatan'];
        $kategori_umkm = $_POST['kategori_umkm'];
        $deskripsi_umkm = $_POST['deskripsi_umkm'];

        // $sql = "INSERT INTO umkmm (username, email, password, nama_umkm, notelp_umkm, alamat_umkm, kecamatan, foto_umkm, kategori_umkm, deskripsi_umkm, formulir, surat_pengantar, ktp, npwp) VALUES (?,?,?,?,?, ?,?,?,?,?, ?,?,?,?)";
        // $query = $conn->prepare($sql);
        // $query->execute([$username, $email, $password, $nama_umkm, $notelp_umkm, $alamat_umkm, $kecamatan, $list_file_path[0], $kategori_umkm, $deskripsi_umkm, $list_file_path[1], $list_file_path[2], $list_file_path[3], $list_file_path[4]]);

        $insert = "INSERT INTO umkmm (username, email, password, nama_umkm, notelp_umkm, alamat_umkm, kecamatan, foto_umkm, kategori_umkm, deskripsi_umkm, formulir, surat_pengantar, ktp, npwp) 
                  VALUES ('$username', '$email', '$password', '$nama_umkm', '$notelp_umkm', '$alamat_umkm', '$kecamatan', '$list_file_path[0]', '$kategori_umkm', '$deskripsi_umkm', '$list_file_path[1]', '$list_file_path[2]', '$list_file_path[3]', '$list_file_path[4]')";
        $insert = $conn->query($insert);
    }

    echo json_encode(['status' => 'success', 'msg' => 'Berhasil Submit!']);
    session_destroy();
}


// $_SESSION['username'] = $_POST['username'];
// $_SESSION['email'] = $_POST['email'];
// $_SESSION['password'] = $_POST['password'];
// $_SESSION['nama_umkm'] = $_POST['nama_umkm'];
// $_SESSION['notelp_umkm'] = $_POST['notelp_umkm'];
// $_SESSION['alamat_umkm'] = $_POST['alamat_umkm'];
// $_SESSION['kecamatan'] = $_POST['kecamatan'];
// $_SESSION['kategori_umkm'] = $_POST['kategori_umkm'];
// $_SESSION['deskripsi_umkm'] = $_POST['deskripsi_umkm'];
// $_SESSION['formulir'] = $_POST['formulir'];
// $_SESSION['surat_pengantar'] = $_POST['surat_pengantar'];
// $_SESSION['ktp'] = $_POST['ktp'];
// $_SESSION['npwp'] = $_POST['npwp'];

// $username = $_POST['username'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $nama_umkm = $_POST['nama_umkm'];
// $notelp_umkm = $_POST['notelp_umkm'];
// $alamat_umkm = $_POST['alamat_umkm'];
// $kecamatan = $_POST['kecamatan'];
// $foto_umkm = $_POST['foto_umkm'];
// $kategori_umkm = $_POST['kategori_umkm'];
// $deskripsi_umkm = $_POST['deskripsi_umkm'];
// $formulir = $_POST['formulir'];
// $surat_pengantar = $_POST['surat_pengantar'];
// $ktp = $_POST['ktp'];
// $npwp = $_POST['npwp'];

// $insert = "INSERT INTO umkmm (username, email, password, nama_umkm, notelp_umkm, alamat_umkm, kecamatan, foto_umkm, kategori_umkm, deskripsi_umkm, formulir, surat_pengantar, ktp, npwp) 
//           VALUES ('$username', '$email', '$password', '$nama_umkm', '$notelp_umkm', '$alamat_umkm', '$kecamatan', '$foto_umkm', '$kategori_umkm', '$deskripsi_umkm', '$formulir', '$surat_pengantar', '$ktp', '$npwp')";
// $insert = $conn->query($insert);

// echo json_encode(['status' => 'success', 'msg' => 'Berhasil Submit!']);
// session_destroy();
