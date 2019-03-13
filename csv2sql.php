<?php

/*
    THIS WAS TO LOAD THE TEMP CSV
*/



$filename = "pokemonData.csv";
$file = fopen($filename, "r");
//$sql_data = "SELECT * FROM prod_list_1 ";

$count = 0;   


                                      // add this line
while (($filesop = fgetcsv($file, 10000, ",")) !== FALSE)
{
    $mysql_access = mysql_connect('localhost','group5', 'pass123');

    if(!$mysql_access)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db('group5');

      $pokemonID = $filesop[0];
      $name = $filesop[1];
      $type1 = $filesop[2];
      $type2 = $filesop[3];
      $total = $filesop[4];
      $HP = $filesop[5];
      $attack = $filesop[6];
      $defense = $filesop[7];
      $sAttack = $filesop[8];
      $sDefense = $filesop[9];
      $speed = $filesop[10];
      $searchName = $filesop[11];
      $evolveID = $filesop[12];

    $count++;  
    echo "$pokemonID $name $attack + $defense <br> ";                                    // add this line
    
    $query = "INSERT INTO Pokemon (pokemonID, name, type1, type2, total, HP, attack, defense, sAttack, sDefense, speed, searchName, evolveID)
                    VALUES ('$pokemonID', '$name', '$type1', '$type2', '$total', '$HP', '$attack', '$defense', '$sAttack', '$sDefense', '$speed', '$searchName', '$evolveID')"; 
    $results = mysql_query($query, $mysql_access);  

    mysql_close($mysql_access);                                                                         
}

echo "End Loop";



         
?>