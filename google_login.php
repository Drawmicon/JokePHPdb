<?php
//typo errors
error_reporting(E_ALL);
ini_set('display_errors',1);

//echo "This is the google login page";

session_start();

//use php file from google vendor folder
require_once('vendor\autoload.php');

//variables

$client_id = '178777007060-fj20pkuge2mpc1t4i681df78m8i42fdt.apps.googleusercontent.com';
//$client_id = '464836311867-5skeduqvshuka0rjunakplb3jct7msd1.apps.googleusercontent.com';

$client_secret='EMqYHYupq5w-A0lv_cMuKk_w';
//$client_secret='IuC0yg-f5LFH6dAwMe6iCWXE';

$redirect_uri = 'http://localhost:8888/index.php/google_login.php';
//$redirect_uri = 'http://localhost:8888/jokesdb/google_login.php';


$db_username = "root";
$db_password = "root";
//$db_password = "usbw";
$host_name = "localhost";
//$db_name = 'JokesDB';
$db_name = 'test';
$port = 8889;//unused previously, default 8888
############################################################################################

//create new google client object
$client = new Google_Client();
//set client data as previous data
$client->setClientID($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");
//authenticate client data
$service = new Google_Service_Oauth2($client);

//if logout 
if(isset($_GET['logout']))
{
	//revoke authorization from google
	$client->revokeToken($_SESSION['access_token']);
	//destroy session and session variables
	session_destroy();
	header('Location: index.php');//log out to this page
	
	
}

if(isset($_GET['code']))
{
	//set access token to session variable
	$client->authenticate($_GET['code']);
	$_SESSION['access_token'] =  $client->getAccessToken();
	header('Location: '.filter_var($redirect_uri, FILTER_SANITIZE_URL));
	exit;
}

//if both are true
if(isset($_SESSION['access_token']) && $_SESSION['access_token'])
{
	$client->setAccessToken($_SESSION['access_token']);
}
else
{
	$authUrl = $client->createAuthUrl();
}

//echo html code
echo'<div style="margin:20px">';

if(isset($authUrl))
{
	echo'<div align="center">';
	echo'<h3>Login</h3>';
	echo'<div>You will need a Google account to sign in. </div>';
	echo'<a class = "login" href= "'.$authUrl. '">Login here</a>';
	echo'</div>';
}
else
{
	$user = $service->userinfo->get();
	echo '<br><b>User Logged In</b><br>';
}

echo '<br><b>CHECK</b><br>';

//*************************************************************************************************************

//connect to database
$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name, $port);
if($mysqli->connect_error)
{
	die('Connection Error: ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
}

$result = $mysqli->query("Select Count (google_id) as usercount from google_users where google_id = $user->id");
$user_count = $result->fetch_object()->usercount;

echo 'img src="'.$user->picture.'" style" float: right; margin-top 33px;" />';

if($user_count)
{
	echo 'Welcome back'. $user->name. ' | <a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
}
else
{
	echo 'Hi'.$user->name.', Thank you for registering. [a href ="'.$redirect_uri.'?logout=1">Log Out</a>]';
	
	//prepared statements
	//one int, four strings
	$statement = $mysqli->prepare("Insert Into google_users (google_id, google_name, google_email, google_link, google_picture_link)Values(?,?,?,?,?)");
	
	//bind i to id, s to name, s to email, s to link and s to picture link
	$statement->bind_param('issss', $user->id, $user->name, $user->email, $user->link, $user->picture);
	
	//run command to insert data into database
	$statement->execute();
	echo $mysqli->error;
//}


	echo "<p>Data about this user. <ul><li>Username: ". $user->name. "</li><li>user id: ".$user->id. "</li><li>email: ".$user->email."</li><li></p>";

	$_SESSION['username']=$user->name;
	$_SESSION['userid']=$user->id;
	$_SESSION['useremail']=$user->email;
}

echo '</div>';
?>













