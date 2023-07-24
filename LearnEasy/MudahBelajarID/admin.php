<?php
require 'functions.php';

// ambil data dari tabel mahasiswa / query data mahasiswa
$register = baca("SELECT * FROM register");

// jika tombol cari diketikan
if ( isset($_POST["cari"])) {
    $register = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pendaftar Mudah Belajar ID</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
             .table {
                display: table;
                width: 100%;
                max-width: 100%;
            }
            th {
                vertical-align: middle;
                max-width:;
            }
        </style>
    </head>

    <body>
        <div class="container mt-4">
            <h1 class="mb-4">Pendaftar Mudah Belajar ID</h1>
            <a href="register.php" class="btn btn-primary mb-3">Tambah Pendaftar Kursus</a>

            <!-- pencarian data -->
            <form class="d-flex mb-3" action="" method="post">
                <input class="form-control me-2" type="text" name="keyword" placeholder="Search here" autocomplete="off">
                <button class="btn btn-info" type="submit" name="cari">Cari</button>
            </form>
            
            <!-- tabel baca data -->
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr class="text-center ">
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Nama Panggilan</th>
                        <th scope="col">Tanggal lahir</th>
                        <th scope="col">Status Pendidikan</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($register as $record) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $record["Nama_Lengkap"]; ?></td>
                            <td><?= $record["Nama_Panggilan"]; ?></td>
                            <td><?= $record["Tanggal_Lahir"]; ?></td>
                            <td><?= $record["Status_Pendidikan"]; ?></td>
                            <td><?= $record["Username"]; ?></td>
                            <td><?= $record["Email"]; ?></td>
                            <td><?= $record["Password"]; ?></td>
                            <td>
                                <div class="d-flex justify-content-center justify-content-md-start">
                                    <a href="update.php?ID=<?= $record["ID"]; ?>" class="btn btn-primary btn-sm me-2">Ubah Data</a>
                                    <a href="delete.php?ID=<?= $record["ID"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapusnya')">Hapus Data</a>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
