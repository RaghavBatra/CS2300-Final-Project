<?php

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // connect with the mysql database
    if($mysqli->connect_error) { // terminate script if fail to connect with database
        die("Connection failed: " . $mysqli->connect_error);
    }

?>