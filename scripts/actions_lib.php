<?php
error_reporting(0);
require('../config/db_config.php');
require('../scripts/functions_lib.php');

$connect_db = getConnection();

$table = isset( $_POST['table'] ) ? filter_var( $_POST['table'], FILTER_SANITIZE_STRING ) : '';
$aksi = isset( $_POST['aksi'] ) ? filter_var( $_POST['aksi'], FILTER_SANITIZE_STRING ) : '';
$kode = isset( $_POST['kode'] ) ? filter_var( $_POST['kode'], FILTER_SANITIZE_STRING ) : '';
$alasan = isset( $_POST['alasan'] ) ? filter_var( $_POST['alasan'], FILTER_SANITIZE_STRING ) : '';

switch ($aksi) {
    case "reject":
        $result = reject_anggota_row($kode, $alasan);
        echo $result;
        break;
    case "hapus":
        $result = delete_table_row($table, $kode);
        echo $result;
        break;
}

function reject_anggota_row($table_id, $alasan) {
    global $conn;
    $query = "INSERT INTO `ditolak_tbl` (`NO`,
                        `kode_auk`,
                        `alasan`,
                        `tgl_penolakan`)
                  VALUES (NULL,
                        '$table_id',
                        '$alasan')";

    if ($req = mysqli_query( $conn, $query ) ) {
        return true;
    } else
      return false;
}

function delete_table_row($table_name, $table_id) {
		global $conn;
		$query = "DELETE FROM $table_name WHERE kode_auk = '$table_id'";
		if ($req = mysqli_query( $conn, $query ) ) {
	     	return true;
		} else
		  return false;
}
