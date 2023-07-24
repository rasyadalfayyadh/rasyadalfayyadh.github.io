<?php
require 'functions.php';

// ambil data di url
$ID = $_GET["ID"];

$pendaftar = baca("SELECT * FROM register WHERE ID = $ID")[0];
// var_dump($pendaftar["Nama_Lengkap"]);

// cek apakah data berhasil di tambahkan atau tidak
if (isset ($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'admin.php';
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
    <title>Form Perubahan Data Akun Mudah Belajar ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Mudah Belajar ID</h1>
                        <h4 class="card-subtitle mb-4 text-center">Silahkan ubah data anda di dibawah ini</h4>
                        <div class="text-end">
                            <a href="read.php"><button class="btn btn-dark">Kembali</button></a>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="ID" value="<?= $pendaftar["ID"]; ?>">
                            <div class="mb-3">
                                <label for="namalengkap" class="form-label">Nama Lengkap :</label>
                                <input type="text" name="Nama_Lengkap" id="namalengkap" class="form-control" required value="<?= $pendaftar["Nama_Lengkap"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="namapanggilan" class="form-label">Nama Panggilan :</label>
                                <input type="text" name="Nama_Panggilan" id="namapanggilan" class="form-control" required value="<?= $pendaftar["Nama_Panggilan"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tanggallahir" class="form-label">Tanggal Lahir :</label>
                                <input type="date" name="Tanggal_Lahir" id="tanggallahir" class="form-control" required value="<?= $pendaftar["Tanggal_Lahir"]; ?>">
                            </div>
                            <div class="mb-5">
                                <label for="statuspendidikan" class="form-label">Status Pendidikan :</label>
                                <select name="Status_Pendidikan" id="statuspendidikan" class="form-select" required value="<?= $pendaftar["Status_Pendidikan"]; ?>">
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
                                <input type="text" name="Status_Pendidikan" id="statuspendidikan_lainnya" class="form-control" required value="<?= $pendaftar["Status_Pendidikan"]; ?>">
                            </div>
                        
                            <div class="mb-3">
                                <label for="username" class="form-label">Username :</label>
                                <input type="text" name="Username" id="username" class="form-control" required value="<?= $pendaftar["Username"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Email :</label>
                                <input type="email" name="Email" id="username" class="form-control" required value="<?= $pendaftar["Email"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password :</label>
                                <input type="password" name="Password" id="password" class="form-control" required value="<?= $pendaftar["Password"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="konfirmasipassword" class="form-label">Konfirmasi Password :</label>
                                <input type="password" name="Konfirmasi_Password" id="konfirmasipassword" class="form-control" required value="<?= $pendaftar["Konfirmasi_Password"]; ?>">
                            </div>
                            <div class="text-end">
                                <button type="submit" name="submit" class="btn btn-success">Ubah Data</button>
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
