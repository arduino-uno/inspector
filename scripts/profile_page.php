<?php
error_reporting(0);
require('../config/db_config.php');
require('../scripts/functions_lib.php');

$connect_db = getConnection();

if ( isset( $_POST ) ) {

      $kode_auk = isset( $_POST['kode_auk'] ) ? filter_var( $_POST['kode_auk'], FILTER_SANITIZE_STRING ) : '';
      $user_login = isset( $_POST['nama_login'] ) ? filter_var( $_POST['nama_login'], FILTER_SANITIZE_STRING ) : '';
      $user_pass = isset( $_POST['password'] ) ? filter_var( $_POST['password'], FILTER_SANITIZE_STRING ) : '';
      $nama_lengkap = isset( $_POST['nama_lengkap'] ) ? filter_var( $_POST['nama_lengkap'], FILTER_SANITIZE_STRING ) : '';
      $email =  isset( $_POST['email'] ) ? filter_var( $_POST['email'], FILTER_SANITIZE_STRING ) : '';
      $no_telp = isset( $_POST['no_telp'] ) ? filter_var( $_POST['no_telp'], FILTER_SANITIZE_STRING ) : '';
      $alamat = isset( $_POST['alamat'] ) ? filter_var( $_POST['alamat'], FILTER_SANITIZE_STRING ) : '';

      if ( !empty( $user_pass ) ) {
          $enc_password = MD5($user_pass);  // encrypted
          $query = "UPDATE pengguna_tbl SET user_login = '$user_login',
                                     user_pass = $enc_password,
                                     nama_lengkap = '$nama_lengkap',
                                     email = '$email',
                                     no_telp = '$no_telp',
                                     alamat = '$alamat'
                               WHERE kode_auk = '$kode_auk'";
      } else {
          $query = "UPDATE pengguna_tbl SET user_login = '$user_login',
                                     nama_lengkap = '$nama_lengkap',
                                     email = '$email',
                                     no_telp = '$no_telp',
                                     alamat = '$alamat'
                               WHERE kode_auk='$kode_auk'";
      };

      if ( mysqli_query( $conn, $query ) ) {
          echo "true";
      } else {
          // echo "Error description: " . mysqli_error($conn);
          echo "false";
      };

      mysqli_close($conn);
};
exit();
