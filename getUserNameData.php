<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "group5", "pass123", "group5");

$result = $conn->query("SELECT usename, userID FROM TestUsers");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"username": "'  . $rs["usename"] . '",';
	$outp .= '"userID": '. $rs["userID"]     . '}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
