
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../css/main.css">
<title>Scoring</title>
</head>
<body>
<?php include 'loaddata.php';
     $pagedata = loadPageData('scoring', $_GET['gamename']);
     echo ("<div id = 'hiddendata'>");
     
     foreach($pagedata as $data){
     	if(is_array($data)){
     		foreach($data as $value){
     			echo ($value.",");
     		}
     	} else echo ($data.",");
     }
      echo "</div>";
     
?>
<div id ="logobox">
<span> _&nbsp;_   </span> <!--  leave here. Text blends into background this helps keep logo at top -->
<img id= "logo" src = "../images/logo.png"></div>
<div id="gamecreatorbar">Game Creator</div>
<div id= "statusbarcontainer">
<table class ='statusbar' id = "statusbarscoring">
</table>
</div>
<form id= "inputs" class = 'inputs'  method = 'POST' action = inc-scoring.php<?php 
echo ("?gamename=".urlencode($_GET['gamename'])."&name=".($_GET['name']));?> >
<input type= "text" name="buttonclicked" id="buttonclicked">
<div id = "titlebar">Pick Scoring Method</div>
<p id = "subtitle">  Scores will Double For Double Jeopardy Round<br> Select One: <br></p>
<table id = "areyousure" class = "hidealertbox" ><tr><td>Are You Sure You Want To Exit?<br>All Unsaved Changes Will Be Lost.</td></tr>
		<tr><td><div id = "warningbuttons" >
		<input class = 'yesnobuttons' id = "nobutton" type= "button"   Value= "No" >
		 <input class = 'yesnobuttons' id = "yesbutton" type= "button"  Value= "Yes" >	
 	</div></td></tr>						
</table>

<div  class = 'radiobuttons' id = 'radiocontainer'>
<span  id = radiobuttoncontainer1 class ='radiobuttonsselected'><input id = 'radiobutton1' type="radio" name="scoring" value="Traditional" checked> Traditional</span><br><br>
<span id = radiobuttoncontainer2 class ='radiobuttonsdeselected'><input id = 'radiobutton2' type="radio" name="scoring" value="Custom"> Custom<br><br></span>
<label  class = 'optionsdeselected' for="startingvalue">Starting Value: &nbsp;</label>
<select  name = "startingvalue" >
<option value="25">25</option>
<option value="50">50</option>
<option value="100">100</option>
</select> <br>
<label class = 'optionsdeselected' for="increment">Increment: &nbsp;</label>
<select  name= 'increment'>
<option value="50">50</option>
<option value="100">100</option>
<option value="500">500</option>
<option value="1000">1000</option>
</select> <br>
<br><span id = radiobuttoncontainer3 class ='radiobuttonsdeselected'><input id = 'radiobutton3' type="radio" name="scoring" value="No Scoring"> No Scoring </span><br>
</div>
<table id = "savebarcontainer" class = "overlaybarshide" ><tr><td>Saving Data</td></tr><tr><td><div id="progressbar"> <div  class="progress-label"> &nbsp;
         </div></div></td></tr></table>
<div id= "menubuttoncontainer">
<img src = "../images/arrow.png" id = "leftarrow">
<img src = "../images/arrow.png" id = "rightarrow">
	<input type= "button" id = "backbuttons" name = 'backbuttons 'value = "Main Menu">
 	<input type = "button" id = "previewgame"   disabled Value = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
<input type = "submit" id = "savegame"   name = 'savegame'  Value = "Save and Exit">
	<input type = "submit" id = "nextbuttons" name ='nextbuttons' value = "Continue to Contestants">
</div>
</form>

<script src="https://code.jquery.com/jquery-2.2.4.js">  </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
<!-- Fallback if CDN not accessible. Local
 copy is downloaded from jquery.org -->
  <script> window.jQuery || document.write('<script src="../js/jquery.js"><\/script>'); </script> 
  <script>window.jQuery.ui || document.write('<script src="../js/jqueryui.js"><\/script>')</script>
	<script src="../js/progressbar.js"></script>
	<script src="../js/scoring.js"></script>
<!-- Uses Google as the Content Delivery

 Network -->
</body>
</html>