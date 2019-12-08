<html>
<head>
!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<br>

<?php

//start use of session variable
session_start();

//inserts other code from the referenced file to this file
include "db_connection.php";

    echo "Logged out";
	//instantiate session variable as nothing
	$_SESSION = [];
	//end session
	session_destroy();

$mysqli->close();

?>


</body>
<!-- link to the other php web page file-->
		<br><br><br><br>
		<a href="search_all_jokes.php">All Jokes</a>	<br><br>
		<a href="index.php">Main Page</a>	
</html>







