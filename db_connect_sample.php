<?php
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "yeon";
    
    try{
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    } catch(mysqli_sql_exception) {
        echo("Cannot connect");
        die("Connection failed: " . $conn->connect_error);
    }
?>