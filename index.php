<?php
error_reporting(0);
// Set Database Config
require("./config/db_config.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("./scripts/class_datatables_crud.php");
// Calling functions library
require("./scripts/functions_lib.php");
// Set Database Connection
$conn = new Class_DataTables_CRUD();
$conn->getConnection();
?>
<!DOCTYPE html>
<html lang="en">
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
  background: linear-gradient(45deg, #e74c3c 0%, #2d0a06 100%);
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

.dropdown-menu {
  width: 400px;
}
</style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#333;box-shadow: 5px 5px 5px black;">
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
<form id="form_register" name="form_register" method="POST" action="./scripts/action_page.php" enctype="multipart/form-data">
  <!-- Main content -->
  <section class="content">
    <div class="container">
      <!-- Content Wrapper. Contains page content -->
      <main role="main" class="container bg-light m-3 rounded shadow">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><span style="color:red;">*</span>) Semua field wajib diisi</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>ID Registrasi</label>
                  <input type="text" class="form-control" name="dis_no_urut" id="dis_no_urut" disabled value="<?php echo $conn->get_newid();?>" placeholder="No. Marine Inspector">
                  <input type="hidden" name="no_urut" id="no_urut" value="<?php echo $conn->get_newid();?>">
                  <small id="note" class="form-text text-muted"> <!-- #2 -->
                    <strong>No. Urut</strong> pendaftaran. Di generate secara <i><span style="color:red">otomatis</span></i> oleh sistem
                  </small>
                </div>
                <div class="form-group">
                  <label>Nama Lengkap <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" pattern="^[A-Za-z \s*]+$" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                  <label>NIP <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="txt_NIP" id="txt_NIP" placeholder="No. Induk Pegawai" required>
                </div>
                <div class="form-group">
                  <label>Email <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Alamat Email" required>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Password <span style="color:red">*</span></label>
                      <input type="password" class="form-control" name="password" id="password" pattern=".{4,}" title="Four or more characters" placeholder="Ketikan Password" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Retype Password <span style="color:red">*</span></label>
                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" pattern=".{4,}" title="Four or more characters" placeholder="Ketikan Ulang Password" required>
                    </div>
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">&nbsp;</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jenis Kelamin <span style="color:red">*</span>)</label>
                    <select class="form-control select2bs4" name="kelamin" id="kelamin" style="width: 100%;">
                      <option>Laki-laki</option>
                      <option>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Tempat Lahir <span style="color:red">*</span>)</label>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="Bandung" placeholder="Tempat Kelahiran" required>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <!-- Date -->
                  <div class="form-group">
                    <label>Tanggal Lahir <span style="color:red">*</span>)</label></label>
                    <div class="input-group date">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="MM/DD/YYYY" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>No HP <span style="color:red">*</span>)</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                      </div>
                      <input type="text" name="no_telp" id="no_telp" class="form-control phone_number_3" value="" placeholder="+62-9999999999" required>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">&nbsp;</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>METODE PENGUKURAN <span style="color:red">*</span>)</label>
                    <select class="form-control select2bs4" name="tipe_auk" id="tipe_auk" style="width: 100%;">
                      <option value="1">Metode Pengukuran Khusus</option>
                      <option value="2">Metode Pengukuran Dalam Negeri</option>
                      <option value="3">Metode Pengukuran Luar Negeri</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>No Elektrik MI/KODE AUK <span style="color:red">*</span>)</label>
                    <input type="text" class="form-control" name="dis_kode_auk" id="dis_kode_auk" disabled placeholder="Nomer Elektrik MI">
                    <input type="hidden" name="kode_auk" id="kode_auk" value="">
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-6">
                  <!-- Date -->
                  <div class="form-group">
                    <label>Tanggal Periksa <span style="color:red">*</span>)</label></label>
                    <div class="input-group date">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa" placeholder="MM/DD/YYYY" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Diperiksa dan disetujui oleh <span style="color:red">*</span>)</label>
                    <input type="text" class="form-control" name="nama_pemeriksa" id="nama_pemeriksa" value="Pak Bambang" placeholder="Diperiksa dan disetujui oleh" required>
                  </div>
                  <!-- /.form-group -->
                </div>
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Foto Diri <span style="color:red">*</span>)</label>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile1" name="myFile1" accept="image/x-png,image/gif,image/jpeg" />
                </div>
             </div>
             <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                      <label>CV - Curiculum Vitae <span style="color:red">*</span>)</label>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile2" name="myFile2" accept="image/x-png,image/gif,image/jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Surat Tanda Tamat Pendidikan dan Pelatihan <span style="color:red">*</span>)</label>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile3" name="myFile3" accept="image/x-png,image/gif,image/jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Lembar Pengukuhan <span style="color:red">*</span>)</label>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile4" name="myFile4" accept="image/x-png,image/gif,image/jpeg" />
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                        <label>Ijazah Formal <span style="color:red">*</span>)</label>
                        <small id="note" class="form-text text-muted"> <!-- #2 -->
                          (MI <strong>tipe A</strong> minimal ijazah pelaut ANT/ATT II atau S1 Teknik Perkapalan)<br>
                          (MI <strong>tipe B</strong> minimal ijazah pelaut ANT/ATT III atau D3 Teknik Perkapalan)
                        </small>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile5" name="myFile5" accept="image/x-png,image/gif,image/jpeg" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ijazah Formal Lainnya (<i>Optional</i>)</label>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <input type="file" id="myFile6" name="myFile6" accept="image/x-png,image/gif,image/jpeg" />
                </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.card -->
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">&nbsp;</div>
              <div class="col-md-6 text-right">
                  <input class="btn btn-warning" id="btn_reset" type="reset" value="Reset"/>
                  <input class="btn btn-primary" name="submit" id="btn_submit" type="submit" value="Submit"/>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </main>
  </div>
  <!-- /.container fluid -->
</section>
</form>
<!-- /.container -->
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

    $('#login_form').on('submit', function(e){
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

    $("#tgl_periksa").change(function(){
				let tipe_auk = $('#tipe_auk').val();
				let tgl_periksa = $(this).val();
				let dis_no_urut = $('#dis_no_urut').val();
				let no_urut = $('#no_urut').val();
				let new_id = generateId(tipe_auk, tgl_periksa, no_urut);
				$("#dis_kode_auk").val(new_id);
				$("#kode_auk").val(new_id);
		});

		$('.phone_number_3').inputmask('+99-9999999999');

		$("#tipe_auk").change(function(){
				let tipe_auk = $(this).val();
				let tgl_periksa = $('#tgl_periksa').val();
				let dis_no_urut = $('#dis_no_urut').val();
				let no_urut = $('#no_urut').val();
				let new_id = generateId(tipe_auk, tgl_periksa, no_urut);
				$("#dis_kode_auk").val(new_id);
				$("#kode_auk").val(new_id);
		});

		$("#inspector").submit(function() {
				 let password = $("#password").val();
				 let confirm_password = $("#confirm_password").val();

		     if ( password != confirm_password ) {
		         alert("password should be same");
						 elementSetFocus( "confirm_password" );
		         return false;
		     }

		});

		function elementSetFocus( elementID ){
		    var element = document.getElementById(elementID);
		    element.focus();
		    element.scrollIntoView();
		};

		function show_newId() {
				let tipe_auk = $('#tipe_auk').val();
				let tgl_periksa = $('#tgl_periksa').val();
				let no_urut = $('#no_urut').val();
				let new_id = generateId(tipe_auk, tgl_periksa, no_urut);
				$("#kode_auk").val(new_id);
		};

		function generateId(tipe, tanggal, reg_id) {
				let tahun = new Date();

				if (tipe == null) tipe = "A";
				if ( tanggal == "" ) {
						tahun = new Date().getFullYear();
				} else {
						tahun = new Date(tanggal).getFullYear();
				}
				if (reg_id == null) reg_id = "";

				return tipe + tahun + reg_id;
		};

    $("#form_register").on('submit', function(e){
  			var form = $("#form_register");
        e.preventDefault();

  			var name = $("#nama_lengkap").val();
  			var email = $("#email").val();
  			var title = "Latest Email Confirmation Tester!";
  			var message = "Terima kasih atas pendaftaran Anda di sintara.co.id Silahkan melakukan konfirmasi email yang kami kirimkan ke email Anda.";

        $.ajax({
            type: form.attr('method'),
            enctype: "multipart/form-data",
            url: form.attr('action'),
            data: new FormData( this ),
            processData: false,  // Important!
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function ( response ) {
  							if ( response == "true" ) {
  				    		toastr.info('Data Anda berhasil disimpan.');
  								// email_confirm(name, email, title, message);
  							} else {
  								toastr.error('Ada kendala pada server kami.');
  							}
            }
        });

  			window.setTimeout(function(){location.reload()},20000);
    });
</script>
</body></html>
