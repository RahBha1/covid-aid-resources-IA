<?php

// connection to the 'covid_data' database
$conn = mysqli_connect('localhost', 'rahul', 'whiplash10', 'covid_data');

// checking if it has connected properly
if(!$conn){
echo 'database connection error!: ' . mysqli_connect_error();
}

// write query for database
$sql = 'SELECT name, email, phone FROM registeradmin';

// make query and get results
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$registeradmin = mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($registeradmin);
 ?>

 <!DOCTYPE html>
 <html>

 <?php include('header.php') ?>



 <?php include('footer.php') ?>

 </html>
