<?php
require "connect.php";
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $msg = "";
    $check_admin = "SELECT * FROM user_admin WHERE username = ?";
    $check_admin = $conn->prepare($check_admin);
    $check_admin->execute([$username]);
    $fetch_admin = $check_admin->fetch();


    if ($fetch_admin->rowCount() == 1) {
        $_SESSION['nama'] = $fetch_admin['nama_admin'];
        header('location: index_admin.php');
    } else if ($fetch_admin->rowCount() ==0 ) {
        $msg = "Username / pass salah";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>
<style>
    .login-form {
        border: 1px solid #ddd;
        border-radius: 8px;
        max-width: 600px;
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .login-title {
        padding: 10px;
        text-align: center;
    }

    .content {
        padding: 15px;
        margin: 10px;
    }
</style>

<body>
    <div class="login-form">
        <div class="login-title bg-dark text-white">
            <h2>WELCOME!</h2>
        </div>
        <div class="content">
            <?= isset($msg) ? '<div class="alert alert-danger">' . $msg . '</div>' : ' ' ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-dark" name="login">Login</button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>