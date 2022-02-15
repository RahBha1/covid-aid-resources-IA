<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'rahul');
define('DB_PASSWORD', 'whiplash10');
define('DB_NAME', 'covid_data');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
