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

<hl><b>Jokes</b></hl>


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

//$nameo = $_SESSION['username'];
//echo "<br>Logged In: ".$nameo."<br>";

//Login user shown as root
?>
<br>


<a href="../google_login.php">GOOGLE Login</a><br>	
<a href="../login.php">User Login</a><br>	
<a href="../logout.php">Log Out</a><br>
<a href="../signin.php">New User Sign Up</a><br><br>

<!--

<form action = "search_keyword.php">

	Please Enter Key Word For Search Query:<br>
	<input type = "text" name="keyword" ><br>
	<input type = "submit" name="Submit" ><br>
</form>
-->

<!-- jQuery User interface code -->
<form class="form-horizontal" action = "search_keyword.php">
<fieldset>

<legend> Search for a joke </legend>

<div class= "form-group">
<label class = "col-md-4 control-label" for="keyword"> Search Input </label>
<div class = "col-md-5">
<input id="keyword" name = "keyword" type = "search" placeholder="Ha ha" class = "form-control input-md" required="">
<p class = "help-block"> Enter a word to search for in the joke database</p>
</div>
</div>

<div class = "form-group">
<label class="col-md-4 control-label" for= "submit">	</label>
<div class ="col-md-4">
<button id="submit" name = "submit" class="btn btn-primary">Search</button>
</div>
</div>
</fieldset>
</form>

<hr>
<!--
<form action = "add_joke.php">

	Please Enter New Joke And Answer Here:<br>
	<input type = "text" name="newjoke" ><br>
	<input type = "text" name="newanswer" ><br>
	<input type = "submit" name="Submit" ><br>
	
</form>
-->
<form class="form-horizontal" action = "add_joke.php">
<fieldset>

<legend> Add Joke </legend>

<div class= "form-group">
<label class = "col-md-4 control-label" for="newjoke"> Enter new joke </label>
<div class = "col-md-8">
<input id="newjoke" name = "newjoke" type = "text" placeholder="Why did the chicken cross the road?" class = "form-control input-md">
<span class = "help-block"> Enter beginning joke statement here</span>
</div>
</div>

<div class= "form-group">
<label class = "col-md-4 control-label" for="newanswer"> Enter new joke answer </label>
<div class = "col-md-5">
<input id="newanswer" name = "newanswer" type = "text" placeholder="To get to the other side!" class = "form-control input-md">
<span class = "help-block"> Enter closing joke statement here</span>
</div>
</div>

<div class = "form-group">
<label class="col-md-4 control-label" for= "submit">	</label>
<div class ="col-md-4">
<button id="submit" name = "submit" class="btn btn-primary">Add new joke</button>
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
		<a href="../search_all_jokes.php">All Jokes</a>	
</html>







