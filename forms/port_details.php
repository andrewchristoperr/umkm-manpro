<?php 
    session_start();
    $_SESSION['id_umkm'] = $_POST['id_umkm'];

    echo $_SESSION['id_umkm'];
?>
