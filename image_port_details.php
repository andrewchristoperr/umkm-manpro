<?php
require "connect.php";
if (isset($_SESSION['id_umkm'])) {
    $query = "SELECT * FROM umkmm WHERE id = '" . $_SESSION['id_umkm'] . "'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
    echo $result['foto_umkm'];
}
if (empty($result))
    header("HTTP/1.0 404 Not Found");
else {
    echo $$result['foto_umkm'];
}
