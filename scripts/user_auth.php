<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_datatables_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Class_DataTables_CRUD();
$conn->getConnection();
// Use filter_var to prevent from SQL injection attack
$username = isset($_POST['username']) ? filter_var( $_POST['username'], FILTER_SANITIZE_STRING ) : '';
$password = isset($_POST['password']) ? filter_var( $_POST['password'], FILTER_SANITIZE_STRING ) : '';

if ( !empty($username) && !empty($password) ) {
		$result = $conn->get_sql_exec( "SELECT * FROM pengguna_tbl WHERE user_login = '$username' AND user_pass = md5('$password') AND status = 1" );
		$rows = json_decode( $result, JSON_PRETTY_PRINT );

		if ( count($rows) > 0 ) {
			session_start();
			$_SESSION['user_id'] = $rows[0][kode_auk];
			$_SESSION['user_login'] = $rows[0][user_login];
			$_SESSION['user_fullname'] = $rows[0][nama_lengkap];
			$_SESSION['user_role'] = $rows[0][role];
			echo "TRUE";
		} else {
      echo "FALSE";
    };

};
exit();
