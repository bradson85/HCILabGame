
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../css/main.css">
<title>Scoring</title>
</head>
<body>
<div id ="logobox"> 
<span> _&nbsp;_   </span> <!--  leave here. Text blends into background this helps keep logo at top -->
<img id= "logo" src = "../images/logo.png"></div>
<div id="gamecreatorbar">Game Creator</div>
	<div id= "statusbarcontainer"> 
		<table class= 'statusbar' id = "statusbarfilename">
			</table>
	</div>
<form id= "inputs" class= 'inputs'  method = 'POST' action= inc-creategame.php<?php echo"?name=".$_GET["name"]."" ?> >
<div id = "titlebar">Enter Filename for the Game</div>
<input type= "text" name="buttonclicked" id="buttonclicked">
 	<div id = gamenamecontainer> <label for="gamename">Game File Name: &nbsp;</label>
	<input type="text" placeholder="Save Game As:" id= "gamename" maxlength="24" name="gamename" ><br>
	<div  id = 'filealertmessage' class = 'hiddenmessages'> Please Insert Letters and Numbers Only.</div>
	<?php 
	  $filenamesame = $_GET["file"];
	
	if($filenamesame == "True"){
	  	echo ("<div  id = \"filealertmessage2\" class = \"showmessages\"> File Already Exist Please Use A Different Name.</div>");
	  }
	  else echo" "
	  ?>
	</div>
	<table id = "areyousure" class = "hidealertbox" ><tr><td>Are You Sure You Want To Exit?<br>All Unsaved Changes Will Be Lost.</td></tr>
		<tr><td><div id = "warningbuttons" >
		<input class = 'yesnobuttons' id = "nobutton" type= "button"   Value= "No" >
		 <input class = 'yesnobuttons' id = "yesbutton" type= "button"  Value= "Yes" >	
 	</div></td></tr>					
</table>
	<table id = "savebarcontainer" class = "overlaybarshide" ><tr><td>Saving Data</td></tr><tr><td><div id="progressbar"> <div  class="progress-label"> &nbsp;
         </div></div></td></tr></table>
	<div id= "menubuttoncontainer">
	<img src = "../images/arrow.png" id = "leftarrow">
 	<img src = "../images/arrow.png" id = "rightarrow">
 	<input type= "button" id = "backbuttons" name = 'backbuttons 'value = "Main Menu">
 	<input type = "button" id = "previewgame"   disabled Value = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
	<input type = "submit" id = "savegame"   name = 'savegame'  Value = "Save and Exit">
	<input type = "submit" id = "nextbuttons" name ='nextbuttons' value = "Continue to Scoring Options">
	</div>
</form>
<script src="https://code.jquery.com/jquery-2.2.4.js">  </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
<!-- Fallback if CDN not accessible. Local
 copy is downloaded from jquery.org -->
  <script> window.jQuery || document.write('<script src="../js/jquery.js"><\/script>'); </script> 
  <script>window.jQuery.ui || document.write('<script src="../js/jqueryui.js"><\/script>')</script>
	<script src="../js/filesave.js"></script>
	<script src="../js/progressbar.js"></script>
<!-- Uses Google as the Content Delivery
 Network -->
</body>
</html>
