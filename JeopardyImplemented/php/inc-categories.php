<?php
 include 'dbconnect.php';

 $categories = array();
 $count = 1;
 $post = $_POST;
 $posts =array_keys($post);
 $length = count($posts);
 $DJ =0;
 $FJ =0;
 $round = $_GET['round'];
 switch ($round) {
 	case "Final Jeopardy" :
 		$DJ =0;
 		$FJ= 1;
 		break;
 	case "Double Jeopardy":
 		$DJ =1;
 		$FJ= 0;
 		break;
 	default:
 		$DJ =0;
 		$FJ= 0;
 
 }

 
 foreach($posts as $post){  //because first $post variable is a hidden value passing textbox
 	if($count ==1){$count++;
 	}else{ 
 		$categories[]= $_POST[$post];
 		$count++;
 		echo $post;
 	}
 }
if ($_POST['buttonclicked'] == 'savegame') {

		
	deleteCategories($_GET['gamename'], $round);
	foreach($categories as $items){
		$name = $items;
		createCategory($name, $DJ, $FJ, $_GET['gamename']);
		header("Location:  openingmenu.php?name=".$_GET['name']);
	}
	

}
else if ($_POST['buttonclicked'] == 'nextbuttons') {
	
	

		
	     deleteCategories($_GET['gamename'], $round);
	      foreach($categories as $items){
	      	 $name = $items;
	      	createCategory($name, $DJ, $FJ, $_GET['gamename']);
	      	
	      	header("Location: DoubleJeopardyCategories.php?name=".urlencode($_GET['name'])."&gamename=".urlencode($_GET['gamename']));
	      
	
}} else {
	//invalid action!
}


?>