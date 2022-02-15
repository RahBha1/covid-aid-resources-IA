<!DOCTYPE html>
<html land="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="Homepage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php include('header.php') ?>

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

// free the result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);
 ?>

<div class="welcome-text">
<h1>Verified Pune Coronavirus Aid Resources</h1>
<a href="adminlogin.php">Add Data</a>
<a href="trends.php">View Trends</a>
<a href="map.php">Map View</a>


<div class="container">
  <div class="row">
    <?php foreach($hospitalnames as $hospitalname){ ?>
      <div class="col s6 md3">
        <div class="card">
          <div class="card-content center">
            <h6><?php echo htmlspecialchars($hospitalname['name']); ?></h6>
          </div>
          <div class="card-action center">
            <a href="hospitaldetails.php?id=<?php echo $hospitalname['id'] ?>">more info</a>
          </div>
        </div>
      </div>
<?php } ?>

</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<?php include('footer.php') ?>

</html>
