<?php
include 'dbconnect.php';

$post = $_POST['type'];
switch($post){
	case "update":
		update();
		break;
	case "load":
		echo read();
		break;
	case "new":
		createscore($_POST['teamnumber']);
		break;
}


function createscore(){
	$answered= $_POST['answered'] ;
	$score = $_POST['scoreupdate'];
	$teamnumber = $_POST['teamnumber'];
	createScoreboard($teamnumber);
}


function update(){
	$teamnumber = $_POST['teamnumber'];
	$answered= $_POST['answered'] ;
	$score =$_POST['scoreupdate'];
	echo $score;
	
	$currscore = loadScoreBoard();
	$updatedscore = ($currscore[$answered-1]+ $score);

	updateScoreboard($updatedscore, $answered);
}	
function read(){
	$teamnumber = $_POST['teamnumber'];
	$answered= $_POST['answered'] ;
	$score =$_POST['scoreupdate'];
	$finalStrings = "<table><tr>";
	$currscore = loadScoreBoard();
	$count = 1;
	foreach($currscore as $v){
		$finalStrings.= "<td>Team ".$count . ": " . $v;
		$count++;
	}
	
   $finalStrings.= "</tr></table>";
 return $finalStrings;
}

?>