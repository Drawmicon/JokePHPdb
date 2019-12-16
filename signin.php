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
<!--<hl><b>New User Sign Up!</b></hl><br>
-->


<!-- 

USB Webserver
http://localhost:8080/
 
Access SQL: USB Webserver PHPMyAdmin

root/usbw

php tag

-->
<?php

//inserts other code from the referenced file to this file
include "db_connection.php";

?>

<!--

<form action = "search_keyword.php">

	Please Enter Key Word For Search Query:<br>
	<input type = "text" name="keyword" ><br>
	<input type = "submit" name="Submit" ><br>
</form>
-->

<!-- jQuery User interface code -->


<hr>
<!--
use file process_new_user.php
-->
<form class="form-horizontal" action = "process_new_user.php" method="post">
<fieldset>

<legend> New User Sign Up </legend>

<div class= "form-group">
<label class = "col-md-4 control-label" for="username"> Username </label>
<div class = "col-md-8">
<input id="username" name = "username" type = "text" placeholder="User Name" class = "form-control input-md">
<span class = "help-block"> Enter a user name</span>
</div>
</div>

<div class= "form-group">
<label class = "col-md-4 control-label" for="password"> Enter Password </label>
<div class = "col-md-5">
<input id="password" name = "password" type = "text" placeholder="**********" class = "form-control input-md">
<span class = "help-block"> Enter a password</span>
</div>
</div>

<div class= "form-group">
<label class = "col-md-4 control-label" for="password1"> Re-Enter Password </label>
<div class = "col-md-5">
<input id="password1" name = "password1" type = "text" placeholder="**********" class = "form-control input-md">
<span class = "help-block"> Re-Enter Password</span>
</div>
</div>

<div class = "form-group">
<label class="col-md-4 control-label" for= "submit">	</label>
<div class ="col-md-4">
<button id="submit" name = "submit" class="btn btn-primary">Register</button>
</div>
</div>
</fieldset>
</form>

<?php

//##################################################
//close connection to database
$mysqli->close();

//end of php code

?>


</body>
<!-- link to the other php web page file-->
		<br><br><br><br>
		<a href="search_all_jokes.php">All Jokes</a>	<br><br>
		<a href="index.php">Main Page</a>	
</html>







