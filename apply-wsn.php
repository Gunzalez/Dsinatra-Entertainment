<?php
    // Enables error reporting at page level
    // error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();
    $sessionCode = $_SESSION["code"];
    $sentCode = getPostValue('captcha');
    if($sentCode != $sessionCode){
        $_SESSION["error"]='711'; // captcha
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
        $_SESSION["error"]='65'; // connection
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

    function redirect ($url) {
        header("Location: {$url}");
        exit;
    };

    function getPostValue($name) {
        return trim(addslashes($_POST[$name]));
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
    $sent = date("F jS, Y, g:i a");


	// Insert into database
	$sql = "INSERT INTO wsn (firstname, lastname, email, phone, mobile, dob, address1, address2, address3, height, weight, sent) VALUES ('$fn', '$ln', '$email', '$phone', '$mobile', '$dob', '$add1', '$add2', '$add3', '$height', '$weight', '$sent')";

    //echo $sql;
	mysqli_query($con, $sql);
//    if (!mysqli_query($con, $sql)) {
//        printf("Error: %s\n", mysqli_error($con));
//    }
	
	// Create email
    //$mailto = "rob@twelvenoon.co.uk";
    //$mailto = "gunzalez@gmail.com";
    //$mailto = "eva3lazing@gmail.com";
    $mailto = "info@dsinatraent.com";

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

    $randomString = generateRandomString();

    if (!empty($_FILES['headshot']['tmp_name'])) {
        $img = new MFC_Image();

        if (!empty($fn) && !empty($ln)) {
            $filename = $fn.'_'.$ln.'_headshot_'.$randomString;
        } else {
            $filename = $_FILES['headshot']['name'];
        }
        $msg = $img->upload_image ('Image', 'headshot', $path, $filename);
        if (empty($msg)) {
            if (!$img->resize_image (500, 500, $path)) {
                $_SESSION["error"]='500'; // headshot imagery 1
                redirect('error.php');
            }
        } else {
            $_SESSION["error"]='500'; // headshot imagery 1
            redirect('error.php');
        }
    }

    if (is_file($path.$img->image_src)) {
        $mail->AddAttachment($path.$img->image_src);
    }


    if (!empty($_FILES['swimwear']['tmp_name'])) {
        $img = new MFC_Image();

        if (!empty($fn) && !empty($ln)) {
            $filename = $fn.'_'.$ln.'_swimwear_'.$randomString;
        } else {
            $filename = $_FILES['swimwear']['name'];
        }
        $msg = $img->upload_image ('Image', 'swimwear', $path, $filename);
        if (empty($msg)) {
            if (!$img->resize_image (500, 500, $path)) {
                $_SESSION["error"]='400';  // swimwear
                redirect('error.php');
            }
        } else {
            $_SESSION["error"]='swimwear2';  // swimwear 2
            redirect('error.php');
        }
    }

    if (is_file($path.$img->image_src)) {
        $mail->AddAttachment($path.$img->image_src);
    }


    if (!empty($_FILES['eveninggown']['tmp_name'])) {
        $img = new MFC_Image();

        if (!empty($fn) && !empty($ln)) {
            $filename = $fn.'_'.$ln.'_evening_gown_'.$randomString;
        } else {
            $filename = $_FILES['eveninggown']['name'];
        }
        $msg = $img->upload_image ('Image', 'eveninggown', $path, $filename);
        if (empty($msg)) {
            if (!$img->resize_image (500, 500, $path)) {
                $_SESSION["error"]='300';  // evening gown
                redirect('error.php');
            }
        } else {
            $_SESSION["error"]='300';  // evening gown 2
            redirect('error.php');
        }
    }
	
	if (is_file($path.$img->image_src)) {
		$mail->AddAttachment($path.$img->image_src);
	}
	
	
	if (!$mail->Send()) {
        $_SESSION["error"]='111'; // email error $mail->ErrorInfo
		redirect('error.php');
		//echo $mail->ErrorInfo;
	}

    redirect('thanks.php');

?>

