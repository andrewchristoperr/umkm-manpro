<?php
require "connect.php";
if (isset($_GET['id'])) {
    $query = "SELECT * FROM umkmm WHERE id = '".$_GET['id']."'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
    echo $result['foto_umkm'];
}
?>