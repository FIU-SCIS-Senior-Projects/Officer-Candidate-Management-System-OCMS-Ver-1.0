<?php
session_start();
// connect to database
$db = mysqli_connect("localhost", "root", "", "user_login_system");
if (isset($_POST['Register_btn'])){
	
	$username = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$phonenumber = mysql_real_escape_string($_POST['phonenumber']);
	$school = mysql_real_escape_string($_POST['school']);
	$rank = mysql_real_escape_string($_POST['rank']);
	$academicyear = mysql_real_escape_string($_POST['academicyear']);
	$password = mysql_real_escape_string($_POST['password']);
	$confirmpassword = mysql_real_escape_string($_POST['confirmpassword']);
	if ($password == $confirmpassword)
	{
		//create user
		$password = md5($password);// hash password
		$sql = "INSERT INTO studentlogin(username, email, phonenumber, school, rank, academicyear, password, confirmpassword) VALUES ('$username','$email', '$phonenumber','$school','$rank','$academicyear','$password', '$confirmpassword')";
		mysqli_query($db,$sql);
		$_SESSION['message']= "You are now logged in";
		$_SESSION['username']= $username;
		header("location:home.php"); // redirect to home page

		}else{
			$_SESSION['message']= "The two passwords do not match";
			
	
			
		} 
		
		
		
	}







?>
<!DOCTYPE html>
<html>
<head>
<title>OFFICER CANDIDATE MANAGEMENT SYSTEM</title>
<link rel="stylesheet" type="text/css" href="style2.css">

<body>

<div class ="header">
<h1><em><i>OFFICER CANDIDATE MANAGEMENT SYSTEM</em> <i> </h1>
</div>
<form method ="post" action ="register.php"> 
<div style="text-align:left;">
<a class="button" href="login.php">STUDENT LOGIN</a></td>
<a class="button" href="login.php">FACULTY LOGIN</a></td>
<br> <br>
</div
<table> 
<tr> 
<td>username:</td>
<td><input type="text" name= "username" class= "textInput"></td>
</tr>
<tr> 
<td>email:</td>
<td><input type="email" name= "email" class= "textInput"></td>
</tr>
<tr> 
<td>phonenumber:</td>
<td><input type="number" name= "phonenumber" class= "textInput"></td>
</tr>
<tr> 
<td>school:</td>
<td><input type="text" name= "school" class= "textInput"></td>
</tr>
<tr> 
<td>rank:</td>
<td><input type="rank" name= "rank" class= "textInput"></td>
</tr>
<tr> 
<td>academicyear:</td>
<td><input type="number" name= "academicyear" class= "textInput"></td>
</tr>
<tr> 
<td>password:</td>
<td><input type="password" name= "password" class= "textInput"></td>
</tr>
<tr> 
<td>confirmpassword:</td>
<td><input type="password" name= "confirmpassword" class= "textInput"></td>
</tr>
</table>
<br>
<div style="text-align:center;">
<tr>
<td> <input type="submit" class="button1" name="Register_btn" value="REGISTER" > </td>
</tr>
</div>
</form>
</body>
</html>
