<?php
// DB Credentials
$h = "localhost";			// local database 
$u = "group5";			// database user name
$p = "pass123";	// database password
$db = "group5";			// database name

// Post Data
$userID = $_GET['userid'];
$pokeID = $_GET['pokeid'];

// Create Connection
$conn = new mysqli($h, $u, $p, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM TestParties
		WHERE userID=$userID AND pokemonID=$pokeID";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

// header("Location: pokedexMerged.php");
?>