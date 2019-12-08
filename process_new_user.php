<?php
//inserts other code from the referenced file to this file
include "db_connection.php";

//variables for inputted data
$new_username = addslashes($_POST['username']);//$_GET -> $_POST
$new_password = addslashes($_POST['password']);//ADDSLASHES prevents special characters like quotes to affect input
$new_password1 = addslashes($_POST['password1']);

$hashed_password = md5($new_password);
//$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

echo "HASH: ".$hashed_password."\n";

//echo "<h2> Adding New User: ".$new_username." and Password: ".$new_password." </h2>";

//check if both inputted password variables are the same
if($new_password != $new_password1)
{
	//if not the same, stop with the rest of the page
	echo "Passwords Do Not Match. Try Again.<br><br>";
	echo "<a href=\"index.php\">Main Page</a>	";
	exit;
}

//requires at least 1 number in password variable
preg_match('/[0-9]+/',$new_password1, $matches);
if(sizeof($matches)==0)
{
	echo "Password must have at least one number";
	exit;
}

//requires at least 1 special character in password variable
preg_match('/[!@#$%^&]/',$new_password1, $matches);
if(sizeof($matches)==0)
{
	echo "Password must have at least one special character (i.e. !@#$%^&*)";
	exit;
}

if(strlen($new_password) < 8)
{
	echo "Password must be at least 8 characters long";
	exit;
	
}

//get all the users with the same exact username from database
$sql = "Select * From users where username = '$new_username'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

//if more than 0 results returned, then user already exist
if($result->num_rows>0)
{
	//State username is already chosen and exit from page
	echo "Username ".$new_username." Not Available <br>";
	echo "User Name Is Already Taken";
	echo "<br><br><a href=\"index.php\">Main Page</a>	";
	exit;
}


echo "<br>Username: ".$new_username ."<br>";

echo "Password: ".$new_password ."<br>";

//SQL command: list columns, and then values for those columns; null == no value
//$sql = "Insert into users (username, password) Values ('$new_username', '$hashed_password')";
$stmt = $mysqli->prepare("Insert into users (id, username, password) Values (null, ?, ?)");
$stmt->bind_param("ss", $new_username, $hashed_password);
$result = $stmt->execute();
//$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

//check if returned results of sql query is valid
if($result)
{
	echo "Registration Complete.";
}
else
{
	echo "Registration Not Complete. Retry Again.";
	echo "<a href=\"index.php\">Main Page</a>	";
	
}

?>
<html>
<head>
</head>
<body>
<!-- link to the other php web page file-->
		<br><br><br><br>
		<a href="search_all_jokes.php">All Jokes</a>	<br><br>
		<a href="index.php">Main Page</a>	
</body>
</html>








