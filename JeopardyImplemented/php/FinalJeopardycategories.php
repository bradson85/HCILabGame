<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../css/main.css">
<title>Contestants</title>
</head>
<body>

<div id ="logobox">
<span> _&nbsp;_   </span> <!--  leave here. Text blends into background this helps keep logo at top -->
<div id = "round" class = "hidden">category3</div>
<img id= "logo" src = "../images/logo.png"></div>
<div id="gamecreatorbar">Game Creator</div>
<div id= "statusbarcontainer">
<table class = "statusbar" id ='statusbarcontestants'>
</table>
</div>
<form id= "inputs" class= 'inputs'  method = 'POST' action = inc-finalcategories.php<?php echo("?gamename=".urlencode($_GET['gamename'])."&name=".urlencode($_GET['name'])."&round=".urlencode('Final Jeopardy'))?>>>
<div  id = textalertmessage class = hiddenmessages> Please insert letters and numbers only.</div>
<input type= "text" name="buttonclicked" id="buttonclicked">
<div id = "titlebar">Final Jeopardy</div>
<p id = "subtitle"> Enter Category: </p><p id = "subsubtitle"> (Maximum 25 Characters)</p>
<div id = "FinalBox"> <label for="textboxes">Final Jeopardy Category: &nbsp;</label>
 				<input type = "text" class= "textboxes" placeholder= "Category 1" maxlength="25" name = "Category1"> <br>
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
<input type= "button" id = "backbuttons" value = "Double Jeopardy">
<input type = "button" id = "previewgame"  Value = "Main Menu">
<input type = "submit"  id = "savegame" name = "savegame" Value = "Save And Exit">
<input type = "submit" id = "nextbuttons" name = "nextbuttons" value = "Questions">
</div>
</form>
<script src="https://code.jquery.com/jquery-2.2.4.js">  </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
<!-- Fallback if CDN not accessible. Local
 copy is downloaded from jquery.org -->
  <script> window.jQuery || document.write('<script src="../js/jquery.js"><\/script>'); </script> 
  <script>window.jQuery.ui || document.write('<script src="../js/jqueryui.js"><\/script>')</script>
	<script src="../js/categories.js"></script>
	<script src="../js/progressbar.js"></script>

</body>
</html>