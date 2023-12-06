<?php

require 'connect.php';
session_start();

if (isset($_SESSION['login']))
    header('location: profile.php');


if (isset($_POST['login'])) {
    if ($_POST['username'] != '' && $_POST['password'] != '') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM umkmm WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($stmt->rowCount() == 0) {
            $_SESSION['error'] = 'Akun belum terdaftar!';
        }
        else if (!password_verify($password, $user['password'])) {
            $_SESSION['error'] = 'Password Salah!';
        } 
        // else if ($password != $user['password']) {
        //     $_SESSION['error'] = 'Password Salah!';
        // } 
        else {
            $_SESSION['success'] = 'Login Berhasil!';
            $_SESSION['login'] = $user['id'];
            if ($_SESSION['login'] == '4') {
                header('location: admin/page/ltr/pendaftaran.php');
            } else {
                header('location: profile.php');
            }
        }
    } else {
        $_SESSION['error'] = 'Fill up login form first';
    }
}
// header('location: profile.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <style>
        .login-form {
            max-width: 500px;
            border: 1px solid #ddd;
            border-radius: 8px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
        }

        .login-form .title {
            padding: 15px 10px;
            text-align: center;
            font-size: 25px;

        }

        .login-form .content {
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="login-form">

        <div class="title bg-dark text-white">
            WELCOME!
        </div>

        <div class="content">

            <?php
            if (isset($_SESSION['error'])) {
                echo "
                        <div class='alert alert-danger text-center'>
                            <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
                        </div>
                    ";

                //unset error
                unset($_SESSION['error']);
            }

            if (isset($_SESSION['success'])) {
                echo "
                        <div class='alert alert-success text-center'>
                            <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
                        </div>
                    ";

                //unset success
                unset($_SESSION['success']);
            }
            ?>

            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-dark" name="login">Login</button>
                </div>
            </form>
            <div class="text-center mt-1">
                Belum punya akun ? <a href="register.php" style="text-decoration: none;">Sign Up</a>
            </div>
        </div>
    </div>
</body>

</html>