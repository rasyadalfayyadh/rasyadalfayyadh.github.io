<?php
// sesi mulai
session_start();

if(isset($_SESSION["register"])) {
    header("Location: /LearnEasy/homemu.php");
    exit;
}

require 'functions.php';

// cek apakah data berhasil di tambahkan atau tidak
if (isset ($_POST["register"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = '/LearnEasy/homemu.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
            </script>
        ";
}
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Pendaftaran Mudah Belajar ID</title>
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
                            <h6 class="card-subtitle mb-4 text-center" style="color:grey;">Silahkan mengisi form Pendaftaran dibawah ini</h6>
                            <div class="text-end">
                                <a href="../../LearnEasy"><button class="btn btn-dark">Kembali</button></a>
                            </div>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="namalengkap" class="form-label">Nama Lengkap :</label>
                                    <input type="text" name="Nama_Lengkap" id="namalengkap" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="namapanggilan" class="form-label">Nama Panggilan :</label>
                                    <input type="text" name="Nama_Panggilan" id="namapanggilan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggallahir" class="form-label">Tanggal Lahir :</label>
                                    <input type="date" name="Tanggal_Lahir" id="tanggallahir" class="form-control" required>
                                </div>
                                <div class="mb-5">
                                    <label for="statuspendidikan" class="form-label">Status Pendidikan :</label>
                                    <select name="Status_Pendidikan" id="statuspendidikan" class="form-select" required>
                                    <option value="">Pilih Status Pendidikan</option>
                                    <option value="SD/Sederajat">SD/Sederajat</option>
                                    <option value="SMP/Sederajat">SMP/Sederajat</option>
                                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Bekerja">Bekerja</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                </div>
                                <div class="mb-5" id="lainnyaInput" style="display: none;">
                                    <label for="statuspendidikan_lainnya" class="form-label">Status Pendidikan Lainnya :</label>
                                    <input type="text" name="Status_Pendidikan_Lainnya" id="statuspendidikan_lainnya" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username :</label>
                                    <input type="text" name="Username" id="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Email :</label>
                                    <input type="email" name="Email" id="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password :</label>
                                    <input type="password" name="Password" id="password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="konfirmasipassword" class="form-label">Konfirmasi Password :</label>
                                    <input type="password" name="Konfirmasi_Password" id="konfirmasipassword" class="form-control" required>
                                </div>
                                <div class="text-center mb-5">
                                    <a href="login.php">Sudah Mempunyai Akun ?</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="register" class="btn btn-success daftar">Daftar Sekarang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const statusPendidikanSelect = document.getElementById('statuspendidikan');
            const lainnyaInputDiv = document.getElementById('lainnyaInput');

            statusPendidikanSelect.addEventListener('change', function() {
                const selectedOption = statusPendidikanSelect.value;
                if (selectedOption === 'Lainnya') {
                    lainnyaInputDiv.style.display = 'block';
                    document.getElementById('statuspendidikan_lainnya').required = true;
                } else {
                    lainnyaInputDiv.style.display = 'none';
                    document.getElementById('statuspendidikan_lainnya').required = false;
                }
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>