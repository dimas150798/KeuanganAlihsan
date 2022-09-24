
  <?php
  
      $lokasi1 = "Pemasukan";
      $lokasi2 = "Detail Dana Saving";
      $lokasi3 = "Unduh Laporan";
      $lokasi4 = "Validasi";
      $linklokasi2 = "EditData_Yayasan.php";
      $linklokasi3 = "Unduh_laporanYayasan.php";
      $linklokasi4 = "Validasi_Yayasan.php";

      
      include "../admin/template/header.php";   
      include "../admin/template/menu.php";
      include "../admin/template/lokasi1.php";
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

    // Pengeluaran SMP
    $hasil2=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU004'");
    while ($jumlah2=mysqli_fetch_array($hasil2)){
    $arrayhasil2[] = $jumlah2['kd_jumlah'];
    }
    $pengeluaranSMP= array_sum($arrayhasil2); 

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

    // Pengeluaran SD
    $hasil4=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU003'");
    while ($jumlah4=mysqli_fetch_array($hasil4)){
    $arrayhasil4[] = $jumlah4['kd_jumlah'];
    }
    $pengeluaranSD= array_sum($arrayhasil4); 

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

    // Pengeluaran KB - TK AL - IHSAN
    $hasil6=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU001'");
    while ($jumlah6=mysqli_fetch_array($hasil6)){
    $arrayhasil6[] = $jumlah6['kd_jumlah'];
    }
    $pengeluaranTK= array_sum($arrayhasil6);

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

    // Pengeluaran KB INTEGRAL
    $hasil8=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU002'");
    while ($jumlah8=mysqli_fetch_array($hasil8)){
    $arrayhasil8[] = $jumlah8['kd_jumlah'];
    }
    $pengeluaranKB= array_sum($arrayhasil8);

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

    // Pengeluaran PESANTREN
    $hasil10=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU005'");
    while ($jumlah10=mysqli_fetch_array($hasil10)){
    $arrayhasil10[] = $jumlah10['kd_jumlah'];
    }
    $pengeluaranPesantren= array_sum($arrayhasil10);

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

    // Pengeluaran MITRA ZAKAT
    $hasil12=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU006'");
    while ($jumlah12=mysqli_fetch_array($hasil12)){
    $arrayhasil12[] = $jumlah12['kd_jumlah'];
    }
    $pengeluaranMZ= array_sum($arrayhasil12);

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

    // Pengeluaran MITRA BMH
    $hasil14=mysqli_query($koneksi,"SELECT * FROM db_data_output where id_usaha = 'DTU007'");
    while ($jumlah14=mysqli_fetch_array($hasil14)){
    $arrayhasil14[] = $jumlah14['kd_jumlah'];
    }
    $pengeluaranBMH= array_sum($arrayhasil14);

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

        // Pengeluaran TOTAL Unit
        $hasil52=mysqli_query($koneksi,"SELECT * FROM db_data_output WHERE NOT id_usaha = 'DTU008'");
        while ($jumlah52=mysqli_fetch_array($hasil52)){
        $arrayhasil52[] = $jumlah52['kd_jumlah'];
        }
        $pengeluaranunit= array_sum($arrayhasil52);
  
      // Pemasukan TOTAL
      $hasil15=mysqli_query($koneksi,"SELECT * FROM db_data_input WHERE NOT id_usaha = 'DTU008'");
      while ($jumlah15=mysqli_fetch_array($hasil15)){
      $arrayhasil15[] = $jumlah15['kd_jumlah'];
      }
      $pemasukanTOTAL = array_sum($arrayhasil15); 
  
      // Pengeluaran TOTAL
      $hasil16=mysqli_query($koneksi,"SELECT * FROM db_data_output WHERE NOT id_usaha = 'DTU008'");
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

      // Pemasukan Yayasan
      $hasil19=mysqli_query($koneksi,"SELECT * FROM db_data_input WHERE id_usaha = 'DTU008'");
      while ($jumlah19=mysqli_fetch_array($hasil19)){
      $arrayhasil19[] = $jumlah19['kd_jumlah'];
      }
      $pemasukanyayasan = array_sum($arrayhasil19);       

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

  ?>

  <?php

          $hasil20=mysqli_query($koneksi,"SELECT * FROM db_data_input where id_usaha = 'DTU007'");
          while ($jumlah20=mysqli_fetch_array($hasil20)){
          $arrayhasil20[] = $jumlah20['kd_jumlah'];
          }
          $jumlahhasil20 = array_sum($arrayhasil20);
          
        
            ?>

  <div class="container-fluid">
      <div class="col-12 col-s-12">
      <br>
          <h3 align="center">Data Pemasukan Yayasan Al - Ihsan</h3>
          <h3 align="center">Hidayatullah Probolinggo</h3>
          <br>

          <!-- <p>Chania is the capital of the Chania region on the island of Crete. The city can be divided in two parts, the old town and the modern city.</p> -->
      </div>
      <div class="row justify-content-center">
          <div class="col-sm-12 col-lg-12 ">
              <div style="overflow-x:auto;">

              <table class="table table-bordered" align = "center" id="data">
                  <thead >
                  
                  <tr align="center">
                          <td colspan="2"><b>Unit Usaha</b></th>
                          <td colspan="13"><b>Pemasukan</b></th>  
                          <td colspan="13"><b>Pengeluaran</b></th>
                          <td colspan="13"><b>Dana Saving</b></th>
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
                      <td colspan="13">Rp. <?php echo number_format($pemasukanSMP,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pengeluaranSMP,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanSMP - $SMP75,2,',','.') ?></span></td>

                      <tr>
                      <td colspan="2">SD INTEGRAL :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanSD,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pengeluaranSD,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanSD - $SD75,2,',','.') ?></span></td>
                      <tr>
                      <td colspan="2">KB - TK AL - IHSAN :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanTK,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pengeluaranTK,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanTK - $TK75,2,',','.') ?></span></td>
                      <tr>
                      <td colspan="2">KB INTEGRAL :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanKB,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pengeluaranKB,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanKB - $KB75,2,',','.') ?></span></td>
                      <tr>
                      <td colspan="2">PESANTREN TAHFIDZ DH :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanPesantren,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pengeluaranPesantren,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanPesantren - $Pesantren75,2,',','.') ?></span></td>
                      <tr>
                      <td colspan="2">MITRA ZAKAT :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanMZ,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pengeluaranMZ,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanMZ - $MZ75,2,',','.') ?></span></td>
                      <tr>
                      <td colspan="2">MITRA BMH :</td>
                      <td colspan="13">Rp. <?php echo number_format($pemasukanBMH,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pengeluaranBMH,2,',','.') ?></span></td>
                      <td colspan="13">-</span></td>
                      <tr>
                      <td colspan="2">YAYASAN AL - IHSAN :</b></td>
                      <td colspan="13">Rp. <?php echo number_format($totalA,2,',','.') ?></span></td>
                      <td colspan="13">Rp. <?php echo number_format($pengeluaranDana,2,',','.') ?></span></td>
                      <td colspan="13">-</span></td>
                      <!-- <td colspan="13">Rp. <?php echo number_format($pemasukanSMP - $SMP75 + $pemasukanSD - $SD75 + $pemasukanTK - $TK75 + $pemasukanKB - $KB75 + $pemasukanPesantren - $Pesantren75 + $pemasukanMZ - $MZ75,2,',','.') ?></span></td> -->
                      <tr>                      
                      <td colspan="15"><b>TOTAL PEMASUKAN UNIT USAHA: </b><b>Rp. <?php echo number_format($pemasukanTOTAL,2,',','.') ?></b></span></td>
                      <td colspan="15"><b>TOTAL PEMASUKAN YAYASAN : </b><b>Rp. <?php echo number_format(($pemasukanSMP - $SMP75 + $pemasukanSD - $SD75 + $pemasukanTK - $TK75 + $pemasukanKB - $KB75 + $pemasukanPesantren - $Pesantren75 + $pemasukanMZ - $MZ75) + $pemasukanyayasan,2,',','.') ?></b></span></td>
                      <tr>
                      <td colspan="15"><b>TOTAL PENGELUARAN UNIT USAHA : </b><b>Rp. <?php echo number_format($pengeluaranTOTAL + ($pemasukanSMP - $SMP75 + $pemasukanSD - $SD75 + $pemasukanTK - $TK75 + $pemasukanKB - $KB75 + $pemasukanPesantren - $Pesantren75 + $pemasukanMZ - $MZ75 ) ,2,',','.') ?></b></span></td>
                      <td colspan="15"><b>TOTAL PENGELUARAN YAYASAN : </b><b>Rp. <?php echo number_format($pengeluaranDana ,2,',','.') ?></b></span></td>
                      <tr>
                      <td colspan="15"><b>SALDO UNIT USAHA : </b><b>Rp. <?php echo number_format($pemasukanTOTAL - $pengeluaranunit - ($pemasukanSMP - $SMP75 + $pemasukanSD - $SD75 + $pemasukanTK - $TK75 + $pemasukanKB - $KB75 + $pemasukanPesantren - $Pesantren75 + $pemasukanMZ - $MZ75),2,',','.') ?></b></span></td>         
                      <td colspan="15"><b>SALDO YAYASAN : </b><b>Rp. <?php echo number_format($totalA,2,',','.') ?></b></span></td>               
                      
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