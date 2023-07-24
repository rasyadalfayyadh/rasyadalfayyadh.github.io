<?php
// koneksi ke database
$conn = mysqli_connect("localhost","root","","usermudahbelajarid");


// function query dari tabel mahasiswa agar yang ditampilkan bukan berupa box namun datanya yang telah tersusun
function baca($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



// register(create) dari mudah belajar id
function tambah($data) {
    global $conn;

    // Mengambil data inputan dari user ke variabel baru
    $Nama_Lengkap = htmlspecialchars($data["Nama_Lengkap"]);
    $Nama_Panggilan = htmlspecialchars($data["Nama_Panggilan"]);
    $Tanggal_Lahir = htmlspecialchars($data["Tanggal_Lahir"]);
    $Status_Pendidikan = htmlspecialchars($data["Status_Pendidikan"]);
    $Username = strtolower(stripcslashes(htmlspecialchars($data["Username"])));
    $Email = htmlspecialchars($data["Email"]);
    $Password = mysqli_real_escape_string($conn, $data["Password"]);
    $Konfirmasi_Password = mysqli_real_escape_string($conn, $data["Konfirmasi_Password"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT Username FROM register WHERE Username = '$Username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script> alert('Username sudah terdaftar!'); </script>";
        return false;
    }

    // cek konfirmasi password
    if($Password !== $Konfirmasi_Password) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    // enkripsi password
    $Password = password_hash($Password, PASSWORD_DEFAULT);
    // var_dump($password); die;

    // tambahkan userbaru ke database
    $query = "INSERT INTO register (ID, Nama_Lengkap, Nama_Panggilan, Tanggal_Lahir, Status_Pendidikan, Username, Email, Password) VALUES ('', '$Nama_Lengkap', '$Nama_Panggilan', '$Tanggal_Lahir', '$Status_Pendidikan', '$Username', '$Email', '$Password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



// menghapus akun user mudah belajar ID
function hapus($ID) {
    global $conn;
    mysqli_query($conn, "DELETE FROM register WHERE ID = $ID");
    return mysqli_affected_rows($conn);
}



// mengubah data akun user mudah belajar ID
function ubah($data) {
    global $conn;
    $ID = $data["ID"];
    $Nama_Lengkap = htmlspecialchars($data["Nama_Lengkap"]);
    $Nama_Panggilan = htmlspecialchars($data["Nama_Panggilan"]);
    $Tanggal_Lahir = htmlspecialchars($data["Tanggal_Lahir"]);
    $Status_Pendidikan = htmlspecialchars($data["Status_Pendidikan"]);
    $Username = strtolower(stripcslashes(htmlspecialchars($data["Username"])));
    $Email = htmlspecialchars($data["Email"]);
    $Password = mysqli_real_escape_string($conn, $data["Password"]);
    $Konfirmasi_Password = mysqli_real_escape_string($conn, $data["Konfirmasi_Password"]);

    // cek konfirmasi password
    if($Password !== $Konfirmasi_Password) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    // enkripsi password
    $Password = password_hash($Password, PASSWORD_DEFAULT);
    // var_dump($password); die;

    $query = "UPDATE register SET 
                Nama_Lengkap = '$Nama_Lengkap',
                Nama_Panggilan = '$Nama_Panggilan',
                Tanggal_Lahir = '$Tanggal_Lahir',
                Status_Pendidikan = '$Status_Pendidikan',
                Username = '$Username',
                Email = '$Email',
                Password = '$Password'
                WHERE ID = $ID
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



// pencarian data
function cari($keyword) {
    $query ="SELECT * FROM register WHERE
    Nama_Lengkap LIKE '%$keyword%' OR
    Nama_Panggilan LIKE '%$keyword%' OR
    Username LIKE '%$keyword%' OR
    Email LIKE '%$keyword%' OR
    Status_Pendidikan LIKE '%$keyword%'
    ";
    return baca($query);
}




?>