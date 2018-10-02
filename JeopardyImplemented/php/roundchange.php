<?php
include 'dbconnect.php';

$gamename=$_GET['gamename'];
$teamnumber=$_GET['teamnumber'];




echo "<form id= 'inputs' class = 'inputs'  method = 'POST' action= playgame2.php?name=".$_GET['name'].">
		<input name=\"name\" type=\"hidden\" value=\"".$_GET['name']."\">
        <input name=\"gamename\" type=\"hidden\" value=\"".$gamename."\"> 
         <input name=\"teamnumber\" type=\"hidden\" value=\"".$teamnumber."\">
         		<input name=\"round\" type=\"hidden\" value=\"".$_GET['round']."\">
		</form>  
        		<script>
   document.getElementById('inputs').submit();  
  </script>"; // use purejavascript here because jquery libray not load or needed for such a small event

?>