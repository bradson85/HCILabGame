<?php
include 'dbconnect.php';
if ($_POST['buttonclicked'] == 'savegame') {
	if(checkIfFileExists($_POST['gamename'])){
		header("Location: createnewgame.php?name=".$_GET["name"]."&&file=True");
	}
	else{
		
		savenewfilename($_POST['gamename'],$_GET["name"]);
		header("Location: openingmenu.php?name=".$_GET["name"]."");
	}
}
else if ($_POST['buttonclicked'] == 'nextbuttons') {
	if(checkIfFileExists($_POST['gamename'])){
		header("Location: createnewgame.php?name=".$_GET["name"]."&&file=True");
	}
	else{
		echo ($_POST['gamename']);
		savenewfilename($_POST['gamename'],$_GET["name"]);
		$gamename =$_POST['gamename'];
		$name= $_GET['name'];
		header("Location: scoringoptions.php?name=".urlencode($name)."&gamename=".urlencode($gamename)."");
	}
} else {
	//invalid action!
}


?>