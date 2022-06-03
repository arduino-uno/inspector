<?php
error_reporting(0);
require('../config/db_config.php');
require('../scripts/functions_lib.php');

$connect_db = getConnection();

if(isset($_POST['submit']))
{
     $no_urut = isset( $_POST['no_urut'] ) ? filter_var( $_POST['no_urut'], FILTER_SANITIZE_STRING ) : '';
     $kode_auk = isset( $_POST['kode_auk'] ) ? filter_var( $_POST['kode_auk'], FILTER_SANITIZE_STRING ) : '';
     $tipe_auk = isset( $_POST['tipe_auk'] ) ? filter_var( $_POST['tipe_auk'], FILTER_SANITIZE_STRING ) : '';
     $NIP = isset( $_POST['NIP'] ) ? filter_var( $_POST['NIP'], FILTER_SANITIZE_STRING ) : '';
     $nama_lengkap = isset( $_POST['nama_lengkap'] ) ? filter_var( $_POST['nama_lengkap'], FILTER_SANITIZE_STRING ) : '';
     $email =  isset( $_POST['email'] ) ? filter_var( $_POST['email'], FILTER_SANITIZE_STRING ) : '';
     $no_telp = isset( $_POST['no_telp'] ) ? filter_var( $_POST['no_telp'], FILTER_SANITIZE_STRING ) : '';
     $password = isset( $_POST['password'] ) ? filter_var( $_POST['password'], FILTER_SANITIZE_STRING ) : '';
     $kelamin = isset( $_POST['kelamin'] ) ? filter_var( $_POST['kelamin'], FILTER_SANITIZE_STRING ) : '';
     $tempat_lahir = isset( $_POST['tempat_lahir'] ) ? filter_var( $_POST['tempat_lahir'], FILTER_SANITIZE_STRING ) : '';
     $tgl_lahir = isset( $_POST['tgl_lahir'] ) ? filter_var( $_POST['tgl_lahir'], FILTER_SANITIZE_STRING ) : '';
     $nama_pemeriksa = isset( $_POST['nama_pemeriksa'] ) ? filter_var( $_POST['nama_pemeriksa'], FILTER_SANITIZE_STRING ) : '';
     $tgl_periksa = isset( $_POST['tgl_periksa'] ) ? filter_var( $_POST['tgl_periksa'], FILTER_SANITIZE_STRING ) : '';

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
                                    '$NIP',
                                    '$nama_lengkap',
                                    '$email',
                                    '$no_telp',
                                    '$password',
                                    '$kelamin',
                                    '$tempat_lahir',
                                    '$tgl_lahir',
                                    '$nama_pemeriksa',
                                    '$tgl_periksa',
                                    '')";

     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";

        session_start();
  			$_SESSION['message'] = "New record has been added successfully !";
        header('location: ../media.php?module=dashboard');

     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);

        session_start();
  			$_SESSION['message'] = "Error: " . $sql . ":-" . mysqli_error($conn);
        header('location: ../media.php?module=form-registrasi');

     }
     mysqli_close($conn);

}
