<?php

    session_start();
    $sessionCode = $_SESSION["code"];
    $sentCode = getPostValue('captcha');
    if($sentCode != $sessionCode){
        $_SESSION["error"]='captcha';
        redirect('error.php');
    }

	include 'includes/mfc_image_gd.php';
	include 'includes/class.phpmailer.php';

	$path = 'images/wsn-applications/';
		
	$dbhost = 'cust-mysql-123-07'; // your database server's IP address
	$dbuser = 'uds_1186030_0001'; // the database username
	$dbpass = 'W3stafrica'; // the database password
	$dbname = 'dsinatraentcom_1186030_db1'; // the database name
	
	$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if (mysqli_connect_errno()){
        $_SESSION["error"]='connection';
		redirect('error.php');
	};
	
	// function to generate random string
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		};
		return $randomString;
	};		
	
	// Collect variables
	$fn = getPostValue('firstname');
	$ln = getPostValue('lastname');
    $email = getPostValue('email');
	$phone = getPostValue('phone');
	$mobile = getPostValue('mobile');
    $dob = getPostValue('date_day') . "/" . getPostValue('date_month') . "/" . getPostValue('date_year');
	$add1 = getPostValue('address1');
	$add2 = getPostValue('address2');
	$add3 = getPostValue('address3');
    $height = getPostValue('height');
	$weight = getPostValue('weight');
	
	
	if (!empty($_FILES['headshot']['tmp_name'])) {
		$img = new MFC_Image();
		
		if (!empty($fn) && !empty($ln)) {
			$filename = $fn.'_'.$ln.'_'.generateRandomString();
		} else {
			$filename = $_FILES['headshot']['name'];
		}
		
		$msg = $img->upload_image ('Image', 'headshot', $path, $filename);
		
		if (empty($msg)) {
			if (!$img->resize_image (500, 500, $path)) {
                $_SESSION["error"]='upload';
				redirect('error.php');
			}
		} else {
            $_SESSION["error"]='upload2';
			redirect('error.php');
		}
	}

	// Insert into database
	$sql = "INSERT INTO wsn (firstname, lastname, email, phone, mobile, dob, address1, address2, address3, height, weight )
            VALUES ('$fn', '$ln', '$email', '$phone', '$mobile', '$dob', '$add1', '$add2', '$add3' '$height', '$weight')";
	mysqli_query($con, $sql);
	
	
	// Create email
    //$mailto = "rob@twelvenoon.co.uk";
	$mailto = "gunzalez@hotmail.com";
    //$mailto = "info@dsinatraent.com";
	
	$yourMessage  = "<table cellspacing=\"10\" cellpadding=\"0\" border=\"0\">";
	$yourMessage .= "<tr><td>Date sent:</td><td>" . date("F jS, Y, g:i a") . "</td></tr>";
	
	$yourMessage .= "<tr><td colspan=\"2\"><strong>Personal details</strong></td></tr>";
	$yourMessage .= "<tr><td>First name:</td><td>{$fn}</td></tr>";
	$yourMessage .= "<tr><td>Last name:</td><td>{$ln}</td></tr>";
    $yourMessage .= "<tr><td>Email address:</td><td>{$email}</td></tr>";
    $yourMessage .= "<tr><td>Phone no.:</td><td>{$phone}</td></tr>";
	$yourMessage .= "<tr><td>Mobile:</td><td>{$mobile}</td></tr>";
    $yourMessage .= "<tr><td>Date Of Birth:</td><td>{$dob}</td></tr>";
	$yourMessage .= "<tr><td>Address Line 1:</td><td>{$add1}</td></tr>";
	$yourMessage .= "<tr><td>Address Line 2:</td><td>{$add2}</td></tr>";
	$yourMessage .= "<tr><td>Address Line 3:</td><td>{$add3}</td></tr>";
	$yourMessage .= "<tr><td>Height:</td><td>{$height}</td></tr>";
	$yourMessage .= "<tr><td>Weight</td><td>{$weight}</td></tr>";

	$yourMessage .= "</table>";
	

	$mail = new PHPMailer();
	
	$mail->IsSendmail();
	
	$mail->SetFrom($email, "{$fn} {$ln}");
	$mail->AddReplyTo($email,"{$fn} {$ln}");
	$mail->AddAddress($mailto);		//Set who the message is to be sent to
	$mail->Subject = "World Supermodel Nigeria Application";
	
	$mail->MsgHTML($yourMessage);
	//$mail->Body = $yourMessage;
	
	if (is_file($path.$img->image_src)) {
		$mail->AddAttachment($path.$img->image_src);
	}
	
	
	if (!$mail->Send()) {
        $_SESSION["error"]='send';
		redirect('error.php');
		//echo $mail->ErrorInfo;		
	}
	
	redirect('thanks.php');
	


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	function redirect ($url) {	
		header("Location: {$url}");
		exit;
	}
	
	function getPostValue($name) {
		return trim(addslashes($_POST[$name]));	
	}
?>

