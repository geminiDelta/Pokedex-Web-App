<?php
header("Access-Control-Allow-Origin: *");


$conn = new mysqli("localhost", "group5", "pass123", "group5");


$pokeid = $_GET["pokemon1"];
$pokeid2 = $_GET["pokemon2"];
$pokeNext = 1;

$result = $conn->query("SELECT name, type1, type2, total, HP, attack, defense, sAttack, sDefense, speed FROM Pokemon where pokemonID = '$pokeid'");

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
    $outpNext .= $pokeid+$pokeNext;
    $outpLast .= $pokeid-$pokeNext;
}

$result2 = $conn->query("SELECT name, type1, type2, total, HP, attack, defense, sAttack, sDefense, speed FROM TempPokemon where pokemonID = '$pokeid2'");

while($rs2 = $result2->fetch_array(MYSQLI_ASSOC)) {

    $outpID2 .=  $pokeid2;
    $outpName2 = $rs2["name"];
    $outpType12 .= $rs2["type1"];
    $outpType22 .= $rs2["type2"];
    $outpTotal2 .= $rs2["total"];
    $outpHP2 .=  $rs2["HP"];
    $outpAttack2 .= $rs2["attack"];
    $outpDefense2 .= $rs2["defense"];
    $outpSattack2 .= $rs2["sAttack"];
    $outpSdefense2 .= $rs2["sDefense"];
    $outpSpeed2 .= $rs2["speed"];
    $outpNext2 .= $pokeid2+$pokeNext;
    $outpLast2 .= $pokeid2-$pokeNext;

}

$conn->close();


?>
