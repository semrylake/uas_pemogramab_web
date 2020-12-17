<?php
session_start();
if (isset($_SESSION["login"])) {
  header("location: su/index.php");
  exit;
}
require 'su/function.php';

if (isset($_POST["login"])) {
  $user = mysqli_real_escape_string($knk, $_POST["username"]);
  $pass = mysqli_real_escape_string($knk, $_POST["password"]);
  $ambil = mysqli_query($knk, "SELECT * FROM users WHERE username = '$user'");
  $lvl = data("SELECT * FROM users WHERE username = '$user'")[0];
  $lvlUser = $lvl['level'];

  if (mysqli_num_rows($ambil) === 1) {
    $klm = mysqli_fetch_assoc($ambil);
    if (password_verify($pass, $klm["password"])) {
      //set sesi
      $_SESSION["login"] = true;

      if ($lvlUser == "admin") {
        header("location: su/index.php");
        exit;
      }
    }
    $salah = true;
  } else {
    echo "
        <style>
          body{
            background-color:#000000;
          }
        </style>
        <script>
          alert('Periksa kembali username dan password anda.');
          document.location.href = 'login.php';
        </script>
      ";
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login</p>

        <form action="" method="post">
          <?php if (isset($salah)) : ?>
            <p style="color: red; text-align: center;">Username atau Password Tidak Sesuai</p>
          <?php endif; ?>

          <div class="input-group mb-3">
            <input name="username" required id="username" type="text" required autofocus autocomplete="off" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" required id="password" type="password" required autocomplete="off" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <a type="submit" href="index.php" class="btn btn-primary btn-block btn-flat">Kembali</a>
            </div>
            <div class="col-6">
              <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>

</body>

</html>