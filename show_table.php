<input type="text" class="form-control" name="username" onkeyup="if (/[^|a-z0-9]+/g.test(this.value)) this.value = this.value.replace(/[^|a-z0-9]+/g,'')">

<?php
error_reporting(0);
require('./config/db_config.php');
require('./scripts/functions_lib.php');

$connect_db = getConnection();

tampil_table_row2('pengguna_tbl', '120220004');

function tampil_table_row1($table_name, $table_id) {
    global $conn;
    // Get User Details
    $query = "SELECT kode_auk, nama_lengkap, email, no_telp, dokumen_arr, tgl_register FROM $table_name WHERE kode_auk = '$table_id'";
    $req = mysqli_query( $conn, $query );
    if ( mysqli_num_rows( $req ) > 0 ) {
      $rows = mysqli_fetch_all( $req, MYSQLI_ASSOC );
      echo json_encode( $rows, JSON_PRETTY_PRINT );
    } else {
      echo mysqli_error( $conn );
    }
};

function tampil_table_row2($table_name, $table_id) {
    global $conn;
    // Get User Details
    $query = "SELECT * FROM $table_name WHERE kode_auk = '$table_id'";
    $req = mysqli_query( $conn, $query );
    if ( mysqli_num_rows( $req ) > 0 ) {
      // $rows = mysqli_fetch_all( $req, MYSQLI_ASSOC );
      $rows = array();
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
      }
      echo json_encode( array($rows), JSON_PRETTY_PRINT );
    } else {
      echo mysqli_error( $conn );
    }
};
