<?php
// DB Credentials
$h = "localhost";			// local database 
$u = "group5";			// database user name
$p = "pass123";	// database password
$db = "group5";			// database name

$userID = $_GET['userid'];
$pokeID = $_GET['pokeid'];

// create connection
$conn = new mysqli($h, $u, $p, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Query
$fields = "userID, pokemonID";
$sql = "INSERT INTO TestParties ($fields)
VALUES ($userID, $pokeID)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// header("Location: pokedexMerged.php");

// echo($sql);
?>