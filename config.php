<?php

/* Database credentials */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id6578205_fyp');
define('DB_PASSWORD', 'abcd1234');
define('DB_NAME', 'id6578205_fyp');
 
/* connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
