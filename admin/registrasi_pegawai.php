<?php
    $lokasi1 = "";
    $lokasi2 = "";
    $lokasi3 = "";
    $linklokasi2 = "";
    $linklokasi3 = " ";

    include "../admin/template/header.php";   
    include "../admin/template/menu.php";
    include "../admin/template/lokasi2.php";
    include "../admin/fungsi.php";

    $kodeuser = kodeuser();

?>

<div class="container-fluid">
    <h3 align="center" class="pt-3 pb-3">Registrasi Akun Unit Usaha Yayasan Al - Ihsan</h3>
    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group ">
                        <!-- <label for="">ID Akun</label> -->
                        <input type="text" class="form-control" name="id_user" value="<?=$kodeuser?>" hidden>
                    </div>  

                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Nama Lengkap Akun</label>
                        <input type="text" class="form-control" name="nama" placeholder="Ketikan Nama Lengkap Akun" required>
                    </div> 
                    <div class="col-md-6">
                        <label for="">Username Akun</label>
                        <input type="text" class="form-control" name="username" placeholder="Ketikan Username Akun" required>
                    </div> 
                    </div>

                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Password Akun</label>
                        <input type="password" class="form-control" name="password1" id="myInput1" placeholder="Ketikan Password Akun">
                        <input type="checkbox" onclick="myFunction1()"> Show password
                    </div>
                    <div class="col-md-6">
                        <label for="">Konfirmasi Password Akun</label>
                        <input type="password" class="form-control" name="password2" id="myInput2" placeholder="Ketikan Ulang Password" required>
                        <input type="checkbox" onclick="myFunction2()"> Show password
                    </div>  
                    </div> 
                 
                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Alamat Akun</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Ketikan Alamat Akun" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tempat">Tanggal Lahir</label>
                        <div class="input-group">
                            <input type="date" class="form-control" placeholder="Tanggal Input" name="tgl_lahir" required>
                        </div>
                    </div>
                    </div>  
  
                    <div class="form-group row">
                    <div class="col-md-12">
                    <label for="">Akses Login  </label>
                        <select name="akses"style="text-align:center;" class="form-control select-dropdown" required>
                            <option value="" selected disabled>Pilih Tipe Akses  </option>
                            <?php
                            include "../koneksi/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM db_akses");
                            while ($show = mysqli_fetch_assoc($query)) {
                                echo "<option value='$show[akses]'>$show[nama_akses]</option>";
                            }
                            ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-success" name="submit" value="Simpan">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    // include "template/footer.php";

    if (isset($_POST['submit'])) {
        if ($_POST['password1']==$_POST['password2']) {
            if (tambahakunuser($_POST) > 0){
                echo "
                <script>
                alert('Registrasi Akun Pegawai Berhasil');
                document.location.href = 'KelolaAkun_pegawai.php';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Registrasi Akun Pegawai Gagal');history.go(-1)
                // document.location.href = 'registrasi_pegawai.php';            
                </script>
                ";
                echo("<br>");
                echo mysqli_error($koneksi);  
            }
        } else {
            echo "<script>alert('Password yang Anda Masukan Tidak Sama');history.go(-1)</script>";
        }
    }
?>

<script>
    function myFunction1() {
        var x = document.getElementById("myInput1");
            if (x.type == "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFunction2() {
        var x = document.getElementById("myInput2");
            if (x.type == "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<?php
    include "template/footer.php";
?>