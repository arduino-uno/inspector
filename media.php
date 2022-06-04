<?php
error_reporting(0);
require('./config/db_config.php');
require('./scripts/functions_lib.php');

$connect_db = getConnection();

session_start();
if ( !isset($_SESSION['user_login']) ) header('location: ./login.php');
// Sanitize $_GET parameters to avoid XSS and other attacks
$AVAILABLE_PAGES = array('dashboard',
												'datatables',
												'form-registrasi');

$AVAILABLE_PAGES = array_fill_keys($AVAILABLE_PAGES, 1);

$module = isset($_GET['module']) ? filter_var( $_GET['module'], FILTER_SANITIZE_STRING ) : '';
$message = isset($_GET['message']);

if ( $message ) {
	 alert($_SESSION['message']);
	 unset($_SESSION['message']);
}

if (!$AVAILABLE_PAGES[$module]) {
   header("HTTP/1.0 404 Not Found");
   readfile('404.html');
   die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
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
          <a href="#" class="d-block">Alexander Pierce</a>
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
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./media.php?module=dashboard" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
							<li class="nav-header">Form & DataTables</li>
              <li class="nav-item">
                <a href="./media.php?module=form-registrasi" class="nav-link">
                  <i class="fas fa-pencil-alt nav-icon"></i>
                  <p>Form Registrasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./media.php?module=datatables" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>MI DataTables</p>
                </a>
              </li>
            </ul>
          </li>
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
	}
  ?>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
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

		//Datemask dd/mm/yyyy
		$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
		//Datemask2 mm/dd/yyyy
		$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
		//Money Euro
		$('[data-mask]').inputmask();

		//Date picker
		/*
    $('#tgl_lahir').datetimepicker({
        format: 'L'
    });
		*/

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

		})

		function elementSetFocus( elementID ){
		    var element = document.getElementById(elementID);
		    element.focus();
		    element.scrollIntoView();
		}

		function show_newId() {
				let tipe_auk = $('#tipe_auk').val();
				let tgl_periksa = $('#tgl_periksa').val();
				let no_urut = $('#no_urut').val();
				let new_id = generateId(tipe_auk, tgl_periksa, no_urut);
				$("#kode_auk").val(new_id);
		}

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
		}

		// Activate an inline edit on click of a table cell
	  $('#member_data').on( 'click', 'tbody td:not(:first-child)', function (e) {
	  	editor.inline( this );
	  } );
		// fetch data from MySQL
		var dataTable = $('#member_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"./scripts/fetch_anggota_tbl.php",
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
										  '<button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-list"></i></button>' +
										  '<button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Disetujui"><i class="fas fa-handshake"></i></button>' +
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

		// Activate an inline edit on click of a table cell
	  $('#tolak_data').on( 'click', 'tbody td:not(:first-child)', function (e) {
	  	editor.inline( this );
	  } );
		// fetch data from MySQL
		var dataTable = $('#tolak_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"./scripts/fetch_tolak_tbl.php",
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
										  '<button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-list"></i></button>' +
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

	function confirm_ditolak(kode) {
			// Add Member ID to the hidden field for furture usage
			$("#hidden_anggota_id").val(kode);
			// Open modal popup
			$("#reject_anggota_modal").modal("show");
	}

	function reject_anggota() {
			// get hidden field value
			var no_id = $("#hidden_anggota_id").val();
			var txt_alasan = $("#txt_alasan").text();

			alert(txt_alasan);

			$.ajax({
					method: 'POST',
					url: './scripts/actions_lib.php',
					data: { aksi: 'reject', kode: no_id, alasan:txt_alasan  },
					datatype: 'json',
					success: function (response) {
							if ( response == true ) {
									alert("Aksi penolakan berhasil!");
							} else {
									alert("Aksi penolakan gagal!");
							}
							$("#reject_anggota_modal").modal("hide");
							window.location.href = 'media.php?module=datatables';
					}
			});
	}

	function confirm_del_anggota(kode) {
			// Add Member ID to the hidden field for furture usage
	    $("#hidden_anggota_id").val(kode);
			// Open modal popup
	    $("#delete_anggota_modal").modal("show");
	}

	function confirm_del_ditolak(kode) {
			// Add Rejection ID to the hidden field for furture usage
	    $("#hidden_ditolak_id").val(kode);
			// Open modal popup
	    $("#delete_ditolak_modal").modal("show");
	}

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
									alert("Data telah dihapus!");
							} else {
									alert("Data gagal dihapus!");
							}
							$("#delete_anggota_modal").modal("hide");
							window.location.href = 'media.php?module=datatables';
					}
			});
	}

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
								alert("Data telah dihapus!");
						} else {
								alert("Data gagal dihapus!");
						}
						$("#delete_ditolak_modal").modal("hide");
						window.location.href = 'media.php?module=datatables';
				}
		});
	}


	function logoutModal() {
			$("#logout_modal").modal("show");
	}

	function confirmLogout() {
			window.location.href = './scripts/logout.php';
	}
</script>
</body>
</html>
