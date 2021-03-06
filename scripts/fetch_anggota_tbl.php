<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_datatables_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Class_DataTables_CRUD();
$conn->getConnection();

$output = array();
$rows = Array();

$query = 'SELECT kode_auk, tgl_register, NIP, nama_lengkap, email FROM anggota_tbl ';

  if ( isset( $_POST["search"]["value"] ) ) {
    $query .= 'WHERE kode_auk NOT IN (SELECT a.kode_auk FROM pengguna_tbl a) AND kode_auk NOT IN (SELECT b.kode_auk FROM ditolak_tbl b) ';
    $query .= 'AND nama_lengkap LIKE "%'.$_POST["search"]["value"].'%" ';
  	// $query .= 'OR email LIKE "%'.$_POST["search"]["value"].'%" ';
  }

  if ( isset( $_POST["order"] ) ) {
  	$query .= 'ORDER BY kode_auk AND '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
  } else {
  	$query .= 'GROUP BY kode_auk ASC ';
  }

  if ( isset( $_POST["length"] ) && $_POST["length"] != -1 ) {
  	$query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
  }

$result = $conn->get_sql_exec( $query );
$rows = json_decode( $result, true );

  $i = 1;
	foreach( $rows as $row ) {

		$sub_array = array();
		$sub_array[] = $i;
    $sub_array[] = $row["kode_auk"];
    $sub_array[] = $row["tgl_register"];
		$sub_array[] = $row["NIP"];
		$sub_array[] = $row["nama_lengkap"];
		$sub_array[] = $row["email"];

		$data[] = $sub_array;
    $i++;
	}

  $filtered_rows = count( $rows );
  $rows_cnt = $conn->get_total_all_records( "anggota_tbl" );

	$output = array(
		"draw"						=>	( isset( $_POST["draw"] ) ? intval( $_POST["draw"] ) : 0 ),
		"recordsTotal"		=> 	$filtered_rows,
		"recordsFiltered"	=>	$rows_cnt,
		"data"						=>	$data
	);

  echo json_encode( $output, JSON_PRETTY_PRINT );
