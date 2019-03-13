<?php
    session_start();

    $conn = mysql_connect("localhost", "group5", "pass123");

    mysql_select_db('group5');

    $testing = $_POST{'newuser'};

    $query = "INSERT INTO TestUsers (usename) VALUES ('$testing')";

    $result = mysql_query($query, $conn);

    mysql_close($conn);

    $_SESSION['username'] = $testing;
    
    header("Location: index.php");

?>

