<?php

include 'dbconnect.php';
 $contestantString = "";
 $count = 1;
 $post = $_POST;
 $posts =array_keys($post);
$length = count($posts);
 foreach($posts as $post){  //because first $post variable is a hidden value passing textbox
 	if($count ==1){$count++;
 	}else if($count ==($length)){
 		$count++;
 		$contestantString .= "".$_POST[$post];
 	}
 	else{
 		$contestantString .= "".$_POST[$post].",";
 		$count++;
 	}
 }
 echo $contestantString;
if ($_POST['buttonclicked'] == 'savegame') {
	$name = $_GET["name"];
	$gamename =$_GET['gamename'];

	
   updateContestants($gamename,$name,$contestantstring);
		
	header("Location:  openingmenu.php?name=".$name."");
	
}
else if ($_POST['buttonclicked'] == 'nextbuttons') {
		$name = $_GET["name"];
		$gamename =$_GET['gamename'];
		
		
	updateContestants($gamename,$name,$contestantstring);
		header("Location: categories.php?name=".urlencode($name)."&gamename=".urlencode($gamename)."");
	}
else {
	//invalid action!
}


?>