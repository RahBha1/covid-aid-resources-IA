<?php

  // connection to the 'covid_data' database
  $conn = mysqli_connect('localhost', 'rahul', 'whiplash10', 'covid_data');

  // checking if it has connected properly
  if(!$conn){
  echo 'database connection error!: ' . mysqli_connect_error();}

  // write query for database
  $sql = 'SELECT name, id FROM hospitals ORDER BY timestamp';
  // make query and get results
  $result = mysqli_query($conn, $sql);

  // fetch the resulting rows as an array
  $hospitalnames = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // free result from memory
  mysqli_free_result($result);

  // close connection
  mysqli_close($conn);

  // print the arroy of hospital names
  //print_r($hospitalnames);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <body class="bg-primary darken-sm">

<div style="text-align:center">
  <title>Hello, world!</title>
</head>
<body>
  <h1>Select Hospital</h1>
</div>
<br>
<br>
<form style="text-align:center" action="adddata2.php" method="post">

  <div class="dropdown">
  Hospital Name: <button class="dropbtn"> Select... </button>
  <div class="dropdown-content">
  <?php foreach($hospitalnames as $hospitalname){ ?>
          <a href="adddata2.php?id=<?php echo $hospitalname['id'] ?>" value="id=<?php echo $hospitalname['id'] ?>"><?php echo htmlspecialchars($hospitalname['name']);?>
  <?php } ?></a>
  </div>
</div>
<br>
  <br>
  <br>
  Cannot see your Hospital?<a class="btn btn-secondary" href="addhospital.php" role="button">Add Hospital here.</a>

  <br>
  <br>
<br>

</form><br>

<!Doctype Html>
<Html>
<Head>
<Title>
Make a Dropdown Menu using Internal CSS
</Title>
<style>
.dropbtn {
    background-color: white;
    color: black;
    padding: 10px;
    font-size: 12px;
}
.dropdown {
    display: inline-block;
    position: relative
}
.dropdown-content {
    position: absolute;
    background-color: lightgrey;
    min-width: 200px;
    display: none;
    z-index: 1;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {
    background-color: blue;
}
.dropdown:hover .dropdown-content {
    display: block;
}
.dropdown:hover .dropbtn {
    background-color: grey;
}
</style>
