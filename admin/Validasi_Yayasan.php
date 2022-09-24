<?php
    $lokasi1 = "Pemasukan";
    $lokasi2 = "Kelola Laporan Yayasan Al - Ihsan";
    $lokasi3 = "";
    $linklokasi2 = "KelolaPelaporan_Yayasan.php";
    $linklokasi3 = "";

    include "template/header.php";   
    include "template/menu.php";
    include "template/lokasi2.php";
    include "fungsi.php";

    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);

    $kodevalidasiYayasan = kodevalidasiYayasan();

    $db_user= query("SELECT id_validasi, id_usaha, sub_total, anggaran FROM db_validasi WHERE id_validasi = 'VAN001'");


     // Pemasukan SMP
     $hasil1=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU004'");
     while ($jumlah1=mysqli_fetch_array($hasil1)){
     $arrayhasil1[] = $jumlah1['kd_jumlah'];
     }
     $pemasukanSMP = array_sum($arrayhasil1); 
 
     // Pemasukan 75% SMP
     $hasil21=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU004'");
     while ($jumlah21=mysqli_fetch_array($hasil21)){
     $arrayhasil21[] = $jumlah21['keseluruhan'];
     }
     $SMP75 = array_sum($arrayhasil21); 
 
     // Pengeluaran SMP
     $hasil2=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU004'");
     while ($jumlah2=mysqli_fetch_array($hasil2)){
     $arrayhasil2[] = $jumlah2['kd_jumlah'];
     }
     $pengeluaranSMP= array_sum($arrayhasil2); 
 
     // Pemasukan 75% SD
     $hasil22=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU003'");
     while ($jumlah22=mysqli_fetch_array($hasil22)){
     $arrayhasil22[] = $jumlah22['keseluruhan'];
     }
     $SD75 = array_sum($arrayhasil22); 
 
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
 
     // Pemasukan KB - TK AL - IHSAN 75
     $hasil23=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU001'");
     while ($jumlah23=mysqli_fetch_array($hasil23)){
     $arrayhasil23[] = $jumlah23['keseluruhan'];
     }
     $TK75 = array_sum($arrayhasil23); 
 
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
 
     // Pemasukan KB INTEGRAL 75
     $hasil24=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU002'");
     while ($jumlah24=mysqli_fetch_array($hasil24)){
     $arrayhasil24[] = $jumlah24['keseluruhan'];
     }
     $KB75= array_sum($arrayhasil24); 
 
     // Pengeluaran KB INTEGRAL
     $hasil8=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU002'");
     while ($jumlah8=mysqli_fetch_array($hasil8)){
     $arrayhasil8[] = $jumlah8['kd_jumlah'];
     }
     $pengeluaranKB= array_sum($arrayhasil8);
 
     // Pemasukan PESANTREN
     $hasil25=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU005'");
     while ($jumlah25=mysqli_fetch_array($hasil25)){
     $arrayhasil25[] = $jumlah25['keseluruhan'];
     }
     $Pesantren75 = array_sum($arrayhasil25); 
 
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
 
     // Pemasukan MITRA ZAKAT 75
     $hasil26=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU006'");
     while ($jumlah26=mysqli_fetch_array($hasil26)){
     $arrayhasil26[] = $jumlah26['keseluruhan'];
     }
     $MZ75 = array_sum($arrayhasil26); 
 
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
 
     // Pemasukan MITRA BMH 75
     $hasil27=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU007'");
     while ($jumlah27=mysqli_fetch_array($hasil27)){
     $arrayhasil27[] = $jumlah27['keseluruhan'];
     }
     $BMH75 = array_sum($arrayhasil27);     
 
     // Pengeluaran MITRA BMH
     $hasil14=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU007'");
     while ($jumlah14=mysqli_fetch_array($hasil14)){
     $arrayhasil14[] = $jumlah14['kd_jumlah'];
     }
     $pengeluaranBMH= array_sum($arrayhasil14);
 
     // Pengeluaran Dana Saving
     $hasil20=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU008'");
     while ($jumlah20=mysqli_fetch_array($hasil20)){
     $arrayhasil20[] = $jumlah20['kd_jumlah'];
     }
     $pengeluaranDana= array_sum($arrayhasil20);
 
    // Penambahan Dana Saving
    $hasil50=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU008'");
    while ($jumlah50=mysqli_fetch_array($hasil50)){
    $arrayhasil50[] = $jumlah50['kd_jumlah'];
    }
    $penambahanDana= array_sum($arrayhasil50);     

       
 
       $db_data  = query("SELECT a.id_data_input, b.nama_kategori, SUM(a.kd_jumlah) AS totalkeseluruhan,
       ROUND(SUM(IF(c.kd_nama_bulan = 'Januari', a.kd_jumlah, NULL))) AS bulan1,
       ROUND(SUM(IF(c.kd_nama_bulan = 'Februari', a.kd_jumlah, NULL))) AS bulan2,
       ROUND(SUM(IF(c.kd_nama_bulan = 'Maret', a.kd_jumlah, NULL))) AS bulan3,
       ROUND(SUM(IF(c.kd_nama_bulan = 'April', a.kd_jumlah, NULL))) AS bulan4,
       ROUND(SUM(IF(c.kd_nama_bulan = 'Mei', a.kd_jumlah, NULL))) AS bulan5,
       ROUND(SUM(IF(c.kd_nama_bulan = 'Juni', a.kd_jumlah, NULL))) AS bulan6,
       ROUND(SUM(IF(c.kd_nama_bulan = 'Juli', a.kd_jumlah, NULL))) AS bulan7,
       ROUND(SUM(IF(c.kd_nama_bulan = 'Agustus', a.kd_jumlah, NULL))) AS bulan8,
       ROUND(SUM(IF(c.kd_nama_bulan = 'September', a.kd_jumlah, NULL))) AS bulan9,
       ROUND(SUM(IF(c.kd_nama_bulan = 'Oktober', a.kd_jumlah, NULL))) AS bulan10,
       ROUND(SUM(IF(c.kd_nama_bulan = 'November', a.kd_jumlah, NULL))) AS bulan11,
       ROUND(SUM(IF(c.kd_nama_bulan = 'Desember', a.kd_jumlah, NULL))) AS bulan12,
 
       ROUND(SUM(IF(a.id_kategori = 'KAT001', a.kd_jumlah, NULL))) AS jumlah1,
       ROUND(SUM(IF(a.id_kategori = 'KAT014', a.kd_jumlah, NULL))) AS jumlah2,
       ROUND(SUM(IF(a.id_kategori = 'KAT003', a.kd_jumlah, NULL))) AS jumlah3
       
       
       FROM db_data_input a
       INNER JOIN db_bulan c ON a.id_bulan = c.id_bulan
       INNER JOIN db_kategori b ON a.id_kategori = b.id_kategori
       WHERE a.id_usaha = 'DTU007' AND a.id_pp = 1
       
       GROUP BY b.nama_kategori ASC"
       ); 
 
       $data_terakhir = query("SELECT b.kd_nama_bulan FROM db_data_input a 
       INNER JOIN db_bulan b ON a.id_bulan = b.id_bulan ORDER BY id_data_input DESC LIMIT 1");
 



?>
<div class="container-fluid">   
    <br>
    <h3 align="center">Validasi Pemasukan Yayasan </h3>
    <br>

    <div class="row justify-content-center">
        <div class="col-sm-8 col-lg-8 ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal" name="tambahbarang" enctype="multipart/form-data">
                    <div class="form-group ">
                        <input type="text" class="form-control" name="id_validasi" value="<?=$kodevalidasiYayasan?>" hidden>
                        
                    </div>  
                    
                    <div class="form-group row">
 
                    <div class="col-md-6">
                    <label for="">Pemasukan Dana Saving Unit Usaha:</label>
                        <input type="text" class="form-control" name="sub_total" value="<?=$pemasukanSMP - $SMP75 + $pemasukanSD - $SD75 + $pemasukanTK - $TK75 + $pemasukanKB - $KB75 + $pemasukanPesantren - $Pesantren75 + $pemasukanMZ - $MZ75?>" hidden>
                        <input type="text" class="form-control" name="" value="<?php echo number_format($pemasukanSMP - $SMP75 + $pemasukanSD - $SD75 + $pemasukanTK - $TK75 + $pemasukanKB - $KB75 + $pemasukanPesantren - $Pesantren75 + $pemasukanMZ - $MZ75,2,',','.') ?>" readonly>
                    </div>  
                    <div class="col-md-6">
                    <label for="">Pemasukan Sisa Saldo / Infaq Anggota :</label>
                        <input type="text" class="form-control" name="pemasukan" value="<?=$penambahanDana?>" hidden>
                        <input type="text" class="form-control" name="" value="<?php echo number_format($penambahanDana,2,',','.') ?>" readonly>
                    </div>  
                    <div class="col-md-12">
                    <label for="">Pengeluaran Yayasan Al - Ihsan : </label>
                        <input type="text" class="form-control" name="pengeluaran" value="<?=$pengeluaranDana?>" hidden>
                        <input type="text" class="form-control" name="" value="<?php echo number_format($pengeluaranDana,2,',','.') ?>" readonly>
                    </div>  
                    </div>

        
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-success" name="submit" value="Simpan">
                    </div>
                    <!-- <div class="form-group">
                        <input type="submit" class="form-control btn btn-warning" name="update" value="Update">
                    </div> -->
                        
                    </td>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
        <div class="col-sm-8 col-lg-8 ">
            <div style="overflow-x:auto;">

            <table class="table table-striped table-hover table-bordered table-align-middle" id="data">
                <thead >
                    <tr align="center">
                        <th width="200px">Total Pemasukan Tervalidasi</th>
                        <th width="200px">Total Pengeluaran Tervalidasi</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($db_user as $data) {
                        ?>
                <tr align="center">
                    <td>Rp <?=number_format($data['sub_total'], 0, ",", ".")?></td>
                    <td>Rp. <?=number_format($pengeluaranDana, 0, ",", ".")?></td>


                    <td>
                        <div class="btn-group">
                            <a href="Deletedata_validasiYayasan.php?id=<?=$data['id_validasi']?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
                </table>

                
            </div>
        </div>

<?php
    include "template/footer.php";

    if (isset($_POST['submit'])) {
        if (tambahValidasiYayasan($_POST) > 0){
            echo "
            <script>
            alert('Validasi Data Berhasil');
            document.location.href = 'KelolaPelaporan_Yayasan.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Data Sudah Tervalidasi, Mohon Hapus Data Yang Sudah Tervalidasi Sebelumnya Agar Dapat Tersimpan');history.go(-1)
            // document.location.href = 'Validasi_Yayasan.php';            
            </script>
            ";
            echo("<br>");
            echo mysqli_error($koneksi);  
        }
    } 
?>
