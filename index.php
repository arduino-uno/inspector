<html><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Snippet - BBBootstrap</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="./dist/css/adminlte.min.css">
<style>
body {
  font-family: "Roboto", sans-serif;
  margin: 0;
  padding: 0;
  background: linear-gradient(45deg, #ea4f4c 0%, #b52e31 100%);
}

::-webkit-scrollbar {
  width: 8px;
}
/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}
/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
body{background-color:grey}
</style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" data-abc="true">BOOTSTRAP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"> <a class="nav-link" href="#" data-abc="true">Home <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item"> <a class="nav-link" href="#" data-abc="true">contact</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#" data-abc="true">Pricing</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#" data-abc="true">Social</a> </li>
        </ul>
        <form onsubmit="event.preventDefault()" class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="text" placeholder="Search"> <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button> </form>
    </div>
    <div class="navbar navbar-nav action-buttons mr-auto p-2 shadow">
  		<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle mr-3" aria-expanded="false">Login</a>
  		<div class="dropdown-menu login-form w-100 p-3 mb-1 bg-secondary text-light rounded">
  			<form id="login_form" name="login_form" class="" method="POST" action="./scripts/user_auth.php">
  				<div class="form-group">
  					<label>Username</label>
  					<input type="text" name="username" class="form-control" value="admin" placeholder="Username" required>
  				</div>
  				<div class="form-group">
  					<div class="clearfix">
  						<label>Password</label>
  						<a href="#" class="float-right text-muted"><small>Forgot?</small></a>
  					</div>
  					<input type="password" name="password" class="form-control" value="admin" placeholder="Password" required>
  				</div>
  				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Login"/>
  			</form>
  		</div>
  		<a href="#" class="btn btn-primary">Register</a>
  	</div>
</nav>
<!-- /.login-box -->
<audio id="error" src="./sounds/KDE_Error_2.ogg"></audio>
<audio id="success" src="./sounds/KDE_Chimes_2.ogg"></audio>
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<script src="./plugins/popper/popper.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Toastr -->
<script src="./plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<script>
// Prevent dropdown menu from closing when click inside the form
$(document).on("click", ".navbar-right .dropdown-menu", function(e){
	e.stopPropagation();
});
</script>
<script type="text/javascript">
    var myLink = document.querySelectorAll('a[href="#"]');
    myLink.forEach(function(link){
        link.addEventListener('click', function(e) {
          e.preventDefault();
        });
    });

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
                    $('#success').trigger("play");
                    toastr.info("Login Success!");
                  	window.setTimeout(function(){ window.location.href = "./media.php?module=dashboard"; },2000);
                } else {
                  	$('#error').trigger("play");
                    toastr.error("Incorrect username or password combination");
                    window.setTimeout(function(){ location.reload() },2000);
                }
            }
        });
    });
</script>
</body></html>
