<?php  include 'loaddata.php';

$string = '';
$pagedata = loadPageData($_POST['jeopardy'], $_POST['gamename']);
foreach($pagedata as $data){
	if(is_array($data)){
		foreach($data as $value){
			$string.= ($value.",");
		}
	} else $string.=  ($data.",");
}
echo $string;
