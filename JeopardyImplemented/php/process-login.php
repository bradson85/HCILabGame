<?php



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
		$sql = "SELECT * FROM logininfo";
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
 die("Error retrieving data");
 }
 }
 return $accept;
}

function getname($info){
	$host = "localhost:3306";
	$database = "Jeopardy";
	$user = "root";
	$pass = "";
	$name = NULL;
	$connection = mysqli_connect($host,$user,$pass,$database);
	
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	} else {
		$sql = " Select firstname from logininfo  Where username = '". $info . "'";
		if ( $r = mysqli_query($connection, $sql) ) {
			while($row=mysqli_fetch_assoc($r)) {
					$name= $row['firstname'];
			}
				
			
			 
			mysqli_free_result($r);
			mysqli_close($connection);
		} else {
			die("Error retrieving data");
		}
	}
	return $name;
}

?>