<?php

// Stop robots and spammers, I hope, yikes
if (empty($_POST["email"])){
	header("Location: error.php?1");
	exit;
}	
	
// Stop robots and spammers, I hope, yikes
if ($_SERVER['HTTP_REFERER'] != "http://www.dsinatraent.com/about.php"){
	header("Location: error.php?2");
	exit;
}

$subject = "From D.Sinatra Website";
# $mailto = "gunzalez@gmail.com";
$mailto = "info@dsinatraent.com";
# $mailto = "gunzalez@hotmail.com";

// incoming variables are used to make up the message 
$yourmessage  = "Date sent: " . date("F jS, Y, g:i a") . "\n";
$yourmessage .= "------------------------------------" . "\n\n";
$yourmessage .= "Name: " . addslashes($_POST["name"]) . "\n"; 
$yourmessage .= "Email address: " . addslashes($_POST["email"]) . "\n\n";
 
$yourmessage .= "Message: \n" . wordwrap(addslashes($_POST["message"]), 60) . "\n\n";
if	(isset($_POST["MailingList"])){
	$yourmessage .= "========" . "\n";
	$yourmessage .= "Mailing List: Yes, please." . "\n\n";
}


//creates a line for the end of email text
$yourmessage .= "\n";
$yourmessage .= "------------------------------------" . "\n";
$yourmessage .= "-end of file-";

$from = addslashes($_POST["email"]);
$fromName = addslashes($_POST["name"]);
$headers = "From: {$fromName} <{$from}>\n";


if (mail($mailto, $subject, $yourmessage, $headers)) {
  $returnURL = "index.php";
}
else {
  $returnURL = "error.php?3";
}

header("Location: {$returnURL}");
exit;
?>