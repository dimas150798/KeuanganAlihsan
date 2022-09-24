<?php
    $lokasi1 = "";
    $lokasi2 = "";
    $lokasi3 = "";
    $linklokasi2 = "";
    $linklokasi3 = "";

    include "template/header.php";   
    include "template/menu.php";
    include "template/lokasi2.php";
    include "fungsi.php";

    $id = $_GET['id'];
    $data = query("SELECT a.id_transfer, a.gambar, a.id_status, a.nominal, a.keterangan, b.id_usaha, b.kd_nama_usaha, d.id_bulan, d.kd_nama_bulan, e.nama_bank, a.id_bank 
    FROM db_transfer a 
    
    INNER JOIN db_usaha b ON a.id_usaha = b.id_usaha
    INNER JOIN db_bulan d ON a.id_bulan = d.id_bulan
    INNER JOIN db_bank e ON a.id_bank = e.id_bank

    WHERE a.id_transfer = '$id'")[0];   


?>
<div class="container-fluid">
    <h2 align="center" class="pt-3 pb-3">Konfirmasi Transfer</h2>

    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal" name="tambahbarang" enctype="multipart/form-data">
                    <div class="form-group ">
                        <!-- <label for="">ID Bukti Transfer</label> -->
                        <input type="text" class="form-control" name="id_transfer" value="<?=$data['id_transfer']?>" hidden>
                    </div>  
                    <div class="form-group ">
                        <label for="">Nama Bank</label>
                        <input type="text" class="form-control" name="id_bank" value="<?=$data['id_bank']?>" hidden>
                        <input type="text" class="form-control" name="" value="<?=$data['nama_bank']?>" readonly>
                    </div> 
                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Usaha Unit</label>
                        <input type="text" class="form-control" name="id_usaha" value="<?=$data['id_usaha']?>" hidden>
                        <input type="text" class="form-control" name="" value="<?=$data['kd_nama_usaha']?>" readonly>
                    </div>  
                    <div class="col-md-6">
                    <label for="">Nama Bulan</label>
                        <input type="text" class="form-control" name="id_bulan" value="<?=$data['id_bulan']?>" hidden>
                        <input type="text" class="form-control" name="" value="<?=$data['kd_nama_bulan']?>" readonly>
                    </div>  
                    </div>
                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Nominal</label>
                        <input type="text" class="form-control" name="kd_jumlah" value="<?=$data['nominal']?>" placeholder="Ketikan Nominal" onkeypress="return hanyaAngka(event)" readonly>
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
                    <label for="">Keterangan</label>
                        <input type="text" class="form-control" name="kd_keterangan" value="<?=$data['keterangan']?>" placeholder="Ketikan keterangan" readonly>
                    </div>
                    </div>

                    <div class="form-group row">
                    <div class="col-md-12">
                    <label for="">Konfirmasi  </label>
                        <select name="id_status" class="form-control select-dropdown" required>
                            <option value="" selected disabled>Pilih Konfirmasi  </option>
                            <?php
                            include "../koneksi/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM db_status ");
                            while ($show = mysqli_fetch_assoc($query)) {
                                echo "<option value='$show[id_status]'>$show[nama_status]</option>";
                            }
                            ?>
                    </select>
                    </div>


                    </div>
                    

                    <img src="../assets/img/<?=$data['gambar']?>" width="100" height="100" alt="" hidden>
                    <input type="file" class="form-control ml-1" name="gambar" id="gambar"hidden >

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Simpan">
                    </div> 

                    <input type="hidden" name="gambarlama" value="<?=$data['gambar']?>">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "template/footer.php";

    if (isset($_POST['submit'])) {
        if (konfirmasitk($_POST) > 0){
            echo "
            <script>
            alert('Konfirmasi Berhasil');
            document.location.href = 'Kelola_Buktitransfer.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Konfirmasi Sudah Di Lakukan ?');history.go(-1)
            // document.location.href = 'Kelola_Buktitransfer.php';            
            </script>
            ";
            echo("<br>");
            echo mysqli_error($koneksi);  
        }
    } 
?>
