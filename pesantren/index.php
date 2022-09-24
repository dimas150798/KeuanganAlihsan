<?php
    ini_set("display_errors", 0);
       
    $lokasi1 = "Dashboard";
    $lokasi2 = "Keseluruhan";
    $linklokasi2 = "";

    include "../pesantren/template/header.php";   
    include "../pesantren/template/menu.php";
    include "../pesantren/template/lokasi.php";
    include "../pesantren/fungsi.php";

    // Pemasukan PESANTREN
    $hasil9=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU005'");
    while ($jumlah9=mysqli_fetch_array($hasil9)){
    $arrayhasil9[] = $jumlah9['kd_jumlah'];
    }
    $pemasukanPesantren = array_sum($arrayhasil9); 

    // Pengeluaran PESANTREN
    $hasil10=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU005'");
    while ($jumlah10=mysqli_fetch_array($hasil10)){
    $arrayhasil10[] = $jumlah10['kd_jumlah'];
    }
    $pengeluaranPesantren= array_sum($arrayhasil10);

    $hasil3=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS totalkeseluruhan FROM db_data_input  where id_usaha = 'DTU005'");
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
                        <h3><font color='white'>TOTAL KESELURUHAN</h3></font>
                    </div>
                    <div class="card-body pb-0"><center>
                        <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanPesantren, 0, ",", ".")?></b></div>
                        <div class="text-value"><b>-------------------------------------------</b></div>

                        <div class="text-value">Anggaran : Rp. <b><?=number_format($jumlahhasil3, 0, ",", ".")?></b></div>
                        <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranPesantren, 0, ",", ".")?></b></div>
                        <div class="text-value"><b>-------------------------------------------</b></div>
                        <div class="text-value">Sisa Anggaran : Rp. <b><?=number_format($jumlahhasil3 - $pengeluaranPesantren, 0, ",", ".")?></b></div>

                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>


            

<?php
    include "template/footer.php";
?>