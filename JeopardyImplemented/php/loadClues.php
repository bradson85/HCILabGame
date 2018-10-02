<?php  include 'dbconnect.php';


$string = '';
$cluedata = matchCategoryClue($_POST['category']);
$soldata = matchCategorySolution($_POST['category']);


for($i=0;$i<count($cluedata);$i++){
	$string .= $cluedata[$i].",";
}
$string .= '/';
for($i=0;$i<count($soldata);$i++){
	$string .=  $soldata[$i].",";
}

echo $string;
