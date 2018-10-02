<?php

$category = $_POST['Category'];
$clue =$_POST['Clue'];
$solution =$_POST['Solution'];


$result =savefilename($category,$clue,$solution);

if($result){
	echo "it worked";
	showDb();
 echo (	"<input type = \"button\" id = \"goback\" onClick=\"location.href='databuilder.php'\" Value = 'add another'>");
}


function savefilename($category,$clue,$solution){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$worked = false;
	$gamenumber = 1;
	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "INSERT INTO gameboarddata (category,clues,solutions,gameId ) VALUES (?,?,?,?)";
		if ( $statement = mysqli_prepare($connection, $sql) ) {
			mysqli_stmt_bind_param($statement, 'sssi', $category,$clue,$solution,$gamenumber);
			mysqli_stmt_execute($statement);
			$worked = true;
			mysqli_stmt_free_result ($statement);
			mysqli_close($connection);
		} else {
			die("Error retrieving data". $dateandtime.$name);
		}
	}
	return $worked;
}

function showDb(){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";

	$connection = mysqli_connect($host,$user,$pass,$database);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = "SELECT * FROM gameboarddata";
		if ( $r = mysqli_query($connection, $sql) ) {
			echo ("\n<br><table><tr><td>id</td><td>Category</td><td>Clue</td><td>Solutions</td><td>Game ID</td><tr>");
			while($row=mysqli_fetch_assoc($r)) {
				echo "<tr><td>". $row['clueid'] . "</td><td>" . $row['category'] . "</td><td>"
						. $row['clues']. "</td><td>" .$row['solutions']."</td><td>". $row['gameId'] . "</td></tr>" ;
				}
				echo ("</table><br>");
			mysqli_free_result($r);
			mysqli_close($connection);
		} else {
			die("Error retrieving data");
		}
	}}
?>