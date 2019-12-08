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

//inserts other code from the referenced file to this file
include "db_connection.php";

?>


<hr>

<form class="form-horizontal" action = "process_new_user.php">
<fieldset>

<legend> Site Login </legend>

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







