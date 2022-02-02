<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  
</head>
<body style="background-color: #FF8C00;">
    <div class="container">
            <b><center style="color:aliceblue;"><h1>LOGIN</h1></center></b>
      <?php
          if (isset($_GET['pesan'])) {
               $pesan = $_GET['pesan'];
               if ($pesan == "logout") {
                   echo '<div class="alert alert-primary" role="alert">
                 Berhasil Logout !!!!
                 </div>';
               } else if ($pesan == "belum_login") {
                echo '<div class="alert alert-warning" role="alert">
              Anda Belum Login !! Silahkan Login terlebih dahulu !!!
              </div>';
               }else if ($pesan == "gagal") {
                echo '<div class="alert alert-danger" role="alert">
               Cek dan Pastikan Username dan password anda benar !!
              </div>';
               }
          }
      ?>
      <div class="row">
          <div class="col-md-4"></div>
              <div class="col-md-4">
               <form action="login_aksi.php" method="post">
                   <div class="form-group">
            <label style="color:aliceblue;" for="Inputpenulis1">Username</label>
            <input type="text"  name="username" class="form-control" id="Inputpenulis1">
      </div>
      <div class="form-group">
            <label style="color:aliceblue;" for="Inputpenulis1">Password</label>
            <input type="password"  name="pass" class="form-control" id="Inputpenulis1">
      </div>
      <button type="submit" class="btn btn-primary">Masuk</button>
      <button type="reset" class="btn btn-danger">Bersihkan</button>
                   </form> 
          </div>
      </div>
    </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.4.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
</body>
</html>