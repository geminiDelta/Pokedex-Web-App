<?php
header("Access-Control-Allow-Origin: *");


$conn = new mysqli("localhost", "group5", "pass123", "group5");


$pokeid = $_GET["id"];
$pokeNext = 1;

$result = $conn->query("SELECT name, type1, type2, total, HP, attack, defense, sAttack, sDefense, speed, searchName, evolveID FROM Pokemon where pokemonID = '$pokeid'");

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

    $outpID .=  $pokeid;
    $outpName = $rs["name"];
    $outpType1 .= $rs["type1"];
    $outpType2 .= $rs["type2"];
    $outpTotal .= $rs["total"];
    $outpHP .=  $rs["HP"];
    $outpAttack .= $rs["attack"];
    $outpDefense .= $rs["defense"];
    $outpSattack .= $rs["sAttack"];
    $outpSdefense .= $rs["sDefense"];
    $outpSpeed .= $rs["speed"];
    $outpsearchName .= $rs["searchName"];
    $outpEvolveID .= $rs["evolveID"];
    $outpNext .= $pokeid+$pokeNext;
    $outpLast .= $pokeid-$pokeNext;
}

$conn->close();


?>
