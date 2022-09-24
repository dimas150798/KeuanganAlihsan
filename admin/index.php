<?php
    ini_set("display_errors", 0);
       
    $lokasi1 = "";
    $lokasi2 = "";
    $linklokasi2 = "";

    include "../admin/template/header.php";   
    include "../admin/template/menu.php";
    include "../admin/template/lokasi2.php";
    include "../admin/fungsi.php";


    $jumlah1 = mysqli_query($koneksi,"SELECT SUM(kd_jumlah)  from db_data_input 
    WHERE id_usaha = 'DTU003'AND id_pp = 1
    ");
    // menghitung data barang
    $jumlah_barang = mysqli_num_rows($jumlah1);

    // Pemasukan SMP
    $hasil1=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU004'");
    while ($jumlah1=mysqli_fetch_array($hasil1)){
    $arrayhasil1[] = $jumlah1['kd_jumlah'];
    }
    $pemasukanSMP = array_sum($arrayhasil1); 

    // Pengeluaran SMP
    $hasil2=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU004'");
    while ($jumlah2=mysqli_fetch_array($hasil2)){
    $arrayhasil2[] = $jumlah2['kd_jumlah'];
    }
    $pengeluaranSMP= array_sum($arrayhasil2); 

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

    // Pemasukan MITRA ZAKAT
    $hasil11=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU006'");
    while ($jumlah11=mysqli_fetch_array($hasil11)){
    $arrayhasil11[] = $jumlah11['kd_jumlah'];
    }
    $pemasukanMZ = array_sum($arrayhasil11); 

    // Pengeluaran MITRA ZAKAT
    $hasil12=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU006'");
    while ($jumlah12=mysqli_fetch_array($hasil12)){
    $arrayhasil12[] = $jumlah12['kd_jumlah'];
    }
    $pengeluaranMZ= array_sum($arrayhasil12);

    // Pemasukan MITRA BMH
    $hasil13=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU007'");
    while ($jumlah13=mysqli_fetch_array($hasil13)){
    $arrayhasil13[] = $jumlah13['kd_jumlah'];
    }
    $pemasukanBMH = array_sum($arrayhasil13); 

    // Pengeluaran MITRA BMH
    $hasil14=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU007'");
    while ($jumlah14=mysqli_fetch_array($hasil14)){
    $arrayhasil14[] = $jumlah14['kd_jumlah'];
    }
    $pengeluaranBMH= array_sum($arrayhasil14);

    
    // Pemasukan TOTAL
    $hasil15=mysqli_query($koneksi,"SELECT * FROM db_data_input WHERE NOT id_usaha = 'DTU008'");
    while ($jumlah15=mysqli_fetch_array($hasil15)){
    $arrayhasil15[] = $jumlah15['kd_jumlah'];
    }
    $pemasukanTOTAL = array_sum($arrayhasil15);     

    // Pengeluaran TOTAL
    $hasil16=mysqli_query($koneksi,"SELECT * FROM db_data_output");
    while ($jumlah16=mysqli_fetch_array($hasil16)){
    $arrayhasil16[] = $jumlah16['kd_jumlah'];
    }
    $pengeluaranTOTAL= array_sum($arrayhasil16);

    // Pemasukan Validasi
    $hasil17=mysqli_query($koneksi,"SELECT * FROM db_validasi WHERE id_usaha = 'DTU008'");
    while ($jumlah17=mysqli_fetch_array($hasil17)){
    $arrayhasil17[] = $jumlah17['sub_total'];
    }
    $totalA = array_sum($arrayhasil17); 

    // Pengeluaran Validasi
    $hasil18=mysqli_query($koneksi,"SELECT * FROM db_validasi");
    while ($jumlah18=mysqli_fetch_array($hasil18)){
    $arrayhasil18[] = $jumlah18['anggaran'];
    }
    $totalB= array_sum($arrayhasil18);

    // Pengeluaran Dana Saving
    $hasil20=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU008'");
    while ($jumlah20=mysqli_fetch_array($hasil20)){
    $arrayhasil20[] = $jumlah20['kd_jumlah'];
    }
    $pengeluaranDana= array_sum($arrayhasil20);

        
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
                        <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanTOTAL, 0, ",", ".")?></b></div>
                        <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranTOTAL, 0, ",", ".")?></b></div>
                        <div class="text-value"><b>-------------------------------------------</b></div>

                        <div class="text-value">Saldo : Rp. <b><?=number_format($pemasukanTOTAL - $pengeluaranTOTAL, 0, ",", ".")?></b></div>

                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>

        <div class="col-sm-4 col-lg-4">
                <div class="brand-card">
                    <div class="brand-card-header bg-facebook">
                        <h3><font color='white'>SMP INTEGRAL</h3></font>
                    </div>
                    <div class="card-body pb-0">
                    <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanSMP, 0, ",", ".")?></b></div>
                            <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranSMP, 0, ",", ".")?></b></div>
                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4">
                <div class="brand-card">
                    <div class="brand-card-header bg-facebook">
                        <h3><font color='white'>SD INTEGRAL</h3></font>
                    </div>
                    <div class="card-body pb-0">
                    <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanSD, 0, ",", ".")?></b></div>
                            <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranSD, 0, ",", ".")?></b></div>
                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4">
                <div class="brand-card">
                    <div class="brand-card-header bg-facebook">
                        <h3><font color='white'>KB - TK AL - IHSAN</h3></font>
                    </div>
                    <div class="card-body pb-0">
                    <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanTK, 0, ",", ".")?></b></div>
                            <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranTK, 0, ",", ".")?></b></div>
                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4">
                <div class="brand-card">
                    <div class="brand-card-header bg-facebook">
                        <h3><font color='white'>KB INTEGRAL</h3></font>
                    </div>
                    <div class="card-body pb-0">
                    <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanKB, 0, ",", ".")?></b></div>
                            <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranKB, 0, ",", ".")?></b></div>
                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4">
                <div class="brand-card">
                    <div class="brand-card-header bg-facebook">
                        <h3><font color='white'>PESANTREN TAHFIDZ DH</h3></font>
                    </div>
                    <div class="card-body pb-0">
                    <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanPesantren, 0, ",", ".")?></b></div>
                            <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranPesantren, 0, ",", ".")?></b></div>
                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>
    
            <div class="col-sm-4 col-lg-4">
                <div class="brand-card">
                    <div class="brand-card-header bg-facebook">
                        <h3><font color='white'>MITRA ZAKAT</h3></font>
                    </div>
                    <div class="card-body pb-0">
                    <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanMZ, 0, ",", ".")?></b></div>
                            <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranMZ, 0, ",", ".")?></b></div>
                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4">
                <div class="brand-card">
                    <div class="brand-card-header bg-facebook">
                        <h3><font color='white'>MITRA BMH</h3></font>
                    </div>
                    <div class="card-body pb-0">
                    <div class="text-value">Pemasukan : Rp. <b><?=number_format($pemasukanBMH, 0, ",", ".")?></b></div>
                            <div class="text-value">Pengeluaran : Rp. <b><?=number_format($pengeluaranBMH, 0, ",", ".")?></b></div>
                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>

            <div class="col-sm-8 col-lg-8">
                <div class="brand-card">
                    <div class="brand-card-header bg-facebook">
                        <h3><font color='white'>YAYASAN AL - IHSAN</h3></font>
                    </div>
                    <div class="card-body pb-0">
                        <div class="text-value"><center>Pemasukan : Rp. <b><?=number_format($totalA, 0, ",", ".")?></b></div>
                        <div class="text-value"><center>Pengeluaran : Rp. <b><?=number_format($pengeluaranDana, 0, ",", ".")?></b></div>
                    </div>
                    <div class="brand-card-body">
                    </div>
                </div>
            </div>


            

<?php
    include "template/footer.php";
?>