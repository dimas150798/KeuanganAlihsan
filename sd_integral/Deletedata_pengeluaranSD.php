<?php
    $lokasi1 = "Pengeluaran";
    $lokasi2 = "Kelola Laporan SD Integral";
    $lokasi3 = "Delete Data SD Integral";
    $linklokasi2 = "";
    $linklokasi3 = "";

    include "../sd_integral/template/header.php";   
    include "../sd_integral/template/menu.php";
    include "../sd_integral/template/lokasi.php";
    include "../sd_integral/fungsi.php";


    $id = $_GET['id'];
    $data = query("SELECT a.id_data_output, a.id_usaha, a.id_kategori, a.id_bulan, a.id_pp, a.kd_jumlah, a.kd_keterangan, a.gambar, b.kd_nama_usaha, c.nama_pengeluaran, d.kd_nama_bulan
    FROM db_data_output a 
    
    INNER JOIN db_usaha b ON a.id_usaha = b.id_usaha
    INNER JOIN db_kategori_pengeluaran c ON a.id_kategori = c.id_kategori
    INNER JOIN db_bulan d ON a.id_bulan = d.id_bulan 
    WHERE id_data_output = '$id'")[0];   

    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);

    $kodevalidasiSD = kodevalidasiSD();

    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);

    $kodetambahpengeluaranSD = kodetambahpengeluaranSD();

    $hasil1=mysqli_query($koneksi,"SELECT anggaran FROM db_validasi  where id_usaha = 'DTU003'");
    while ($jumlah1=mysqli_fetch_array($hasil1)){
    $arrayhasil1[] = $jumlah1['anggaran'];
    }
    $jumlahhasil1 = array_sum($arrayhasil1);

    $hasil2=mysqli_query($koneksi,"SELECT * FROM db_validasi where id_usaha = 'DTU003'");
    while ($jumlah2=mysqli_fetch_array($hasil2)){
    $arrayhasil2[] = $jumlah2['sub_total'];
    }
    $jumlahhasil2 = array_sum($arrayhasil2);
    
    $hasil3=mysqli_query($koneksi,"SELECT SUM(anggaran) AS totalkeseluruhan FROM db_validasi where id_usaha = 'DTU003'");
    while ($jumlah3=mysqli_fetch_array($hasil3)){
    $arrayhasil3[] = $jumlah3['totalkeseluruhan'];
    }
    $jumlahhasil3 = array_sum($arrayhasil3);


    $hasil4=mysqli_query($koneksi,"SELECT anggaran * 0.80 AS totalkeseluruhan FROM db_validasi where id_usaha = 'DTU003'");
    while ($jumlah4=mysqli_fetch_array($hasil4)){
    $arrayhasil4[] = $jumlah4['totalkeseluruhan'];
    }
    $jumlahhasil4 = array_sum($arrayhasil4);



?>
<div class="container-fluid">
    <h2 align="center" class="pt-3 pb-3">Delete Data Laporan Pengeluaran</h2>

    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal" name="tambahbarang" enctype="multipart/form-data">
                    <div class="form-group ">
                        <input type="text" class="form-control" name="id_validasi" value="<?=$kodevalidasiSD?>" hidden>
                        
                    </div>  

                        <input type="text" class="form-control" name="sub_total" value="<?=$jumlahhasil2?>" hidden>
                        <input type="text" class="form-control" name="" value="<?php echo number_format($jumlahhasil2,2,',','.') ?>" hidden>


                        <input type="text" class="form-control" name="anggaran" value="<?=$jumlahhasil3?>" hidden>
                        <input type="text" class="form-control" name="" value="<?php echo number_format($jumlahhasil3,2,',','.') ?>" hidden>

                    
                    <div class="form-group ">
                        <label for="">ID Data Laporan</label>
                        <input type="text" class="form-control" name="id_data_output" value="<?=$data['id_data_output']?>" readonly>
                    </div>  
                    <div class="form-group ">
                        <input type="text" class="form-control" name="" value="<?=$data['id_usaha']?>" hidden>
                    </div>     
                    <div class="form-group ">
                        <input type="text" class="form-control" name="" value="<?=$data['id_pp']?>" hidden>
                    </div> 
                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Nama Kategori</label>
                        <input type="text" class="form-control" name="" value="<?=$data['id_kategori']?>" hidden>
                        <input type="text" class="form-control" name="" value="<?=$data['nama_pengeluaran']?>" readonly>
                    </div>  
                    <div class="col-md-6">
                    <label for="">Nama Bulan</label>
                        <input type="text" class="form-control" name="" value="<?=$data['id_bulan']?>" hidden>
                        <input type="text" class="form-control" name="" value="<?=$data['kd_nama_bulan']?>" readonly>
                    </div>  
                    </div>
                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Nominal</label>
                        <input type="text" class="form-control" name="kd_jumlah" value="<?=$data['kd_jumlah']?>" placeholder="Ketikan Nominal" hidden>
                        <input type="text" class="form-control" name="" value="<?=number_format($data['kd_jumlah'], 0, ",", ".")?>" placeholder="Ketikan Nominal" readonly>
                    </div>
                    <div class="col-md-6">
                    <label for="">Keterangan</label>
                        <input type="text" class="form-control" name="" value="<?=$data['kd_keterangan']?>" placeholder="Ketikan keterangan" readonly>
                    </div>
                    </div>

                    <img src="../assets/img/<?=$data['gambar']?>" width="100" height="100" alt="" hidden>
                    <input type="file" class="form-control ml-1" name="" id="gambar"hidden >

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-danger" name="submit" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" value="Delete">
                    </div> 

                    <input type="hidden" name="gambarlama" value="<?=$data['gambar']?>">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $id = $_GET['id'];

    include "template/footer.php";

    if (isset($_POST['submit'])) {
        if (deletepengeluaranSD($id) > 0) {
    } if (DeleteValidasiSD($_POST) > 0){
        echo "
        <script>
        alert('Data Pengeluaran Berhasil Di Hapus');
        document.location.href = 'EditData_pengeluaranSD.php';
        </script>
        ";
    }else {
        echo "
        <script>
            document.location.href = 'Deletedata_pengeluaranSD.php';
        </script>
        ";
        echo("<br>");
        echo mysqli_error($koneksi);
        }
    } 
?>
