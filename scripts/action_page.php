<?php
// error_reporting(0);
require('../config/db_config.php');
require('../scripts/functions_lib.php');

// Increase Maximum Upload File Size
@ini_set( 'upload_max_filesize' , '128M' ); //set this to a value > than your backup
@ini_set( 'post_max_size', '128M'); //set this to a value > than your backup
@ini_set( 'memory_limit', '256M' ); //set this to a value > than your backup
@ini_set( 'max_execution_time', '300' ); //set this to 0 (infinite)
@ini_set( 'max_input_time', '300' );

$connect_db = getConnection();

$imgArray = array();

if ( isset( $_POST ) && isset( $_FILES ) ) {

     $no_urut = isset( $_POST['no_urut'] ) ? filter_var( $_POST['no_urut'], FILTER_SANITIZE_STRING ) : '';
     $kode_auk = isset( $_POST['kode_auk'] ) ? filter_var( $_POST['kode_auk'], FILTER_SANITIZE_STRING ) : '';
     $tipe_auk = isset( $_POST['tipe_auk'] ) ? filter_var( $_POST['tipe_auk'], FILTER_SANITIZE_STRING ) : '';
     $txt_NIP = isset( $_POST['txt_NIP'] ) ? filter_var( $_POST['txt_NIP'], FILTER_SANITIZE_STRING ) : '';
     $nama_lengkap = isset( $_POST['nama_lengkap'] ) ? filter_var( $_POST['nama_lengkap'], FILTER_SANITIZE_STRING ) : '';
     $email =  isset( $_POST['email'] ) ? filter_var( $_POST['email'], FILTER_SANITIZE_STRING ) : '';
     $no_telp = isset( $_POST['no_telp'] ) ? filter_var( $_POST['no_telp'], FILTER_SANITIZE_STRING ) : '';
     $password = isset( $_POST['password'] ) ? filter_var( $_POST['password'], FILTER_SANITIZE_STRING ) : '';
     $kelamin = isset( $_POST['kelamin'] ) ? filter_var( $_POST['kelamin'], FILTER_SANITIZE_STRING ) : '';
     $tempat_lahir = isset( $_POST['tempat_lahir'] ) ? filter_var( $_POST['tempat_lahir'], FILTER_SANITIZE_STRING ) : '';
     $tgl_lahir = isset( $_POST['tgl_lahir'] ) ? filter_var( $_POST['tgl_lahir'], FILTER_SANITIZE_STRING ) : '';
     $nama_pemeriksa = isset( $_POST['nama_pemeriksa'] ) ? filter_var( $_POST['nama_pemeriksa'], FILTER_SANITIZE_STRING ) : '';
     $tgl_periksa = isset( $_POST['tgl_periksa'] ) ? filter_var( $_POST['tgl_periksa'], FILTER_SANITIZE_STRING ) : '';

     for ( $x = 1; $x <= 5; $x++ ) {
         $tmp_file = $_FILES["myFile" . $x]['tmp_name']; //temporary file
         $nama_file = $_FILES["myFile" . $x]['name'];
         $tipe_file = $_FILES["myFile" . $x]['type'];
         $uk_file = $_FILES["myFile" . $x]['size']; //ukuran file
         // populate images into array
         $imgArray[] = $nama_file;

         $dir_tujuan = "../images/" . $kode_auk; //direktori tujuan

         if ( !is_dir( '../images/' . $kode_auk ) ) {
            mkdir( '../images/' . $kode_auk, 0755, true );
         }

         if ( !empty( $tmp_file ) ){
            $move = move_uploaded_file( $tmp_file, $dir_tujuan . "/" . $nama_file );
         }
     }

     $dokumen_arr = serialize($imgArray);
     echo $dokumen_arr;

     $sql = "INSERT INTO `anggota_tbl`(`NO`,
                                  `no_urut`,
                                  `kode_auk`,
                                  `tipe_auk`,
                                  `NIP`,
                                  `nama_lengkap`,
                                  `email`,
                                  `no_telp`,
                                  `password`,
                                  `kelamin`,
                                  `tempat_lahir`,
                                  `tgl_lahir`,
                                  `nama_pemeriksa`,
                                  `tgl_periksa`,
                                  `dokumen_arr`)
                            VALUES ( NULL,
                                    '$no_urut',
                                    '$kode_auk',
                                    '$tipe_auk',
                                    '$txt_NIP',
                                    '$nama_lengkap',
                                    '$email',
                                    '$no_telp',
                                    '$password',
                                    '$kelamin',
                                    '$tempat_lahir',
                                    '$tgl_lahir',
                                    '$nama_pemeriksa',
                                    '$tgl_periksa',
                                    '$dokumen_arr')";

     if ( mysqli_query($conn, $sql) ) {
        echo "true";
     } else {
        // echo "Error description: " . mysqli_error($conn);
        echo "false";
     }

     mysqli_close($conn);
} else {
  echo "false";
};
