<?php
require "connect.php";
if (isset($_GET['id'])) {
    $query = "SELECT * FROM umkmm WHERE id = '" . $_GET['id'] . "'";
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
