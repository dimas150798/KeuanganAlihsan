<?php
    $lokasi1 = "Pengeluaran";
    $lokasi2 = "Kelola Laporan SD Integral";
    $lokasi3 = "Tambah Data SD Integral";
    $linklokasi2 = "KelolaPelaporan_pengeluaranSD.php";
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

    $kodetambahpengeluaranSD = kodetambahpengeluaranSD();
    $kodetambahYayasan = kodetambahYayasan();

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
    <h2 align="center" class="pt-3 pb-3">Input Pengeluaran SD Integral</h2>
    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="">ID Data</label>
                        <input type="text" class="form-control" name="id_data_output" value="<?=$kodetambahpengeluaranSD?>" readonly>
                        <input type="text" class="form-control" name="id_data_input" value="<?=$kodetambahYayasan?>" hidden>


                    </div>  

                    <div class="form-group row">
                    <!-- <div class="col-md-6">
                        <label for="">Total Anggaran Pemasukan :</label> -->
                        <input type="text" class="form-control" name="sub_total" value="<?=$jumlahhasil2?>" hidden>
                        <!-- <input type="text" class="form-control" name="" value="<?php echo number_format($jumlahhasil2,2,',','.') ?>" readonly>
                    </div> -->
                    <div class="col-md-12">
                        <label for="tempat">Anggaran Yang Bisa Digunakan</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="anggaran" value="<?=$jumlahhasil3?>" hidden>
                        <input type="text" class="form-control" name="" value="<?php echo number_format($jumlahhasil3,2,',','.') ?>" readonly>
                        <input type="text" class="form-control" name="max" value="<?=$jumlahhasil3?>" hidden>

                        </div>
                    </div>
                    </div>  

                    <div class="form-group row">
                    <div class="col-md-4">
                    <div class="form-group ">
                        <label for="">Usaha</label>
                        <input type="text" class="form-control" name="" value="SD INTEGRAL" readonly>

                    </div>
                    </div>
                    <div class="col-md-4">
                    <label for="">Kategori  </label>
                        <select name="id_kategori" class="form-control select-dropdown" required>
                            <option value="" selected disabled>Pilih Kategori  </option>
                            <?php
                            include "../koneksi/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM db_kategori_pengeluaran WHERE id_usaha = 'DTU003' ORDER BY id_kategori DESC LIMIT 2");
                            while ($show = mysqli_fetch_assoc($query)) {
                                echo "<option value='$show[id_kategori]'>$show[nama_pengeluaran]</option>";
                            }
                            ?>
                    </select>
                    </div>
                    <div class="col-md-4">
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
                    <br>
                    </div>
                    
                    
                 
                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Nominal :</label>
                        <input type="text" class="form-control" name="kd_jumlah" placeholder="Ketikan Nominal" onkeypress="return hanyaAngka(event)" required>
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
                        <label for="tempat">Bukti Pengeluaran</label>
                        <div class="input-group">
                        <input type="file" class="form-control" name="gambar" id="gambar">

                        </div>
                    </div>
                    </div>  
                    <div class="form-group ">

                    <label for="exampleFormControlTextarea1" class="form-label">Keterangan :</label>
                    <textarea class="form-control" name="kd_keterangan" placeholder="Ketikan Keterangan" rows="3" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="">Tipe</label>
                        <input type="text" class="form-control" name="" value="PENGELUARAN" readonly>
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
    // include "template/footer.php";

    if (isset($_POST['submit'])) {
        if ($_POST['kd_jumlah'] <= $_POST['max']) {
            if (tambahdatapengeluaransaldoSD($_POST) > 0){
                echo "
                <script>
                alert('Pengeluaran Sudah Berhasil Di Tambah');
                document.location.href = 'EditData_pengeluaranSD.php';         
                </script>
                ";
            }   else {
                echo "
                <script>
                alert('Pengeluaran Tidak Berhasil Di Tambah');history.go(-1)
                document.location.href = 'TambahData_pengeluaranSD.php';         
                </script>
                ";
                echo("<br>");
                echo mysqli_error($koneksi); 
            }
        } else {
            echo 
            "<script>alert('Anggaran Yang Bisa di Gunakan Adalah : $jumlahhasil3');history.go(-1)</script>";

        }
    }


    
?>

<?php
    include "template/footer.php";
?>