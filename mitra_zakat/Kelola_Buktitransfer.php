<?php
    $lokasi1 = "Menu";
    $lokasi2 = "Tambah Bukti Transfer";
    $lokasi3 = "";
    $linklokasi2 = "TambahData_BuktitransferMZ.php";
    $linklokasi3 = "";

    include "../mitra_zakat/template/header.php";   
    include "../mitra_zakat/template/menu.php";
    include "../mitra_zakat/template/lokasi1.php";
    include "../mitra_zakat/fungsi.php";

    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);

    //transfer
    $hasil2=mysqli_query($koneksi,"SELECT * FROM db_transfer where id_usaha = 'DTU006'");
    while ($jumlah2=mysqli_fetch_array($hasil2)){
    $arrayhasil2[] = $jumlah2['nominal'];
    }
    $jumlahhasil2 = array_sum($arrayhasil2);

    //Pemasukan Keseluruhan
    $hasil1=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU006'");
    while ($jumlah1=mysqli_fetch_array($hasil1)){
    $arrayhasil1[] = $jumlah1['kd_jumlah'];
    }
    $jumlahhasil1 = array_sum($arrayhasil1);

    //75 Persen
    $hasil3=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS totalkeseluruhan FROM db_data_input  where id_usaha = 'DTU006'");
    while ($jumlah3=mysqli_fetch_array($hasil3)){
    $arrayhasil3[] = $jumlah3['totalkeseluruhan'];
    }
    $jumlahhasil3 = array_sum($arrayhasil3);  

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

    
    $db_user= query("SELECT a.id_transfer, a.gambar, a.id_status, a.nominal, a.keterangan, b.kd_nama_usaha, d.kd_nama_bulan 
    FROM db_transfer a 
    
    INNER JOIN db_usaha b ON a.id_usaha = b.id_usaha
    INNER JOIN db_bulan d ON a.id_bulan = d.id_bulan

    WHERE a.id_usaha = 'DTU006' 
    ");

    ?>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 5px solid #dddddd;
  text-align: left;
  padding: 2px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>


<div class="container-fluid">
<br>
      <div class="col-12 col-s-12">
</div>
      <div class="row justify-content-center">
          <div class="col-sm-12 col-lg-12 ">
          <h3 align="center">Pelaporan Bukti Transfer Unit Usaha</h3>

          <br>
              <table>
                  <thead >
                     <tr align="center">
                          <td colspan="2"  width="150px" ><b>Unit Usaha</b></th>
                          <td colspan="10"  width="150px"><b>Nominal</b></th>  
                          <td colspan="10"  width="200px"><b>Rekening A.N YAYASAN AL IHSAN </b></th>  
                        </tr>
                  </thead>
                  <tbody>
                      <?php
                      $i = 1;
                      foreach ($db_data as $data) {
                        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
                        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
                        $saldo = $sisatotal - $sisaanggaran + $data['yayasan'];
                          ?>

                      <?php } ?>     
                      <td colspan="2"  width="150px" >Mitra Zakat :</td>
                      <td colspan="10" width="150px">Rp. <?php echo number_format($jumlahhasil1 - $jumlahhasil3 - $jumlahhasil2,2,',','.') ?></span></td>

                      <td colspan="2"  width="200px">BSI - 7181972763</td>
                   
                  </tbody>
                  </table>
                  </div>
              </div>
          </div>

          <div class="container-fluid">
      <div class="col-12 col-s-12">
          <br>
      </div>
      <div class="row justify-content-center">
          <div class="col-sm-12 col-lg-12 ">

            <!-- <a href="KelolaPelaporan_BMH.php" class="btn btn-primary mb-2"><i class="nav-icon fa fa-database"></i> Laporan Transaksi</a> -->
            <div style="overflow-x:auto;">

            <table class="table table-striped table-hover table-bordered table-align-middle" id="data">
                <thead >
                    <tr align="center">
                        <th>No</th>
                        <th width="150px">Nama Kategori</th>
                        <th width="120px">Bulan </th>
                        <th width="150px">Bukti Transfer</th>
                        <th width="100px">Nominal</th>
                        <th width="200px">Keterangan</th>
                        <th width="100px">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($db_user as $data) {
                        
                        $data['id_status'];
                        if ($data['id_status'] == 1) {
                            $data['nama_status'] = '<span class="badge badge-pill badge-warning">Menunggu</span>';
                          } 
                           else {
                            $data['nama_status'] = '<span class="badge badge-pill badge-success">Terkonfirmasi</span>';
                        }


                        ?>
                <tr align="center">
                    <td><?=$i++?>.</td>
                    <td><?=$data['kd_nama_usaha']?></td> 
                    <td><?=$data['kd_nama_bulan']?></td>
                    <td><img src="../assets/img/<?=$data['gambar']?>" alt="" height="130" width="100"></td>
                    <td><?php echo number_format($data['nominal'],2,',','.') ?></td>
                    <td><?=$data['keterangan']?></td>
                    <td><?=$data['nama_status']?></td>

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
