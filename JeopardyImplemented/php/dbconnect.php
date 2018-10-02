<?php


// for accessing user login 
function checkLogin($username, $password){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$count = 0;
	$accept = false;
	
	$connection = mysqli_connect($host,$user,$pass,$database);
	
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT * FROM user";
		if ( $r = mysqli_query($connection, $sql) ) {
			while($row=mysqli_fetch_assoc($r)) {
				if ( $row['username'] == $username && $row['password'] == $password) {
					
					$accept = true;
					break;
				}
 				}
       
 mysqli_free_result($r);
 mysqli_close($connection);
 } else {
 die("Error retrieving data for login");
 }
 }
 return $accept;
}

// see if file already exists in a database
function checkIfFileExists($filename){

	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";

	$accept = false;

	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT name FROM game";
		if ( $r = mysqli_query($connection, $sql) ) {
			while($row=mysqli_fetch_assoc($r)) {
				if (($row['name'] == $filename) ) {

					$accept = true;
					break;
				}
			}

			mysqli_free_result($r);
			mysqli_close($connection);
		} else {
			die("Error retrieving data");
		}
	}
	return $accept;
}

// find a user id
function getUserId($username){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$userID= "Error";
	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT userID FROM game WHERE userID = '". $username . "'";
		if ( $r = mysqli_query($connection, $sql) ) {
			while($row=mysqli_fetch_assoc($r)) {
				$userID = $row['userID'];
			}
			mysqli_free_result($r);
			mysqli_close($connection);
		} else {
			die("Error retrieving data ". $userID. " " .$username);
		}
	}
	return $userID;
}

//get games associaated with certian user
function getGameNames($username){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$index = 0;
	$gameID= "Error";
	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT name FROM game WHERE userID = '". $username . "'";
		if ( $r = mysqli_query($connection, $sql) ) {
			while($row=mysqli_fetch_assoc($r)) {
				$index++;
				$namearray[$index] =$row['name'];
			}
			mysqli_free_result($r);
			mysqli_close($connection);
		} else {
			die("Error retrieving data ". $userID. " " .$username);
		}
	}
	return $namearray;
}

// get game id from file name
function getGameId($filename){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$gameID= 0;
	$connection = mysqli_connect($host,$user,$pass,$database);
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT gameID FROM game WHERE name =?";
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 's', $filename );
			mysqli_stmt_execute($statement);
			mysqli_stmt_bind_result($statement,$stmntgameID);
			while (mysqli_stmt_fetch($statement)) {
				$gameID = $stmntgameID;
				
				
			}
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
		}
	}
	return $gameID;
}
// get game category ids using game id
function getCategoryIds($gameID){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$index= 0;
	$categoryID="";
	
	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT categoryID FROM category WHERE gameID = ?";
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 'i', $gameID );
			mysqli_stmt_execute($statement);
			mysqli_stmt_bind_result($statement,$stmntcategoryID);
			while (mysqli_stmt_fetch($statement)) {
				$categoryID[$index]= $stmntcategoryID;
				$index++;

			}
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
		}
	}
	return $categoryID;
}

// creat newgame with just filename
function savenewfilename($name ,$currUser){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$success = false;
	date_default_timezone_set('America/Chicago');
	$dateandtime= date("m/d/y h:ia");
	$contestants = "";
	$scorestart = "";
	$scoreincrement = "";
	$userId = getUserId($currUser);

	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "INSERT INTO game (name,contestants,pointInit,pointIncr, userID, dateTime) VALUES (? , ? , ? ,?,?,?)";
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 'ssiiss', $name,$contestants, $scorestart,$scoreincrement, $userId ,$dateandtime);
			mysqli_stmt_execute($statement);
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
			$success = true;
		} else {
			die("Error retrieving data save file ". $userId." - ". $dateandtime.$name);
		}
	}
	return $success;
}
// load a save game from database
function loadgame($filename){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$dateandtime= "";
	$contestants = "";
	$scorestart = "";
	$scoreincrement ="";
	$userId = "";
	$gameName="";

	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "select* from game WHERE name = '".$filename."'";
	if ( $r = mysqli_query($connection, $sql) ) {
			while($row=mysqli_fetch_assoc($r)) {
				$dateandtime= $row['dateTime'];
				$contestants = $row['contestants'];
				$scorestart = $row['pointInit'];
				$scoreincrement =$row['pointIncr'];
				$userId = $row['userID'];
				$gameName= $row['name'];
			}
			mysqli_free_result($r);
			mysqli_close($connection);
		} else {
			die("Error retrieving data function loadgame()");
		}
	}
	return  array($gameName,$scorestart,$scoreincrement,$contestants, $userId, $dateandtime);
}
//pd0
function updatescoring($name ,$currUser,$scoreInit, $scoreIncr){
	
	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$dbname = "jeopardy";
	date_default_timezone_set('America/Chicago');
	$dateandtime= date("m/d/y h:ia");
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// Prepare statement
		$stmt = $conn->prepare( "UPDATE game set pointInit = :pointInit, pointIncr = :pointIncr, dateTime = :datetime, userID = :userID WHERE name=:name ");
	
	  
		$stmt->bindParam(':pointInit', $two);
		$stmt->bindParam(':pointIncr', $four);
		$stmt->bindParam(':datetime', $five);
		$stmt->bindParam(':userID', $three);
		$stmt->bindParam(':name', $one);
	
	$one = $name;
	$two = $scoreInit;
	$three= $currUser;
	$four = $scoreIncr;
	$five = $dateandtime;
	$stmt->execute();
	
		// echo a message to say the UPDATE succeeded
		echo $stmt->rowCount() . " records UPDATED successfully";
	}
	catch(PDOException $e)
	{
		echo  "<br>" . $e->getMessage();
	}
	
	$conn = null;
}

// make changes to game in db
function updategame($name ,$currUser,$scoreInit, $scoreIncr, $contestants){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$success = false;
	date_default_timezone_set('America/Chicago');
	$dateandtime= date("m/d/y h:ia");
	$contestants = $contestants;
	$scorestart = $scoreInit;
	$scoreincrement = $scoreIncr;
	$userId = getUserId($currUser);
	
	echo ($name." ".$contestants. " ".$scorestart." ".$scoreincrement." ".$dateandtime." ".$userId);
	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "UPDATE game SET contestants=? , pointInit=?, pointIncr=?, dateTime=?, userID=? WHERE name=? ";
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 'siisss', $contestants, $scorestart,$scoreincrement,$dateandtime,$userId,$name);
			mysqli_stmt_execute($statement);
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
			$success = true;
		} else {
			die("Error retrieving data save file updategame()");
		}
	}
	return $success;
}

function updateContestants($name ,$currUser, $contestants){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$success = false;
	date_default_timezone_set('America/Chicago');
	$dateandtime= date("m/d/y h:ia");
	$contestants = $contestants;
	$userId = getUserId($currUser);

	
	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "UPDATE game SET contestants=? , dateTime=? WHERE name=? ";
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 'sss', $contestants, $dateandtime ,$name);
			mysqli_stmt_execute($statement);
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
			$success = true;
		} else {
			die("Error retrieving data save file updategame()");
		}
	}
	return $success;
}
function checkIfFilenameHasCategories($gamename,$round){
	
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$idArray= array();
	$gameID = getGameId($gamename);
	$accept = false;
	switch ($round) {
		case "Final Jeopardy" :
			$sql = "SELECT categoryID FROM category where gameID=".$gameID." AND DJ=0 AND FJ= 1";
			break;
		case "Double Jeopardy":
			$sql = "SELECT categoryID FROM category where gameID=".$gameID. " AND DJ=1 AND FJ=0";
			break;
		default:
			$sql = "SELECT categoryID FROM category where gameID=".$gameID. " AND DJ=0 AND FJ=0";
	
	}
	
	$connection = mysqli_connect($host,$user,$pass,$database);
	
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		if ( $r = mysqli_query($connection, $sql) ) {
			while($row=mysqli_fetch_assoc($r)) {
				$idArray[]=$row['categoryID'];
				}
			
	
			mysqli_free_result($r);
			mysqli_close($connection);
		} else {
			die("Error retrieving data");
		}
	}
	return $idArray;
	}
	
	
	function deleteCategories($gamename,$round){
	
		$host = "localhost:3306";
		$database = "Jeopardy";
		$user = "root";
		$pass = "";
		$idArray = array();
		$idArray= checkIfFilenameHasCategories($gamename, $round);
		$lowrange;
		$highrange;
		
		if(count($idArray)<1){
			$lowrange=0;
			$highrange=0;
		}else{
		
		for ($x = 0; $x < count($idArray); $x++) {
			$lowrange=$idArray[0];
			$highrange=$idArray[count($idArray)-1];
		}
		}
		$accept = false;
		

		$connection = mysqli_connect($host,$user,$pass,$database);
	      
		if (mysqli_connect_errno()) {
			die(mysqli_connect_error());
		} else {
		$sql = "DELETE FROM category where categoryID BETWEEN ".$lowrange." AND ".$highrange ;
		  if (mysqli_query($connection, $sql)) {
        echo "Record deleted successfully";
      } else {
    echo "Error deleting record: " . mysqli_error($connection);
               }
	
		mysqli_close($connection);
		}
	}
	

// tried pdo here
function createCategory($name,$doubleJeo, $finalJeo, $gamename){
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "Jeopardy";
$gameID="";
$gameID = getGameId($gamename);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO category (name, DJ,FJ, gameID) 
    VALUES (:name, :DJ,:FJ, :gameID)");
    $stmt->bindParam(':name', $one);
    $stmt->bindParam(':DJ', $two);
    $stmt->bindParam(':FJ', $three);
    $stmt->bindParam(':gameID', $four);

    
   
    $one  = $name;
    $two = $doubleJeo;
    $three = $finalJeo;
    $four = $gameID;
    $stmt->execute();
    

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;

}
function updateCategory($name,$doubleJeo, $FinalJeo){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$success = false;
    
	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "UPDATE category SET name = ?, DJ =? ,FJ=? WHERE categoryID =? ";
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 'siii', $name,$doubleJeo, $finalJeo, $categoryId);
			mysqli_stmt_execute($statement);
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
			$success = true;
		} else {
			die("Error retrieving data save file ". $userID." - ". $dateandtime.$name);
		}
	}
	return $success;
}
 // limit of 10 each round
function checkCategoryCount($gamename){
	
	
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$gameID = getGameId($gamename);
	$regularcount=0;
	$djcount=0;
	$fjcount=0;
	$connection = mysqli_connect($host,$user,$pass,$database);
	
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT name ,DJ, FJ FROM category where gameID=".$gameID;
		if ( $r = mysqli_query($connection, $sql) ) {
			while($row=mysqli_fetch_assoc($r)) {
				  if($row['DJ'] == 1){     $djcount++;     }
				  if($row['FJ'] == 1){     $fjcount++;       }
				  if(($row['DJ']|$row['FJ']) != 1){    $regularcount++;        }
				}
			
	        mysqli_free_result($r);
			mysqli_close($connection);
		} else {
			die("Error retrieving data");
		}
	}
	return "".$regularcount.",".$djcount.",".$fjcount."";
	}
	
	function deleteClues($category,$round){
	
		$host = "localhost:3306";
		$database = "Jeopardy";
		$user = "root";
		$pass = "";
		$idArray = array();
		$idArray= checkIfCategoryHasClues($category, $round);
		$lowrange;
		$highrange;
	
		if(count($idArray)<1){
			$lowrange=0;
			$highrange=0;
		}else{
	
			for ($x = 0; $x < count($idArray); $x++) {
				$lowrange=$idArray[0];
				$highrange=$idArray[count($idArray)-1];
			}
		}
		$accept = false;
	
	
		$connection = mysqli_connect($host,$user,$pass,$database);
		 
		if (mysqli_connect_errno()) {
			die(mysqli_connect_error());
		} else {
			$sql = "DELETE FROM clue where clueID BETWEEN ".$lowrange." AND ".$highrange ;
			if (mysqli_query($connection, $sql)) {
				echo "Record deleted successfully";
			} else {
				echo "Error deleting record: " . mysqli_error($connection);
			}
	
			mysqli_close($connection);
		}
	}

function loadCategories($filename){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$index = 0;
	$categoryID = "";
	$name= "";
	$DJ = "";
	$FJ = "";
	$gameID = getGameId($filename);
	$gameprintID="";
	$connection = mysqli_connect($host,$user,$pass,$database);
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT categoryID, name, DJ, FJ, gameID from category where gameID =?" ;
	if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 'i', $gameID );
			mysqli_stmt_execute($statement);
			mysqli_stmt_bind_result($statement, $stmntID ,$stmntname,$stmntDJ,$stmntFJ,$stmntgameID);
			while (mysqli_stmt_fetch($statement)) {
				$categoryID[$index] = $stmntID;
				$name[$index]= $stmntname;
				$DJ[$index] = $stmntDJ;
				$FJ[$index] = $stmntFJ;
				$gameprintID[$index]= $stmntgameID;
				
				$index++;
					
			}
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
			$success = true;
		} else {
			die("Error retrieving data function loadCategories()");
		}
	}
	return array($categoryID,$name,$DJ,$FJ,$gameprintID);
	
}

function getSingleCategoryID($category){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$categoryID="";
	$connection = mysqli_connect($host,$user,$pass,$database);
	
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT categoryID FROM category WHERE name=?";
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 's', $category);
			mysqli_stmt_execute($statement);
			mysqli_stmt_bind_result($statement,$stmntcategoryID);
			while (mysqli_stmt_fetch($statement)) {
				$categoryID= $stmntcategoryID;
	
			}
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
		}
	}
	return $categoryID;
	}
	
	function checkCategoryRound($category){
		
		$host = "localhost:3306";
		$database = "Jeopardy";
		$user = "root";
		$pass = "";
		$categoryRound="Jeopardy";
		
		$connection = mysqli_connect($host,$user,$pass,$database);
		
		if (mysqli_connect_errno()) {
			die(mysqli_connect_error());
		} else {
			$sql = "SELECT FJ FROM category WHERE name= ?";
			if ( $statement = mysqli_prepare($connection, $sql) ) {
				mysqli_stmt_bind_param($statement, 's', $category);
				mysqli_stmt_execute($statement);
				mysqli_stmt_bind_result($statement,$stmntcategoryRound);
				while (mysqli_stmt_fetch($statement)) {
				
					if( $stmntcategoryRound == 1)
					{
						$categoryRound = "Final Jeopardy";
					}
				}				
			}
				
				
				$sql = "SELECT DJ FROM category WHERE name= ?";
				if ( $statement = mysqli_prepare($connection, $sql) ) {
					mysqli_stmt_bind_param($statement, 's', $category);
					mysqli_stmt_execute($statement);
					mysqli_stmt_bind_result($statement,$stmntcategoryRound);
					while (mysqli_stmt_fetch($statement)) {
						
					if( $stmntcategoryRound == 1)
					{
						$categoryRound = "Double Jeopardy";
					}
							
				
				
					}
					mysqli_stmt_free_result ($statement);
					mysqli_close($connection);
			}
		}
		return $categoryRound;
		}
		
function matchCategoryClue($category){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$categoryID = getSingleCategoryID($category);
	$clue = array();
	$index = 0;
	$round = checkCategoryRound($category);
	$DJ =0;
	$FJ= 0;
	switch ($round) {
		case "Final Jeopardy" :
			$DJ =0;
			$FJ= 1;
			$sql = "SELECT content from clue where categoryID =? AND DJ=? AND FJ=";
				break;
		case "Double Jeopardy":
			$DJ =1;
			$FJ= 0;
			$sql = "SELECT content from clue where categoryID =? AND DJ=? AND FJ=?";
			break;
		default:
			$DJ =0;
			$FJ= 0;
			$sql = "SELECT content FROM clue where categoryID =? AND DJ=? AND FJ=?";

	}
	$connection = mysqli_connect($host,$user,$pass,$database);
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 'iii', $categoryID,$DJ,$FJ);
			mysqli_stmt_execute($statement);
			mysqli_stmt_bind_result($statement, $stmntClue);
			while (mysqli_stmt_fetch($statement)) {    
				 $clue[$index]=$stmntClue;
			        $index++;
			        
			}
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
			$success = true;
		} else {
			die("Error retrieving data function loadCategories()");
		}
	}
	
	return $clue;
}

function matchCategorySolution($category){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$categoryID = getSingleCategoryID($category);
	$solution = array();
	$index = 0;
	$round = checkCategoryRound($category);
	$DJ =0;
	$FJ= 0;
	switch ($round) {
		case "Final Jeopardy" :
			$DJ =0;
			$FJ= 1;
			$sql = "SELECT solution from clue where categoryID =? AND DJ=? AND FJ=";
			break;
		case "Double Jeopardy":
			$DJ =1;
			$FJ= 0;
			$sql = "SELECT solution from clue where categoryID =? AND DJ=? AND FJ=?";
			break;
		default:
			$DJ =0;
			$FJ= 0;
			$sql = "SELECT solution FROM clue where categoryID =? AND DJ=? AND FJ=?";

	}
	$connection = mysqli_connect($host,$user,$pass,$database);
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 'iii', $categoryID,$DJ,$FJ);
			mysqli_stmt_execute($statement);
			mysqli_stmt_bind_result($statement, $stmntSol);
			while (mysqli_stmt_fetch($statement)) {
				$solution[$index]=$stmntSol;
				$index++;
				 
			}
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
			$success = true;
		} else {
			die("Error retrieving data function loadCategories()");
		}
	}

	return $solution;
}


function createClue($content,$solution, $pointvalue,$doubleJeo, $finalJeo,$categoryname){
	$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "Jeopardy";
$done= 0;

$catID = getSingleCategoryID($categoryname);
echo $catID;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO clue (content, solution, pointValue, DJ, FJ, done, categoryID) 
    VALUES ( :content, :solution, :pointValue, :DJ, :FJ, :done, :categoryID)");
    echo 'here';
    $stmt->bindParam(':content', $one);
    $stmt->bindParam(':solution', $two);
    $stmt->bindParam(':pointValue', $three);
    $stmt->bindParam(':DJ', $four);
    $stmt->bindParam(':FJ', $five);
    $stmt->bindParam(':done', $six);
    $stmt->bindParam(':categoryID', $seven);
    
  
    
    $one  = $content;
    $two = $solution;
    $three = $pointvalue;
    $four = $doubleJeo;
    $five  = $finalJeo;
    $six =    $done;
    $seven = $catID;
     $stmt->execute();
   
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Saving Clue Error: " . $e->getMessage();
    }
$conn = null;
	
}
function updateClue($content,$solution, $pointvalue,$doubleJeo, $finalJeo, $done,$categoryId){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$success = false;

	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "UPDATE clue SET content = ?,solution =?, pointValue= ?, DJ =? ,FJ=?, done =? Where categoryID =? AND pointValue =? ";
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 'ssiiiiii', $content,$solution, $pointvalue,$doubleJeo, $finalJeo, $done,$categoryId,$pointvalue );
			mysqli_stmt_execute($statement);
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
			$success = true;
		} else {
			die("Error retrieving data save file ". $userID." - ". $dateandtime.$name);
		}
	}
	return $success;
}

function checkIfCategoryHasClues($category,$round){

	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$idArray= array();
	$catID = getSingleCategoryID($category);
	echo $catID;
	$accept = false;
	switch ($round) {
		case "Final Jeopardy" :
			$sql = "SELECT clueID FROM clue where categoryID=".$catID." AND DJ=0 AND FJ= 1";
			break;
		case "Double Jeopardy":
			$sql = "SELECT clueID FROM clue where categoryID=".$catID. " AND DJ=1 AND FJ=0";
			break;
		default:
			$sql = "SELECT clueID FROM clue where categoryID=".$catID. " AND DJ=0 AND FJ=0";

	}

	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		if ( $r = mysqli_query($connection, $sql) ) {
			while($row=mysqli_fetch_assoc($r)) {
				$idArray[]=$row['clueID'];
			}
				

			mysqli_free_result($r);
			mysqli_close($connection);
		} else {
			die("Error retrieving category check clues data");
		}
	}
	return $idArray;
}

function loadClues($filename){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$index = 0;
	$clueID = "";
	$content= "";
	$solution="";
	$pointValue ="";
	$questionmarks ="";
	$values ="";
	$DJ = "";
	$FJ = "";
	$done="";
	$categoryprintID = "";
	$gameID = getGameId($filename);
	$categoryIDs = getCategoryIDs($gameID);
	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
             $string = implode(',', $categoryIDs);
		$sql = "SELECT clueID, content, solution, pointValue,DJ, FJ,done,categoryID from clue where categoryID IN (".$string.")" ;
		if ( $r = mysqli_query($connection, $sql) ) {
			while($row=mysqli_fetch_assoc($r)) {
				$clueID[$index] = $row['clueID'];
				$content[$index]= $row['content'];
				$solution[$index]= $row['solution'];
				$pointValue[$index]= $row['pointValue'];
				$DJ[$index] = $row['DJ'];
				$FJ[$index] =$row['FJ'];
				$done[$index]= $row['done'];
				$categoryprintID[$index] = $row['categoryID'];
				$index++;


			}
			mysqli_free_result ($r);
			mysqli_close($connection);
			$success = true;
		} else {
			die("Error retrieving data function loadCategories()");
		}
	
	return array($clueID,$content,$solution,$pointValue,$DJ,$FJ,$done,$categoryprintID);

}

 }
 
 function getPointValue($clue){
 	$host = "localhost:3306";
 	$database = "Jeopardy";
 	$user = "root";
 	$pass = "";
 	$points= 0;
 	
 	$connection = mysqli_connect($host,$user,$pass,$database);
 	if (mysqli_connect_errno()) {
 		die(mysqli_connect_error());
 	} else {
 		$sql = "SELECT pointValue FROM clue WHERE content=?";
 		if ( $statement = mysqli_prepare($connection, $sql) ) {
 			mysqli_stmt_bind_param($statement, 's', $clue);
 			mysqli_stmt_execute($statement);
 			mysqli_stmt_bind_result($statement,$stmntPoints);
 			while (mysqli_stmt_fetch($statement)) {
 				$points= $stmntPoints;
 	
 			}
 			mysqli_stmt_free_result ($statement);
 			mysqli_close($connection);
 		}
 	}  
 	return $points;
 	}
 	
function setDone($clue){
$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$dbname = "jeopardy";
$points= 0;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("UPDATE clue SET done = 1 where content = :clue ");

    $stmt->bindParam(':clue',$one);
    $one= $clue;
    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
function checkDone($clue){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$done= 0;
	
	$connection = mysqli_connect($host,$user,$pass,$database);
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT done FROM clue WHERE content=?";
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 's', $clue);
			mysqli_stmt_execute($statement);
			mysqli_stmt_bind_result($statement,$stmntPoints);
			while (mysqli_stmt_fetch($statement)) {
				$done= $stmntPoints;
	
			}
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
		}
	}
	return $done;
}
function resetDone(){
$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$dbname = "jeopardy";
$points= 0;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE clue SET done = 0 ";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}

function createScoreboard($teamnumber){
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "jeopardy";
$sqlstring= array();

for($i=1; $i<=$teamnumber;$i++){
	$sqlstring[$i] = "Team_".$i;
}

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
	// sql to drop table
	 $drop = "Drop TABLE IF EXISTS scoreboard";
	 $conn->exec($drop);
	 echo "Table scoreboard created successfully";
	// sql to create table
	$sql = "CREATE TABLE scoreboard (
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     name varchar(30), score INT (11) 	
    )";
// use exec() because no results are returned
	$conn->exec($sql);
	echo "Table scoreboard created successfully";
	
	
	foreach($sqlstring as $items){
	$insert = "INSERT INTO scoreboard (name, score)
    VALUES ('".$items."', 0 )";
	// use exec() because no results are returned
	$conn->exec($insert);
	echo $items. "created successfully";
	}
	
}
catch(PDOException $e)
{
	echo  "createScoreboard:".$e->getMessage();
}

$conn = null;
}

function updateScoreboard($score,$answered){
	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$dbname = "jeopardy";
	

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
// Prepare statement
	$stmt = $conn->prepare( "UPDATE scoreboard SET score = :score WHERE id = :answered");
$stmt->bindParam(':score',$one);
$stmt->bindParam(':answered',$two);
 $one= $score;
$two = $answered;
$stmt->execute();
	
 echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}

function loadScoreBoard(){
	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$dbname = "jeopardy";
	$score = array();
	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT score FROM scoreboard"); 
    $stmt->execute();
    
	// set the resulting array to associative
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
         
     $score = $result;
	}
    catch(PDOException $e) {
    	echo "Error: " . $e->getMessage();
    }
    $conn = null;
    
   return $score;
}

function getGameInfoFromCategory($category){
	
	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$dbname = "jeopardy";
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT gameID FROM category where name = :category");
		$stmt->bindParam(':category', $one);
		$one  = $category;
		
		$stmt->execute();
	
		// set the resulting array to associative
		$result = $stmt->fetch();
		
		   $value = $result['gameID'];
		
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
	
	 return $value;
	}

	function getPointBaseValues($gameID){
	
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "jeopardy";
	
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT pointInit, pointIncr FROM game where gameID = :gameID");
			$stmt->bindParam(':gameID', $one);
			$one  = $gameID;
	
			$stmt->execute();
	
			// set the resulting array to associative
			$result = $stmt->fetch();
	        
			  $value1 = $result['pointInit'];
			  $value2 = $result['pointIncr'];
			  
	
		}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$conn = null;
	
		return array ($value1,$value2);
	}
	
?>