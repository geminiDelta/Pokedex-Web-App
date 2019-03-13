<?php

session_start();

$userID = $_GET['userid'];

$_SESSION['userid'] = $userID;	// save userID to session

// DB Credentials
$h = "localhost";			// local database 
$u = "group5";			// database user name
$p = "pass123";	// database password
$db = "group5";			// database name

// create connection
$conn = new mysqli($h, $u, $p, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Query
$fields = "tu.userID, tu.usename, tp.pokemonID";
$sql = "SELECT $fields FROM `TestParties` AS tp RIGHT JOIN `TestUsers` AS tu ON tp.userID=tu.userID WHERE tu.userID=$userID";
$result = $conn->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);
$outp = "";
$outp .= '{"userID":' 	. $row["userID"] 	. ',';
$outp .= '"username":"' . $row["usename"] 	. '",';
$outp .= '"party": [' 	. $row['pokemonID'];

$_SESSION['username'] = $row["usename"];	// save username to session

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    // $outp .= '{"userID":' 		. $rs["tu.userID"] . ',';
    // $outp .= '"username":"' 	. $rs["tu.usename"] . '",';
	$outp .= $rs["pokemonID"];
}
$outp .= ']}';
$conn->close();

echo($outp);
?>