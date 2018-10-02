<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../css/main.css">
<title>GameBoard</title>
</head>
<body>
<div id ='teamnumber' class = hidden><?php echo $_POST['teamnumber']; ?></div>
<div id ='gamename' class = hidden><?php echo $_POST['gamename']; ?></div>
<div id ='roundname' class = hidden>Double Jeopardy</div>
<div id="gameheader">Double Jeopardy </div>
<table id = "areyousure" class = "hidealertbox" ><tr><td>Are You Sure You Want To Exit?<br>All Unsaved Changes Will Be Lost.</td></tr>
		<tr><td><div id = "warningbuttons" >
		<input class = 'yesnobuttons' id = "nobutton" type= "button"   Value= "No" >
		 <input class = 'yesnobuttons' id = "yesbutton" type= "button"  Value= "Yes" >	
 	</div></td></tr>						
</table>
<table id = "score"> </table>
		<div id ="cluebox"class= "hidden">	
		<table id = "clue" ><tr><td id = 'instructions'>Press:</td></tr><tr><td>&nbsp;</td></tr><tr><td id = 'countdown'></td></tr></table></div>
<div id = boardcontainer>

	<div id = Answerer></div>
	</div><table id= "menubuttonsgameboard">
	<tr>
	<th>
 	<input type= "button" id = "returnmainbuttons" value = "Main Menu">
	<input type = "button" id = "saveandexitbuttons"  Value = "Exit">
	</th></tr>
	</table>
		<script src="https://code.jquery.com/jquery-2.2.4.js">  </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
<!-- Fallback if CDN not accessible. Local
 copy is downloaded from jquery.org -->
  <script> window.jQuery || document.write('<script src="../js/jquery.js"><\/script>'); </script>
  <script>window.jQuery.ui || document.write('<script src="../js/jqueryui.js"><\/script>')</script>
	<script src="../js/gameplay.js"></script>
</body>
</html>