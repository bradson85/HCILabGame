<?php

echo "<!DOCTYPE html>
<html>
<head>
<meta charset='ISO-8859-1'>
<link rel='stylesheet' href='../css/other.css'>
<title>BuildQuestionDatabase</title>
</head>
<body>" ;

echo ("<div>
		<form  id = 'data' method = 'POST' action = 'inc-databuilder.php'>
 		         <label for=\"textboxes\">Category: &nbsp;</label>
 				<input type = 'text' class= 'textboxes' placeholder= 'Category' maxlength='25' name = 'Category'> <br>
 				<label for=\"textboxes\">Clue: &nbsp;</label>
 				<input type = 'text' class= 'textboxes' placeholder= 'Clue' maxlength='500' name = 'Clue'> <br>
 				<label for=\"textboxes\">Solution: &nbsp;</label>
 				<input type = 'text' class= 'textboxes' placeholder= 'Solution' maxlength='500' name = 'Solution'> <br>
 				<input type = 'submit'  value = 'save questions'>
		  </form>
			</div>
		
		<script src='https://code.jquery.com/jquery-2.2.4.js'>  </script>
<!-- Fallback if CDN not accessible. Local
 copy is downloaded from jquery.org -->
  <script> window.jQuery || document.write('<script src=\"../js/jquery.js\"><\/script>'); </script> 
	<script src=\"../js/databuilder.js\"></script>
		</body>
</html> ");




?>