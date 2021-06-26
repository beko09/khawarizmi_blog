<?php
    /**
     * This file content information 
     * about connection to database
     * In this connection used mysqli oop
     * to connect to database
     * notes
     * all this info above will be change
     * depend on device and server and
     * version php to used
     */

    $host       = 'localhost';
    $username   = 'root';
    $password   = 'root';
    $db_name    = 'blog';

    // Create connection
    $conn = new mysqli($host, $username, $password, $db_name);

    // Check connection status
    if($conn->connect_error){
      die("Connection failed: ".$conn->connect_error);
    }