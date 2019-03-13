<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "group5", "pass123", "group5");

$result = $conn->query("SELECT pokemonID, name, type1, type2, total, HP, attack, defense, sAttack, sDefense, speed, searchName, evolveID FROM Pokemon");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"pokemonID":'  . $rs["pokemonID"] . ',';
    $outp .= '"name":"'   . $rs["name"]        . '",';
    $outp .= '"type1":"'. $rs["type1"]     . '",';
    $outp .= '"type2":"'. $rs["type2"]     . '",';
    $outp .= '"total":"'. $rs["total"]     . '",';
    $outp .= '"HP":"'. $rs["HP"]     . '",';
    $outp .= '"attack":"'. $rs["attack"]     . '",';
    $outp .= '"defense":"'. $rs["defense"]     . '",';
    $outp .= '"sAttack":"'. $rs["sAttack"]     . '",';
    $outp .= '"sDefense":"'. $rs["sDefense"]     . '",';
    $outp .= '"speed":"'. $rs["speed"]     . '",';
    $outp .= '"searchName":"'. $rs["searchName"]     . '",';
    $outp .= '"evolveID":"'. $rs["evolveID"]     . '"}';


}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>