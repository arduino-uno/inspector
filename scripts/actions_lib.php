<?php
error_reporting(0);
require('../config/db_config.php');
require('../scripts/functions_lib.php');

$connect_db = getConnection();

$table = isset( $_POST['table'] ) ? filter_var( $_POST['table'], FILTER_SANITIZE_STRING ) : '';
$aksi = isset( $_POST['aksi'] ) ? filter_var( $_POST['aksi'], FILTER_SANITIZE_STRING ) : '';
$kode = isset( $_POST['kode'] ) ? filter_var( $_POST['kode'], FILTER_SANITIZE_STRING ) : '';

if ( $aksi == 'hapus' ) {
    $result = delete_table_row($table, $kode);
    echo $result;
}

function delete_table_row($table_name, $table_id) {
		global $conn;
		$query = "DELETE FROM $table_name WHERE NO = '$table_id'";
		if ($req = mysqli_query( $conn, $query ) ) {
	     	return true;
		} else
		  return false;
}
