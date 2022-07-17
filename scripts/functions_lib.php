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

function is_admin() {
  session_start();
  $role = $_SESSION['user_role'];

  if ( $role != 'administrator' )
    return FALSE;
  return TRUE;
};
