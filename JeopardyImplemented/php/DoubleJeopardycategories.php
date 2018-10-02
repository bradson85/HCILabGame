<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../css/main.css">
<title>Categories</title>
</head>
<body>
<div id = "round" class = "hidden">category2</div>
<div id ="logobox">
<span> _&nbsp;_   </span> <!--  leave here. Text blends into background this helps keep logo at top -->
<img id= "logo" src = "../images/logo.png"></div>
<div id="gamecreatorbar">Game Creator</div>
<div id= "statusbarcontainer">
<table class = "statusbar" id ='statusbarcategories'>
</table>
</div>
<form id= "inputs" class= 'inputs'  method = 'POST' action = inc-doublecategories.php<?php echo("?gamename=".urlencode($_GET['gamename'])."&name=".urlencode($_GET['name'])."&round=".urlencode('Double Jeopardy'))?>>
<div  id = textalertmessage class = hiddenmessages> Please insert letters and numbers only.</div>
<input type= "text" name="buttonclicked" id="buttonclicked">
<div id = "titlebar">Choose The Number of Categories</div>
<div id = 'slidercontainer'>
<div id="slider"><table><tr><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td></tr></table>
  <div id="custom-handle" class="ui-slider-handle"> </div>
</div>
</div>
<p id = "subtitle"> Enter Double Jeopardy Categories: </p><p id = "subsubtitle"> (Maximum 25 Characters)</p>
<table id = "notify" class = "hidealertbox" ><tr><td>Some Categories Already Existed <br>And Were NOT SAVED IN RED.<br>
						<br>New Categories SAVED IN GREEN <br><br>
						Do You Want To Add Different Categories OR <br>
						Move On To Double Jeopardy Categories?</td></tr>
		<tr><td><div id = "warningbuttons" >
		<input class = 'yesnobuttons' id = "nobutton" type= "button"   Value= "Edit Current" >
		<input class = 'yesnobuttons' id = "continue" type= "button"   Value= "Continue To Final Jeopardy Category" >		
 	</div></td></tr>						
</table>
<table id = "areyousure" class = "hidealertbox" ><tr><td>Are You Sure You Want To Exit?<br>All Unsaved Changes Will Be Lost.</td></tr>
		<tr><td><div id = "warningbuttons" >
		<input class = 'yesnobuttons' id = "nobutton" type= "button"   Value= "No" >
		 <input class = 'yesnobuttons' id = "yesbutton" type= "button"  Value= "Yes" >	
 	</div></td></tr>						
</table>
<div id = "boxentrycontainer">
</div>

<table id = "savebarcontainer" class = "overlaybarshide" ><tr><td>Saving Data</td></tr><tr><td><div id="progressbar"> <div  class="progress-label"> &nbsp;
         </div></div></td></tr></table>
<div id= "menubuttoncontainer">
<img src = "../images/arrow.png" id = "leftarrow">
<img src = "../images/arrow.png" id = "rightarrow">
<input type= "button" id = "backbuttons" name = 'backbuttons 'value = "Contestants">
 	<input type = "button" id = "previewgame"  value = "Main Menu">
	<input type = "submit" id = "savegame"   name = 'savegame'  Value = "Save and Exit">
	<input type = "submit" id = "nextbuttons" name ='nextbuttons' value = "Final Jeopardy Category">
</div>
</form>
<script src="https://code.jquery.com/jquery-2.2.4.js">  </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
<!-- Fallback if CDN not accessible. Local
 copy is downloaded from jquery.org -->
  <script> window.jQuery || document.write('<script src="../js/jquery.js"><\/script>'); </script> 
  <script>window.jQuery.ui || document.write('<script src="../js/jqueryui.js"><\/script>')</script>
	<script src="../js/progressbar.js"></script>
	<script src="../js/categories.js"></script>
	
	
</body>
</html>