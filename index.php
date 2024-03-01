<html lang="en"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="login-page" style="min-height: 466px;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b></b>KASIR</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masukkan username dan password</p>

      <form action="proses/proses_login.php?aksi=login" method="post">
        <div class="input-group mb-3">
          <input type="text" name="Username" class="form-control" placeholder="Username">
          <div class="input-group-append">
           
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="Password" class="form-control" placeholder="Password">
          <div class="input-group-append">
           
          </div>
        </div>
        <div class="row">
          <div class="col-8">
         
            </div>
          </div>
          <!-- /.col -->
          <div class="mt-2 mb-3">
            <button type="submit" class="btn btn-primary btn-block"> Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    
      <p class="mb-3 text-center">
        <a href="register.php" class="text-center">Belum punya akun? Daftar</a>
      </p>
      <?php
                if (isset($_SESSION['user'])) {
                    echo '<script>window.history.forward();</script>';
                }
            ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


</body></html>