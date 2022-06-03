<?php
error_reporting(0);
require('./config/config.inc.php');
global $conn;

$username = isset($_POST['username']) ? filter_var( $_POST['username'], FILTER_SANITIZE_STRING ) : '';
$password = isset($_POST['password']) ? filter_var( $_POST['password'], FILTER_SANITIZE_STRING ) : '';

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

if(!empty($username) && !empty($password)) {
		$password = md5($password);
		$login = mysqli_query( $conn, "SELECT * FROM users WHERE user_login = '$username' AND user_pass = '$password' AND user_status = 1" );
		$match = mysqli_num_rows($login);
		$row   = mysqli_fetch_array($login);

		if ($match > 0) {
			session_start();
			$_SESSION['NIK'] = $row[NIK];
			$_SESSION['user_login'] = $row[user_login];
			$_SESSION['user_fullname'] = $row[user_fullname];
			$_SESSION['user_email'] = $row[user_email];
			$_SESSION['user_phone'] = $row[user_phone];
			$_SESSION['user_address'] = $row[user_address];
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

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
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
