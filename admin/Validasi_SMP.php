<?php
    $lokasi1 = "Pemasukan";
    $lokasi2 = "Kelola Laporan SMP Integral";
    $lokasi3 = "Validasi Pemasukan SMP Integral";
    $linklokasi2 = "KelolaPelaporan_SMP.php";
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

    $kodevalidasiSMP = kodevalidasiSMP();
    $kodevalidasiYayasan = kodevalidasiYayasan();

    $namasumber1 = mysqli_query($koneksi,"SELECT * FROM `db_usaha` where id_usaha= 'DTU004' ");
    $sumbern1= mysqli_fetch_assoc($namasumber1);

    $jumlah1 = mysqli_query($koneksi,"SELECT SUM(kd_jumlah)  from db_data_input 
    WHERE id_usaha = 'DTU004'AND id_pp = 1
    ");
    // menghitung data barang
    $jumlah_barang = mysqli_num_rows($jumlah1);

    $hasil1=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU004'");
    while ($jumlah1=mysqli_fetch_array($hasil1)){
    $arrayhasil1[] = $jumlah1['kd_jumlah'];
    }
    $jumlahhasil1 = array_sum($arrayhasil1);

    $hasil2=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU004'");
    while ($jumlah2=mysqli_fetch_array($hasil2)){
    $arrayhasil2[] = $jumlah2['kd_jumlah'];
    }
    $jumlahhasil2 = array_sum($arrayhasil2);


    $db_user = query("SELECT id_validasi, id_usaha, sub_total, anggaran FROM db_validasi WHERE id_validasi = 'VAM001'");
    $db_saldo = query("SELECT id_validasi, id_usaha, sub_total, anggaran FROM db_validasi WHERE id_validasi = 'VAN001'");

    $hasil3=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS totalkeseluruhan FROM db_data_input  where id_usaha = 'DTU004'");
    while ($jumlah3=mysqli_fetch_array($hasil3)){
    $arrayhasil3[] = $jumlah3['totalkeseluruhan'];
    }
    $jumlahhasil3 = array_sum($arrayhasil3);

    $hasil4=mysqli_query($koneksi,"SELECT * FROM db_data_input  where id_usaha = 'DTU004'");
    while ($jumlah4=mysqli_fetch_array($hasil4)){
    $arrayhasil4[] = $jumlah4['kd_jumlah'];
    }
    $jumlahhasil4 = array_sum($arrayhasil4);
    
    $hasil5=mysqli_query($koneksi,"SELECT * FROM db_data_output  where id_usaha = 'DTU004'");
    while ($jumlah5=mysqli_fetch_array($hasil5)){
    $arrayhasil5[] = $jumlah5['kd_jumlah'];
    }
    $jumlahhasil5 = array_sum($arrayhasil5);

    $hasil6=mysqli_query($koneksi,"SELECT * FROM db_validasi where id_usaha = 'DTU008'");
    while ($jumlah6=mysqli_fetch_array($hasil6)){
    $arrayhasil6[] = $jumlah6['sub_total'];
    }
    $jumlahhasil6 = array_sum($arrayhasil6);

    // Pengeluaran Dana Saving
    $hasil20=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU008'");
    while ($jumlah20=mysqli_fetch_array($hasil20)){
    $arrayhasil20[] = $jumlah20['kd_jumlah'];
    }
    $pengeluaranDana= array_sum($arrayhasil20);

    // Penambahan Dana Saving
    $hasil21=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU008'");
    while ($jumlah21=mysqli_fetch_array($hasil21)){
    $arrayhasil21[] = $jumlah21['kd_jumlah'];
    }
    $penambahanDana= array_sum($arrayhasil21);

?>


<div class="container-fluid">
    <br>
    <h3 align="center">Validasi Pemasukan SMP Integral </h3>
    <br>


    <div class="row justify-content-center">
        <div class="col-sm-8 col-lg-8 ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal" name="tambahbarang" enctype="multipart/form-data">
                    <div class="form-group ">
                        <input type="text" class="form-control" name="id_validasi" value="<?=$kodevalidasiSMP?>" hidden>
                        <input type="text" class="form-control" name="id_validasi_Yayasan" value="<?=$kodevalidasiYayasan?>" hidden>
                        
                    </div>  
                    
                    <div class="form-group row">
 
                    <div class="col-md-6">
                    <label for="">Total Keseluruhan Pemasukan</label>
                        <input type="text" class="form-control" name="pengeluaran" value="<?=$pengeluaranDana?>" hidden>
                        <input type="text" class="form-control" name="sub_total" value="<?=$jumlahhasil1?>" hidden>
                        <input type="text" class="form-control" name="kd_jumlah" value="<?=$jumlahhasil2?>" hidden>

                        <input type="text" class="form-control" name="" value="<?php echo number_format($jumlahhasil1,2,',','.') ?>" readonly>

                    </div>  
                    <div class="col-md-6">
                    <label for="">75% Dari Pemasukan :</label>
                        <input type="text" class="form-control" name="anggaran" value="<?=$jumlahhasil3?>" hidden>
                        <input type="text" class="form-control" name="" value="<?php echo number_format($jumlahhasil3,2,',','.') ?>" readonly>
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
                    <th width="320px">Total Pemasukan Tervalidasi</th>
                        <th width="320px">Total 75% Pemasukan Tervalidasi</th>
                        <th width="320px">Total Pengeluaran Tervalidasi</th>
                        <th width="110px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($db_user as $data) {
                        ?>
                <tr align="center">
                    <td>Rp <?=number_format($data['sub_total'], 0, ",", ".")?></td>
                    <td>Rp <?=number_format($data['anggaran'], 0, ",", ".")?></td>
                    <td>Rp. <?=number_format($jumlahhasil5, 0, ",", ".")?></td>


                    <td>
                        <div class="btn-group">
                            <a href="Deletedata_validasiSMP.php?id=<?=$data['id_validasi']?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
                </table>

                
            </div>
        </div>

<!-- 
        <div class="col-sm-8 col-lg-8 ">
            <div style="overflow-x:auto;">

            <table class="table table-striped table-hover table-bordered table-align-middle" id="data">
                <thead >
                    <tr align="center">
                        <th width="590px">Dana Saving Yayasan Tervalidasi</th>
                        <th width="50px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($db_saldo as $data) {
                        ?>
                <tr align="center">
                    <td>Rp <?=number_format($data['sub_total'], 0, ",", ".")?></td>
                    <td>
                        <div class="btn-group">
                            <a href="Deletedata_saldoSMP.php?id=<?=$data['id_validasi']?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
                </table>

                
            </div>
        </div> -->




    

<?php


    include "template/footer.php";

    if (isset($_POST['submit'])) {
        if (tambahValidasiSMP($_POST) > 0){
            echo "
            <script>
            alert('Validasi Data Berhasil');
            document.location.href = 'Validasi_SMP.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Data Sudah Tervalidasi, Mohon Hapus Atau Update Data');history.go(-1)
            // document.location.href = 'Validasi_SMP.php';            
            </script>
            ";
            echo("<br>");
            echo mysqli_error($koneksi);  
        }
    } 

    // if (isset($_POST['update'])) {
    //     if (updateValidasiSMP($_POST) > 0){
    //         echo "
    //         <script>
    //         alert('Update Dana Saving Berhasil ');
    //         document.location.href = 'Validasi_SMP.php';
    //         </script>
    //         ";
    //     } else {
    //         echo "
    //         <script>
    //         alert('Data Sudah Tervalidasi, Mohon Hapus Atau Update Data');history.go(-1)
    //         // document.location.href = 'Validasi_SMP.php';            
    //         </script>
    //         ";
    //         echo("<br>");
    //         echo mysqli_error($koneksi);  
    //     }
    // } 



?>


