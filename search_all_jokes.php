<head>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() 
  {
    $( "#accordion" ).accordion();
  } );
  </script>

</head>

<br><br>
<a href="index.php">Return to Main Page</a><br><br>

<?php
//connects to database using the code in this file
include "db_connection.php";

//string variable for command to send to sql database
//$sql = "SELECT JokeID, Joke_Question, Joke_Answer, _id FROM jokes_table";
$stmt = $mysqli->prepare("SELECT JokeID, Joke_question, Joke_answer, _id, username FROM jokes_table JOIN users ON users.id = jokes_table._id");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($JokeID, $Joke_question, $Joke_answer,$userid, $username);

//if number of rows from sql command is more than 0, display information as a string
if ($stmt->num_rows > 0)
{
    // output data of each row
    while($stmt->fetch()) 
	{

		echo "<h3>".htmlspecialchars($Joke_question) ."</h3>";
		echo "<div><p>".htmlspecialchars($Joke_answer)." | submitted by user # ".$username."</p></div>";		
    }
}
else //if no rows selected, state 0 results
{
   echo "0 results";
}

?>
