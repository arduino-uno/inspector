<?php
function getConnection() {
		global $conn;
		if ( !defined( 'DB_HOST' ) || !defined( 'DB_USERNAME' ) || !defined( 'DB_PASSWORD' ) || !defined( 'DB_DATABASE_NAME' ) )  {
			throw new Exception( "\"db_config.php\" file is required." );
		} else {
			$conn = new mysqli( DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME );
			if ( mysqli_connect_errno() ) throw new Exception( mysqli_comysqli_connect_error() );
		}
		return false;
};

<<<<<<< HEAD
function is_admin() {
  session_start();
  $role = $_SESSION['user_role'];
=======
function generate_reg_ID() {
		global $conn;
		$req = mysqli_query( $conn, "SELECT COUNT( NO ) max_val FROM anggota_tbl" );
		$rows = mysqli_fetch_array( $req );
		if ( mysqli_num_rows( $req ) > 0 ) {
		    $inc_num = (int)$rows[0] + 1;
				$new_id = str_pad($inc_num, 4, '0', STR_PAD_LEFT);
				return $new_id;
		}
};

function is_admin() {
  session_start();
  $role = $_SESSION['role'];
>>>>>>> 6a9184ed2d09ef4b1e22deef2b21004a7c31cbff

  if ( $role != 'administrator' )
    return FALSE;
  return TRUE;
};
