<?php
    $lokasi1 = "Pengeluaran";
    $lokasi2 = "Kelola Laporan Mitra Zakat";
    $lokasi3 = "Edit Data Mitra Zakat";
    $linklokasi2 = "EditData_pengeluaranMZ.php";
    $linklokasi3 = "";

    include "template/header.php";   
    include "template/menu.php";
    include "template/lokasi.php";
    include "fungsi.php";

    $id = $_GET['id'];
    $data = query("SELECT a.id_data_output, a.id_usaha, a.id_kategori, a.id_bulan, a.id_pp, a.kd_jumlah, a.kd_keterangan, a.gambar, b.kd_nama_usaha, c.nama_pengeluaran, d.kd_nama_bulan
    FROM db_data_output a 
    
    INNER JOIN db_usaha b ON a.id_usaha = b.id_usaha
    INNER JOIN db_kategori_pengeluaran c ON a.id_kategori = c.id_kategori
    INNER JOIN db_bulan d ON a.id_bulan = d.id_bulan 
    WHERE id_data_output = '$id'")[0];   


?>
<div class="container-fluid">
    <h2 align="center" class="pt-3 pb-3">Edit Data Laporan Pengeluaran Mitra Zakat</h2>

    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal" name="tambahbarang" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="">ID Data Laporan</label>
                        <input type="text" class="form-control" name="id_data_output" value="<?=$data['id_data_output']?>" readonly>
                    </div>  
                    <div class="form-group ">
                        <input type="text" class="form-control" name="id_usaha" value="<?=$data['id_usaha']?>" hidden>
                    </div>     
                    <div class="form-group ">
                        <input type="text" class="form-control" name="id_pp" value="<?=$data['id_pp']?>" hidden>
                    </div> 
                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Nama Kategori</label>
                        <input type="text" class="form-control" name="id_kategori" value="<?=$data['id_kategori']?>" hidden>
                        <input type="text" class="form-control" name="" value="<?=$data['nama_pengeluaran']?>" readonly>
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
                        <input type="text" class="form-control" name="kd_jumlah" value="<?=$data['kd_jumlah']?>" placeholder="Ketikan Nominal" onkeypress="return hanyaAngka(event)" readonly>
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
                        <input type="text" class="form-control" name="kd_keterangan" value="<?=$data['kd_keterangan']?>" placeholder="Ketikan keterangan" required>
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
        if (editdatapengeluaranlaporan($_POST) > 0){
            echo "
            <script>
            alert('Data Pengeluaran Sudah Berhasil Di Edit');
            document.location.href = 'EditData_pengeluaranMZ.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Check Lagi Data Apakah Sudah Ada Yang Di Edit ?');history.go(-1)
            // document.location.href = 'EditData_pengeluaranMZ.php';            
            </script>
            ";
            echo("<br>");
            echo mysqli_error($koneksi);  
        }
    } 
?>
