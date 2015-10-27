<?php
$dbhost = 'cust-mysql-123-07'; // your database server's IP address
$dbuser = 'uds_1186030_0001'; // the database username
$dbpass = 'W3stafrica'; // the database password
$dbname = 'dsinatraentcom_1186030_db1'; // the database name

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
};

function getPostValue($name){
	$returnValue = trim(addslashes($_POST[$name]));	
	return $returnValue;
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

if($fn == ''){
	header('Location: http://www.dsinatraent.com/error.php');
};
if($email == ''){
	header('Location: http://www.dsinatraent.com/error.php');
};


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
$subject = "Queen Globe Application";
$mailto = "info@dsinatraent.com";
// $mailto = "rob@twelvenoon.co.uk";
// $mailto = "gunzalez@hotmail.com";


$yourmessage  = "Date sent: " . date("F jS, Y, g:i a") . "\n";
$yourmessage .= "--" . "\n\n";
$yourmessage = "Personal details" . "\n";
$yourmessage .= "------------------------------------------------------------------------" . "\n\n";
$yourmessage .= "First name: $fn" . "\n";
$yourmessage .= "Last name: $ln" . "\n";
$yourmessage .= "Email address: $email" . "\n";
$yourmessage .= "Phone no.: $phone" . "\n";
$yourmessage .= "Address Line 1: $add1" . "\n";
$yourmessage .= "Address Line 2: $add2" . "\n";
$yourmessage .= "Address Line 3: $add3" . "\n";
$yourmessage .= "Date Of Birth: $dob" . "\n";
$yourmessage .= "Country of Birth: $country" . "\n";
$yourmessage .= "State of Origin: $state" . "\n";
$yourmessage .= "Qualifications: $qualy" . "\n";
$yourmessage .= "Job: $job" . "\n\n";
$yourmessage .= "---" . "\n\n";

$yourmessage .= "Physical details" . "\n";
$yourmessage .= "------------------------------------------------------------------------" . "\n\n";
$yourmessage .= "Dress size: $dress" . "\n";
$yourmessage .= "Height: $height" . "\n";
$yourmessage .= "Weight: $weight" . "\n";
$yourmessage .= "Bust: $bust" . "\n";
$yourmessage .= "Hips: $hips" . "\n";
$yourmessage .= "Waist: $waist" . "\n";
$yourmessage .= "Head: $head" . "\n";
$yourmessage .= "Shoe size: $shoe" . "\n";
$yourmessage .= "Hair: $hair" . "\n";
$yourmessage .= "Eye colour: $eyes" . "\n";
$yourmessage .= "Hat size: $hat" . "\n";
$yourmessage .= "---" . "\n\n";

$yourmessage .= "Personal preferences" . "\n";
$yourmessage .= "------------------------------------------------------------------------" . "\n";
$yourmessage .= "3 top food types?: $food \n";
$yourmessage .= "3 top genres in music: $music \n";
$yourmessage .= "Hobbies/Pastime: $hobbies \n";
$yourmessage .= "Why Queen Globe: $why \n";
$yourmessage .= "If President: $president \n";
$yourmessage .= "Marks/Scars/Tattos: $marks \n";
$yourmessage .= "How did you hear about Queen Globe: $how \n";

$yourmessage .= "\n";
$yourmessage .= "------------------------------------" . "\n";
$yourmessage .= "-end of file-\n\n";

$from = $email;
$fromName = $fn . ' ' . $ln;
$headers = "From: {$fn} {$ln} <{$email}>\n";
$headers.= "Reply-To: {$email}\n";
$headers.= "Return-Path: {$email}\n";

if (mail($mailto, $subject, $yourmessage, $headers)) {
  header('Location: http://www.dsinatraent.com/thanks.php');
} else {
  header('Location: http://www.dsinatraent.com/error.php');
};

exit();
?>

