<?php

    $host       = 'localhost';
    $username   = 'root';
    $password   = 'root';
    $db_name    = 'blog';

    // Create connection
    $conn = new mysqli($host, $username, $password, $db_name);

    // Check connection statusa
    if($conn->connect_error){
      die("Connection failed: ".$conn->connect_error);
    }