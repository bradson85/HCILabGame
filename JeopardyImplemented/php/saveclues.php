<?php
include 'dbconnect.php';
$clues = array();
$count = 1;
$post = $_POST;
$posts =array_keys($post);
$length = count($posts);
$pointValues = $_POST['pointValue'];
$clue = $_POST['clue'];
$solution =$_POST['solution'];
$round = $_POST['round'];
$categoryname=$_POST['category'];
$categorynumber = $_POST['numbercategories'];
$modifier = 0;


switch ($round) {
	case "category3" :
		$DJ =0;
		$FJ= 1;
		break;
	case "category2":
		$DJ =1;
		$FJ= 0;
		$modifier =2;
		break;
	default:
		$DJ =0;
		$FJ= 0;
		$modifier =1;

}

$points =explode(",",$pointValues);

    deleteClues($categoryname, $round);
    
	$score[0] = $points[0];
	for ($i=1; $i<count($clue);$i++){
		$score[$i]= $score[$i-1]+$points[1];
	}
	
   for ($i=0; $i<count($clue);$i++){
   	        createClue($clue[$i], $solution[$i],$score , $DJ, $FJ, $categoryname);
   	          
   	        	createClue($clue[$i], $solution[$i],$score[$i] , $DJ, $FJ, $categoryname);
   }
  
    	
  
	

	
	

?>
