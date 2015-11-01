<?php
	include 'includes/mfc_image_gd.php';
	include 'includes/class.phpmailer.php';


	$path = 'images/applications/';
		
	$dbhost = 'cust-mysql-123-07'; // your database server's IP address
	$dbuser = 'uds_1186030_0001'; // the database username
	$dbpass = 'W3stafrica'; // the database password
	$dbname = 'dsinatraentcom_1186030_db1'; // the database name
	
	$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if (mysqli_connect_errno()){
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
	$phone = getPostValue('phone');
	$email = getPostValue('email');
	$add1 = getPostValue('address1');
	$add2 = getPostValue('address2');
	$add3 = getPostValue('address3');
	$dob = getPostValue('date_day') . "/" . getPostValue('date_month') . "/" . getPostValue('date_year');
	$country = getPostValue('country');
	$qualy = getPostValue('qualifications');
	$job = getPostValue('job');
	$state = getPostValue('state'); 
	
	
	if (!empty($_FILES['file']['tmp_name'])) {
		$img = new MFC_Image();
		
		if (!empty($fn) && !empty($ln)) {
			$filename = $fn.'_'.$ln.'_'.generateRandomString();
		}
		else {
			$filename = $_FILES['file']['name'];
		}
		
		$msg = $img->upload_image ('Image', 'file', $path, $filename);
		
		if (empty($msg)) {
			if (!$img->resize_image (500, 500, $path)) {
				redirect('error.php');
			}
		}
		else {
			redirect('error.php');
		}
	}
	
								
							
	if(empty($fn)){
		redirect('error.php');
	}
	else if (empty($email)){
		redirect('error.php');
	}
	
	// uploaded in name
	
	// Physical variables
	$dress = getPostValue('dress');
	$height = getPostValue('height');
	$weight = getPostValue('weight');
	$bust = getPostValue('bust');
	$hips = getPostValue('hips');
	$waist = getPostValue('waist');
	$head = getPostValue('head');
	$shoe = getPostValue('shoe');
	$hair = getPostValue('hair');
	$eyes = getPostValue('eyes');
	$hat = getPostValue('hat');
	
	// Preferences
	$food = getPostValue('food');
	$music = getPostValue('music');
	$hobbies = getPostValue('hobbies');
	$why = getPostValue('why');
	$president = getPostValue('president');
	$marks = getPostValue('marks');
	$how = getPostValue('how');
	
	
	// Insert into databse
	$sql = "INSERT INTO applications (firstname, lastname, phone, email, address1, address2, address3, dob, country, qualifications, job, state, dress, height, weight, bust, hips, waist, head, shoe, hair, eyes, hat, food, music, hobbies, why, president, marks, how) VALUES ('$fn', '$ln', '$phone', '$email', '$add1', '$add2', '$add3', '$dob', '$country', '$qualy', '$job', '$state', '$dress', '$height', '$weight', '$bust', '$hips', '$waist', '$head', '$shoe', '$hair', '$eyes', '$hat', '$food', '$music', '$hobbies', '$why', '$president', '$marks', '$how')";
	mysqli_query($con, $sql);
	
	
	// Create email
	//$mailto = "rob@twelvenoon.co.uk";
	//$mailto = "gunzalez@hotmail.com";
	$mailto = "info@dsinatraent.com";
	
	$yourmessage  = "<table cellspacing=\"10\" cellpadding=\"0\" border=\"0\">";
	$yourmessage .= "<tr><td>Date sent:</td><td>" . date("F jS, Y, g:i a") . "</td></tr>";
	
	$yourmessage .= "<tr><td colspan=\"2\"><strong>Personal details</strong></td></tr>";
	$yourmessage .= "<tr><td>First name:</td><td>{$fn}</td></tr>";
	$yourmessage .= "<tr><td>Last name:</td><td>{$ln}</td></tr>";
	$yourmessage .= "<tr><td>Email address:</td><td>{$email}</td></tr>";
	$yourmessage .= "<tr><td>Phone no.:</td><td>{$phone}</td></tr>";
	$yourmessage .= "<tr><td>Address Line 1:</td><td>{$add1}</td></tr>";
	$yourmessage .= "<tr><td>Address Line 2:</td><td>{$add2}</td></tr>";
	$yourmessage .= "<tr><td>Address Line 3:</td><td>{$add3}</td></tr>";
	$yourmessage .= "<tr><td>Date Of Birth:</td><td>{$dob}</td></tr>";
	$yourmessage .= "<tr><td>Country of Birth:</td><td>{$country}</td></tr>";
	$yourmessage .= "<tr><td>State of Origin:</td><td>{$state}</td></tr>";
	$yourmessage .= "<tr><td>Qualifications:</td><td>{$qualy}</td></tr>";
	$yourmessage .= "<tr><td>Job:</td><td>{$job}</td></tr>";
	
	$yourmessage .= "<tr><td colspan=\"2\"><strong>Physical details</strong></td></tr>";
	$yourmessage .= "<tr><td>Dress size:</td><td>{$dress}</td></tr>";
	$yourmessage .= "<tr><td>Height:</td><td>{$height}</td></tr>";
	$yourmessage .= "<tr><td>Weight:</td><td>{$weight}</td></tr>";
	$yourmessage .= "<tr><td>Bust:</td><td>{$bust}</td></tr>";
	$yourmessage .= "<tr><td>Hips:</td><td>{$hips}</td></tr>";
	$yourmessage .= "<tr><td>Waist:</td><td>{$waist}</td></tr>";
	$yourmessage .= "<tr><td>Head:</td><td>{$head}</td></tr>";
	$yourmessage .= "<tr><td>Shoe size:</td><td>{$shoe}</td></tr>";
	$yourmessage .= "<tr><td>Hair:</td><td>{$hair}</td></tr>";
	$yourmessage .= "<tr><td>Eye colour:</td><td>{$eyes}</td></tr>";
	$yourmessage .= "<tr><td>Hat size:</td><td>{$hat}</td></tr>";
	
	$yourmessage .= "<tr><td colspan=\"2\"><strong>Personal preferences</strong></td></tr>";
	$yourmessage .= "<tr><td>3 top food types?:</td><td>{$food}</td></tr>";

	$yourmessage .= "<tr><td>3 top genres in music:</td><td>{$music}</td></tr>";
	$yourmessage .= "<tr><td>Hobbies/Pastime:</td><td>{$hobbies}</td></tr>";
	$yourmessage .= "<tr><td>Why Queen Globe:</td><td>{$why}</td></tr>";
	$yourmessage .= "<tr><td>If President:</td><td>{$president}</td></tr>";
	$yourmessage .= "<tr><td>Marks/Scars/Tattos:</td><td>{$marks}</td></tr>";
	$yourmessage .= "<tr><td>How did you hear about Queen Globe:</td><td>{$how}</td></tr>";

	$yourmessage .= "</table>";
	

	$mail = new PHPMailer();
	
	$mail->IsSendmail();
	
	$mail->SetFrom($email, "{$fn} {$ln}");
	$mail->AddReplyTo($email,"{$fn} {$ln}");
	$mail->AddAddress($mailto);		//Set who the message is to be sent to
	$mail->Subject = "Queen Globe Application";
	
	$mail->MsgHTML($yourmessage);
	//$mail->Body = $yourmessage;
	
	if (is_file($path.$img->image_src)) {
		$mail->AddAttachment($path.$img->image_src);
	}
	
	
	if (!$mail->Send()) {
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

