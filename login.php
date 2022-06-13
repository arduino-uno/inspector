<?php
error_reporting(0);
require('./config/db_config.php');
require('./scripts/functions_lib.php');

$connect_db = getConnection();

$username = isset($_POST['username']) ? filter_var( $_POST['username'], FILTER_SANITIZE_STRING ) : '';
$password = isset($_POST['password']) ? filter_var( $_POST['password'], FILTER_SANITIZE_STRING ) : '';

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

if(!empty($username) && !empty($password)) {
		$password = md5($password);
		$login = mysqli_query( $conn, "SELECT * FROM pengguna_tbl WHERE user_login = '$username' AND user_pass = '$password' AND status = 1" );
		$match = mysqli_num_rows($login);
		$row   = mysqli_fetch_array($login);

		if ($match > 0) {
			session_start();
			$_SESSION['kode_auk'] = $row[kode_auk];
			$_SESSION['NIP'] = $row[NIP];
			$_SESSION['user_login'] = $row[user_login];
			$_SESSION['nama_lengkap'] = $row[nama_lengkap];
			$_SESSION['role'] = $row[role];
			header('location: ./media.php?module=dashboard');
		} else {
      $message = "Incorrect username/password combination";
    }

    mysqli_close($conn);
} else {
  $message = "Username or Password is empty!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
	<style>
	span.description {
		font-family: Menlo,Monaco,Consolas,"Courier New",monospace;
		font-size: 1rem;
		margin-top: 0px;
		margin-bottom: 0px;
		color: #000;
		max-width: 95%;
		text-align: justify;
	}
	</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg" style="color:red;">
        <?php
          if ($message == '') $message = 'Sign in to start your session';
          echo $message;
        ?>
      </p>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>"" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" value="admin" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" value="admin" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-justify mb-3">
        <hr>
				<p><h5>Live Demo Credentials</h5></p>
				<div class="card" style="border: 1px solid #000;background-color: #d9d9d9;box-shadow: 6px 6px #888;">
					<div class="card-body">
						<span class="description">
							<strong>Role: username | password</strong>:</br>
							<strong>Admin</strong>: admin | admin </br>
							<strong>Member</strong>: 120220004 | password </br>
						</span>
					</div>
				</div>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
