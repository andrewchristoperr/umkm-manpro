<?php

require '../connect.php';
session_start();

$id = $_SESSION['login'];
$sql = "SELECT username FROM umkmm WHERE id = $id";
$user = $conn->query($sql)->fetch();
$username = $user['username'];


$list_file = array($_FILES['dokumen_pendukung']);
$list_type = array("dokumen_pendukung");
$list_file_type = array("dokumen_pendukung");
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
                    $new_img_name = strtolower($user['username']) . '_' . $list_file_type[$i] . date("mjYHis") . '.' . $img_ex_lc;

                    # path
                    $path = "bantuan/" . $list_type[$i] . "/";
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

    $id = $_SESSION['login'];
    $alasan_pengajuan = $_POST['alasan_pengajuan'];
    $nominal = $_POST['nominal'];
    $rincian_dana = $_POST['rincian_dana'];
    $tenda = $_POST['tenda'];
    $gerobak = $_POST['gerobak'];
    $spanduk = $_POST['spanduk'];
    $lainnya = $_POST['lainnya'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO bantuan (id_umkm,alasan, dokumen_pendukung, kebutuhan_dana_nominal, kebutuhan_dana_rincian, kebutuhan_tenda, kebutuhan_gerobak, kebutuhan_spanduk, kebutuhan_lainnya_ket,keterangan) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $query = $conn->prepare($sql);
    $query->execute([$id, $alasan_pengajuan, $list_file_path[0], $nominal, $rincian_dana, $tenda, $gerobak, $spanduk, $lainnya, $keterangan]);
}

echo json_encode(['status' => 'success', 'msg' => 'Berhasil Submit!']);

// $stmt = $conn->query($query);

// $sql = "INSERT INTO bantuan (alasan, dokumen_pendukung, keterangan) VALUES (?,?,?,?,?,?,?,?,?)";
// $bindParam = [$alasan_pengajuan, $dokumen_pendukung,$keterangan];
// $query = $conn->prepare("");
// $query->execute($bindParam);
// $bantuan = $query->fetch();
// if ($query->rowCount() == 0) {
//     $_SESSION['error'] = 'Pengajuan Bantuan Gagal!';
// } else {
//     $_SESSION['success'] = 'Pengajuan Bantuan Berhasil!';
//     // header('location: profile.php');
// }
