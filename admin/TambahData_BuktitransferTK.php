<?php
    $lokasi1 = "Pemasukan";
    $lokasi2 = "Kelola Laporan Mitra BMH";
    $lokasi3 = "Tambah Data Mitra BMH";
    $linklokasi2 = "KelolaPelaporan_BMH.php";
    $linklokasi3 = "";
    
    include "../admin/template/header.php";   
    include "../admin/template/menu.php";
    include "../admin/template/lokasi.php";
    include "../admin/fungsi.php";

    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);

    $kodetambahbukti = kodetambahBukti();

    // Bukti Transfer TK
    $hasil2=mysqli_query($koneksi,"SELECT * FROM db_transfer where id_usaha = 'DTU001'");
    while ($jumlah2=mysqli_fetch_array($hasil2)){
    $arrayhasil2[] = $jumlah2['nominal'];
    }
    $buktitransfertk = array_sum($arrayhasil2);       

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

?>

<div class="container-fluid">
    <h2 align="center" class="pt-3 pb-3">Bukti Transfer Unit Usaha</h2>
    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="">ID Data</label>
                        <input type="text" class="form-control" name="id_transfer" value="<?=$kodetambahbukti?>" readonly>
                    </div>  

                    <div class="form-group row">
                    <div class="col-md-6">
                    <div class="form-group ">
                        <label for="">Usaha</label>
                        <input type="text" class="form-control" name="" value="KB - TK Al - Ihsan" readonly>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <label for="">Bulan  </label>
                        <select name="id_bulan" class="form-control select-dropdown" required>
                            <option value="" selected disabled>Pilih Bulan  </option>
                            <?php
                            include "../koneksi/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM db_bulan ");
                            while ($show = mysqli_fetch_assoc($query)) {
                                echo "<option value='$show[id_bulan]'>$show[kd_nama_bulan]</option>";
                            }
                            ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group ">
                    <label for="">Nominal :</label>
                        <input type="text" class="form-control" name="kd_jumlah" value="<?=$pemasukanTK - $TK75 - $buktitransfertk?>" hidden>
                        <input type="text" class="form-control" name="" value="<?php echo number_format($pemasukanTK - $TK75 - $buktitransfertk,2,',','.') ?>" readonly>

                    </div>
                    </div>


                    <script>
                        function hanyaAngka(event) {
                            var kd_jumlah = (event.which) ? event.which : event.keyCode
                            if (kd_jumlah != 46 && kd_jumlah > 31 && (kd_jumlah < 48 || kd_jumlah > 57))
                                return false;
                            return true;
                        }
                    </script> 

                    <div class="col-md-6">
                        <label for="tempat">Bukti Transfer</label>
                        <div class="input-group">
                        <input type="file" class="form-control" name="gambar" id="gambar" required>

                        </div>
                    </div>
                    <br>
                    </div>
                    
                 
                   
                    <div class="form-group ">

                    <label for="exampleFormControlTextarea1" class="form-label">Keterangan :</label>
                    <textarea class="form-control" name="kd_keterangan" placeholder="Ketikan Keterangan" rows="3" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="">Status</label>
                        <input type="text" class="form-control" style="color:red" name="" value="MENUNGGU" readonly>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-success" name="submit" value="Simpan">
                    </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

    if (isset($_POST['submit'])) {
            if (tambahdataBukti($_POST) > 0){
                echo "
                <script>
                alert('Bukti Transfer Berhasil Di Tambah');
                document.location.href = 'Kelola_Buktitransfer.php';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Bukti Transfer Tidak Berhasil Di Tambah');history.go(-1)
                // document.location.href = 'TambahData_Buktitransfer.php';            
                </script>
                ";
                echo("<br>");
                echo mysqli_error($koneksi);  
            }
        } 
    
?>

<?php
    include "template/footer.php";
?>