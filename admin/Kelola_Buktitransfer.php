<?php
    $lokasi1 = "";
    $lokasi2 = "";
    $lokasi3 = "";
    $linklokasi2 = "";
    $linklokasi3 = "";

    include "../admin/template/header.php";   
    include "../admin/template/menu.php";
    include "../admin/template/lokasi2.php";
    include "../admin/fungsi.php";

    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);

    $jumlah1 = mysqli_query($koneksi,"SELECT SUM(kd_jumlah)  from db_data_input 
    WHERE id_usaha = 'DTU003'AND id_pp = 1
    ");
    // menghitung data barang
    $jumlah_barang = mysqli_num_rows($jumlah1);

  // Bukti Transfer TK
  $hasil50=mysqli_query($koneksi,"SELECT * FROM db_transfer where id_usaha = 'DTU001'");
  while ($jumlah50=mysqli_fetch_array($hasil50)){
  $arrayhasil50[] = $jumlah50['nominal'];
  }
  $buktitransfertk = array_sum($arrayhasil50);   
  
  // Bukti Transfer KB
  $hasil51=mysqli_query($koneksi,"SELECT * FROM db_transfer where id_usaha = 'DTU002'");
  while ($jumlah51=mysqli_fetch_array($hasil51)){
  $arrayhasil51[] = $jumlah51['nominal'];
  }
  $buktitransferKB = array_sum($arrayhasil51);   

    // Bukti Transfer SD
    $hasil52=mysqli_query($koneksi,"SELECT * FROM db_transfer where id_usaha = 'DTU003'");
    while ($jumlah52=mysqli_fetch_array($hasil52)){
    $arrayhasil52[] = $jumlah52['nominal'];
    }
    $buktitransferSD = array_sum($arrayhasil52); 
    
    // Bukti Transfer SMP
    $hasil53=mysqli_query($koneksi,"SELECT * FROM db_transfer where id_usaha = 'DTU004'");
    while ($jumlah53=mysqli_fetch_array($hasil53)){
    $arrayhasil53[] = $jumlah53['nominal'];
    }
    $buktitransferSMP = array_sum($arrayhasil53);    
    
  // Bukti Transfer Pesantren
  $hasil54=mysqli_query($koneksi,"SELECT * FROM db_transfer where id_usaha = 'DTU005'");
  while ($jumlah54=mysqli_fetch_array($hasil54)){
  $arrayhasil54[] = $jumlah54['nominal'];
  }
  $buktitransferPesantren = array_sum($arrayhasil54);      

   // Bukti Transfer Mitra Zakat
   $hasil55=mysqli_query($koneksi,"SELECT * FROM db_transfer where id_usaha = 'DTU006'");
   while ($jumlah55=mysqli_fetch_array($hasil55)){
   $arrayhasil55[] = $jumlah55['nominal'];
   }
   $buktitransferMZ = array_sum($arrayhasil55);   

  // Pemasukan SMP
  $hasil1=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU004'");
  while ($jumlah1=mysqli_fetch_array($hasil1)){
  $arrayhasil1[] = $jumlah1['kd_jumlah'];
  }
  $pemasukanSMP = array_sum($arrayhasil1); 

  // Pemasukan 75% SMP
  $hasil21=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU004'");
  while ($jumlah21=mysqli_fetch_array($hasil21)){
  $arrayhasil21[] = $jumlah21['keseluruhan'];
  }
  $SMP75 = array_sum($arrayhasil21); 

  // Pemasukan 75% SD
  $hasil22=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU003'");
  while ($jumlah22=mysqli_fetch_array($hasil22)){
  $arrayhasil22[] = $jumlah22['keseluruhan'];
  }
  $SD75 = array_sum($arrayhasil22); 

  // Pemasukan SD
  $hasil3=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU003'");
  while ($jumlah3=mysqli_fetch_array($hasil3)){
  $arrayhasil3[] = $jumlah3['kd_jumlah'];
  }
  $pemasukanSD = array_sum($arrayhasil3); 

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

  // Pemasukan KB INTEGRAL
  $hasil7=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU002'");
  while ($jumlah7=mysqli_fetch_array($hasil7)){
  $arrayhasil7[] = $jumlah7['kd_jumlah'];
  }
  $pemasukanKB = array_sum($arrayhasil7); 

  // Pemasukan KB INTEGRAL 75
  $hasil24=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU002'");
  while ($jumlah24=mysqli_fetch_array($hasil24)){
  $arrayhasil24[] = $jumlah24['keseluruhan'];
  }
  $KB75= array_sum($arrayhasil24); 

  // Pemasukan PESANTREN
  $hasil25=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU005'");
  while ($jumlah25=mysqli_fetch_array($hasil25)){
  $arrayhasil25[] = $jumlah25['keseluruhan'];
  }
  $Pesantren75 = array_sum($arrayhasil25); 

  // Pemasukan PESANTREN
  $hasil9=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU005'");
  while ($jumlah9=mysqli_fetch_array($hasil9)){
  $arrayhasil9[] = $jumlah9['kd_jumlah'];
  }
  $pemasukanPesantren = array_sum($arrayhasil9); 

  // Pemasukan MITRA ZAKAT
  $hasil11=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU006'");
  while ($jumlah11=mysqli_fetch_array($hasil11)){
  $arrayhasil11[] = $jumlah11['kd_jumlah'];
  }
  $pemasukanMZ = array_sum($arrayhasil11); 

  // Pemasukan MITRA ZAKAT 75
  $hasil26=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU006'");
  while ($jumlah26=mysqli_fetch_array($hasil26)){
  $arrayhasil26[] = $jumlah26['keseluruhan'];
  }
  $MZ75 = array_sum($arrayhasil26); 

  // Pemasukan MITRA BMH
  $hasil13=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU007'");
  while ($jumlah13=mysqli_fetch_array($hasil13)){
  $arrayhasil13[] = $jumlah13['kd_jumlah'];
  }
  $pemasukanBMH = array_sum($arrayhasil13); 

  // Pemasukan MITRA BMH 75
  $hasil27=mysqli_query($koneksi,"SELECT SUM(kd_jumlah) * 0.75 AS keseluruhan FROM db_data_input where id_usaha = 'DTU007'");
  while ($jumlah27=mysqli_fetch_array($hasil27)){
  $arrayhasil27[] = $jumlah27['keseluruhan'];
  }
  $BMH75 = array_sum($arrayhasil27);     

  // Pengeluaran Dana Saving
  $hasil20=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU008'");
  while ($jumlah20=mysqli_fetch_array($hasil20)){
  $arrayhasil20[] = $jumlah20['kd_jumlah'];
  }
  $pengeluaranDana= array_sum($arrayhasil20);

      // Pengeluaran Dana Saving
       $hasil50=mysqli_query($koneksi,"SELECT SUM(sub_total) AS unit50 FROM db_validasi where NOT id_usaha = 'DTU008'");
       while ($jumlah50=mysqli_fetch_array($hasil50)){
       $arrayhasil50[] = $jumlah50['unit50'];
       }
       $pengeluaranDana50 = array_sum($arrayhasil50); 


    // Pemasukan TOTAL
    $hasil15=mysqli_query($koneksi,"SELECT * FROM db_data_input WHERE NOT id_usaha = 'DTU008'");
    while ($jumlah15=mysqli_fetch_array($hasil15)){
    $arrayhasil15[] = $jumlah15['kd_jumlah'];
    }
    $pemasukanTOTAL = array_sum($arrayhasil15); 

    // Pengeluaran TOTAL
    $hasil16=mysqli_query($koneksi,"SELECT * FROM db_data_output");
    while ($jumlah16=mysqli_fetch_array($hasil16)){
    $arrayhasil16[] = $jumlah16['kd_jumlah'];
    }
    $pengeluaranTOTAL= array_sum($arrayhasil16);

    $hasil17=mysqli_query($koneksi,"SELECT * FROM db_validasi");
    while ($jumlah17=mysqli_fetch_array($hasil17)){
    $arrayhasil17[] = $jumlah17['anggaran'];
    }
    $totalB= array_sum($arrayhasil17);

    $hasil18=mysqli_query($koneksi,"SELECT * FROM db_validasi WHERE id_usaha = 'DTU008'");
    while ($jumlah18=mysqli_fetch_array($hasil18)){
    $arrayhasil18[] = $jumlah18['sub_total'];
    }
    $totalA= array_sum($arrayhasil18);

    $jumlah1 = mysqli_query($koneksi,"SELECT SUM(kd_jumlah)  from db_data_input 
    WHERE id_usaha = 'DTU007' AND id_pp = 1
    ");
    // menghitung data barang
    $jumlah_barang = mysqli_num_rows($jumlah1);
    

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

    
    $db_user= query("SELECT a.id_transfer, a.gambar, a.id_status, a.nominal, a.keterangan, b.kd_nama_usaha, d.kd_nama_bulan, e.nama_bank 
    FROM db_transfer a 
    
    INNER JOIN db_usaha b ON a.id_usaha = b.id_usaha
    INNER JOIN db_bulan d ON a.id_bulan = d.id_bulan
    INNER JOIN db_bank e ON a.id_bank = e.id_bank
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
          <div class="col-sm-6 col-lg-6 ">
          <h2 align="center">Pelaporan Bukti Transfer Unit Usaha</h2>
          <br>
              <!-- <table>
                  <thead >
                     <tr align="center">
                          <td colspan="2"><b>Unit Usaha</b></th>
                          <td colspan="13"><b>Nominal</b></th>  
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
                      <tr>             
                      <td colspan="2">SMP INTEGRAL :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanSMP - $buktitransferSMP,2,',','.') ?></span></td>

                      <tr>
                      <td colspan="2">SD INTEGRAL :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanSD - $buktitransferSD,2,',','.') ?></span></td>
                      <tr>
                      <td colspan="2">KB - TK AL - IHSAN :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanTK - $buktitransfertk,2,',','.') ?></span></td>
                      <tr>
                      <td colspan="2">KB INTEGRAL :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanKB - $buktitransferKB,2,',','.') ?></span></td>
                      <tr>
                      <td colspan="2">PESANTREN TAHFIDZ DH :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanPesantren - $buktitransferPesantren,2,',','.') ?></span></td>
                      <tr>
                      <td colspan="2">MITRA ZAKAT :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanMZ - $buktitransferMZ,2,',','.') ?></span></td>                   
                  </tbody>
                  </table> -->
                  </div>
              </div>
          </div>

          <div class="container-fluid">
      <div class="col-12 col-s-12">

          <br>

          <!-- <p>Chania is the capital of the Chania region on the island of Crete. The city can be divided in two parts, the old town and the modern city.</p> -->
      </div>
      <div class="row justify-content-center">
          <div class="col-sm-12 col-lg-12 ">

            <!-- <a href="KelolaPelaporan_BMH.php" class="btn btn-primary mb-2"><i class="nav-icon fa fa-database"></i> Laporan Transaksi</a> -->
            <!-- <a href="TambahData_BuktitransferTK.php" class="btn btn-primary mb-4"><i class="nav-icon fa fa-cart-plus"></i> Tambah Transaksi</a> -->
            <div style="overflow-x:auto;">

            <table class="table table-striped table-hover table-bordered table-align-middle" id="data">
                <thead >
                    <tr align="center">
                        <th>No</th>
                        <th width="150px">Nama Kategori</th>
                        <th width="120px">Bulan </th>
                        <th width="150px">Nama Bank</th>
                        <th width="150px">Bukti Transfer</th>
                        <th width="100px">Nominal</th>
                        <th width="200px">Keterangan</th>
                        <th width="100px">Status</th>
                        <th>Aksi</th>
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
                    <td><?=$data['nama_bank']?></td>
                    <td><img src="../assets/img/<?=$data['gambar']?>" alt="" height="130" width="100"></td>
                    <td><?php echo number_format($data['nominal'],2,',','.') ?></td>
                    <td><?=$data['keterangan']?></td>
                    <td><?=$data['nama_status']?></td>
                    <td>
                        <div class="btn-group">
                            <a href="KonfirmasiBukti_transfer.php?id=<?=$data['id_transfer']?>"  class="btn btn-primary"><i class="nav-icon fa fa-check"></i> Konfirmasi</a>
                            <a href="Deletedata_buktitransfer.php?id=<?=$data['id_transfer']?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i> Hapus</a>
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
