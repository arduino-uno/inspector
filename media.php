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
session_start();
if ( !isset($_SESSION['user_login']) ) header("location: ./login.php");
// Sanitize $_GET parameters to avoid XSS and other attacks
$module = isset( $_GET['module'] ) ? filter_var( $_GET['module'], FILTER_SANITIZE_STRING ) : '';

if ( is_admin() ) {
		$AVAILABLE_PAGES = array('dashboard',
														'datatables',
														'form-registrasi');
} else {
		$AVAILABLE_PAGES = array('dashboard',
													'datatables',
													'profile');
};

$AVAILABLE_PAGES = array_fill_keys($AVAILABLE_PAGES, 1);

if (!$AVAILABLE_PAGES[$module]) {
   header("HTTP/1.0 404 Not Found");
   readfile('404.html');
   die();
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./plugins/jqvmap/jqvmap.min.css">
	<!-- SweetAlert2 -->
  <link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Toastr -->
  <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
	<!-- Ekko Lightbox -->
  <link rel="stylesheet" href="./plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./plugins/summernote/summernote-bs4.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<style>
	input:invalid {
    border-color: red;
	}
	input,
	input:valid {
	    border-color: #ccc;
	}
	</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="./dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
					<?php
						echo "<a href='#' class='d-block'>{$_SESSION['user_fullname']}</a>";
					?>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<?php
				if ( is_admin() ) {
					echo "<li class='nav-item menu-open'>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='./media.php?module=dashboard' class='nav-link'>
                  <i class='fas fa-tachometer-alt nav-icon'></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
							<li class='nav-header'>Form & DataTables</li>
              <li class='nav-item'>
                <a href='./media.php?module=form-registrasi' class='nav-link'>
                  <i class='fas fa-pencil-alt nav-icon'></i>
                  <p>Form Registrasi</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='./media.php?module=datatables' class='nav-link'>
                  <i class='fa fa-list-alt nav-icon'></i>
                  <p>MI DataTables</p>
                </a>
              </li>
            </ul>
          </li>";
				} else {
					echo "<li class='nav-item menu-open'>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='./media.php?module=dashboard' class='nav-link'>
                  <i class='fas fa-tachometer-alt nav-icon'></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
							<li class='nav-header'>Form & DataTables</li>
              <li class='nav-item'>
                <a href='./media.php?module=profile' class='nav-link'>
                  <i class='fas fa-user nav-icon'></i>
                  <p>Profile</p>
                </a>
              </li>
							<li class='nav-item'>
		            <a href='#' class='nav-link'>
		              <i class='nav-icon far fa-envelope'></i>
		              <p>
		                Mailbox
		                <i class='fas fa-angle-left right'></i>
		              </p>
		            </a>
		            <ul class='nav nav-treeview'>
		              <li class='nav-item'>
		                <a href='#' class='nav-link'>
		                  <i class='far fa-circle nav-icon'></i>
		                  <p>Inbox</p>
		                </a>
		              </li>
		              <li class='nav-item'>
		                <a href='#' class='nav-link'>
		                  <i class='far fa-circle nav-icon'></i>
		                  <p>Compose</p>
		                </a>
		              </li>
		              <li class='nav-item'>
		                <a href='#' class='nav-link'>
		                  <i class='far fa-circle nav-icon'></i>
		                  <p>Read</p>
		                </a>
		              </li>
		            </ul>
		          </li>
            </ul>
          </li>";
				}; ?>
  				<li class="nav-header">LOGOUT</li>
					<li class="nav-item">
							<a href="#" onclick="logoutModal()" class="nav-link">
								<i class="fas fa-arrow-circle-right nav-icon"></i>
								<p>Logout</p>
							</a>
					</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <?php
	if ( $module == 'dashboard' ){
	  	require( './modules/dashboard.php' );
	} elseif ( $module == 'datatables' ){
      require( './modules/inspector_tbl.php' );
  }  elseif ( $module == 'form-registrasi' ){
      require( './modules/form_registrasi.php' );
	}  elseif ( $module == 'profile' ){
      require( './modules/profile.php' );
	};
  ?>
	<!-- Personal Profile Info modal -->
	<div class="modal fade" id="profile_info_modal">
  	<div class="modal-dialog modal-xl">
    	<div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Extra Large Modal</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
      	<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
	            <img alt="" style="width:300px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario">
	            <ul title="Ratings" class="list-inline ratings text-center">
	                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
	                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
	                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
	                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
	                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
	            </ul>
	        	</div>
	        	<div class="col-md-6">
	            <strong>Information</strong><br>
	            <div class="table-responsive">
	            <table class="table table-user-information">
	                <tbody>
	                    <tr>
	                        <td>
	                            <strong>
	                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
	                                Identificacion
	                            </strong>
	                        </td>
	                        <td><span id="kode_auk" class="text-primary">&nbsp;</span></td>
	                    </tr>
	                    <tr>
	                        <td>
	                            <strong>
	                                <span class="glyphicon glyphicon-user  text-primary"></span>
	                                Nama Lengkap
	                            </strong>
	                        </td>
	                        <td><span id="nama_lengkap" class="text-primary">&nbsp;</span></td>
	                    </tr>
	                    <tr>
	                        <td>
															<strong>
																	<span class="glyphicon glyphicon-envelope text-primary"></span>
																	Email
															</strong>
	                        </td>
	                        <td><span id="email" class="text-primary">&nbsp;</span></td>
	                    </tr>

	                    <tr>
	                        <td>
	                            <strong>
	                                <span class="glyphicon glyphicon-bookmark text-primary"></span>
	                                No. Telp
	                            </strong>
	                        </td>
	                        <td><span id="no_telp" class="text-primary">&nbsp;</span></td>
	                    </tr>
	                    <tr>
	                        <td>
	                            <strong>
	                                <span class="glyphicon glyphicon-calendar text-primary"></span>
	                                created
	                            </strong>
	                        </td>
	                        <td><span id="tgl_register" class="text-primary">&nbsp;</span></td>
	                    </tr>
	                </tbody>
	            </table>
	            </div>
							<div class="form-group">
								<div class="col-12">
			            <div class="card card-primary">
			              <div class="card-header">
			                <h4 class="card-title">Foto & Dokumen</h4>
			              </div>
			              <div class="card-body">
			                <div class="row" id="img_list">&nbsp;</div>
			              </div>
			            </div>
			          </div>
							</div>
	        	</div>
	        </div>
	        <div class="modal-footer justify-content-end">
	            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        </div>
				</div>
      </div>
			<!-- // Modal Body -->
    </div>
  </div>
	<!-- Accept anggota modal -->
	<div class="modal fade" id="accept_anggota_modal">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Acception Confirmation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Anda yakin akan menerima anggota ini?</p>
				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" onclick="accept_anggota()">Accept</button>
					<input type="hidden" id="hidden_anggota_id">
				</div>
			</div>
		</div>
	</div>
	<!-- Reject anggota modal -->
	<div class="modal fade" id="reject_anggota_modal">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Rejection Confirmation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Anda yakin akan menolak anggota ini?</p>
					<p>
						<textarea name="txt_alasan" id="txt_alasan" rows="4" cols="50" placeholder="Ketik alasan penolakan .."></textarea>
					</p>
				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" onclick="reject_anggota()">Reject</button>
					<input type="hidden" id="hidden_anggota_id">
				</div>
			</div>
		</div>
	</div>
	<!-- Delete anggota modal -->
	<div class="modal fade" id="delete_anggota_modal">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Delete Confirmation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to delete this entry?</p>
				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" onclick="delete_row_anggota()">Delete</button>
					<input type="hidden" id="hidden_anggota_id">
				</div>
			</div>
		</div>
	</div>
	<!-- Delete anggota disetujui modal -->
	<div class="modal fade" id="delete_disetujui_modal">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Delete Confirmation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to delete this entry?</p>
				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" onclick="delete_row_disetujui()">Delete</button>
					<input type="hidden" id="hidden_disetujui_id">
				</div>
			</div>
		</div>
	</div>
	<!-- Delete anggota ditolak modal -->
	<div class="modal fade" id="delete_ditolak_modal">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Delete Confirmation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to delete this entry?</p>
				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" onclick="delete_row_ditolak()">Delete</button>
					<input type="hidden" id="hidden_ditolak_id">
				</div>
			</div>
		</div>
	</div>
  <!-- /.content-wrapper -->
	<div class="modal fade" id="logout_modal">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Logout Confirmation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure want to Quit?</p>
				</div>
				<div class="modal-footer justify-content-end">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" onclick="confirmLogout()">Quit</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<audio id="error" src="./sounds/KDE_Error_2.ogg"></audio>
<audio id="success" src="./sounds/KDE_Chimes_2.ogg"></audio>
<audio id="logout" src="./sounds/KDE_Logout_1.ogg"></audio>
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="./plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="./plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="./plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="./plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="./plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="./plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="./plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="./plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="./plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="./plugins/toastr/toastr.min.js"></script>
<!-- Ekko Lightbox -->
<script src="./plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="./dist/js/pages/dashboard.js"></script>
<!-- InputMask -->
<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script type="text/javascript">
$(function () {

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

	function email_confirm(name, email, title, content) {

			$.ajax({
					type: 'POST',
					url: './scripts/email_sender.php',
					data: { fullname: name, email: email, subject: title, message: content },
					processData: false,  // Important!
          contentType: false,
          cache: false,
					timeout: 600000,
					success: function (response) {
							alert( response );
							// toastr.info(response);
					}

			});

	};

	function logoutModal() {
			$("#logout_modal").modal("show");
	};

	function confirmLogout() {
			$('#logout').trigger("play");
			window.setTimeout(function(){ window.location.href = "./scripts/logout.php"; },5000);
	};

});
</script>
<?php
if ( $module == 'dashboard' ){
    echo '<script type="text/javascript" src="./scripts/dashBoard.js"></script>';
} elseif ( $module == 'datatables' ){
    echo '<script type="text/javascript" src="./scripts/dataTables.js"></script>';
}  elseif ( $module == 'form-registrasi' ){
    echo '<script type="text/javascript" src="./scripts/formRegistrasi.js"></script>';
}  elseif ( $module == 'profile' ){
    echo '<script type="text/javascript" src="./scripts/formProfile.js"></script>';
};
?>
</body>
</html>
