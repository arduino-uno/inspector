<?php
error_reporting(0);
// PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../phpmailer/PHPMailer.php";
require_once "../phpmailer/Exception.php";
require_once "../phpmailer/OAuth.php";
require_once "../phpmailer/POP3.php";
require_once "../phpmailer/SMTP.php";
// Mail SMTP Configuration
require_once "../config/mail_config.php";


if ( isset( $_POST ) ) {
    $fullname = isset( $_POST['nama_lengkap'] ) ? filter_var( $_POST['nama_lengkap'], FILTER_SANITIZE_STRING ) : '';
    $email =  isset( $_POST['email'] ) ? filter_var( $_POST['email'], FILTER_SANITIZE_STRING ) : '';
    $subject = isset( $_POST['subject'] ) ? filter_var( $_POST['subject'], FILTER_SANITIZE_STRING ) : '';
    $message = isset( $_POST['message'] ) ? filter_var( $_POST['message'], FILTER_SANITIZE_STRING ) : '';

    echo email_confimation( $fullname, $email, $subject, $message );
};

function email_confimation( $fullname, $email, $subject, $message ) {
		$mail = new PHPMailer;
		//Enable SMTP debugging.
		$mail->SMTPDebug = 0; // set 3
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();
		//Set SMTP host name
		$mail->Host = SMTP_SERVER; //host mail server
		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;
		//Provide username and password
		$mail->Username = SMTP_USERNAME;   //nama-email smtp
		$mail->Password = SMTP_PASSWORD;           //password email smtp
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "tls";
		//Set TCP port to connect to
		$mail->Port = SMTP_PORT;

		$mail->From = MAIL_ADMIN_ADDRESS; //email pengirim
		$mail->FromName = MAIL_ADMIN_NAME; //nama pengirim

		$mail->addAddress( $email, $fullname ); //email penerima

		$mail->isHTML(true);

		$mail->Subject = $subject; //subject
	  $mail->Body    = $message; //isi email
	  $mail->AltBody = "This is a plain-text message body"; //body email (optional)

		if( !$mail->send() ) {
		    return "PHPMailer Error: " . $mail->ErrorInfo;
		} else {
		    return "Message has been sent successfully";
		}
};
