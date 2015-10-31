<?php
$dbhost = 'cust-mysql-123-07'; // your database server's IP address
$dbuser = 'uds_1186030_0001'; // the database username
$dbpass = 'W3stafrica'; // the database password
$dbname = 'dsinatraentcom_1186030_db1'; // the database name

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
};

function getRealIpAddr(){
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
  //check ip from share internet
  {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  //to check ip is pass from proxy
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip=$_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}


// Get Users ip, and check
$ip = getRealIpAddr();
$visited = false;

$result = mysqli_query($con,"SELECT * FROM visitors");
while($row = mysqli_fetch_array($result)){
	if($ip == $row['ip']){
		$visited = true;
	};
};

// Add in new User ip
if(!$visited){
	mysqli_query($con, "INSERT INTO visitors (ip) VALUES ('$ip')");	
};

// Get total visits
$result = mysqli_query($con,"SELECT * FROM visitors");
$num_rows = mysqli_num_rows($result);


// write to screen
$num_rows = number_format($num_rows);
$value = $num_rows + 39463;
$countValue = intval(($value + 500) /1000);
echo $countValue .'K+';

// close connection
mysqli_close($con);
?>