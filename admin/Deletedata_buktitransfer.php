<?php
    include "fungsi.php";
    $id = $_GET['id'];

    if (deletebuktitransfer($id) > 0) {
        echo "
            <script>
                alert('Bukti Transfer Berhasil Di Hapus');
                document.location.href = 'Kelola_Buktitransfer.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Bukti Transfer Tidak Berhasil Di Hapus');
                document.location.href = 'Kelola_Buktitransfer.php';
            </script>
        ";
        echo("<br>");
        echo mysqli_error($koneksi);
    }
    
?>