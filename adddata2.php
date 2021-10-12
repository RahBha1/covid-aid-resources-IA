<?php

$conn = mysqli_connect('localhost', 'rahul', 'whiplash10', 'covid_data');
if(!$conn){
echo 'database connection error!: ' . mysqli_connect_error();}

// check GET request id parameter
if(isset($_GET['id'])){

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  //make sql and select all columns from the hospitals table using '*'
  $sql = "SELECT * FROM hospitals WHERE id = $id";

  //get the query results
  $result = mysqli_query($conn,$sql);

  //fetch the result in an associative array format
  $hospital = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn);

  //print_r($hospital);
}


?>



<!DOCTYPE html>
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
  <h1>Update Resource</h1>
  <br>
  <br>
</div>
<div style="text-align:center">
  <?php if($hospital): ?>
    <h3>These are the current resources for </h3>
    <h3><?php echo htmlspecialchars($hospital['name']); ?></h3>
    <br>

    <h5>Oxygen: <?php echo htmlspecialchars($hospital['oxygen']); ?>, approximate cylinders</h5>
    <h5>Hospital Beds: <?php echo htmlspecialchars($hospital['beds']); ?>, approximate beds</h5>
    <h5>Remdesivir: <?php echo htmlspecialchars($hospital['remdesivir']); ?>, approximate doses</h5>
    <h5>Fabiflu: <?php echo htmlspecialchars($hospital['fabiflu']); ?>, approximate doses</h5>
    <h5>Vaccine: <?php echo htmlspecialchars($hospital['vaccine']); ?>, approximate doses</h5>
    <h5>Testing: <?php echo htmlspecialchars($hospital['testing']); ?></h5>

    <br>
    <br>
    Resource to Update: <select style="text-align:center" name="resource" id="options">
                   <option value=" "> </option>
                   <option value="oxygen">Oxygen</option>
                   <option value="beds">Hospital Beds</option>
                   <option value="remdesivir">Remdesivir</option>
                   <option value="fabiflu">Fabiflu</option>
                   <option value="vaccine">Vaccine</option>
                   <option value="testing">Testing</option>

    </select>
    <label for="newData">New Data:</label>
    <input type="text" id="newData">
    <button id="btn">submit</button>
    <br>


  <?php else: ?>
    <h5>No such hospital exists!</h5>
  <?php endif ?>
</div>
</body>
<!-- <script>

$(document).ready(
  function()
  {
    document.querySelector('#btn').onclick=(event)=>{
      toUpdate = document.getElementById('#options').selectedIndex();
      updateDate = document.getElementById('#newData').value;

      $query = "
  		UPDATE hospitals WHERE id LIKE " . $id . "
  		(".  .") VALUES (:language)
  		";

  		$statement = $connect->prepare($query);

  		$statement->execute($data);
      ?>
    }
  } -->
</html>
