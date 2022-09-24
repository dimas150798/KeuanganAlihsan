<?php
    include "fungsi.php";
    $id = $_GET['id'];

    if (deletevalidasi($id) > 0) {
        echo "
            <script>
                alert('Hapus Data Berhasil');
                document.location.href = 'Validasi_TK.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Hapus Data Gagal');
                document.location.href = 'Validasi_TK.php';
            </script>
        ";
        echo("<br>");
        echo mysqli_error($koneksi);
    }
    
?>