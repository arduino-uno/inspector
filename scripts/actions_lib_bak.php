<?php
error_reporting(0);
require('../config/db_config.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("../scripts/class_datatables_crud.php");
// Calling functions library
require('../scripts/functions_lib.php');
// Set Database Connection
$conn = new Class_DataTables_CRUD();
$conn->getConnection();

$table = isset( $_POST['table'] ) ? filter_var( $_POST['table'], FILTER_SANITIZE_STRING ) : '';
$aksi = isset( $_POST['aksi'] ) ? filter_var( $_POST['aksi'], FILTER_SANITIZE_STRING ) : '';
$kode = isset( $_POST['kode'] ) ? filter_var( $_POST['kode'], FILTER_SANITIZE_STRING ) : '';
$alasan = isset( $_POST['alasan'] ) ? filter_var( $_POST['alasan'], FILTER_SANITIZE_STRING ) : '';

switch ($aksi) {
    case "accept":
        $result = accept_anggota_row($kode);
        echo $result;
        break;
    case "reject":
        $result = reject_anggota_row($kode, $alasan);
        echo $result;
        break;
    case "hapus":
        $result = delete_table_row($table, $kode);
        echo $result;
        break;
    case "tampil":
        $result = tampil_table_row($table, $kode);
        echo $result;
        break;
};

mysqli_close( $conn );

function accept_anggota_row($table_id) {
    global $conn;
    $query = "INSERT INTO pengguna_tbl (NO, kode_auk, NIP, user_login, user_pass, nama_lengkap, email, no_telp)
        SELECT NULL, kode_auk, NIP, kode_auk, password, nama_lengkap, email, no_telp
        FROM anggota_tbl
        WHERE kode_auk = '$table_id'";

    $result = $conn->get_sql_exec( $query );
    $rows = json_decode( $result, true );

    if ( count( $rows ) > 0 ) {
        $result = $conn->get_sql_exec( "UPDATE anggota_tbl SET status='1' WHERE kode_auk = '$table_id'" );
        return true;
    } else
      return false;
};

function reject_anggota_row($table_id, $alasan) {
    global $conn;
    $query = "INSERT INTO ditolak_tbl (NO,
                                  kode_auk,
                                  alasan)
                          VALUES (NULL,
                                  '$table_id',
                                  '$alasan')";

    if ( $req = mysqli_query( $conn, $query ) ) {
        return true;
    } else
      return false;
};

function delete_table_row($table_name, $table_id) {
		global $conn;
		$query = "DELETE FROM $table_name WHERE kode_auk = '$table_id'";
		if ($req = mysqli_query( $conn, $query ) ) {
        if ( $table_name == "anggota_tbl" ) rmrf( "../images/" . $table_id );
	     	return true;
		} else
		  return false;
};

function tampil_table_row($table_name, $table_id) {
    global $conn;
    $rows = array();
    // Get User Details
    $query = "SELECT * FROM $table_name WHERE kode_auk = '$table_id'";
    $req = mysqli_query( $conn, $query );
    if ( mysqli_num_rows( $req ) > 0 ) {
      while( $row = mysqli_fetch_assoc( $req ) ) {
          $rows['kode_auk'] = $row['kode_auk'];
          $rows['nama_login'] = $row['user_login'];
          $rows['nama_lengkap'] = $row['nama_lengkap'];
          $rows['email'] = $row['email'];
          $rows['no_telp'] = $row['no_telp'];
          $rows['alamat'] = $row['alamat'];
          $images = unserialize($row['dokumen_arr']);
          $rows['profile_img'] = $images[0];
          $rows['resume_img'] = $images[1];
          $rows['doc1_img'] = $images[2];
          $rows['doc2_img'] = $images[3];
          $rows['doc3_img'] = $images[4];
          $rows['doc4_img'] = $images[5];
      };
      echo json_encode( array($rows), JSON_PRETTY_PRINT );
    } else {
      echo mysqli_error( $conn );
    };
};

/*
 * Remove the directory and its content (all files and subdirectories).
 * @param string $dir the directory name
 */
function rmrf($dir) {
    foreach (glob($dir) as $file) {
        if (is_dir($file)) {
            rmrf("$file/*");
            rmdir($file);
        } else {
            unlink($file);
        }
    }
};
