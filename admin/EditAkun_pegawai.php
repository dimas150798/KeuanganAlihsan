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
    $data = query("SELECT a.id_user, a.nama, a.tgl_lahir, a.alamat, a.username, b.nama_akses, b.akses  FROM db_user a 
    INNER JOIN db_akses b ON a.akses = b.akses 
    WHERE a.id_user = '$id'")[0];   


?>
<div class="container-fluid">
    <h3 align="center" class="pt-3 pb-3">Edit Data Akun Unit Usaha</h3>

    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal" name="tambahbarang" enctype="multipart/form-data">
                    <div class="form-group ">
                        <!-- <label for="">ID Pegawai</label> -->
                        <input type="text" class="form-control" name="id_user" value="<?=$data['id_user']?>" hidden>
                    </div>    

                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Nama Lengkap Pegawai</label>
                        <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>" placeholder="Ketikan Nama Pegawai" required>
                    </div>  
                    <div class="col-md-6">
                        <label for="">Username Pegawai</label>
                        <input type="text" class="form-control" name="username" value="<?=$data['username']?>" placeholder="Ketikan Username Pegawai" required>
                    </div>  
                    </div>

                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Password Pegawai</label>
                        <input type="password" class="form-control" name="password1" id="myInput1" placeholder="Ketikan Password Pegawai">
                        <input type="checkbox" onclick="myFunction1()"> Show password
                    </div>
                    <div class="col-md-6">
                        <label for="">Konfirmasi Password Pegawai</label>
                        <input type="password" class="form-control" name="password2" id="myInput2" placeholder="Ketikan Ulang Password" required>
                        <input type="checkbox" onclick="myFunction2()"> Show password
                    </div>  
                    </div>

                    <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Alamat Pegawai</label>
                        <input type="text" class="form-control" name="alamat" value="<?=$data['alamat']?>" placeholder="Ketikan Alamat Pegawai" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tempat">Tanggal Lahir</label>
                        <div class="input-group">
                            <input type="date" class="form-control" placeholder="Tanggal Input" value="<?=$data['tgl_lahir']?>" name="tgl_lahir" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="tempat">Akses Login</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="akses" value="<?=$data['akses']?>"  hidden>
                        <input type="text" class="form-control" name="" value="<?=$data['nama_akses']?>"  readonly>
                        </div>
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
    include "template/footer.php";

    if (isset($_POST['submit'])) {
        if ($_POST['password1']==$_POST['password2']) {
            if (editakunuser($_POST) > 0){
                echo "
                <script>
                alert('Akun Pegawai Berhasil Diupdate');
                document.location.href = 'KelolaAkun_pegawai.php';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Akun Pegawai Gagal Diupdate');history.go(-1)
                dcocument.location.href = 'EditAkun_pegawai.php?id=$id';            
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
