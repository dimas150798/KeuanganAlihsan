<?php
    include "fungsi.php";
    $id = $_GET['id'];

    if (deleteakunpegawai($id) > 0) {
        echo "
            <script>
                alert('Hapus Data Berhasil');
                document.location.href = 'KelolaAkun_pegawai.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Hapus Data Gagal');
                document.location.href = 'KelolaAkun_pegawai.php';
            </script>
        ";
        echo("<br>");
        echo mysqli_error($koneksi);
    }
    
?>