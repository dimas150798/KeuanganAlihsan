<?php
    ini_set("display_errors", 0);
       
    $lokasi1 = "Dashboard";
    $lokasi2 = "Keseluruhan";
    $linklokasi2 = "";

    include "../sd_integral/template/header.php";   
    include "../sd_integral/template/menu.php";
    include "../sd_integral/template/lokasi.php";
    include "../sd_integral/fungsi.php";

    // Pemasukan SD
    $hasil3=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU003'");
    while ($jumlah3=mysqli_fetch_array($hasil3)){
    $arrayhasil3[] = $jumlah3['kd_jumlah'];
    }
    $pemasukanSD = array_sum($arrayhasil3); 

    // Pengeluaran SD
    $hasil4=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU003'");
    while ($jumlah4=mysqli_fetch_array($hasil4)){
    $arrayhasil4[] = $jumlah4['kd_jumlah'];
    }
    $pengeluaranSD= array_sum($arrayhasil4); 

    $hasil5=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS totalkeseluruhan FROM db_data_input  where id_usaha = 'DTU003'");
    while ($jumlah5=mysqli_fetch_array($hasil5)){
    $arrayhasil5[] = $jumlah5['totalkeseluruhan'];
    }
    $jumlahhasil5 = array_sum($arrayhasil5);

        
?>
    <div class="container-fluid">
        <h1 align="center" class="pt-3">Bismillah Selamat Datang di Sistem Keuangan </h1>
        <h1 align="center" >Yayasan Al - Ihsan Pesantren Hidayatullah Probolinggo</h1>
        <div class="row pt-5">

        <div class="col-sm-12 col-lg-12">
                <div class="brand-card">
                    <div class="brand-card-header bg-facebook">
                        <h3><font color='white'>TOTAL KESELURUHAN</h3></font>
                    </div>
                    <div class="card-body pb-0"><center>
                        <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanSD, 0, ",", ".")?></b></div>
                        <div class="text-value"><b>-------------------------------------------</b></div>
                        <div class="text-value">Anggaran : Rp. <b><?=number_format($jumlahhasil5, 0, ",", ".")?></b></div>
                        <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranSD, 0, ",", ".")?></b></div>
                        <div class="text-value"><b>-------------------------------------------</b></div>
                        <div class="text-value">Sisa Anggaran : Rp. <b><?=number_format($jumlahhasil5 - $pengeluaranSD, 0, ",", ".")?></b></div>

                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>

<?php
    include "template/footer.php";
?>