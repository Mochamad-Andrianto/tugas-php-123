<?php 

    session_start();
    require_once ('../config/koneksi.php');
    require_once ('../models/database.php');
    
    $connection = new database($host, $user, $pass, $database);   

    include 'm_login.php';

    $username = new Login($connection);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- icon -->
  <link rel="shortcut icon" href="../img/sma.png">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>SMAYANDA</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login Admin</p>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">          
          <div class="col-12">
            <button type="submit" name="login" value="login" class="btn btn-primary btn-block">Log In</button>
          </div>          
        </div>
      </form>  
      <?php 
        if(@$_POST['login']){
            $email = $connection->conn->real_escape_string($_POST['email']);
            $password = md5($connection->conn->real_escape_string($_POST['pass']));
            $oke = $username->LoginUser($email, $password);
            if($oke->fetch_object()!= null){
              $user = $connection->conn->query("SELECT * FROM tb_user WHERE email='$email'");
              $result = $user->fetch_object()->nama;
              $_SESSION['loginadmin']=true;
              $_SESSION['nama'] = $result;
              header('location:../');
            }                               
            
        }
      ?>
        <!-- <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
        <p class="mb-1">
          <a href="registrasi.php" class="text-center">Register a new membership</a>
        </p>
      </div> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>
