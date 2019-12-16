 <head>

</head>

<br><br>
<!-- Add link above style formatting, otherwise it gets included in the formatting-->
<a href="index.php">Return to Main Page</a>
<br><br><a href="search_all_jokes.php">All Jokes</a><br><br>

<?php

//start using session variables
session_start();

error_reporting(E_ALL);
ini_set('display_errors',1);

//connection to database php code in this file
include "db_connection.php";

//variables for inputted values
$username = addslashes($_POST["username"]);//$_GET shows data in web address
$password = addslashes($_POST["password"]);//$_POST does not show data

$hash = md5($password);

//output statement in html
//echo "<h2> Login </h2>";
//SQL command, take information from columns named here from the table "joke_table"

//change variable to '?'
$stmt = $mysqli->prepare("SELECT id, username, password FROM users where username = ? AND password = ? ");
//represent 2 string variables using 'ss'
//$stmt->bind_param("ss",$username,$password);
$stmt->bind_param("ss",$username,$hash);
$stmt->execute();
$stmt->store_result();
echo "<pre>";
print_r($stmt);
echo "</pre>";
$stmt->bind_result($userid, $uname, $pw);

//$sql = "SELECT id, username, password FROM users where username = '$username' AND password = '$password'";
//echo "<br><b>".$sql."</b><br>";
//send this variable data $sql to database, through connection
//$result = $mysqli->query($sql);

/*
echo "<pre>";
print_r($result);
echo "</pre>";
*/

//if number of rows from sql command is more than 0, display information as a string
if ($stmt->num_rows > 0)
{
	//$row = $result->fetch_assoc();
	$row = $stmt->fetch();
	
	//set userid as value from id from table row
	$userid = $row['id'];
	echo "Login Successful <br><br> USER #".$userid."<br>";
	echo "Login Successful CHECK NAME<br><br> USER #".$row['username'];
	echo "Login Successful CHECK ID<br><br> USER #".$row['id'];
	//set session variables as the values from the other variables
	$_SESSION['username']=$uname;
	$_SESSION['userid']=$userid;
}
else //if no rows selected, state 0 results
{
    echo "Account Does Not Exist";
	//instantiate session variable as nothing
	$_SESSION = [];
	//end session
	//session_destroy();
}

echo "<pre>";
print_r($_SESSION);

echo "</pre>";

echo "<br><br><a href=\"index.php\">Main Page</a>	";

?>

