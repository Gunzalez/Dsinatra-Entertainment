<?php
$dbhost = 'cust-mysql-123-07'; // your database server's IP address
$dbuser = 'uds_1186030_0001'; // the database username
$dbpass = 'W3stafrica'; // the database password
$dbname = 'dsinatraentcom_1186030_db1'; // the database name

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
};
?>
