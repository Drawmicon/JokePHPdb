<html>
<head>

</head>

<body>

Test<hl>PHP</hl>


<!-- 

USB Webserver
http://localhost:8080/
 
 Access SQL: USB Webserver PHPMyAdmin

root/usbw

php tag 

-->
<?php

# $variableName 
$host = "localhost";
$username = "root";

$user_pass = "usbw";
$database_in_use="test";

#
$link = mysqli_connect($host, $username, $user_pass, $database_in_use);

//if link is invalid, show error
if (!$link) 
{
    echo "Error: Unable to connect to MySQL." . PHP_EOL . "\n";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL . "\r\n";
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL . "\n";
    exit;
}

//print/echo link information
echo "Success: A proper connection to MySQL was made!\r\n The my_db database is great.\r\n" . PHP_EOL . "\n";
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL . "\n";

//close link between php and sql
//mysqli_close($link);



//SQL command, take information from columns named here from the table "joke_table"
$sql = "SELECT JokeID, Joke_Question, Joke_Answer FROM jokes_table";
//echo "Check";


$result = $mysqli->query($sql);

//if number of rows from sql command is more than 0, display information as a string
if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
        echo "ID: " . $row["JokeID"]. " - Name: " . $row["Joke_Question"]. " " . $row["Joke_Answer"]. "";
    }
} 
else //if no rows selected, state 0 results
{
    echo "0 results";
}
//close connection to database
$mysqli->close();

//end of php code
?>


</body>
			
</html>







