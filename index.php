<?php
    session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Sistem Keuangan Yayasan Al - Ihsan Pesantren Hidayatullah Probolinggo</title>
    <!-- Icons-->
    <link href="assets/vendors/css/flag-icon.min.css" rel="stylesheet">
    <link href="assets/vendors/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendors/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this Papplication-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/vendors/css/pace.min.css" rel="stylesheet">
  </head>
  
  <body class="app flex-row align-items-center">
  <div class="container">
    <!-- <h1 align="center">Login</h1> -->
<div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card-group">
            <div class="card p-2">
              <div class="card-body">
                <div align="center">
                  <img src="assets/img/logo.png" width = "100%" height="110" alt="Logo" class="img-responsive mb-5 mt-3">
                </div>
                <form action="" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="username" autocomplete="off" autofocus="on" placeholder="Username" aria-describedby="helpId" required>
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="helpId" required>
                </div>
                    <!-- <div class="alert alert-danger"> -->
                        <?php
                          include "koneksi/koneksi.php";

                          if (isset($_POST['login'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                              $q = mysqli_query($koneksi, "SELECT * FROM db_user where username = '$username'"); //Cek Username
                              $cek = mysqli_num_rows($q);

                              if ($cek == 1) {
                                $data = mysqli_fetch_assoc($q);
                                  if (password_verify($password, $data['password'])) { //Mengecek password
                                      $akses = $data['akses'];
                                        
                                        $_SESSION['id_user'] = $data['id_user'];
                                        $_SESSION['nama'] = $data['nama'];
                                        $_SESSION['username'] = $data['username'];
                                        $_SESSION['akses'] = $data['akses'];

                                            if ($akses == 1) {
                                              echo "
                                              <script>
                                                  window.location = './admin/';
                                              </script>
                                              ";
                                            }else if($akses == 2){
                                              echo "
                                              <script>
                                                  window.location = './kb_tk/';
                                              </script>
                                                  ";
                                            } else if($akses == 3){
                                              echo "
                                              <script>
                                                  window.location = './kb_integral/';
                                              </script>
                                                  ";
                                            } else if($akses == 4){
                                              echo "
                                              <script>
                                                  window.location = './sd_integral/';
                                              </script>
                                                  ";
                                            } else if($akses == 5){
                                              echo "
                                              <script>
                                                  window.location = './smp_integral/';
                                              </script>
                                                  ";
                                            } else if($akses == 6){
                                              echo "
                                              <script>
                                                  window.location = './pesantren/';
                                              </script>
                                                  ";
                                            } else if($akses == 7){
                                              echo "
                                              <script>
                                                  window.location = './mitra_zakat/';
                                              </script>
                                                  ";
                                            } 
                                    }else{
                                      echo "
                                          <div class='alert alert-danger'>username atau password salah</div>
                                      ";
                                    }
                              }else{
                                echo "
                                    <div class='alert alert-danger'>username atau password salah</div>
                                ";
                              }
                          }
                        ?>
                    <!-- </div> -->
                <div class="row justify-content-center">
                  <div class="col-12">
                    <input type="submit" name="login" class="btn btn-primary btn-block" value="Login">
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap and necessary plugins-->
    <script src="vendors/js/jquery.min.js"></script>
    <script src="vendors/js/popper.min.js"></script>
    <script src="vendors/js/bootstrap.min.js"></script>
    <script src="vendors/js/pace.min.js"></script>
    <script src="vendors/js/perfect-scrollbar.min.js"></script>
    <script src="vendors/js/coreui.min.js"></script>
  </body>
</html>
