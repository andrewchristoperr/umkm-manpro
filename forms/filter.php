<?php
require "../connect.php";
session_start();

$kategori_umkm = $_POST['kategori'];
$_SESSION['kategori'] = $kategori_umkm;
if (isset($_SESSION['kategori'])) {
    if ($_SESSION['kategori'] != 'All') {
        $kategori_umkm = $_SESSION['kategori'];
        $query = "SELECT * FROM umkmm WHERE kategori_umkm = '$kategori_umkm'";
        $stmt = $conn->query($query)->fetchAll();
    } else {
        $query = "SELECT * FROM umkmm";
        $stmt = $conn->query($query)->fetchAll();
    }
} else {
    $query = "SELECT * FROM umkmm";
    $stmt = $conn->query($query)->fetchAll();
}
$output ='';
if ($stmt == null) {
    $output = "<p>Belum ada UMKM</p>";
} else if ($stmt != null) {
    foreach ($stmt as $row) {
        $output .= '
                <div class="col-lg-3 col-md-4 mb-5">
                  <div class="card h-100" id="card-umkm">
                    <img class="card-img-top" src="image.php?id=' .$row["id"]. ' " alt="Card image cap" style="padding: 10px; border-radius: 15px;">
                    <div class="card-body">
                      <p class="card-text list_umkm">' .$row["nama_umkm"]. '</p>
                      <p class="card-text">Kategori: ' .$row["kategori_umkm"]. '</p>
                      <p hidden id="id_umkm">' .$row['id']. '</p>
                    </div>
                  </div>
                </div>
  ';
    }
}


echo $output;
?>
<!-- <script>
    $(document).ready(function() {
      $('.button_details').on('click', function() {
        // event.preventDefault();
        var id_umkm = $('#id_umkm').val();
        // location.href = 'portfolio-details.php';
        if (id_umkm != null) {
          $.ajax({
            url: 'forms/port_details.php',
            method: 'POST',
            data: {
              id_umkm: id_umkm
            },
            success: function(result) {
              alert(result);
            }
          })
        }
      });
    });
  </script> -->
