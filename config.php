<?php

/* Database credentials. Assuming you are running MySQL

server with default setting (user 'root' with no password) */

define('DB_SERVER', 'sql305.epizy.com');

define('DB_USERNAME', 'epiz_32830441');

define('DB_PASSWORD', 'smBeU2Sp4rQHaFb');

define('DB_NAME', 'epiz_32830441_nurbanu');

 

/* Attempt to connect to MySQL database */

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}



?>