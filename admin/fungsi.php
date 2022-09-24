<?php
    include "../koneksi/koneksi.php";
    
    function query($query_kedua){
        global $koneksi;

        $result = mysqli_query($koneksi, $query_kedua);
        $rows = [];
        while ($data = mysqli_fetch_assoc($result)) {
            $rows[] = $data;
        }
        return $rows;
    }

    //Delete data pemasukan 
    function updatepengeluaranSD($id){
        global $koneksi;

        $query1 = "DELETE from db_data_output where id_data_output = '$id' ";
        $query2 = "DELETE from db_validasi where id_validasi = 'VAL001' ";


        mysqli_query($koneksi, $query1);
        mysqli_query($koneksi, $query2);

        return mysqli_affected_rows($koneksi);
    }

    //Delete data pengeluaran Yayasan
    function deletepengeluaranYayasan($id){
        global $koneksi;

        $query1 = "DELETE from db_data_output where id_data_output = '$id' ";
        $query2 = "DELETE from db_validasi where id_validasi = 'VAN001' ";


        mysqli_query($koneksi, $query1);
        mysqli_query($koneksi, $query2);

        return mysqli_affected_rows($koneksi);
    }

    //Delete data pengeluaran Mitra BMH
    function deletepengeluaranBMH($id){
        global $koneksi;

        $query1 = "DELETE from db_data_output where id_data_output = '$id' ";
        $query2 = "DELETE from db_validasi where id_validasi = 'VAH001' ";


        mysqli_query($koneksi, $query1);
        mysqli_query($koneksi, $query2);

        return mysqli_affected_rows($koneksi);
    }

    //Delete data pengeluaran Mitra Zakat
    function deletepengeluaranMZ($id){
        global $koneksi;

        $query1 = "DELETE from db_data_output where id_data_output = '$id' ";
        $query2 = "DELETE from db_validasi where id_validasi = 'VAZ001' ";


        mysqli_query($koneksi, $query1);
        mysqli_query($koneksi, $query2);

        return mysqli_affected_rows($koneksi);
    }

    //Delete data pengeluaran Pesantren
    function deletepengeluaranPesantren($id){
        global $koneksi;

        $query1 = "DELETE from db_data_output where id_data_output = '$id' ";
        $query2 = "DELETE from db_validasi where id_validasi = 'VAP001' ";


        mysqli_query($koneksi, $query1);
        mysqli_query($koneksi, $query2);

        return mysqli_affected_rows($koneksi);
    }

    //Delete data pengeluaran KB
    function deletepengeluaranKB($id){
        global $koneksi;

        $query1 = "DELETE from db_data_output where id_data_output = '$id' ";
        $query3 = "DELETE from db_data_input where id_data_input = '$id' ";
        $query2 = "DELETE from db_validasi where id_validasi = 'VAK001' ";


        mysqli_query($koneksi, $query1);
        mysqli_query($koneksi, $query2);
        mysqli_query($koneksi, $query3);

        return mysqli_affected_rows($koneksi);
    }

    //Delete data pengeluaran TK
    function deletepengeluaranTK($id){
        global $koneksi;

        $query1 = "DELETE from db_data_output where id_data_output = '$id' ";
        $query2 = "DELETE from db_validasi where id_validasi = 'VAT001' ";


        mysqli_query($koneksi, $query1);
        mysqli_query($koneksi, $query2);

        return mysqli_affected_rows($koneksi);
    }

    //Delete data pengeluaran SMP 
    function deletepengeluaranSMP($id){
        global $koneksi;

        $query1 = "DELETE from db_data_output where id_data_output = '$id' ";
        $query2 = "DELETE from db_validasi where id_validasi = 'VAM001' ";


        mysqli_query($koneksi, $query1);
        mysqli_query($koneksi, $query2);

        return mysqli_affected_rows($koneksi);
    }

    //Delete data pengeluaran SD 
    function deletepengeluaranSD($id){
        global $koneksi;

        $query1 = "DELETE from db_data_output where id_data_output = '$id' ";
        $query2 = "DELETE from db_validasi where id_validasi = 'VAL001' ";


        mysqli_query($koneksi, $query1);
        mysqli_query($koneksi, $query2);

        return mysqli_affected_rows($koneksi);
    }

    //Delete data bukti transfer
    function deletebuktitransfer($id){
        global $koneksi;

        $query = "DELETE from db_transfer where id_transfer = '$id' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Delete data pemasukan 
    function deletepemasukan($id){
        global $koneksi;

        $query = "DELETE from db_data_input where id_data_input = '$id' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Delete data validasi
    function deletevalidasi($id){
        global $koneksi;

        $query = "DELETE from db_validasi where id_validasi = '$id' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    
     //Kode pertahun
     function kodepertahun(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_subtotal) AS maxkode FROM db_subtotal WHERE id_subtotal LIKE 'SUB%'");
        $data = mysqli_fetch_array($query);
        $kodepertahun = $data['maxkode'];
        $nourut = (int)substr($kodepertahun,3, 3);
        $nourut++;
        $char = "SUB";
        $kodepertahun = $char.sprintf("%03s",$nourut);
        return $kodepertahun;
    }


     //Kode User
     function kodeuser(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_user) AS maxkode FROM db_user WHERE id_user LIKE 'US%'");
        $data = mysqli_fetch_array($query);
        $kodeuser = $data['maxkode'];
        $nourut = (int)substr($kodeuser,3, 3);
        $nourut++;
        $char = "US";
        $kodeuser = $char.sprintf("%03s",$nourut);
        return $kodeuser;
    }

    //Tambah Akun Pengguna
    function tambahakunuser($data){
    global $koneksi;

    $id_user = htmlspecialchars($data['id_user']);
    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $password = $data['password1'];
    $alamat = htmlspecialchars($data['alamat']);
    $tgl_lahir = htmlspecialchars($data['tgl_lahir']); 
    $akses = htmlspecialchars($data['akses']); 
    
    
    //mengecek username
    $query1 = mysqli_query($koneksi, "SELECT username FROM db_user WHERE username='$username' ");

    if (mysqli_fetch_assoc($query1)) {
        echo "
            <script>
                alert('Username sudah ada');
                window.location = 'registrasi_pegawai.php';
            </script>
                ";
                return false;
    }

    //enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);

    //tambah data
    $query = "INSERT INTO db_user VALUES ('$id_user', '$nama', '$tgl_lahir', '$alamat', '$username', '$password',  '$akses')";
    $data = mysqli_query($koneksi, $query);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Edit Akun 
    function editpasswordpegawai($data){
        global $koneksi;
        
        $id_user = htmlspecialchars($_SESSION[id_user]);
        $password = $data['password1'];

        //enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);

        //update data user
        $query = "UPDATE db_user SET
            password = '$password'
            WHERE id_user = '$_SESSION[id_user]' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Delete Akun pegawai
    function deleteakunpegawai($id){
        global $koneksi;

        $query = "DELETE from db_user where id_user = '$id' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Edit Akun User
    function editakunuser($data){
        global $koneksi;

        $id_user = htmlspecialchars($data['id_user']);
        $nama = htmlspecialchars($data['nama']);
        $username = htmlspecialchars($data['username']);
        $password = $data['password1'];
        $tgl_lahir = htmlspecialchars($data['tgl_lahir']); 
        $alamat= htmlspecialchars($data['alamat']);
        $akses = htmlspecialchars($data['akses']);

        //enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);

        //update data user
        $query = "UPDATE db_user SET
            nama = '$nama',
            username = '$username',
            password = '$password',
            tgl_lahir = '$tgl_lahir',
            alamat = '$alamat',
            akses = '$akses'
            WHERE id_user = '$id_user' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }        

    //Kode Validasi Mitra BMH
    function kodevalidasiBMH(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_validasi) AS maxkode FROM db_validasi WHERE id_validasi LIKE 'VAH%'");
        $data = mysqli_fetch_array($query);
        $kodevalidasiBMH = $data['maxkode'];
        $nourut = (int)substr($kodevalidasiBMH,3, 3);
        $nourut++;
        $char = "VAH";
        $kodevalidasiBMH = $char.sprintf("%03s",$nourut);
        return $kodevalidasiBMH;
    }

    //Kode Validasi Yayasan
    function kodevalidasiYayasan(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_validasi) AS maxkode FROM db_validasi WHERE id_validasi LIKE 'VAN%'");
        $data = mysqli_fetch_array($query);
        $kodevalidasiYayasan = $data['maxkode'];
        $nourut = (int)substr($kodevalidasiYayasan,3, 3);
        $nourut++;
        $char = "VAN";
        $kodevalidasiYayasan = $char.sprintf("%03s",$nourut);
        return $kodevalidasiYayasan;
    }

    //Kode Validasi Mitra Zakat
     function kodevalidasiMZ(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_validasi) AS maxkode FROM db_validasi WHERE id_validasi LIKE 'VAZ%'");
        $data = mysqli_fetch_array($query);
        $kodevalidasiMZ = $data['maxkode'];
        $nourut = (int)substr($kodevalidasiMZ,3, 3);
        $nourut++;
        $char = "VAZ";
        $kodevalidasiMZ = $char.sprintf("%03s",$nourut);
        return $kodevalidasiMZ;
    }

     //Kode Validasi Pesantren
     function kodevalidasiPesantren(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_validasi) AS maxkode FROM db_validasi WHERE id_validasi LIKE 'VAP%'");
        $data = mysqli_fetch_array($query);
        $kodevalidasiPesantren = $data['maxkode'];
        $nourut = (int)substr($kodevalidasiPesantren,3, 3);
        $nourut++;
        $char = "VAP";
        $kodevalidasiPesantren = $char.sprintf("%03s",$nourut);
        return $kodevalidasiPesantren;
    }

     //Kode Validasi KB
     function kodevalidasiKB(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_validasi) AS maxkode FROM db_validasi WHERE id_validasi LIKE 'VAK%'");
        $data = mysqli_fetch_array($query);
        $kodevalidasiKB = $data['maxkode'];
        $nourut = (int)substr($kodevalidasiKB,3, 3);
        $nourut++;
        $char = "VAK";
        $kodevalidasiKB = $char.sprintf("%03s",$nourut);
        return $kodevalidasiKB;
    }

     //Kode Validasi TK
     function kodevalidasiTK(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_validasi) AS maxkode FROM db_validasi WHERE id_validasi LIKE 'VAT%'");
        $data = mysqli_fetch_array($query);
        $kodevalidasiTK = $data['maxkode'];
        $nourut = (int)substr($kodevalidasiTK,3, 3);
        $nourut++;
        $char = "VAT";
        $kodevalidasiTK = $char.sprintf("%03s",$nourut);
        return $kodevalidasiTK;
    }
    
     //Kode Validasi SMP
     function kodevalidasiSMP(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_validasi) AS maxkode FROM db_validasi WHERE id_validasi LIKE 'VAM%'");
        $data = mysqli_fetch_array($query);
        $kodevalidasiSMP = $data['maxkode'];
        $nourut = (int)substr($kodevalidasiSMP,3, 3);
        $nourut++;
        $char = "VAM";
        $kodevalidasiSMP = $char.sprintf("%03s",$nourut);
        return $kodevalidasiSMP;
    }

     //Kode Validasi SD
     function kodevalidasiSD(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_validasi) AS maxkode FROM db_validasi WHERE id_validasi LIKE 'VAL%'");
        $data = mysqli_fetch_array($query);
        $kodevalidasiSD = $data['maxkode'];
        $nourut = (int)substr($kodevalidasiSD,3, 3);
        $nourut++;
        $char = "VAL";
        $kodevalidasiSD = $char.sprintf("%03s",$nourut);
        return $kodevalidasiSD;
    }

    //Kode Tambah pengeluaran Yayasan
    function kodetambahpengeluaranYayasan(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_output) AS maxkode FROM db_data_output WHERE id_data_output LIKE 'NA1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahpengeluaranYayasan = $data['maxkode'];
        $nourut = (int)substr($kodetambahpengeluaranYayasan,3, 3);
        $nourut++;
        $char = "NA1";
        $kodetambahpengeluaranYayasan = $char.sprintf("%03s",$nourut);
        return $kodetambahpengeluaranYayasan;
    }

    //Kode Tambah pengeluaran Mitra BMH
    function kodetambahpengeluaranBMH(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_output) AS maxkode FROM db_data_output WHERE id_data_output LIKE 'HA1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahpengeluaranBMH = $data['maxkode'];
        $nourut = (int)substr($kodetambahpengeluaranBMH,3, 3);
        $nourut++;
        $char = "HA1";
        $kodetambahpengeluaranBMH = $char.sprintf("%03s",$nourut);
        return $kodetambahpengeluaranBMH;
    }

    //Kode Tambah pengeluaran Mitra Zakat
    function kodetambahpengeluaranMZ(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_output) AS maxkode FROM db_data_output WHERE id_data_output LIKE 'ZA1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahpengeluaranMZ = $data['maxkode'];
        $nourut = (int)substr($kodetambahpengeluaranMZ,3, 3);
        $nourut++;
        $char = "ZA1";
        $kodetambahpengeluaranMZ = $char.sprintf("%03s",$nourut);
        return $kodetambahpengeluaranMZ;
    }

    //Kode Tambah pengeluaran Pesantren
    function kodetambahpengeluaranPesantren(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_output) AS maxkode FROM db_data_output WHERE id_data_output LIKE 'PA1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahpengeluaranPesantren = $data['maxkode'];
        $nourut = (int)substr($kodetambahpengeluaranPesantren,3, 3);
        $nourut++;
        $char = "PA1";
        $kodetambahpengeluaranPesantren = $char.sprintf("%03s",$nourut);
        return $kodetambahpengeluaranPesantren;
    }

    //Kode Tambah pengeluaran KB
    function kodetambahpengeluaranKB(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_output) AS maxkode FROM db_data_output WHERE id_data_output LIKE 'KA1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahpengeluaranKB = $data['maxkode'];
        $nourut = (int)substr($kodetambahpengeluaranKB,3, 3);
        $nourut++;
        $char = "KA1";
        $kodetambahpengeluaranKB = $char.sprintf("%03s",$nourut);
        return $kodetambahpengeluaranKB;
    }

    //Kode Tambah pengeluaran TK
     function kodetambahpengeluaranTK(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_output) AS maxkode FROM db_data_output WHERE id_data_output LIKE 'TA1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahpengeluaranTK = $data['maxkode'];
        $nourut = (int)substr($kodetambahpengeluaranTK,3, 3);
        $nourut++;
        $char = "TA1";
        $kodetambahpengeluaranTK = $char.sprintf("%03s",$nourut);
        return $kodetambahpengeluaranTK;
    }

     //Kode Tambah pengeluaran SMP
     function kodetambahpengeluaranSMP(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_output) AS maxkode FROM db_data_output WHERE id_data_output LIKE 'MA1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahpengeluaranSMP = $data['maxkode'];
        $nourut = (int)substr($kodetambahpengeluaranSMP,3, 3);
        $nourut++;
        $char = "MA1";
        $kodetambahpengeluaranSMP = $char.sprintf("%03s",$nourut);
        return $kodetambahpengeluaranSMP;
    }

     //Kode Tambah pengeluaran SD
     function kodetambahpengeluaranSD(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_output) AS maxkode FROM db_data_output WHERE id_data_output LIKE 'PA1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahpengeluaranSD = $data['maxkode'];
        $nourut = (int)substr($kodetambahpengeluaranSD,3, 3);
        $nourut++;
        $char = "PA1";
        $kodetambahpengeluaranSD = $char.sprintf("%03s",$nourut);
        return $kodetambahpengeluaranSD;
    }

     //Kode Tambah SD
    function kodetambahSD(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_input) AS maxkode FROM db_data_input WHERE id_data_input LIKE 'DA1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahSD = $data['maxkode'];
        $nourut = (int)substr($kodetambahSD,3, 3);
        $nourut++;
        $char = "DA1";
        $kodetambahSD = $char.sprintf("%03s",$nourut);
        return $kodetambahSD;
    }

     //Kode Tambah SMP
     function kodetambahSMP(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_input) AS maxkode FROM db_data_input WHERE id_data_input LIKE 'DB1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahSMP = $data['maxkode'];
        $nourut = (int)substr($kodetambahSMP,3, 3);
        $nourut++;
        $char = "DB1";
        $kodetambahSMP = $char.sprintf("%03s",$nourut);
        return $kodetambahSMP;
    }

    //Kode Tambah TK 
     function kodetambahTK(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_input) AS maxkode FROM db_data_input WHERE id_data_input LIKE 'DC1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahTK = $data['maxkode'];
        $nourut = (int)substr($kodetambahTK,3, 3);
        $nourut++;
        $char = "DC1";
        $kodetambahTK = $char.sprintf("%03s",$nourut);
        return $kodetambahTK;
    }

    //Kode Tambah KB Integral 
    function kodetambahKB(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_input) AS maxkode FROM db_data_input WHERE id_data_input LIKE 'DD1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahKB = $data['maxkode'];
        $nourut = (int)substr($kodetambahKB,3, 3);
        $nourut++;
        $char = "DD1";
        $kodetambahKB = $char.sprintf("%03s",$nourut);
        return $kodetambahKB;
    }

    //Kode Tambah Pesantren 
    function kodetambahPesantren(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_input) AS maxkode FROM db_data_input WHERE id_data_input LIKE 'DE1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahPesantren = $data['maxkode'];
        $nourut = (int)substr($kodetambahPesantren,3, 3);
        $nourut++;
        $char = "DE1";
        $kodetambahPesantren = $char.sprintf("%03s",$nourut);
        return $kodetambahPesantren;
    }

    //Kode Tambah Mitra Zakat
    function kodetambahMZ(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_input) AS maxkode FROM db_data_input WHERE id_data_input LIKE 'DF1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahMZ = $data['maxkode'];
        $nourut = (int)substr($kodetambahMZ,3, 3);
        $nourut++;
        $char = "DF1";
        $kodetambahMZ = $char.sprintf("%03s",$nourut);
        return $kodetambahMZ;
    }

    //Kode Tambah Mitra BMH
    function kodetambahBMH(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_input) AS maxkode FROM db_data_input WHERE id_data_input LIKE 'DG1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahBMH = $data['maxkode'];
        $nourut = (int)substr($kodetambahBMH,3, 3);
        $nourut++;
        $char = "DG1";
        $kodetambahBMH = $char.sprintf("%03s",$nourut);
        return $kodetambahBMH;
    }

    //Kode Tambah Yayasan
    function kodetambahYayasan(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_data_input) AS maxkode FROM db_data_input WHERE id_data_input LIKE 'DY1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahYayasan = $data['maxkode'];
        $nourut = (int)substr($kodetambahYayasan,3, 3);
        $nourut++;
        $char = "DY1";
        $kodetambahYayasan = $char.sprintf("%03s",$nourut);
        return $kodetambahYayasan;
    }

    //Kode Tambah Bukti
    function kodetambahBukti(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_transfer) AS maxkode FROM db_transfer WHERE id_transfer LIKE 'DT1%'");
        $data = mysqli_fetch_array($query);
        $kodetambahBukti = $data['maxkode'];
        $nourut = (int)substr($kodetambahBukti,3, 3);
        $nourut++;
        $char = "DT1";
        $kodetambahBukti = $char.sprintf("%03s",$nourut);
        return $kodetambahBukti;
    }

    //Upload file gambar anggota
    function uploadfoto(){
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $file_tmp = $_FILES['gambar']['tmp_name'];

    //     if ($error === 4) { 
    //         echo "
    //         <script>
    //             alert('Tidak ada gambar yang diupload');
    //         </script>
    //         ";
    //         return false;
    // }

        $jenis_gambar = ['jpg', 'jpeg', 'png', 'gif']; //jenis gambar yang boleh diinputkan
        $pecah_gambar = explode(".", $nama_file); //Memecah nama file dengan jenis gambar
        $pecah_gambar = strtolower(end($pecah_gambar)); //mengambil data array paling belakang
        // if (!in_array($pecah_gambar, $jenis_gambar)) {
        //     echo "
        //         <script>
        //             alert('Yang anda upload bukan file gambar');
        //         </script>
        //     ";
        //     return false;
        // }
        //cek kapasitas file yang diupload dala bentuk byte 1 MB = 1000000 Byte
        if ($ukuran_file > 10000000) {
            echo"
                <script>
                    alert('Ukuran file terlalu besar');
                </script>
            ";
            return false;
        }

        $namafilebaru = uniqid();
        $namafilebaru .= ".";
        $namafilebaru .= $pecah_gambar;

        move_uploaded_file($file_tmp, '../assets/img/'.$namafilebaru);

        //mereturn nama file agar masuk ke $gambar == upload()
        return $namafilebaru;
    }


    //Tambah data saldo SMP
    function tambahdsaldoSMP($data){
    global $koneksi;

    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 
    $anggaran = htmlspecialchars($data['anggaran']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU008', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    // $query3 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU004', 'KAP070', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "UPDATE db_validasi SET id_usaha = 'DTU004', sub_total = '$sisatotal', anggaran = '$anggaran' WHERE id_validasi = 'VAM001'";
    $query4 = "UPDATE db_validasi SET id_usaha = 'DTU008', sub_total = '$kd_jumlah', anggaran = NULL WHERE id_validasi = 'VAN001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    $data = mysqli_query($koneksi, $query3);
    $data = mysqli_query($koneksi, $query4);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    } 

    //Tambah data pengeluaran Yayasan
    function tambahdatapengeluaranYayasan($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU008', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "UPDATE db_validasi SET id_usaha = 'DTU008', sub_total = '$sisatotal', anggaran = NULL WHERE id_validasi = 'VAN001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    } 

    //Tambah data pengeluaran Mitra BMH
    function tambahdatapengeluaranBMH($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU007', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "UPDATE db_validasi SET id_usaha = 'DTU007', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAH001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    } 

    //Tambah data pengeluaran Mitra Zakat
    function tambahdatapengeluaransaldoMZ($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU006', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU008', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query3 = "UPDATE db_validasi SET id_usaha = 'DTU006', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAZ001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    $data = mysqli_query($koneksi, $query3);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    } 

    //Tambah data pengeluaran Mitra Zakat
    function tambahdatapengeluaranMZ($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU006', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "UPDATE db_validasi SET id_usaha = 'DTU006', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAZ001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }    

    //Tambah data pengeluaran Pesantren
    function tambahdatapengeluaransaldoPesantren($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU005', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU008', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query3 = "UPDATE db_validasi SET id_usaha = 'DTU005', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAP001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    $data = mysqli_query($koneksi, $query3);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data pengeluaran Pesantren
    function tambahdatapengeluaranPesantren($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU005', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "UPDATE db_validasi SET id_usaha = 'DTU005', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAP001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data pengeluaran KB
    function tambahdatapengeluaransaldoKB($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU002', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU008', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query3 = "UPDATE db_validasi SET id_usaha = 'DTU002', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAK001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    $data = mysqli_query($koneksi, $query3);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data pengeluaran KB
    function tambahdatapengeluaranKB($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU002', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "UPDATE db_validasi SET id_usaha = 'DTU002', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAK001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data pengeluaran saldo TK
    function tambahdatapengeluaransaldoTK($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU001', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU008', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query3 = "UPDATE db_validasi SET id_usaha = 'DTU001', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAT001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    $data = mysqli_query($koneksi, $query3);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data pengeluaran TK
    function tambahdatapengeluaranTK($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU001', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "UPDATE db_validasi SET id_usaha = 'DTU001', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAT001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data saldo
    function tambahdatapengeluaransaldoSMP($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    } 
    
    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU004', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU008', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query3 = "UPDATE db_validasi SET id_usaha = 'DTU004', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAM001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    $data = mysqli_query($koneksi, $query3);

    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data pengeluaran SMP
    function tambahdatapengeluaranSMP($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }
    
    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU004', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "UPDATE db_validasi SET id_usaha = 'DTU004', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAM001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);

    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data pengeluaran SD
    function tambahdatapengeluaransaldoSD($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU003', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU008', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query3 = "UPDATE db_validasi SET id_usaha = 'DTU003', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAL001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    $data = mysqli_query($koneksi, $query3);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data pengeluaran SD
    function tambahdatapengeluaranSD($data){
    global $koneksi;

    $id_data_output = htmlspecialchars($data['id_data_output']);
    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
    $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query1 = "INSERT INTO db_data_output VALUES ('$id_data_output', 'DTU003', '$id_kategori', '2', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $query2 = "UPDATE db_validasi SET id_usaha = 'DTU003', sub_total = '$sisatotal', anggaran = '$sisaanggaran' WHERE id_validasi = 'VAL001'";
    $data = mysqli_query($koneksi, $query1);
    $data = mysqli_query($koneksi, $query2);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data SD
    function tambahdataSD($data){
    global $koneksi;

    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }


    //tambah data
    $query = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU003', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $data = mysqli_query($koneksi, $query);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data SMP
    function tambahdataSMP($data){
    global $koneksi;

    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU004', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $data = mysqli_query($koneksi, $query);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data TK
    function tambahdataTK($data){
    global $koneksi;

    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU001', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $data = mysqli_query($koneksi, $query);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }
    
    //Tambah data KB
    function tambahdataKB($data){
    global $koneksi;

    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU002', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $data = mysqli_query($koneksi, $query);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data Pesantren
    function tambahdataPesantren($data){
    global $koneksi;

    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU005', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $data = mysqli_query($koneksi, $query);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data Mitra Zakat
    function tambahdataMZ($data){
    global $koneksi;

    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU006', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $data = mysqli_query($koneksi, $query);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data Mitra BMH  
    function tambahdataBMH($data){
    global $koneksi;

    $id_data_input = htmlspecialchars($data['id_data_input']);
    $id_kategori = htmlspecialchars($data['id_kategori']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query = "INSERT INTO db_data_input VALUES ('$id_data_input', 'DTU007', '$id_kategori', '1', '$id_bulan', '$kd_jumlah', '$kd_keterangan', '$gambar')";
    $data = mysqli_query($koneksi, $query);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }

    //Tambah data Bukti Transfer
    function tambahdataBukti($data){
    global $koneksi;

    $id_transfer = htmlspecialchars($data['id_transfer']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']); 
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']); 

    $gambar = uploadfoto();
    if (!$gambar) {
        return false;
    }

    //tambah data
    $query = "INSERT INTO db_transfer VALUES ('$id_transfer', 'DTU001', '$id_bulan', '1', '$kd_jumlah', '$gambar', '$kd_keterangan')";
    $data = mysqli_query($koneksi, $query);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }    

    //Edit data laporan
    function editdatalaporan($data){
        global $koneksi;

        $id_data_input = htmlspecialchars($data['id_data_input']);
        $id_usaha = htmlspecialchars($data['id_usaha']);
        $id_pp = htmlspecialchars($data['id_pp']);
        $id_kategori = htmlspecialchars($data['id_kategori']);
        $id_bulan = htmlspecialchars($data['id_bulan']); 
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $kd_keterangan = htmlspecialchars($data['kd_keterangan']);
        $gambarlama = htmlspecialchars($data['gambarlama']);


        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        } else {
            $gambar = uploadfoto();
        }
        

        //update data user
        $query = "UPDATE db_data_input SET
            id_usaha = '$id_usaha',
            id_kategori = '$id_kategori',
            id_pp = '$id_pp',
            id_bulan = '$id_bulan',
            kd_jumlah = '$kd_jumlah',
            kd_keterangan = '$kd_keterangan',
            gambar = '$gambar'
            WHERE id_data_input = '$id_data_input' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

  //Edit data laporan
  function konfirmasitk($data){
    global $koneksi;

    $id_transfer = htmlspecialchars($data['id_transfer']);
    $id_usaha = htmlspecialchars($data['id_usaha']);
    $id_bulan = htmlspecialchars($data['id_bulan']); 
    $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
    $kd_keterangan = htmlspecialchars($data['kd_keterangan']);
    $id_status = htmlspecialchars($data['id_status']);
    $gambarlama = htmlspecialchars($data['gambarlama']);


    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = uploadfoto();
    }
    

    //update data user
    $query = "UPDATE db_transfer SET
        id_usaha = '$id_usaha',
        id_bulan = '$id_bulan',
        id_status = '$id_status',
        nominal = '$kd_jumlah',
        gambar = '$gambar',
        keterangan = '$kd_keterangan'
        WHERE id_transfer = '$id_transfer' ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}    

    //Edit data pengeluaran laporan
    function editdatapengeluaranlaporan($data){
        global $koneksi;

        $id_data_output = htmlspecialchars($data['id_data_output']);
        $id_usaha = htmlspecialchars($data['id_usaha']);
        $id_pp = htmlspecialchars($data['id_pp']);
        $id_kategori = htmlspecialchars($data['id_kategori']);
        $id_bulan = htmlspecialchars($data['id_bulan']); 
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $kd_keterangan = htmlspecialchars($data['kd_keterangan']);
        $gambarlama = htmlspecialchars($data['gambarlama']);


        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        } else {
            $gambar = uploadfoto();
        }
        

        //update data user
        $query = "UPDATE db_data_output SET
            id_usaha = '$id_usaha',
            id_kategori = '$id_kategori',
            id_pp = '$id_pp',
            id_bulan = '$id_bulan',
            kd_jumlah = '$kd_jumlah',
            kd_keterangan = '$kd_keterangan',
            gambar = '$gambar'
            WHERE id_data_output = '$id_data_output' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Tambah validasi Yayasan
    function tambahValidasiYayasan($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $pemasukan = htmlspecialchars($data['pemasukan']);
        $pengeluaran = htmlspecialchars($data['pengeluaran']);

        $saldo = $sub_total + $pemasukan - $pengeluaran;

        $query1 = "INSERT INTO db_validasi VALUES ('$id_validasi', 'DTU008', '$saldo', NULL)";

        $data = mysqli_query($koneksi, $query1);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);

    }  

    //Tambah validasi Mitra BMH
    function updateValidasiBMH($data){
        global $koneksi;

        $id_validasi_Yayasan = htmlspecialchars($data['id_validasi_Yayasan']);
        $id_validasi_SMP = htmlspecialchars($data['id_validasi_SMP']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $yayasan = htmlspecialchars($data['yayasan']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $yayasan + $sisatotal - $sisaanggaran;

        //update datvalidasi
        $query = "UPDATE db_validasi SET
            id_usaha = 'DTU008',
            sub_total = '$saldo',
            anggaran = NULL
            WHERE id_validasi = 'VAN001' ";

        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    } 

    //Tambah validasi Mitra BMH
    function tambahValidasiBMH($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $pengeluaran = htmlspecialchars($data['pengeluaran']);
        $yayasan = htmlspecialchars($data['yayasan']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $yayasan + $sisatotal - $sisaanggaran - $pengeluaran;

        $query1 = "INSERT INTO db_validasi VALUES ('$id_validasi', 'DTU007', '$sisatotal', '$sisatotal')";
        // $query2 = "INSERT INTO db_validasi VALUES ('VAN001', 'DTU008', '$saldo', NULL)";

        $data = mysqli_query($koneksi, $query1);
        // $data = mysqli_query($koneksi, $query2);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }    

    //Tambah validasi Mitra Zakat
    function updateValidasiMZ($data){
        global $koneksi;

        $id_validasi_Yayasan = htmlspecialchars($data['id_validasi_Yayasan']);
        $id_validasi_SMP = htmlspecialchars($data['id_validasi_SMP']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $yayasan = htmlspecialchars($data['yayasan']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $yayasan + $sisatotal - $sisaanggaran;

        //update datvalidasi
        $query = "UPDATE db_validasi SET
            id_usaha = 'DTU008',
            sub_total = '$saldo',
            anggaran = NULL
            WHERE id_validasi = 'VAN001' ";

        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    //Tambah validasi Mitra Zakat
    function tambahValidasiMZ($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $pengeluaran = htmlspecialchars($data['pengeluaran']);
        $yayasan = htmlspecialchars($data['yayasan']);
        $penambahandana = htmlspecialchars($data['penambahandana']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $sisatotal - $sisaanggaran + $penambahandana - $pengeluaran;

        $query1 = "INSERT INTO db_validasi VALUES ('$id_validasi', 'DTU006', '$sisaanggaran', '$sisaanggaran')";
        // $query2 = "INSERT INTO db_validasi VALUES ('VAN001', 'DTU008', '$saldo', NULL)";

        $data = mysqli_query($koneksi, $query1);
        // $data = mysqli_query($koneksi, $query2);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }


    //Tambah validasi Pesantren
    function updateValidasiPesantren($data){
        global $koneksi;

        $id_validasi_Yayasan = htmlspecialchars($data['id_validasi_Yayasan']);
        $id_validasi_SMP = htmlspecialchars($data['id_validasi_SMP']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $yayasan = htmlspecialchars($data['yayasan']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $yayasan + $sisatotal - $sisaanggaran;

        //update datvalidasi
        $query = "UPDATE db_validasi SET
            id_usaha = 'DTU008',
            sub_total = '$saldo',
            anggaran = NULL
            WHERE id_validasi = 'VAN001' ";

        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    //Tambah validasi Pesantren
    function tambahValidasiPesantren($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $pengeluaran = htmlspecialchars($data['pengeluaran']);
        $yayasan = htmlspecialchars($data['yayasan']);
        $penambahandana = htmlspecialchars($data['penambahandana']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $sisatotal - $sisaanggaran + $penambahandana - $pengeluaran;

        $query1 = "INSERT INTO db_validasi VALUES ('$id_validasi', 'DTU005', '$sisaanggaran', '$sisaanggaran')";
        // $query2 = "INSERT INTO db_validasi VALUES ('VAN001', 'DTU008', '$saldo', NULL)";

        $data = mysqli_query($koneksi, $query1);
        // $data = mysqli_query($koneksi, $query2);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    
    //Tambah validasi KB
    function updateValidasiKB($data){
        global $koneksi;

        $id_validasi_Yayasan = htmlspecialchars($data['id_validasi_Yayasan']);
        $id_validasi_SMP = htmlspecialchars($data['id_validasi_SMP']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $yayasan = htmlspecialchars($data['yayasan']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $yayasan + $sisatotal - $sisaanggaran;

        //update datvalidasi
        $query = "UPDATE db_validasi SET
            id_usaha = 'DTU008',
            sub_total = '$saldo',
            anggaran = NULL
            WHERE id_validasi = 'VAN001' ";

        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    //Tambah validasi KB
    function tambahValidasiKB($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $pengeluaran = htmlspecialchars($data['pengeluaran']);
        $yayasan = htmlspecialchars($data['yayasan']);
        $penambahandana = htmlspecialchars($data['penambahandana']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $sisatotal - $sisaanggaran + $penambahandana - $pengeluaran;

        $query1 = "INSERT INTO db_validasi VALUES ('$id_validasi', 'DTU002', '$sisaanggaran', '$sisaanggaran')";
        // $query2 = "INSERT INTO db_validasi VALUES ('VAN001', 'DTU008', '$saldo', NULL)";

        $data = mysqli_query($koneksi, $query1);
        // $data = mysqli_query($koneksi, $query2);


        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    //Tambah validasi TK
    function updateValidasiTK($data){
        global $koneksi;

        $id_validasi_SD = htmlspecialchars($data['id_validasi_SD']);
        $id_validasi_Yayasan = htmlspecialchars($data['id_validasi_Yayasan']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $yayasan = htmlspecialchars($data['yayasan']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $yayasan + $sisatotal - $sisaanggaran;

        //update datvalidasi
        $query = "UPDATE db_validasi SET
            id_usaha = 'DTU008',
            sub_total = '$saldo',
            anggaran = NULL
            WHERE id_validasi = 'VAN001' ";

        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    //Tambah validasi TK
    function tambahValidasiTK($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $pengeluaran = htmlspecialchars($data['pengeluaran']);
        $yayasan = htmlspecialchars($data['yayasan']);
        $penambahandana = htmlspecialchars($data['penambahandana']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $sisatotal - $sisaanggaran + $penambahandana - $pengeluaran;

        $query1 = "INSERT INTO db_validasi VALUES ('$id_validasi', 'DTU001', '$sisaanggaran', '$sisaanggaran')";
        // $query2 = "INSERT INTO db_validasi VALUES ('VAN001', 'DTU008', '$saldo', NULL)";

        $data = mysqli_query($koneksi, $query1);
        // $data = mysqli_query($koneksi, $query2);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    //Tambah validasi SMP
    function updateValidasiSMP($data){
        global $koneksi;

        $id_validasi_Yayasan = htmlspecialchars($data['id_validasi_Yayasan']);
        $id_validasi_SMP = htmlspecialchars($data['id_validasi_SMP']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $yayasan = htmlspecialchars($data['yayasan']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $yayasan + $sisatotal - $sisaanggaran;

        //update datvalidasi
        $query = "UPDATE db_validasi SET
            id_usaha = 'DTU008',
            sub_total = '$saldo',
            anggaran = NULL
            WHERE id_validasi = 'VAN001' ";

        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    //Tambah validasi SMP
    function tambahValidasiSMP($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $id_validasi_SMP = htmlspecialchars($data['id_validasi_SMP']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $yayasan = htmlspecialchars($data['yayasan']);
        $pengeluaran = htmlspecialchars($data['pengeluaran']);
        $penambahandana = htmlspecialchars($data['penambahandana']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $sisatotal - $sisaanggaran + $penambahandana - $pengeluaran;

        $query1 = "INSERT INTO db_validasi VALUES ('$id_validasi', 'DTU004', '$sisaanggaran', '$sisaanggaran')";
        // $query2 = "INSERT INTO db_validasi VALUES ('VAN001', 'DTU008', '$saldo', NULL)";

        $data = mysqli_query($koneksi, $query1);
        // $data = mysqli_query($koneksi, $query2);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    // Delete validasi BMH
    function DeleteValidasiYayasan($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);

        $sisatotal = $data['sub_total'] + $data['kd_jumlah']; //menghitung sisa stok

        $query = "INSERT INTO db_validasi VALUES ('VAN001', 'DTU008', '$sisatotal', NULL)";
        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    // Delete validasi BMH
    function DeleteValidasiBMH($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);

        $sisatotal = $data['sub_total'] + $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] + $data['kd_jumlah']; //menghitung sisa stok

        $query = "INSERT INTO db_validasi VALUES ('VAH001', 'DTU007', '$sisatotal', '$sisaanggaran')";
        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    // Delete validasi MZ
    function DeleteValidasiMZ($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);

        $sisatotal = $data['sub_total'] + $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] + $data['kd_jumlah']; //menghitung sisa stok

        $query = "INSERT INTO db_validasi VALUES ('VAZ001', 'DTU006', '$sisatotal', '$sisaanggaran')";
        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    // Delete validasi Pesantren
    function DeleteValidasiPesantren($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);

        $sisatotal = $data['sub_total'] + $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] + $data['kd_jumlah']; //menghitung sisa stok

        $query = "INSERT INTO db_validasi VALUES ('VAP001', 'DTU005', '$sisatotal', '$sisaanggaran')";
        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    // Delete validasi KB Integral
    function DeleteValidasiKB($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);

        $sisatotal = $data['sub_total'] + $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] + $data['kd_jumlah']; //menghitung sisa stok

        $query = "INSERT INTO db_validasi VALUES ('VAK001', 'DTU002', '$sisatotal', '$sisaanggaran')";
        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    // Delete validasi TK
    function DeleteValidasiTK($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);

        $sisatotal = $data['sub_total'] + $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] + $data['kd_jumlah']; //menghitung sisa stok

        $query = "INSERT INTO db_validasi VALUES ('VAT001', 'DTU001', '$sisatotal', '$sisaanggaran')";
        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    // Delete validasi Smp
    function DeleteValidasiSMP($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);

        $sisatotal = $data['sub_total'] + $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] + $data['kd_jumlah']; //menghitung sisa stok

        $query = "INSERT INTO db_validasi VALUES ('VAM001', 'DTU004', '$sisatotal', '$sisaanggaran')";
        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    // Delete validasi SD
    function DeleteValidasiSD($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);

        $sisatotal = $data['sub_total'] + $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] + $data['kd_jumlah']; //menghitung sisa stok

        $query = "INSERT INTO db_validasi VALUES ('VAL001', 'DTU003', '$sisatotal', '$sisaanggaran')";
        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    //Tambah validasi SD
    function updateValidasi($data){
        global $koneksi;

        $id_validasi_SD = htmlspecialchars($data['id_validasi_SD']);
        $id_validasi_Yayasan = htmlspecialchars($data['id_validasi_Yayasan']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $yayasan = htmlspecialchars($data['yayasan']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $yayasan + $sisatotal - $sisaanggaran;

        //update datvalidasi
        $query = "UPDATE db_validasi SET
            id_usaha = 'DTU008',
            sub_total = '$saldo',
            anggaran = NULL
            WHERE id_validasi = 'VAN001' ";

        $data = mysqli_query($koneksi, $query);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    //Tambah validasi SD
    function tambahValidasi($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $id_validasi_Yayasan = htmlspecialchars($data['id_validasi_Yayasan']);
        $sub_total = htmlspecialchars($data['sub_total']);
        $kd_jumlah = htmlspecialchars($data['kd_jumlah']);
        $anggaran = htmlspecialchars($data['anggaran']);
        $yayasan = htmlspecialchars($data['yayasan']);
        $pengeluaran = htmlspecialchars($data['pengeluaran']);
        $penambahandana = htmlspecialchars($data['penambahandana']);

        $sisatotal = $data['sub_total'] - $data['kd_jumlah']; //menghitung sisa stok
        $sisaanggaran = $data['anggaran'] - $data['kd_jumlah']; //menghitung sisa stok
        $saldo = $sisatotal - $sisaanggaran + $penambahandana - $pengeluaran;

        $query1 = "INSERT INTO db_validasi VALUES ('$id_validasi', 'DTU003', '$sisaanggaran', '$sisaanggaran')";
        // $query2 = "INSERT INTO db_validasi VALUES ('VAN001', 'DTU008', '$saldo', NULL)";


        $data = mysqli_query($koneksi, $query1);
        // $data = mysqli_query($koneksi, $query2);

        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }
    
    //Edit data laporan
    function validasiSD($data){
        global $koneksi;

        $id_validasi = htmlspecialchars($data['id_validasi']);
        $id_usaha = htmlspecialchars($data['id_usaha']);
        $sub_total = htmlspecialchars($data['sub_total']);


        //update data user
        $query = "UPDATE db_data_input SET
            id_usaha = '$id_usaha',
            sub_total = '$sub_total'
            WHERE id_validasi = '$id_validasi' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }






     //Kode Dinas PUPR
     function kodepupr(){
        global $koneksi;

        $query = mysqli_query($koneksi, "SELECT max(id_user) AS maxkode FROM db_user WHERE id_user LIKE 'RAD%'");
        $data = mysqli_fetch_array($query);
        $kodepupr = $data['maxkode'];
        $nourut = (int)substr($kodepupr,3, 3);
        $nourut++;
        $char = "RAD";
        $kodepupr = $char.sprintf("%03s",$nourut);
        return $kodepupr;
    }    

    //Kode Daerah Tugas
     function kodedaerahtugas(){ 
        global $koneksi;

        $query = mysqli_query($koneksi, "select max(id_daerah) as maxkode from daerah_tugas ");
        $data = mysqli_fetch_array($query);
        $kodedaerah = $data['maxkode'];
        $nourut = (int)substr($kodedaerah,3, 3);
        $nourut++;
        $char = "DT";
        $kodedaerah = $char.sprintf("%03s", $nourut);
        return $kodedaerah;
    }

    //Tambah Daerah Tugas
    function tambahdaerahtugas($data){
        global $koneksi;

        $id_daerah = htmlspecialchars($data['id_daerah']);
        $daerah_tugas = htmlspecialchars($data['daerah_tugas']);
        

        $query = "INSERT INTO daerah_tugas VALUES ('$id_daerah', '$daerah_tugas')";
        $data = mysqli_query($koneksi, $query);
        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    

   //Tambah Akun Dinas PUPR
   function tambahakunpupr($data){
    global $koneksi;

    $id_user = htmlspecialchars($data['id_user']);
    $nip_user = htmlspecialchars($data['nip_user']);
    $nama_user = htmlspecialchars($data['nama_user']);
    $username = htmlspecialchars($data['username']);
    $password = $data['password1'];
    $tgl_lahir_user = htmlspecialchars($data['tgl_lahir_user']); 
    $alamat_user = htmlspecialchars($data['alamat_user']);
    
    $id_daerah = htmlspecialchars($data['id_daerah']);
    
    //mengecek username
    $query1 = mysqli_query($koneksi, "SELECT username FROM db_user WHERE username='$username' ");

    if (mysqli_fetch_assoc($query1)) {
        echo "
            <script>
                alert('Username sudah ada');
                window.location = 'registrasi_korwil.php';
            </script>
                ";
                return false;
    }

    //enkripsi password
    $password3 = password_hash($password,PASSWORD_DEFAULT);

    //tambah data
    $query = "INSERT INTO db_user VALUES ('$id_user', '$nip_user', '$nama_user', '$username', '$password3', '$tgl_lahir_user', '$alamat_user', '1', NULL)";
    $data = mysqli_query($koneksi, $query);
    
    // var_dump($data);
    return mysqli_affected_rows($koneksi);
    }  
    


    //Edit Daerah Tugas
    function editdaerahtugas($data){
        global $koneksi;

        $id_daerah = htmlspecialchars($data['id_daerah']);
        $daerah_tugas = htmlspecialchars($data['daerah_tugas']);
        $daerah_pengawas = htmlspecialchars($data['daerah_pengawas']);

        $query = "UPDATE daerah_tugas SET
            daerah_tugas = '$daerah_tugas'
            WHERE id_daerah = '$id_daerah'";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Edit Akun Pengawas
    function editakunpengawas($data){
        global $koneksi;

        $id_user = htmlspecialchars($data['id_user']);
        $nip_user = htmlspecialchars($data['nip_user']);
        $nama_user = htmlspecialchars($data['nama_user']);
        $username = htmlspecialchars($data['username']);
        $password = $data['password1'];
        $tgl_lahir_user = htmlspecialchars($data['tgl_lahir_user']); 
        $alamat_user = htmlspecialchars($data['alamat_user']);
        $id_akses = htmlspecialchars($data['id_akses']);
        $id_daerah = htmlspecialchars($data['id_daerah']);

        //enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);

        //update data user
        $query = "UPDATE db_user SET
            nip_user = '$nip_user',
            nama_user = '$nama_user',
            username = '$username',
            password = '$password',
            tgl_lahir_user = '$tgl_lahir_user',
            alamat_user = '$alamat_user',
            id_akses = '$id_akses',
            id_daerah = '$id_daerah'
            WHERE id_user = '$id_user' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
    

    //Edit Akun Kordinator Wilayah
    function editakunkorwil($data){
        global $koneksi;

        $id_user = htmlspecialchars($data['id_user']);
        $nip_user = htmlspecialchars($data['nip_user']);
        $nama_user = htmlspecialchars($data['nama_user']);
        $username = htmlspecialchars($data['username']);
        $password = $data['password1'];
        $tgl_lahir_user = htmlspecialchars($data['tgl_lahir_user']); 
        $alamat_user = htmlspecialchars($data['alamat_user']);
        
        $id_daerah = htmlspecialchars($data['id_daerah']); 

        //enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);
        
        //update data user
        $query = "UPDATE db_user SET
            nip_user = '$nip_user',
            nama_user = '$nama_user',
            username = '$username',
            password = '$password',
            tgl_lahir_user = '$tgl_lahir_user',
            alamat_user = '$alamat_user',
            id_akses = '2',
            id_daerah = '$id_daerah'
            WHERE id_user = '$id_user' ";
        
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Edit Akun Dinas PUPR
    function editakunpupr($data){
        global $koneksi;

        $id_user = htmlspecialchars($data['id_user']);
        $nip_user = htmlspecialchars($data['nip_user']);
        $nama_user = htmlspecialchars($data['nama_user']);
        $username = htmlspecialchars($data['username']);
        $password = $data['password1'];
        $tgl_lahir_user = htmlspecialchars($data['tgl_lahir_user']); 
        $alamat_user = htmlspecialchars($data['alamat_user']);
        $id_akses = htmlspecialchars($data['id_akses']);
        $id_daerah = htmlspecialchars($data['id_daerah']);

        //enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);

        //update data user
        $query = "UPDATE db_user SET
            nip_user = '$nip_user',
            nama_user = '$nama_user',
            username = '$username',
            password = '$password',
            tgl_lahir_user = '$tgl_lahir_user',
            alamat_user = '$alamat_user',
            id_akses = '1',
            id_daerah = NULL
            WHERE id_user = '$id_user' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }    

    //Edit Akun 
    function editpassword($data){
        global $koneksi;
        
        $id_user = htmlspecialchars($_SESSION[id_user]);
        $password = $data['password1'];

        //enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);

        //update data user
        $query = "UPDATE db_user SET
            password = '$password'
            WHERE id_user = '$_SESSION[id_user]' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    } 
     
  
    









    //Kode unit
    function kodeunit(){
        global $koneksi;

        $query = mysqli_query($koneksi, "select max(id_unit_kerja) as maxkode from unit_kerja ");
        $data = mysqli_fetch_array($query);
        $kodebarang = $data['maxkode'];
        $nourut = (int)substr($kodebarang,3, 3);
        $nourut++;
        $char = "UK";
        $kodebarang = $char.sprintf("%03s", $nourut);
        return $kodebarang;
    }

    //Kode mutasi
    function kodemutasi(){
        global $koneksi;

        $query = mysqli_query($koneksi, "select max(id_mutasi) as maxkode from m_mutasi ");
        $data = mysqli_fetch_array($query);
        $kodemutasi = $data['maxkode'];
        $nourut = (int)substr($kodemutasi,3, 3);
        $nourut++;
        $char = "DM";
        $kodemutasi = $char.sprintf("%03s", $nourut);
        return $kodemutasi;
    }

    //Tambah data unit
    function tambahunit($data){
        global $koneksi;
        $id = htmlspecialchars($data['id_unit_kerja']);
        $unitkerja = htmlspecialchars($data['unit_kerja']);
        $gaji_pokok = $data['gaji_pokok'];
        
        $query = "INSERT INTO unit_kerja VALUES ('$id', '$unitkerja', '$gaji_pokok')";
        $data = mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Hapus data unit
    function hapusunit($id){
        global $koneksi;
        $query = "DELETE from unit_kerja where id_unit_kerja = '$id' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Edit data unit
    function editunit($data){
        global $koneksi;
        $id = $data['id_unit_kerja'];
        $unitkerja = htmlspecialchars($data['unit_kerja']);
        $gaji_pokok = $data['gaji_pokok'];
        
        $query = "UPDATE unit_kerja SET
            unit_kerja = '$unitkerja',
            gaji_pokok = '$gaji_pokok'
            WHERE id_unit_kerja = '$id' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Kode jenis
    function kodejenis(){
        global $koneksi;

        $query = mysqli_query($koneksi, "select max(id_jenis_barang) as maxkode from jenis_barang");
        $data = mysqli_fetch_array($query);
        $kodebarang = $data['maxkode'];
        $nourut = (int)substr($kodebarang,3, 3);
        $nourut++;
        $char = "JB";
        $kodebarang = $char.sprintf("%03s", $nourut);
        return $kodebarang;
    }

    //Tambah data jenis
    function tambahjenis($data){
        global $koneksi;
        $id = htmlspecialchars($data['id_jenis_barang']);
        $jenis = htmlspecialchars($data['jenis']);
        
        $query = "INSERT INTO jenis_barang VALUES ('$id', '$jenis')";
        $data = mysqli_query($koneksi, $query);
        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    //Hapus data unit
    function hapusjenis($id){
        global $koneksi;
        $query = "DELETE from jenis_barang where id_jenis_barang = '$id' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Edit data unit
    function editjenis($data){
        global $koneksi;
        $id = $data['id_jenis_barang'];
        $jenis = htmlspecialchars($data['jenis']);
        
        $query = "UPDATE jenis_barang SET
            jenis = '$jenis'
            WHERE id_jenis_barang = '$id' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }



         //Kode Penjualan
     function kodejual(){
        global $koneksi;

        $query = mysqli_query($koneksi, "select max(id_jual) as maxkode from data_jual ");
        $data = mysqli_fetch_array($query);
        $kodejual = $data['maxkode'];
        $nourut = (int)substr($kodejual,3, 3);
        $nourut++;
        $char = "DL";
        $kodejual = $char.sprintf("%03s", $nourut);
        return $kodejual;
    }

     //Kode pelanggan
     function kodepelanggan(){
        global $koneksi;

        $query = mysqli_query($koneksi, "select max(id_pelanggan) as maxkode from data_pelanggan ");
        $data = mysqli_fetch_array($query);
        $kodepelanggan = $data['maxkode'];
        $nourut = (int)substr($kodepelanggan,3, 3);
        $nourut++;
        $char = "PL";
        $kodepelanggan = $char.sprintf("%03s", $nourut);
        return $kodepelanggan;
    }

     //Kode supplier
     function kodesupplier(){
        global $koneksi;

        $query = mysqli_query($koneksi, "select max(id_supplier) as maxkode from m_supplier ");
        $data = mysqli_fetch_array($query);
        $kodesupplier = $data['maxkode'];
        $nourut = (int)substr($kodesupplier,3, 3);
        $nourut++;
        $char = "SP";
        $kodesupplier = $char.sprintf("%03s", $nourut);
        return $kodesupplier;
    }



    //Tambah mutasi
    function tambahmutasi($data){
        global $koneksi;

        $id_jual = ($data['id_jual']);
        $id_pelanggan = ($data['id_pelanggan']);
        $id_barang = ($data['id_barang']);
        $jumlah = $data['jumlah'];
        $tanggal = $data['tanggal'];
        $sub_total = $data['sub_total'];

        $query = "INSERT INTO data_jual VALUES ('$id_jual', '$id_pelanggan', '$id_barang', '$jumlah', '$sub_total', '$tanggal')";
        $data = mysqli_query($koneksi, $query);
        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }


    //Tambah penjualan
    function tambahpenjualan($data){
        global $koneksi;

        $id_jual = ($data['id_jual']);
        $id_pelanggan = ($data['id_pelanggan']);
        $id_barang = ($data['id_barang']);
        $jumlah = $data['jumlah'];
        $sub_total = $data['sub_total'];


        $query = "INSERT INTO data_jual VALUES ('$id_jual', '$id_pelanggan', '$id_barang', '$jumlah', '$sub_total')";
        $data = mysqli_query($koneksi, $query);
        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    // Tambah pelanggan
    function tambahpelanggan($data){
        global $koneksi;

        $id_pelanggan = ($data['id_pelanggan']);
        $nama_pelanggan = ($data['nama_pelanggan']);
        $kota = ($data['kota']);
        $alamat = $data['alamat'];
        $telepon = $data['telepon'];
        $tanggal = $data['tanggal'];


        $query = "INSERT INTO data_pelanggan VALUES ('$id_pelanggan', '$nama_pelanggan', '$kota', '$alamat', '$telepon', '$tanggal')";
        $data = mysqli_query($koneksi, $query);
        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }

    // Tambah supplier
    function tambahsupplier($data){
        global $koneksi;

        $id_supplier = ($data['id_supplier']);
        $nama_supplier = ($data['nama_supplier']);
        $kontak_supplier = ($data['kontak_supplier']);
        $alamat_supplier = ($data['alamat_supplier']);



        $query = "INSERT INTO m_supplier VALUES ('$id_supplier', '$nama_supplier', '$kontak_supplier', '$alamat_supplier')";
        $data = mysqli_query($koneksi, $query);
        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    } 

    function tambahkategori($data){
        global $koneksi;

        $id_jenis_barang = ($data['id_jenis_barang']);
        $jenis = $data['jenis'];

        $query = "INSERT INTO barang VALUES ('$id_jenis_barang', '$jenis')";
        $data = mysqli_query($koneksi, $query);
        // var_dump($data);
        return mysqli_affected_rows($koneksi);
    }
    


//    Edit pelanggan
function editpelanggan($data){
    global $koneksi;

    $id_pelanggan = ($data['id_pelanggan']);
    $nama_pelanggan = ($data['nama_pelanggan']);
    $kota = ($data['kota']);
    $alamat = $data['alamat'];
    $telepon = $data['telepon'];
    $tanggal = $data['tanggal'];

    $query = "UPDATE data_pelanggan SET
        id_pelanggan = '$id_pelanggan',
        nama_pelanggan = '$nama_pelanggan',
        kota = '$kota',
        alamat = '$alamat',
        telepon = '$telepon',
        tanggal = '$tanggal'
        WHERE id_pelanggan = '$id_pelanggan' ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}   
 //    Edit pelanggan
    function editsupplier($data){
    global $koneksi;

    $id_supplier = ($data['id_supplier']);
    $nama_supplier = ($data['nama_supplier']);
    $kontak_supplier = ($data['kontak_supplier']);
    $alamat_supplier = ($data['alamat_supplier']);

    $query = "UPDATE m_supplier SET
        id_supplier = '$id_supplier',
        nama_supplier = '$nama_supplier',
        kontak_supplier = '$kontak_supplier',
        alamat_supplier = '$alamat_supplier'
        WHERE id_supplier = '$id_supplier'";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}    


    // Hapus data pelanggan
    function hapuspelanggan($id){
        global $koneksi;

        $query = "DELETE from data_pelanggan where id_pelanggan = '$id' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    // Hapus data supplier
    function hapussupplier($id){
        global $koneksi;

        $query = "DELETE from m_supplier where id_supplier = '$id' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //cari data barang
    function caribarang($cari){
        $query = "SELECT * FROM m_barang b inner join jenis_barang j on b.id_jenis_barang = j.id_jenis_barang WHERE
                nama_barang like '%$cari%' ";
        
        return query($query);
    }

    //Upload file gambar barang
    function uploadbarang(){
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $file_tmp = $_FILES['gambar']['tmp_name'];

        if ($error === 4) { 
            echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
            ";
            return false;
        }

        $jenis_gambar = ['jpg', 'jpeg', 'png', 'gif','JPG']; //jenis gambar yang boleh diinputkan
        $pecah_gambar = explode(".", $nama_file); //Memecah nama file dengan jenis gambar
        $pecah_gambar = strtolower(end($pecah_gambar)); //mengambil data array paling belakang
        if (!in_array($pecah_gambar, $jenis_gambar)) {
            echo "
                <script>
                    alert('Yang anda upload bukan file gambar');
                </script>
            ";
            return false;
        }
        //cek kapasitas file yang diupload dala bentuk byte 1 MB = 1000000 Byte
        if ($ukuran_file > 10000000) {
            echo"
                <script>
                    alert('Ukuran file terlalu besar');
                </script>
            ";
            return false;
        }

        $namafilebaru = uniqid();
        $namafilebaru .= ".";
        $namafilebaru .= $pecah_gambar;

        move_uploaded_file($file_tmp, '../img/barang/'.$namafilebaru);

        //mereturn nama file agar masuk ke $gambar == upload()
        return $namafilebaru;
    }

    //Kode

     //Kode Anggota
     function kodeanggota(){
        global $koneksi;

        $query = mysqli_query($koneksi, "select max(id_anggota) as maxkode from anggota ");
        $data = mysqli_fetch_array($query);
        $kodebarang = $data['maxkode'];
        $nourut = (int)substr($kodebarang,3, 3);
        $nourut++;
        $char = "AG";
        $kodebarang = $char.sprintf("%03s", $nourut);
        return $kodebarang;
    }

    //Tambah barang
    function tambahanggota($data){
        global $koneksi;

        $id_anggota = htmlspecialchars($data['id_anggota']);
        $nama = htmlspecialchars($data['nama']);
        $unit = $data['unit'];
        $npp = htmlspecialchars($data['npp']);
        $tempat = htmlspecialchars($data['tempat']);
        $tanggal = $data['tgl_lahir'];
        $jk = $data['jeniskelamin'];
        $alamat = htmlspecialchars($data['alamat']);
        $jadianggota = $data['jadianggota'];
        
        $gambar = uploadanggota();
        if (!$gambar) {
            return false;
        }


        $query = "INSERT INTO anggota VALUES ('$id_anggota', '$unit', '$npp', '$nama', '$tempat', '$tanggal', '$jk', '$alamat', '$jadianggota', '$gambar')";
        $data = mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Edit Anggota
    function editanggota($data){
        global $koneksi;

        $id_anggota = $data['id_anggota'];
        $nama = htmlspecialchars($data['nama']);
        $unit = $data['unit'];
        $npp = htmlspecialchars($data['npp']);
        $tempat = htmlspecialchars($data['tempat']);
        $tanggal = $data['tgl_lahir'];
        $jk = $data['jeniskelamin'];
        $alamat = htmlspecialchars($data['alamat']);
        $gambarlama = htmlspecialchars($data['gambarlama']);
        
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        } else {
            $gambar = uploadanggota();
        }
        

        $query = "UPDATE anggota SET
            id_unit_kerja = '$unit',
            npp = '$npp',
            nama = '$nama',
            tempat = '$tempat',
            tgl_lahir = '$tanggal', 
            jenis_kelamin = '$jk', 
            alamat = '$alamat', 
            gambar = '$gambar' 
            WHERE id_anggota = '$id_anggota' ";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //Hapus data barang
    function hapusanggota($id){
        global $koneksi;

        $query = "DELETE from anggota where id_anggota = '$id' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //cari data barang
    function carianggota($cari){
        $query = "SELECT * FROM anggota a inner join unit_kerja u on a.id_unit_kerja = u.id_unit_kerja WHERE
                nama like '%$cari%' ";
        
        return query($query);
    }

    //Upload file gambar anggota
    function uploadanggota(){
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $file_tmp = $_FILES['gambar']['tmp_name'];

        if ($error === 4) { 
            echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
            ";
            return false;
    }

        $jenis_gambar = ['jpg', 'jpeg', 'png', 'gif']; //jenis gambar yang boleh diinputkan
        $pecah_gambar = explode(".", $nama_file); //Memecah nama file dengan jenis gambar
        $pecah_gambar = strtolower(end($pecah_gambar)); //mengambil data array paling belakang
        if (!in_array($pecah_gambar, $jenis_gambar)) {
            echo "
                <script>
                    alert('Yang anda upload bukan file gambar');
                </script>
            ";
            return false;
        }
        //cek kapasitas file yang diupload dala bentuk byte 1 MB = 1000000 Byte
        if ($ukuran_file > 10000000) {
            echo"
                <script>
                    alert('Ukuran file terlalu besar');
                </script>
            ";
            return false;
        }

        $namafilebaru = uniqid();
        $namafilebaru .= ".";
        $namafilebaru .= $pecah_gambar;

        move_uploaded_file($file_tmp, '../img/anggota/'.$namafilebaru);

        //mereturn nama file agar masuk ke $gambar == upload()
        return $namafilebaru;
    }



    //Hapus user
    function hapususer($id){
        global $koneksi;

        $query = "DELETE from user where id_user = '$id' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    //cari data barang
    function cariuser($cari){
        $query = "SELECT * FROM user where nama like '%$cari%' ";
        
        return query($query);
    }

    function registrasi($data){
        global $koneksi;
        
        $id = htmlspecialchars($data['id_user']);
        $nama = htmlspecialchars($data['nama']);
        $akses = $data['akses'];
        $username = strtolower(stripcslashes($data['username']));

        $password = mysqli_real_escape_string($koneksi, $data['password']);
        $password2 = mysqli_real_escape_string($koneksi, $data['password2']);
        
        //mengecek username
        $query = mysqli_query($koneksi, "SELECT username FROM user WHERE username='$username' ");
    
        if (mysqli_fetch_assoc($query)) {
            echo "
                <script>
                    alert('Username sudah ada');
                    window.location = 'registrasi.php';
                </script>
                    ";
                    return false;
        }
        //cek informasi password
        if ($password !== $password2) {
                    echo "
                    <script>
                        alert('Harap memasukan password dengan benar');
                        // window.location = 'registrasi.php';
                    </script>
            ";
            die();
            return false;
        }

        //enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);

        //tambah data
        mysqli_query($koneksi, "INSERT INTO user VALUES ('$id', '$nama', '$username', '$password','$akses')");   

        return mysqli_affected_rows($koneksi);
    }

    function tambahstok($data){
        global $koneksi;
        $id_brng = $data['id_barang'];
        $stokawal = $data['stokawal'];
        $jumlah_tambah = $data['jumlah'];
        $total = $stokawal + $jumlah_tambah;

        $query = "UPDATE barang SET stok = '$total' WHERE id_barang = '$id_brng' ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
?>