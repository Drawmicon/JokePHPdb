<?php

//variables
$host = "localhost";
$username = "root";
$user_pass = "root";
$database_in_use="test";
$port = 8889;

//link to database
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use, $port);

//if link is invalid, show error
if ($mysqli->connect_errno) 
{
	echo "Failed to connect to MYSQL: (".$mysqli->connect_errno .") ". $mysqli->connect_error;
}
else{echo "Connection Established<br>";}

//print/echo link information
echo "Host information: " . $mysqli->host_info . "<br><br>";

?>