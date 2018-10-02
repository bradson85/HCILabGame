<?php
include 'dbconnect.php';

if ($_POST['buttonclicked'] == 'savegame') {
		if ($_POST['scoring'] == 'Traditional') {
		updatescoring($_GET['gamename'],$_POST['scoring'], 100 ,100);}
		else if ($_POST['scoring'] == 'Custom') {
			updatescoring($_GET['gamename'],$_POST['scoring'], $_POST['startingvalue'] ,$_POST['increment']);
		}else {
			updatescoring($_GET['gamename'],$_POST['scoring'], 0 ,0);
		}
		
		header("Location: openingmenu.php?name=".$_GET["name"]."");
	
}
else if ($_POST['buttonclicked'] == 'nextbuttons') {
		$name = $_GET["name"];
		$gamename = $_GET['gamename'];
		$scoring = $_POST['scoring'];
		if ($scoring == 'Traditional') {
			updatescoring($gamename,$name, 100 , 100 );
header("Location: contestants.php?gamename=".urlencode($gamename)."&name=".urlencode($name)."&scoring=".urlencode($scoring). "&base=100&increment=100"); 
		}else if ($scoring == 'Custom'){
		updatescoring($gamename,$name, $_POST['startingvalue'] ,$_POST['increment']);
		$basevalue = $_POST['startingvalue'];
		$increment =$_POST['increment'];
	header("Location: contestants.php?gamename=".urlencode($gamename)."&name=".urlencode($name)."&scoring=".urlencode($scoring). "&base=".urlencode($basevalue)."&increment=".urlencode($increment));
		}else if($scoring == "No Scoring"){
			updatescoring($_GET['gamename'],$_POST['scoring'], 0 ,0);
			header("Location: contestants.php?gamename=".urlencode($gamename)."&name=".urlencode($name)."&scoring=".urlencode($scoring). "&base=0&increment=0");
		}
	
} else {
	//invalid action!
}

?>