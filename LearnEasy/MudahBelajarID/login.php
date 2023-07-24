<?php
// sesi mulai
session_start();

if(isset($_SESSION["login"])) {
    header("Location: /LearnEasy/homemu.php");
    exit;
}

require 'functions.php';

if(isset($_POST["login"])) {
    $Username =$_POST["Username"];
    $Password =$_POST["Password"];

    $result = mysqli_query($conn, "SELECT * FROM register WHERE Username = '$Username'");

    // cek username
    if(mysqli_num_rows($result) === 1) {
         // cek password
         $row = mysqli_fetch_assoc($result);
        if(password_verify($Password, $row["Password"])) {
            // Set session "login" dan "username"
            $_SESSION["login"] = true;
            $_SESSION["myname"] = $row["Nama_Panggilan"];
            header("Location: /LearnEasy/homemu.php");
            exit;
        }
    }

    $error = true;
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Masuk ke Mudah Belajar ID</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-image: url(../myimg/backgroundbody.avif);
                background-repeat: repeat-x repeat-y;
                background-size: 1000px;
            }
            .card-body {
                padding : 64px;
            }
            .daftar {
                padding : 16px 32px;
                border-radius: 32px;
            }
        </style>
    </head>

    <body>
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-5">
                    <img src="img/logo.webp" alt="background">
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Selamat Datang di Mudah Belajar ID</h2><br>
                            <h6 class="card-subtitle mb-4 text-center" style="color:grey;">Silahkan Masuk dengan username dan password anda</h6>
                            <div class="text-end">
                                <a href="../../LearnEasy"><button class="btn btn-dark">Kembali</button></a>
                            </div>
                            <!-- peringatan error -->
                            <?php if(isset($error)) : ?>
                                <p style="color: red; font-style:italic;">username / password salah</p>
                            <?php endif; ?>

                            <form action="" method="post">
                                
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username :</label>
                                    <input type="text" name="Username" id="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password :</label>
                                    <input type="password" name="Password" id="password" class="form-control" required>
                                </div>
                                <div class="text-center mb-5">
                                    <a href="register.php">Belum Mempunyai Akun ?</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="login" class="btn btn-success daftar">Masuk Sekarang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>