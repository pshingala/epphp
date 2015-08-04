<?php

$conn = FALSE;

function createConnection(){

    global $conn;

    if( $conn )
        return $conn;

    $servername = "127.0.0.1";
    $username   = "root";
    $password   = "";
    $db         = "ephpdb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function closeConnection($conn){
    global $conn;
        if( $conn != false )
            mysql_close($conn);
        $conn = false;
}

?> 