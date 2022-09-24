<?php
    ini_set("display_errors", 0);
       
    $lokasi1 = "Dashboard";
    $lokasi2 = "Keseluruhan";
    $linklokasi2 = "";

    include "../kb_tk/template/header.php";   
    include "../kb_tk/template/menu.php";
    include "../kb_tk/template/lokasi.php";
    include "../kb_tk/fungsi.php";


    // Pemasukan KB - TK AL - IHSAN
    $hasil5=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU001'");
    while ($jumlah5=mysqli_fetch_array($hasil5)){
    $arrayhasil5[] = $jumlah5['kd_jumlah'];
    }
    $pemasukanTK = array_sum($arrayhasil5); 

    // Pengeluaran KB - TK AL - IHSAN
    $hasil6=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU001'");
    while ($jumlah6=mysqli_fetch_array($hasil6)){
    $arrayhasil6[] = $jumlah6['kd_jumlah'];
    }
    $pengeluaranTK= array_sum($arrayhasil6);

    $hasil3=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS totalkeseluruhan FROM db_data_input  where id_usaha = 'DTU001'");
    while ($jumlah3=mysqli_fetch_array($hasil3)){
    $arrayhasil3[] = $jumlah3['totalkeseluruhan'];
    }
    $jumlahhasil3 = array_sum($arrayhasil3);

 
        
?>
    <div class="container-fluid">
        <h1 align="center" class="pt-3">Bismillah Selamat Datang di Sistem Keuangan </h1>
        <h1 align="center" >Yayasan Al - Ihsan Pesantren Hidayatullah Probolinggo</h1>
        <div class="row pt-5">

        <div class="col-sm-12 col-lg-12">
                <div class="brand-card">
                    <div class="brand-card-header bg-facebook">
                        <h3><font color='white'>KB - TK AL - IHSAN</h3></font>
                    </div>
                    <div class="card-body pb-0"><center>
                        <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanTK, 0, ",", ".")?></b></div>
                        <div class="text-value"><b>-------------------------------------------</b></div>

                        <div class="text-value">Anggaran : Rp. <b><?=number_format($jumlahhasil3, 0, ",", ".")?></b></div>
                        <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranTK, 0, ",", ".")?></b></div>
                        <div class="text-value"><b>-------------------------------------------</b></div>
                        <div class="text-value">Sisa Anggaran : Rp. <b><?=number_format($jumlahhasil3 - $pengeluaranTK, 0, ",", ".")?></b></div>

                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>

 

            

<?php
    include "template/footer.php";
?>