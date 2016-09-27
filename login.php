<?php
session_start();
// connect to database
$db = mysqli_connect("localhost", "root", "", "user_login_system");
if (isset($_POST['login_btn'])){
	
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$passwordmd5 = md5($password); // hashed 
	$sql = "SELECT * FROM studentlogin WHERE username= '$username' AND password= '$password'";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) ==1){
		$_SESSION['message']= "You are now logged in";
		
		$_SESSION['username']= $username;
		header ("location:home.php"); // redirect to home page
	}else{
			
				$_SESSION['message']= "Username Password combination is Incorrect";	
		}
	}


?>
<!DOCTYPE HTML>
<html>
<head>
<title> OFFICER CANDIDATE MANAGEMENT SYSTEM </title>
<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<div class ="header">
<h1> <em> <i>OFFICER CANDIDATE MANAGEMENT SYSTEM</em></i></h1>
</div>
<form method ="post" action ="home.php">
<table>
<tr>
<td>username:</td>
<td><input type="text" name= "username" class= "textInput"</td>
</tr>
<tr> 
<td>password:</td>
<td><input type="password" name= "password" class= "textInput"</td>
</tr>
</div>
</table>
<br>
<div style="text-align:center;">
<tr>
<center>
<td> <input type="submit" name="Login_btn" value="LOGIN"></td>
</center>
</tr>
</form>
</body>
</html>