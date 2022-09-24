<?php
    include "fungsi.php";
    $id = $_GET['id'];

    if (deletepemasukan($id) > 0) {
        echo "
            <script>
                alert('Data Pemasukan Berhasil Di Hapus');
                document.location.href = 'EditData_Yayasan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Pemasukan Tidak Berhasil Di Hapus');
                document.location.href = 'EditData_Yayasan.php';
            </script>
        ";
        echo("<br>");
        echo mysqli_error($koneksi);
    }
    
?>