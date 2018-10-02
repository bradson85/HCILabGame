<?php
include 'dbconnect.php';


function getFileData($username){
	
	$data =getGameNames($username);
	return $data;
}

function getGameData($filenames){
	$parsed = array();
	foreach ($filenames as $filename){
		array_push($parsed,loadgame($filename));
	

	}
  return ( $parsed);
}

function getCluesDataGame($category){
	$data= array();
	foreach($category as $categories){
		$value = matchCategoryClue($categories);
		$data[] = $value;
	}
	return $data;
}

function getSolutionsDataGame($category){
	$data= array();
	foreach($category as $categories){
		$value = matchCategorySolution($categories);
		$data[] = $value;
	}
	return $data;
}

function getPointValueDataGame($clues){
	return getPointValue($clues);
}

function updateBoard($clue){
	setDone($clue);
}

function checkBoard($clue){
	return checkDone($clue);
}

function gameOver(){
	resetDone();
}

function loadCategoryDataGame($filename,$round){
	$data1= array();
	$data2= array();
	$data3= array();
	$values =loadCategories($filename);
	
	if (empty($values) || empty($values[0])){ echo empty($values); return ;}else{
		for ($i=0; $i<1;$i++){ // 1 iteration through loop
			for ($j=0;$j<count($values[$i]);$j++){
				$datatemp1[$j]= $values [1][$j]; // known that categories are at index 1
				$datatemp2[$j]= $values [2][$j]; // known that DoubleJeo bool are at index 2
				$datatemp3[$j]= $values [3][$j]; // known that FinalJeo bool are at index 3
	
				if($datatemp2[$j] == 1){
					array_push($data2,$datatemp1[$j] );
				}else if($datatemp3[$j] == 1){
					array_push($data3,$datatemp1[$j] );
				}else array_push($data1,$datatemp1[$j]);
			}
		}
	switch ($round) {
    case "Double Jeopardy":
      return $data2;
        break;
    case "Final Jeopardy":
       return $data3;
        break;

    default:
    	return $data1;
}
	
}
}
function loadPageData($page,$filename){
	$values = "";
	switch ($page){
	case "scoring":
		$data =loadgame($filename);
		$values = cleanupData($page, $data);
		break;
	case "contestants":
		$data =loadgame($filename);
		$values = cleanupData($page, $data);
		break;
	case "category1":
		$data =loadCategories($filename);
		$values =cleanupData($page, $data);
		
		break;
		case "category2":
			$data =loadCategories($filename);
			$values =cleanupData($page, $data);
			break;
			case "category3":
				$data =loadCategories($filename);
				$values =cleanupData($page, $data);
				break;
		
 case "clue":
			$data =loadClues($filename);
			$values = cleanupData($page, $data);
		break;
			
	default:
			;
	}
	return ($values);
}



function cleanupData($page,$values){
	$data1= array();
	$data2= array();
	$data3= array();
	$cat = "";
	$count = 0;
	switch ($page){
		case "scoring":
				return array ($values[1],$values[2]);
			break;
		case "contestants":
			$test = str_getcsv($cat ,  "," ,  '"' ,  "\\"  );
			foreach($test as $tests){$count++;}
			return array ($values[3]);
			break;
		case "category1":   // regular jeopardy
			if (empty($values) || empty($values[0])){ echo empty($values) ;break ;}else{
	        for ($i=0; $i<1;$i++){ // 1 iteration through loop
			for ($j=0;$j<count($values[$i]);$j++){
				$datatemp1[$j]= $values [1][$j]; // known that categories are at index 1
				$datatemp2[$j]= $values [2][$j]; // known that DoubleJeo bool are at index 2
				$datatemp3[$j]= $values [3][$j]; // known that FinalJeo bool are at index 3
				
				if($datatemp2[$j] == 1){
					array_push($data2,$datatemp1[$j] );
				}else if($datatemp3[$j] == 1){
					array_push($data3,$datatemp1[$j] );
				}else array_push($data1,$datatemp1[$j]);
			}
	        }
		         return $data1;
			break;
			}
			case "category2":  // double jeopardy
				if (empty($values) || empty($values[0])){ echo empty($values) ;break ;}else{
					for ($i=0; $i<1;$i++){ // 1 iteration through loop
						for ($j=0;$j<count($values[$i]);$j++){
							$datatemp1[$j]= $values [1][$j]; // known that categories are at index 1
							$datatemp2[$j]= $values [2][$j]; // known that DoubleJeo bool are at index 2
							$datatemp3[$j]= $values [3][$j]; // known that FinalJeo bool are at index 3
			
							if($datatemp2[$j] == 1){
								array_push($data2,$datatemp1[$j] );
							}else if($datatemp3[$j] == 1){
								array_push($data3,$datatemp1[$j] );
							}else array_push($data1,$datatemp1[$j]);
						}
					}
					return array ($data2);
					break;
				}
				case "category3":    //Final Jeopardy
					if (empty($values) || empty($values[0])){ echo empty($values); break ;}else{
						for ($i=0; $i<1;$i++){ // 1 iteration through loop
							for ($j=0;$j<count($values[$i]);$j++){
								$datatemp1[$j]= $values [1][$j]; // known that categories are at index 1
								$datatemp2[$j]= $values [2][$j]; // known that DoubleJeo bool are at index 2
								$datatemp3[$j]= $values [3][$j]; // known that FinalJeo bool are at index 3
				
								if($datatemp2[$j] == 1){
									array_push($data2,$datatemp1[$j] );
								}else if($datatemp3[$j] == 1){
									array_push($data3,$datatemp1[$j] );
								}else array_push($data1,$datatemp1[$j]);
							}
						}
						return array ($data3);
						break;
					}
		    case "clue":
		    	$bigarray;
		    	$numberOfRows = count($values[0]);
		    	for($h=0; $h<$numberOfRows;$h++){
		    		$bigarray[$h] =array();
		    	}
		    	
		    	if (empty($values) || empty($values[0])){ echo empty($values) ;break ;}else{
		// column index 1:content , column index 2:solution, column index 3:pointvalue, 4:DJ,5:FJ, 6:done, 7: categoryID (0 is id)
		    	  for ($i=0; $i<1;$i++){ // 1 iteration through for i values
		    	  	for ($j=0; $j<count($values[$i]);$j++){
		    	  		$datatemp1[$j] =$values [1][$j]; // content
		    	  		$datatemp2[$j] =$values [2][$j];  // solution
		    	  		$datatemp3[$j] =$values [3][$j];  //point value
		    	  		$datatemp4[$j] =$values [4][$j]; // DJ
		    	  		$datatemp5[$j] =$values [5][$j]; // FJ
		    	  		$datatemp7[$j] =$values [7][$j]; // catID
		    	  		
		    	  		array_push($bigarray[$j],$datatemp1[$j],$datatemp2[$j],$datatemp3[$j],$datatemp4[$j],
		    	  				$datatemp5[$j],$datatemp7[$j]);
		    	  	}}
		    	  
		            return ($bigarray);
			break;
		    	}	
		default:
			
	}
	        
}