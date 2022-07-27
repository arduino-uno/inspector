<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>
	<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
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
    <a href="./index.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form id="login_form" name="login_form" method="POST" action="./scripts/user_auth.php">
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
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit"/>
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
<audio id="error" src="./sounds/KDE_Error_2.ogg"></audio>
<audio id="success" src="./sounds/KDE_Chimes_2.ogg"></audio>
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Toastr -->
<script src="./plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<script>
$('form').on('submit', function(e){
        let form = $("#login_form");
        e.preventDefault();
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: new FormData( this ),
            processData: false,  // Important!
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function ( response ) {
                if ( response == "TRUE" ) {
                  $("#success").trigger("play");
                  toastr.info("Login Success!");
                  window.setTimeout(function(){ window.location.href = "./media.php?module=dashboard"; },2000);
                } else {
                  $("#error").trigger("play");
                  toastr.error("Incorrect username or password combination");
                  window.setTimeout(function(){ location.reload() },2000);
                }

            }

        });

    });
</script>
</body>
</html>
