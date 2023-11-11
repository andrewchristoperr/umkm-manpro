<?php
require "../connect.php";

$categories = $_POST['categories'];

if ($categories == 'all') {
    $query = "SELECT * FROM umkmm";
} else {
    $query = "SELECT * FROM umkmm WHERE kategori_umkm = $categories";
}


$stmt = $conn->query($query)->fetchAll();

foreach($stmt as $row){
    $output.='
    <div class="col-lg-3 col-md-4 mb-5">
        <div class="card h-100">
            <img class="card-img-top" src="'.$row['foto_umkm'].'" alt="Card image cap" style="padding: 10px;">
            <div class="card-body">
                <p class="card-text">'.$row['nama_umkm'].'</p>
            </div>
        </div>
    </div>
    ';
}

echo $output;
