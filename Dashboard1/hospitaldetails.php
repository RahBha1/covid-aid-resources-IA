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

  print_r($hospital);
}


?>



<!DOCTYPE html>
<html>
  <?php include('header.php'); ?>


<div class="container center">
  <form class="blue lighten-4">

  <?php if($hospital): ?>
    <h3>This Hospital's adress is: <?php echo htmlspecialchars($hospital['streetname']) ?>, <?php echo htmlspecialchars($hospital['borough']); ?>, Pune, India</h3>
    <h4><?php echo htmlspecialchars($hospital['name']); ?></h4>
    <p>Created by: <?php //echo htmlspecialchars($hospital['creator']); ?></p>
    <p><?php echo date($hospital['timestamp']); ?></p>
    <h5>Oxygen: <?php //echo htmlspecialchars($hospital['oxygen']); ?>, approximate cylinders</h5>
    <h5>Hospital Beds: <?php //echo htmlspecialchars($hospital['beds']); ?>, approximate beds</h5>
    <h5>Remdesivir: <?php //echo htmlspecialchars($hospital['remdesivir']); ?>, approximate doses</h5>
    <h5>Fabiflu: <?php //echo htmlspecialchars($hospital['fabiflu']); ?>, approximate doses</h5>
    <h5>Vaccine: <?php //echo htmlspecialchars($hospital['vaccine']); ?>, approximate doses</h5>
    <h5>Testing: <?php //echo htmlspecialchars($hospital['testing']); ?></h5>

  </form>
  <?php else: ?>
    <h5>No such hospital exists!</h5>
  <?php endif ?>
</div>


  <?php include('footer.php'); ?>
</html>
