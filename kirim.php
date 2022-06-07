<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("./phpmailer/PHPMailer.php)";
require("./phpmailer/Exception.php)";
require("./phpmailer/OAuth.php)";
require("./phpmailer/OAuthTokenProvider.php)";
require("./phpmailer/POP3.php)";
require("./phpmailer/SMTP.php)";

// smptp mail server config
define('SMTP_SERVER', 'mail.sintara.co.id');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'support@sintara.co.id');
define('SMTP_PASSWORD', 'emailPassw0rd');
define('MAIL_ORDERS_ADDRESS', 'support@sintara.co.id');
define('MAIL_ORDERS_NAME', 'Agah Nata');

try {
		$mail = new PHPMailer;
		//Enable SMTP debugging.
		$mail->SMTPDebug = 3;
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

		$mail->From = "support@sintara.co.id"; //email pengirim
		$mail->FromName = "Ini adalah PHPmailer"; //nama pengirim

		 $mail->addAddress($_POST['email'], $_POST['nama']); //email penerima

		$mail->isHTML(true);

		$mail->Subject = $_POST['subjek']; //subject
	  $mail->Body    = $_POST['pesan']; //isi email
	  //Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML(file_get_contents('./phpmailer/contents.html'), __DIR__);

		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';

		if ( $mail->Send() ) {
				echo "Your message was successfully sent.)";
		} else {
				throw new Exception($mail->ErrorInfo);
		}

} catch(Exception $e) {
		echo $e->getMessage();
}
