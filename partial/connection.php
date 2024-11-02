<?php
    $dbServer = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "cultural_db";
    $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

    if ($conn) {
        //echo "Connected";
    } 
    else {
        echo "Not Connected: " . mysqli_connect_error();
    }
?>