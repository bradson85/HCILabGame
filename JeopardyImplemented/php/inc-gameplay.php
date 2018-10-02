<?php
include 'loaddata.php';

$_POST['gamename']= $_POST['gamename'];
$round=$_POST['round'];

if (isset($_POST['typeclue'])) {
if($_POST['typeclue'] == 'clue'){
	$round=$_POST['round'];
	$empty = $_POST['cellid'];
	$value1 = substr($empty, -1, 1); 
	$value2 = substr($empty, -3, 1); 
	$categories = loadCategoryDataGame($_POST['gamename'], $round);
	$clues = getCluesDataGame($categories);
	   echo "<br>".$clues[$value1][$value2];
		}
else if($_POST['typeclue'] == 'solution'){
$round=$_POST['round'];
$empty = $_POST['cellid'];
	$value1 = substr($empty, -1, 1); 
	$value2 = substr($empty, -3, 1); 
	$categories = loadCategoryDataGame($_POST['gamename'], $round);
	$clues = getSolutionsDataGame($categories);
	   echo "<br>".$clues[$value1][$value2];
		
}else if($_POST['typeclue'] == 'finished'){
	$round=$_POST['round'];
	$empty = $_POST['cellid'];
	$value1 = substr($empty, -1, 1);
	$value2 = substr($empty, -3, 1);
	$categories = loadCategoryDataGame($_POST['gamename'], $round);
	$clues = getCluesDataGame($categories);
	   updateBoard($clues[$value1][$value2]);
	 	}
	 	if($_POST['typeclue'] == 'done'){
	 		gameOver();
	 	}
}
if (isset($_GET['loadtype'])) {
if($_GET['loadtype']== 'first'){
	$round=$_POST['round'];
$clues = "";
$count = 0;
$categories = loadCategoryDataGame($_POST['gamename'], $round);


echo ('
<table id = "gameboard" <tr> ');

foreach ($categories as $category){
	echo "<th>".$category."</th>";
}
echo "</tr>";
$clues = getCluesDataGame($categories);
for($i=0;$i<count($clues[0]);$i++){
	echo "<tr>";
	for($j=0;$j<count($clues);$j++){
		$_POST['clue $i$j'] = $clues[$j][$i];
		if(checkBoard($clues[$j][$i]) == 1){
			$_POST['$i $j'] = 1;
			echo ("<td id ='cell $i $i'>&nbsp;</td>");
		}else {
			echo ("<td id ='cell $i $j'>".getPointValueDataGame($clues[$j][$i])."</td>");
		}
	}
	echo "</tr>";
}
	
	
echo ('</table>');
}
}
function refreshBoard(){
	$clues = "";
$count = 0;
$categories = loadCategoryDataGame($_POST['gamename'], $round);


echo ('
<table id = "gameboard" <tr> ');

foreach ($categories as $category){
	echo "<th>".$category."</th>";
}
echo "</tr>";
$clues = getCluesDataGame($categories);
for($i=0;$i<count($clues[0]);$i++){
	echo "<tr>";
	for($j=0;$j<count($clues);$j++){
		$_POST['clue $i$j'] = $clues[$j][$i];
		if(checkBoard($clues[$j][$i]) == 1){
			$_POST['$i $j'] = 1;
			echo ("<td id ='cell $i $i'>&nbsp;</td>");
		}else {
			echo ("<td id ='cell $i $j'>".getPointValueDataGame($clues[$j][$i])."</td>");
		}
	}
	echo "</tr>";
}


echo ('</table>');
}

?>