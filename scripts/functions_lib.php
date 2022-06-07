<?php

function getConnection() {
		global $conn;
		if ( !defined( 'DB_HOST' ) || !defined( 'DB_USERNAME' ) || !defined( 'DB_PASSWORD' ) || !defined( 'DB_DATABASE_NAME' ) )  {
			throw new Exception( "\"db_config.php\" file is required." );
		} else {
			$conn = new mysqli( DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME );
			if ( mysqli_connect_errno() ) throw new Exception( mysqli_comysqli_connect_error() );
		}
		return false;
};

function generate_reg_ID() {
		global $conn;
		$req = mysqli_query( $conn, "SELECT MAX( NO ) max_val FROM anggota_tbl WHERE 1" );
		$rows = mysqli_fetch_array( $req );
		if ( mysqli_num_rows( $req ) > 0 ) {
		    $inc_num = (int)$rows[0] + 1;
				$new_id = str_pad($inc_num, 4, '0', STR_PAD_LEFT);
				return $new_id;
		}
};

function email_confimation( $fullname, $email, $subject, $message ) {

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

    		$mail->From = MAIL_ADMIN_ADDRESS; //email pengirim
    		$mail->FromName = MAIL_ADMIN_NAME; //nama pengirim

    		$mail->addAddress( $email, $fullname ); //email penerima

    		$mail->isHTML(true);

    		$mail->Subject = $subject; //subject
    	  $mail->Body    = $message; //isi email
    	  //Read an HTML message body from an external file, convert referenced images to embedded,
    		//convert HTML into a basic plain-text alternative body
    		$mail->msgHTML(file_get_contents('./phpmailer/contents.html'), __DIR__);

    		//Replace the plain text body with one created manually
    		$mail->AltBody = 'This is a plain-text message body';

    		if ( $mail->Send() ) {
    				return "Your message was successfully sent.";
    		} else {
    				throw new Exception($mail->ErrorInfo);
    		}

    } catch(Exception $e) {
    		return $e->getMessage();
    }

};
