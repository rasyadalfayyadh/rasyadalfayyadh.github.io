<?php
require 'functions.php';
$ID = $_GET["ID"];

if (hapus($ID)> 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'admin.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'admin.php';
        </script>
    ";
}


?>