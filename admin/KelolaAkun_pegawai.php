<?php
    $lokasi1 = "Master";
    $lokasi2 = "Registrasi Akun";
    $lokasi3 = "";
    $linklokasi2 = "registrasi_pegawai.php";
    $linklokasi3 = "";

    include "../admin/template/header.php";   
    include "../admin/template/menu.php";
    include "../admin/template/lokasi.php";
    include "../admin/fungsi.php";

    $db_user= query("SELECT a.id_user, a.nama, a.tgl_lahir, a.alamat, a.username, b.nama_akses  FROM db_user a 
    INNER JOIN db_akses b ON a.akses = b.akses ");


    ?>  

<div class="container-fluid">
    <h3 align="center" class="pt-3 pb-3">Akun Unit Usaha Yayasan Al - Ihsan</h3>

    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-12 ">
            <table class="table table-striped table-hover table-bordered table-align-middle" id="data">
                <thead >
                    <tr align="center">
                        <th>No</th>
                        <th width="90px">ID Pegawai</th>
                        <th width="180px">Nama Pegawai</th>
                        <th width="110px">Username Pegawai</th>
                        <th width="120px">Tanggal Lahir </th>
                        <th width="200px">Alamat Pegawai</th>
                        <th width="200px">Tipe Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($db_user as $data) {
                        ?>
                <tr align="center">
                    <td><?=$i++?>.</td>
                    <td><?=$data['id_user']?></td>
                    <td><?=$data['nama']?></td>
                    <td><?=$data['username']?></td>
                    <td><?php echo date('d - m - Y', strtotime($data["tgl_lahir"]));?></td>

                    <td><?=$data['alamat']?></td>
                    <td><?=$data['nama_akses']?></td>
                    <td>
                        <div class="btn-group">
                            <a href="EditAkun_pegawai.php?id=<?=$data['id_user']?>"  class="btn btn-info">Edit</a>
                            <a href="DeleteAkun_pegawai.php?id=<?=$data['id_user']?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger">Hapus</a>
                        </div>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    include "template/footer.php";
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#data').DataTable();
    });
</script>
