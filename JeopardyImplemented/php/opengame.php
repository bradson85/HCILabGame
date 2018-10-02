
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../css/main.css">
<title>Open Game</title>
</head>
<body>
<div id ="logobox">
<span> _&nbsp;_   </span> <!--  leave here. Text blends into background this helps keep logo at top -->
<img id= "logo" src = "../images/logo.png"></div>
<div id="gamecreatorbar">Game Creator</div>
<div id= "statusbarcontainer">
</div>
<form id= "inputs" class = 'inputs'  method = 'POST' action= '' >
<input type= "text" name="buttonclicked" id="buttonclicked">
<div id = "titlebar">Select Game</div>
<p id = "subtitle"> Select One: </p>
<table id = "areyousure" class = "hidealertbox" ><tr><td>Are You Sure You Want To Exit?<br>All Unsaved Changes Will Be Lost.</td></tr>
		<tr><td><div id = "warningbuttons" >
		<input class = 'yesnobuttons' id = "nobutton" type= "button"   Value= "No" >
		 <input class = 'yesnobuttons' id = "yesbutton" type= "button"  Value= "Yes" >	
 	</div></td></tr>						
</table>
<div  id = textalertmessage class = hiddenmessages> Please select a game.</div>
<?php include 'loaddata.php';
     $gamenames = getFileData($_GET['name']);
     $gamerecords = getGameData($gamenames);
     echo ("<table id = 'filestoopen' class ='filetable '><tr><th></th>
     		<th>Game Name</th><th>Starting Score</th><th>Increment Score</th><th>Team Names</th><th>Owner</th><th>Date Created</th><th></th></tr>");
     
     foreach($gamerecords as $data){
        $count =0;
        if($count <=8){
     	if(is_array($data)){
     		echo ('<tr class = "tablerowdeselected"><td><img  id = \'gameicon\' src = "../images/game.png"></td>');
     		foreach($data as $value){
     			echo ("<td>".$value."</td>");
     		}
     	} else echo ("<td>".$data."</td>");
     	echo"<td><input type = 'button' id = 'editbutton'   Value = 'Edit'></td></tr>";
     	$count++;
        }  }
      echo "</table>";
     
?>


<table id = "savebarcontainer" class = "overlaybarshide" ><tr><td>Saving Data</td></tr><tr><td><div id="progressbar"> <div  class="progress-label"> &nbsp;
         </div></div></td></tr></table>
<table id= "openfilecontainer">

<tr>	
 <td>	<input type = "button" id = "previewgame"   class = 'buttons' Value = 'Main Menu'></td>
<td><input type = "button" class= 'buttons' id = "opengame"   name = 'opengame'  Value = "Play Game"></td>
</tr>	
</table>
</form>

<script src="https://code.jquery.com/jquery-2.2.4.js">  </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
<!-- Fallback if CDN not accessible. Local
 copy is downloaded from jquery.org -->
  <script> window.jQuery || document.write('<script src="../js/jquery.js"><\/script>'); </script> 
  <script>window.jQuery.ui || document.write('<script src="../js/jqueryui.js"><\/script>')</script>
	<script src="../js/opengame.js"></script>
<!-- Uses Google as the Content Delivery

 Network -->
</body>
</html>