<?php
    ini_set("display_errors", 0);
       
    $lokasi1 = "";
    $lokasi2 = "";
    $linklokasi2 = "";

    include "../kb_integral/template/header.php";   
    include "../kb_integral/template/menu.php";
    include "../kb_integral/template/lokasi1.php";
    include "../kb_integral/fungsi.php";

    // Pemasukan KB INTEGRAL
    $hasil7=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU002'");
    while ($jumlah7=mysqli_fetch_array($hasil7)){
    $arrayhasil7[] = $jumlah7['kd_jumlah'];
    }
    $pemasukanKB = array_sum($arrayhasil7); 

    // Pengeluaran KB INTEGRAL
    $hasil8=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU002'");
    while ($jumlah8=mysqli_fetch_array($hasil8)){
    $arrayhasil8[] = $jumlah8['kd_jumlah'];
    }
    $pengeluaranKB= array_sum($arrayhasil8);

    $hasil3=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS totalkeseluruhan FROM db_data_input  where id_usaha = 'DTU002'");
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
                        <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanKB, 0, ",", ".")?></b></div>
                        <div class="text-value"><b>-------------------------------------------</b></div>

                        <div class="text-value">Anggaran : Rp. <b><?=number_format($jumlahhasil3, 0, ",", ".")?></b></div>
                        <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranKB, 0, ",", ".")?></b></div>
                        <div class="text-value"><b>-------------------------------------------</b></div>
                        <div class="text-value">Sisa Anggaran : Rp. <b><?=number_format($jumlahhasil3 - $pengeluaranKB, 0, ",", ".")?></b></div>

                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>


            

<?php
    include "template/footer.php";
?>