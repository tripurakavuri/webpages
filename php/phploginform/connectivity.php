<?php
//~ define('DB_HOST', 'localhost');
//~ define('DB_NAME', 'php_login_form');
//~ define('DB_USER','root');
//~ define('DB_PASSWORD','bhea@123');
//~ $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
//~ $db=mysqli_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysqli_error());
$con = mysqli_connect('localhost','root','bhea@123','php_login_form') or die("Failed to connect to MySQL: " . mysqli_error());

/* $ID = $_POST['user'];
$Password = $_POST['pass']; */ 

function SignIn() 
{
	session_start(); 
	
	//starting the session for user profile page
	
	if(!empty($_POST['user'])) 
	
	//checking the 'user' name which is from Sign-In.html, is it empty or have some text 
	
	{ 
		$que = "SELECT * FROM users where username = '$_POST[user]' AND password = '$_POST[pass]'";
		$query = mysqli_query($con, $que) or die("failed" . mysqli_error()); 
		$row = mysqli_fetch_array($query) or die("failed2" . mysql_error()); 

	if(!empty($row['username']) AND !empty($row['password'])) 
	{ 
		$_SESSION['username'] = $row['password']; 
		echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
	} 
	else 
	{ 
		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
	} 
	} 
} 

if(isset($_POST['submit']))
{ 
	SignIn(); 
} 
?>
