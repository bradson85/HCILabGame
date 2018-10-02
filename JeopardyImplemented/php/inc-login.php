<?php
  include 'dbconnect.php';

 function login(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(!empty($_POST["username"])&& !empty($_POST["psw"]) && (checkLogin($_POST["username"],$_POST["psw"]))){
			$username = $_POST["username"];
			header("Location: openingmenu.php?name=".urlencode($username) );
			
		}
		else {
				
			  reShowLoginForm();
				}
	}
	else{
		showLoginForm();
		}
 }
     function showLoginForm(){
    	echo ("<!DOCTYPE html>
				<html>
				<head>
				<meta charset=\"ISO-8859-1\">
				<link rel=\"stylesheet\" href=\"css/main.css\">
			<title>Jeopardy</title>
			</head>
				<body>
		<form id= 'menubox'  method ='POST' action='php/login.php'><img id= 'logo' src = 'images/logo.png'>
		<p  id = 'labelsignin'>Sign In:</p>
    	<p class = 'warningmessage'> &nbsp;</p>
		<input type='text'  placeholder='Enter Username' id= 'username' name='username' ><br>
        <div class = 'warningmessage'> &nbsp; </div>
		<input type='password' placeholder='Enter Password' id= 'psw' name='psw'>
    	<div class = 'warningmessage'> &nbsp; </div>
		<input type = 'submit' id = 'login' value='Submit'>
		<input type = 'button' id = 'createlogin' onClick='location.href='#'' value = 'Create Login'>
		<p><a id= 'forgotpassword' href='#'>forgot password</a></p>
    	
		</form>" );
    }
    
    
    function reShowLoginForm(){
    	echo ("<!DOCTYPE html>
				<html>
				<head>
				<meta charset=\"ISO-8859-1\">
				<link rel=\"stylesheet\" href=\"../css/main.css\">
			<title>Jeopardy</title>
			</head>
				<body>
		<form id= 'menubox'  method ='POST' action='login.php'><img id= 'logo' src = '../images/logo.png'>
		<p  id = 'labelsignin'>Sign In:</p>
    	<p class = 'warningmessage'> You have entered an invalid username and/or password</p>
		<input type='text'  placeholder='Enter Username' id= 'username' name='username' ><br>
        <div class = 'warningmessage'> &nbsp;</div>
		<input type='password' placeholder='Enter Password' id= 'psw' name='psw'>
    	<div class = 'warningmessage'> &nbsp;</div>
		<input type = 'submit' id = 'login' value='Submit'>
		<input type = 'button' id = 'createlogin' onClick='location.href='#'' value = 'Create Login'>
		<p><a id= 'forgotpassword' href='#'>forgot password</a></p>
   
		</form> </body>
</html>");
    }

?>