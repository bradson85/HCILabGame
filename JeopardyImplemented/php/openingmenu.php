<?php
$name= $_GET["name"];
$name = ucfirst($name);
echo ("<!DOCTYPE html>
<html>
<head>
<meta charset='ISO-8859-1'>
<link rel='stylesheet' href='../css/main.css'>
<title>Jeopardy</title>
</head>
<body>
<div id= 'menubox'><img id= 'logo' src = '../images/logo.png'>
<p id = 'welcomemessage'> Welcome Back, " . $name.  ".<br>Select One:</p>
<div id= 'buttoncontainer'>
<input type = 'button' id = 'creategame'onClick='location.href=\"createnewgame.php?name=".$name."&&file=False\"'  Value = 'Create New Game'>
<input type = 'button' id = 'opengame' onClick='location.href=\"opengame.php?name=".$name."\"' Value = 'Open Existing Game'>
</div>
</div>
<audio autoplay>
<source src='../audio/jeopardytheme.mp3' type='audio/mpeg'>
</audio>
</body>
</html>")
?>