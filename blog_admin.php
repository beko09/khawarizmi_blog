<?php

include "include/header.php";
include "admin/includes/db.php";
global $conn;

$sql= "SELECT * FROM users";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
     include "login.php";
}else {
    include "register.php";
}
