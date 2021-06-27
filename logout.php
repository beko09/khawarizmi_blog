<?php
session_start(); // start session
session_unset(); // unset session

session_destroy(); //destroy session

header("location:index.php");

exit();