
<?php

error_reporting(E_ALL);
ini_set('display_errors',1);
//session_start();


//start use of session variable
session_start();

echo "User: ".$_SESSION['username']." #".$_SESSION['userid']."<br>";
//check if session variable username exists
if(!$_SESSION['username'])
{
	echo "You Must Be Logged In.<br>";
	
	//link to login.php
	echo"<br><br><a href='login.php'>Login HERE</a>";
	
	//stop php file here
	exit;	
}



//use code that exists in db_connection.php here
include "db_connection.php";
//variables using $_GET, which will show in url
$new_joke_question = addslashes($_GET["newjoke"]);//addslashes in order to remove any functionality of quotation marks
$new_joke_answer = addslashes($_GET["newanswer"]);

//session variable
$userid = $_SESSION['userid'];

$new_joke_user_id = $_SESSION['userid'];

echo "<h4>#".$_SESSION['userid']." ". $_SESSION['username']." is adding joke: $new_joke_question ($new_joke_answer) </h4>";



//add these 4 elements into new row of the database
$stmt = $mysqli->prepare("INSERT INTO `jokes_table`(`JokeID`, `Joke_Question`, `Joke_Answer`, `_id`, `user_id`) VALUES (NULL, ?,?,?,?)");
//first variable is string, second variable is string, third variable is integer
$stmt->bind_param("ssii", $new_joke_question, $new_joke_answer, $userid, $new_joke_user_id);//? are linked to existing variables above
$stmt->execute();//execute sql statement

//$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
include "search_all_jokes.php"
/*
//print collected data
echo "<pre>";
print_r($stmt);
echo "</pre>";
//end $stmt variable, since done using it
//$stmt->close();

//include "search_all_jokes.php"

//Check Input: <script> alert(1); </script>
*/
?>










