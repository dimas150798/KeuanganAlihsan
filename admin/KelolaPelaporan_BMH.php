  <?php
      $lokasi1 = "Pemasukan";
      $lokasi2 = "Detail Transaksi";
      $lokasi3 = "Unduh Laporan";
      $linklokasi2 = "EditData_BMH.php";
      $linklokasi3 = "Unduh_laporanBMH.php";

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


  ?>

  <?php

          $hasil1=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU007'");
          while ($jumlah1=mysqli_fetch_array($hasil1)){
          $arrayhasil1[] = $jumlah1['kd_jumlah'];
          }
          $jumlahhasil1 = array_sum($arrayhasil1);
          
        
            ?>

  <div class="container-fluid">
      <div class="col-12 col-s-12">
      <br>
          <h3 align="center">Transaksi Pemasukan Mitra BMH</h3>
          <h3 align="center">Hidayatullah Probolinggo</h3>
          <br>
     </div>
      <div class="row justify-content-center">
          <div class="col-sm-12 col-lg-12 ">

              <div style="overflow-x:auto;">
              <table class="table table-bordered" align = "center" id="data">
                  <thead >

                  
                      <tr align="center">
                          <th rowspan="2">No</th>
                          <th rowspan="2" width="200px">Kategori</th>
                          <th colspan="12" width="110px">Bulan</th>  
                          <th rowspan="2" width="200px">Total 1 Tahun</th>

                           
                      </tr>

                      </tr>
                        <tr align="center">
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                      </tr>
                      


                  </thead>
                  <tbody>
                      <?php
                      $i = 1;
                      foreach ($db_data as $data) {
                          ?>
                  <tr align="center">
                      <td><?=$i++?>.</td>
                      <td><?=$data['nama_kategori']?></td>
                      <td> <?=number_format($data['bulan1'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan2'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan3'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan4'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan5'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan6'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan7'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan8'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan9'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan10'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan11'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['bulan12'], 0, ",", ".")?></td>
                      <td> <?=number_format($data['totalkeseluruhan'], 0, ",", ".")?></td>

                      </tr>

                      <?php } ?>
                      <!-- <td colspan = "15"></td> -->
                      <tr align="center">                      
                      <td colspan="2">TOTAL KESELURUHAN</td>
                      <td colspan="12"><?php echo number_format($jumlahhasil1,2,',','.') ?></span></td>
                      <td td colspan="2">
                        <div class="btn-group">
                            <a href="Validasi_BMH.php"  class="btn btn btn-success"><i class="nav-icon fa fa-hand-pointer-o"></i> Validasi</a>
                        </div>
                    </td>
                      
                      
                  </tbody>
                  </table>
                  </div>
              </div>
          </div>
          <br>


      </div>
      



      
  <?php
      include "template/footer.php";
  ?>

  <!-- <script type="text/javascript">
      $(document).ready(function () {
          $('#data').DataTable();
      });
  </script> -->

  <!-- <style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {background-color: #f2f2f2;}

  * {
    box-sizing: border-box;
  }

  .row::after {
    content: "";
    clear: both;
    display: table;
  }

  [class*="col-"] {
    float: left;
    padding: 15px;
  }

  html {
    font-family: "Lucida Sans", sans-serif;
  }

  .header {
    background-color: #9933cc;
    color: #ffffff;
    padding: 15px;
  }

  .menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }

  .menu li {
    padding: 8px;
    margin-bottom: 7px;
    background-color: #33b5e5;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  }

  .menu li:hover {
    background-color: #0099cc;
  }

  .aside {
    background-color: #33b5e5;
    padding: 15px;
    color: #ffffff;
    text-align: center;
    font-size: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  }

  .footer {
    background-color: #0099cc;
    color: #ffffff;
    text-align: center;
    font-size: 12px;
    padding: 15px;
  }

  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }

  @media only screen and (min-width: 600px) {
    /* For tablets: */
    .col-s-1 {width: 8.33%;}
    .col-s-2 {width: 16.66%;}
    .col-s-3 {width: 25%;}
    .col-s-4 {width: 33.33%;}
    .col-s-5 {width: 41.66%;}
    .col-s-6 {width: 50%;}
    .col-s-7 {width: 58.33%;}
    .col-s-8 {width: 66.66%;}
    .col-s-9 {width: 75%;}
    .col-s-10 {width: 83.33%;}
    .col-s-11 {width: 91.66%;}
    .col-s-12 {width: 100%;}
  }
  @media only screen and (min-width: 768px) {
    /* For desktop: */
    .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33.33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 50%;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;}
  </style> -->