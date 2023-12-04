<?php
require '../connect.php';
session_start();


$namaProduk = $_POST['namaProduk'];
$select = "SELECT nama_produk FROM products WHERE nama_produk = '$namaProduk'";
$select = $conn->query($select);
if ($select->rowCount() > 0) {
    $result = 2;
    echo ($result);
} else {
    $list_file = array($_FILES['fotoProduk']);
    $list_type = array("fotoProduk");
    $list_file_type = array("fotoProduk");
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
                        $new_img_name = $_POST['umkm_id'] . '_' . strtolower($_POST['namaProduk']) . '_' . $list_file_type[$i] . '.' . $img_ex_lc;

                        # path
                        $path = "produk/";
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

    if (sizeof($list_file_upload) == 1) {
        for ($i = 0; $i < sizeof($list_file); $i++) {
            $tmp_name = $list_file[$i]['tmp_name'];
            move_uploaded_file($tmp_name, $list_file_path[$i]);
        }

        $umkm_id = $_POST['umkm_id'];
        $namaProduk = $_POST['namaProduk'];
        $deskripsiProduk = $_POST['deskripsiProduk'];
        $hargaProduk = $_POST['hargaProduk'];

        // $sql = "INSERT INTO umkmm (username, email, password, nama_umkm, notelp_umkm, alamat_umkm, kecamatan, foto_umkm, kategori_umkm, deskripsi_umkm, formulir, surat_pengantar, ktp, npwp) VALUES (?,?,?,?,?, ?,?,?,?,?, ?,?,?,?)";
        // $query = $conn->prepare($sql);
        // $query->execute([$username, $email, $password, $nama_umkm, $notelp_umkm, $alamat_umkm, $kecamatan, $list_file_path[0], $kategori_umkm, $deskripsi_umkm, $list_file_path[1], $list_file_path[2], $list_file_path[3], $list_file_path[4]]);

        // $insert = "INSERT INTO products (nama_produk, deskripsi_produk, harga_produk, foto_produk, umkm_id)
        //               VALUES ('$namaProduk', '$deskripsiProduk', '$hargaProduk', '$list_file_path[0]', '$umkm_id')";
        // $insert = $conn->query($insert);

        $sql = "INSERT INTO products (nama_produk, deskripsi_produk, harga_produk, foto_produk, umkm_id) VALUES (?,?,?,?,?)";
        $query = $conn->prepare($sql);
        $query->execute([$namaProduk, $deskripsiProduk, $hargaProduk, $list_file_path[0], $umkm_id]);

        $result = 1;
        echo ($result);
    }
}
