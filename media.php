<?php
error_reporting(0);
require('./config/db_config.php');
require('./scripts/functions_lib.php');

$connect_db = getConnection();
session_start();
if ( !isset($_SESSION['user_login']) ) header('location: ./login.php');
$kode_auk = $_SESSION['kode_auk'];
$user_login = $_SESSION['user_login'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
// Sanitize $_GET parameters to avoid XSS and other attacks
if ( $role == "administrator" ){
		$AVAILABLE_PAGES = array('dashboard',
														'datatables',
														'form-registrasi');
} else {
		$AVAILABLE_PAGES = array('dashboard',
													'datatables',
													'profile');
};

$AVAILABLE_PAGES = array_fill_keys($AVAILABLE_PAGES, 1);
$module = isset($_GET['module']) ? filter_var( $_GET['module'], FILTER_SANITIZE_STRING ) : '';
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
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
					<?php
						echo "<a href='#' class='d-block'>{$nama_lengkap}</a>";
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
							<div class="form-group border border-secondary p-3">
								<label class="col-lg-3 control-label">Files:</label>
								<div class="row">
									<div class="col-lg">
										<i class="fas fa-file-image fa-5x"></i>
									</div>
									<div class="col-lg">
										<i class="fas fa-file-image fa-5x"></i>
									</div>
									<div class="col-lg">
										<i class="fas fa-file-image fa-5x"></i>
									</div>
									<div class="col-lg">
										<i class="fas fa-file-image fa-5x"></i>
									</div>
									<div class="col-lg">
										<i class="fas fa-file-image fa-5x"></i>
									</div>
									<div class="col-lg">
										<i class="fas fa-file-image fa-5x"></i>
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
<script>
$(function () {

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

		var QueryString = (new URL(location.href)).searchParams.get('module');
		if ( QueryString ) {
				profile_detail("<?php echo $kode_auk; ?>");
		}

		function profile_detail( member_id ) {
				$.ajax({
							method: 'POST',
							url: './scripts/actions_lib.php',
							data: { table:'pengguna_tbl', aksi:'tampil', kode:member_id },
							datatype: 'json',
							success: function ( myData ) {
								$.each( JSON.parse( myData ), function( index, value ) {
										$("#kode_auk").val( value.kode_auk );
										$("#nama_lengkap").val( value.nama_lengkap );
										$("#email").val( value.email );
										$("#no_telp").val( value.no_telp );
										$("#tgl_register").val( value.tgl_register );
								});
						 }
				})
		};

		//Datemask dd/mm/yyyy
		$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
		//Datemask2 mm/dd/yyyy
		$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
		//Money Euro
		$('[data-mask]').inputmask();

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

		// fetch data from MySQL
		var dataTableMember = $('#member_data').DataTable({
				"processing":true,
				"serverSide":true,
				"order":[],
				"ajax":{
						url:"./scripts/fetch_anggota_tbl.php",
						type:"POST"
				},
				"columnDefs":[{
						data: 0,
						className: 'text-center',
						targets:0,
						orderable: true
					},{
						data: 1,
						className: 'font-weight-bold',
						targets:1,
						render: function(data,type,full,meta) {
							return data;
						}
					},{
						data: 2,
						targets:2,
						render: function(data,type,full,meta) {
								const event = new Date(data);
								const options = { dateStyle: 'long' };
								const date = event.toLocaleString('id-ID', options);
								return date;
						}
					},{
						data: 5,
						targets:5,
						render: function(data,type,full,meta) {
								return '<a href="mailto:' + data + '">' + data + '</a>';
						}
				},{
						data: 1,
						targets:-1,
						render: function(data,type,full,meta) {
								return '<div class="btn-group" role="group">' +
												  '<button type="button" onclick="member_detail(\'' + data + '\')" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-list"></i></button>' +
												  '<button type="button" onclick="confirm_disetujui(\'' + data + '\')" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Disetujui"><i class="fas fa-handshake"></i></button>' +
												  '<button type="button" onclick="confirm_ditolak(\'' + data + '\')" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Ditolak"><i class="fas fa-times-circle"></i></button>' +
												 	'<button type="button" onclick="confirm_del_anggota(\'' + data + '\')" class="btn btn-secondary btn-sm data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>' +
												'</div>';
						}
				}],
			    select: {
			    style: 'os',
			    selector: 'td:first-child'
			  },
			    order: [[ 1, 'asc' ]],
			    dom: 'Blfrtip',
			    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
		});

		// fetch data from MySQL
		var dataTableDisetujui = $('#disetujui_data').DataTable({
				"processing":true,
				"serverSide":true,
				"order":[],
				"ajax":{
						url:"./scripts/fetch_disetujui_tbl.php",
						type:"POST"
				},
				"columnDefs":[{
						data: 0,
						className: 'text-center',
						targets:0,
						orderable: true
				},{
						data: 1,
						className: 'font-weight-bold',
						targets:1,
						render: function(data,type,full,meta) {
								return data;
						}
				},{
						data: 2,
						targets:2,
						render: function(data,type,full,meta) {
								const event = new Date(data);
								const options = { dateStyle: 'long' };
								const date = event.toLocaleString('id-ID', options);
								return date;
						}
				},{
						data: 5,
						targets:5,
						render: function(data,type,full,meta) {
								return '<a href="mailto:' + data + '">' + data + '</a>';
						}
				},{
						data: 1,
						targets:-1,
						render: function(data,type,full,meta) {
								return '<div class="btn-group" role="group">' +
												  '<button type="button" onclick="member_detail(\'' + data + '\')" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-list"></i></button>' +
												  '<button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Disetujui"><i class="fas fa-handshake"></i></button>' +
												  '<button type="button" onclick="confirm_del_disetujui(\'' + data + '\')" class="btn btn-secondary btn-sm data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>' +
												'</div>';
						}
				}],
						select: {
			      style: 'os',
			      selector: 'td:first-child'
			  },
				    order: [[ 1, 'asc' ]],
				    dom: 'Blfrtip',
				    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
		});

		// fetch data from MySQL
		var dataTableDitolak = $('#ditolak_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"./scripts/fetch_ditolak_tbl.php",
				type:"POST"
			},
			"columnDefs":[
				{
					data: 0,
					className: 'text-center',
					targets:0,
					orderable: true
				},{
					data: 1,
					className: 'font-weight-bold',
					targets:1,
					render: function(data,type,full,meta) {
							return data;
					}
				},{
					data: 2,
					targets:2,
					render: function(data,type,full,meta) {
							const event = new Date(data);
							const options = { dateStyle: 'long' };
							const date = event.toLocaleString('id-ID', options);
							return date;
					}
				},{
					data: 5,
					targets:5,
					render: function(data,type,full,meta) {
							return '<a href="mailto:' + data + '">' + data + '</a>';
					}
				},{
					data: 1,
					targets:-1,
					render: function(data,type,full,meta) {
							return '<div class="btn-group" role="group">' +
											  '<button type="button" onclick="member_detail(\'' + data + '\')" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-list"></i></button>' +
											  '<button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Disetujui"><i class="fas fa-handshake"></i></button>' +
											  '<button type="button" onclick="confirm_del_ditolak(\'' + data + '\')" class="btn btn-secondary btn-sm data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>' +
											'</div>';
					}
				}],
		    select: {
		      style: 'os',
		      selector: 'td:first-child'
		    },
		    order: [[ 1, 'asc' ]],
		    dom: 'Blfrtip',
		    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
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

	function confirm_disetujui(kode) {
			// Add Member ID to the hidden field for furture usage
			$("#hidden_anggota_id").val(kode);
			// Open modal popup
			$("#accept_anggota_modal").modal("show");
	};

	function confirm_ditolak(kode) {
			// Add Member ID to the hidden field for furture usage
			$("#hidden_anggota_id").val(kode);
			// Open modal popup
			$("#reject_anggota_modal").modal("show");
	};

	function accept_anggota() {
			// get hidden field value
			var no_id = $("#hidden_anggota_id").val();

			$.ajax({
					method: 'POST',
					url: './scripts/actions_lib.php',
					data: { aksi: 'accept', kode: no_id  },
					datatype: 'json',
					success: function (response) {
							if ( response == true ) {
									toastr.success("Aksi disetujui berhasil!");
							} else {
									toastr.error("Aksi disetujui gagal!");
							}
							$("#accept_anggota_modal").modal("hide");
							window.setTimeout(function(){location.reload()},3000)
					}
			});
	};

	function reject_anggota() {
			// get hidden field value
			var no_id = $("#hidden_anggota_id").val();
			var txt_alasan = $("#txt_alasan").val();

			$.ajax({
					method: 'POST',
					url: './scripts/actions_lib.php',
					data: { aksi: 'reject', kode: no_id, alasan:txt_alasan  },
					datatype: 'json',
					success: function (response) {
							if ( response == true ) {
									toastr.success("Aksi penolakan berhasil!");
							} else {
									toastr.error("Aksi penolakan gagal!");
							}
							$("#reject_anggota_modal").modal("hide");
							window.setTimeout(function(){location.reload()},3000)
					}
			});
	};

	function confirm_del_anggota(kode) {
			// Add Member ID to the hidden field for furture usage
	    $("#hidden_anggota_id").val(kode);
			// Open modal popup
	    $("#delete_anggota_modal").modal("show");
	};

	function confirm_del_disetujui(kode) {
			// Add Rejection ID to the hidden field for furture usage
	    $("#hidden_disetujui_id").val(kode);
			// Open modal popup
	    $("#delete_disetujui_modal").modal("show");
	};

	function confirm_del_ditolak(kode) {
			// Add Rejection ID to the hidden field for furture usage
	    $("#hidden_ditolak_id").val(kode);
			// Open modal popup
	    $("#delete_ditolak_modal").modal("show");
	};

	function delete_row_anggota() {
			// get hidden field value
	    var no_id = $("#hidden_anggota_id").val();

			$.ajax({
	        method: 'POST',
	        url: './scripts/actions_lib.php',
	        data: { table:'anggota_tbl', aksi: 'hapus', kode: no_id },
					datatype: 'json',
					success: function (response) {
							if ( response == true ) {
									toastr.success("Data telah dihapus!");
							} else {
									toastr.error("Data gagal dihapus!");
							}
							$("#delete_anggota_modal").modal("hide");
							window.setTimeout(function(){location.reload()},3000)
					}
			});
	};

	function delete_row_disetujui() {
		// get hidden field value
    var no_id = $("#hidden_disetujui_id").val();

		$.ajax({
        method: 'POST',
        url: './scripts/actions_lib.php',
        data: { table:'pengguna_tbl', aksi:'hapus', kode:no_id },
				datatype: 'json',
				success: function (response) {
						if ( response == true ) {
								toastr.success("Data telah dihapus!");
						} else {
								toastr.error("Data gagal dihapus!");
						}
						$("#delete_disetujui_modal").modal("hide");
						window.setTimeout(function(){location.reload()},3000)
				}
		});
	};

	function delete_row_ditolak() {
		// get hidden field value
    var no_id = $("#hidden_ditolak_id").val();

		$.ajax({
        method: 'POST',
        url: './scripts/actions_lib.php',
        data: { table:'ditolak_tbl', aksi:'hapus', kode:no_id },
				datatype: 'json',
				success: function (response) {
						if ( response == true ) {
								toastr.success("Data telah dihapus!");
						} else {
								toastr.error("Data gagal dihapus!");
						}
						$("#delete_ditolak_modal").modal("hide");
						window.setTimeout(function(){location.reload()},3000);
				}
		});
	};

	$("#form_register").submit( function(e) {
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

	function member_detail(member_id) {
			$.ajax({
		        method: 'POST',
		        url: './scripts/actions_lib.php',
		        data: { table:'anggota_tbl', aksi:'tampil', kode:member_id },
						datatype: 'json',
						success: function ( myData ) {
							$.each( JSON.parse( myData ), function( index, value ) {
									$("#kode_auk").text( value.kode_auk );
									$("#nama_lengkap").html( "<strong>" + value.nama_lengkap + "</strong>" );
									$("#email").html( "<a href='mailto:" + value.email + "'>" + value.email + "</a>" );
									$("#no_telp").text( value.no_telp );
									$("#tgl_register").text( value.tgl_register );
				      });
	    		 }
			});
		  // Open modal popup
		  $("#profile_info_modal").modal("show");
	};

	function logoutModal() {
			$("#logout_modal").modal("show");
	};

	function confirmLogout() {
			window.location.href = './scripts/logout.php';
	};

</script>
</body>
</html>
