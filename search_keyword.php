<head>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
	
	<style>
		*{font-family:Arial, Helvetica, sans-serrif;}
	</style>
</head>
<!--**************************************************************-->
<br><br>
<!-- Add link above style formatting, otherwise it gets included in the formatting-->
<a href="index.php">Return to Main Page</a>
<br><br><a href="search_all_jokes.php">All Jokes</a><br><br>

<?php

//connection to database php code in this file
include "db_connection.php";

error_reporting(E_ALL);
ini_set('display_errors',1);

$keywordfromform = addslashes($_GET["keyword"]);

//output statement in html
echo "<h2> Selected Joke(s) with keyword '".$keywordfromform."'</h2>";
$keywordfromform = "%".$keywordfromform."%";

//FLAW: "'-- "
//' Union (Select 1, username, password, 4, 5, form users);-- 

//SQL command, take information from columns named here from the table "joke_table"
$stmt = $mysqli->prepare("SELECT JokeID, Joke_question, Joke_answer, _id, username FROM jokes_table JOIN users ON users.id = jokes_table._id WHERE joke_question LIKE ?");
$stmt->bind_param("s", $keywordfromform);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($JokeID, $Joke_question, $Joke_answer,$userid, $username);


//send this variable data $sql to database
//$result = $mysqli->query($sql);

//**************\
/*
echo "<br><br><pre>";
print_r($result);
echo "</pre>";
*/
//*************/
?>

<!-- Style of formatting -->
<div id="accordion">


<?php
//if number of rows from sql command is more than 0, display information as a string
if ($stmt->num_rows > 0)
{
    // output data of each row
    while($stmt->fetch()) 
	{
        //echo "<br>ID: " . $row["JokeID"]. " | Joke: " . $row["Joke_question"]. " | Answer: " . $row["Joke_answer"]. "";
		
		//<script> alert(1); </script>
		echo "<h3>".htmlspecialchars($Joke_question) ."</h3>";
		echo "<div><p>".htmlspecialchars($Joke_answer)." | submitted by user # ".$username."</p></div>";		
    }
}
else //if no rows selected, state 0 results
{
   echo "0 results";
}

?>








