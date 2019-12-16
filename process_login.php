<head>
</head>
<br><br>
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



echo "Logging in with username: ".$username." and password: ".$password."<br>";

//password_hash() does not work
$hash = md5($password);//no salt added
echo "<br>PASSWORD HASH: ".$hash."<br><br>";
//change variable to ?

//$stmt = $mysqli->prepare("SELECT id, username, password FROM users where username = ? AND password = ? ");
$stmt = $mysqli->prepare("SELECT id, username, password FROM users where username = ?");
//represent 2 string variables using 'ss'
//$stmt->bind_param("ss",$username,$password);
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->store_result();
//column results are added to these 3 variables
$stmt->bind_result($uid, $uname, $pw);


if($stmt->num_rows ==1)
{
	echo"Username Exists<br>";
	$stmt->fetch();
	if($hash == $pw)
	{
		echo "<br>Loggin Successful<br>";
		$_SESSION['username']=$uname;
		$_SESSION['userid']=$uid;
		
		echo "<br>Welcome back, ".$_SESSION['username']."<br>";
		
		exit;
	}
	else
	{
		$_SESSION=[];
		session_destroy();
	}
}
else
	{
		$_SESSION=[];
		session_destroy();
	}
	
	echo "Login Failed <br>";


/*
echo "<pre>";
print_r($stmt);
echo "</pre>";

//if number of rows from sql command is more than 0, display information as a string
if ($stmt->num_rows > 0)
{
	echo "Logged In<br><br>UID: ".$uid."<br>";
	echo "<br>UNAME: ".$uname."<br>";

	//set session variables as the values from the other variables
	$_SESSION['username']=$uname;
	$_SESSION['userid']=$uid;
}
else //if no rows selected, state 0 results
{
    echo "Account Does Not Exist";
	//instantiate session variable as nothing
	$_SESSION = [];
	//end session
	session_destroy();
	exit;
}

echo "<pre>";
print_r($_SESSION);

echo "</pre>";
*/
echo "<br><br><a href=\"index.php\">Main Page</a>	";

?>

