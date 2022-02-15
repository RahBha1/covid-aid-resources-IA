
<?php
require_once "config.php";
if(!$conn){
echo 'database connection error!: ' . mysqli_connect_error();}

if(isset($_GET['id'])){

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "SELECT * FROM hospitals WHERE id = $id";

  $result = mysqli_query($conn,$sql);

  $hospital = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn);

}



if($_SERVER["REQUEST_METHOD"] == "POST"){

$resource = trim($_POST["resource"]);
$name = $hospital['name'];
$newdata = trim($_POST["newdata"]);


$sql3 = "UPDATE hospitals SET ".$resource."='".$newdata."' WHERE name = 'Bharati Hospital'";
echo $sql3;

if ($conn->query($sql3)){

  header("location: covid.php");
}

// if($stmt3 = mysqli_prepare($conn, $sql3)){
//
//   // mysqli_stmt_bind_param($stmt3, "sss", $resource, $newdata, $name);
//   mysqli_stmt_bind_param($stmt3, "s", $newdata);
//   if(mysqli_stmt_execute($stmt3)){
//
//       header("location: covid.php");
//   } else{
//       echo "Haat.";
//   }
//
//
//   mysqli_stmt_close($stmt3);
// }


// if ($conn->query($sql) === TRUE) {
// echo "Record updated successfully";
// } else {
// echo "Error updating record: " . $conn->error;
// }

$conn->close();


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
  <title>yo</title>
</head>
<body>
  <a href="covid.php" class="btn red">Home</a>
  <h1>Update Resource</h1>
  <br>
  <br>
</div>
<div style="text-align:center">
  <?php if($hospital): ?>
    <h3>These are the current resources for </h3>
    <h3><?php echo htmlspecialchars($hospital['name']); ?></h3>
    <br>
    <h5>Oxygen: <?php echo htmlspecialchars($hospital['oxygen']); ?> approximate cylinders</h5>
    <h5>Hospital Beds: <?php echo htmlspecialchars($hospital['beds']); ?> approximate beds</h5>
    <h5>Remdesivir: <?php echo htmlspecialchars($hospital['remdesivir']); ?> approximate doses</h5>
    <h5>Fabiflu: <?php echo htmlspecialchars($hospital['fabiflu']); ?> approximate doses</h5>
    <h5>Vaccine: <?php echo htmlspecialchars($hospital['vaccine']); ?> approximate doses</h5>
    <h5>Testing: <?php echo htmlspecialchars($hospital['testing']); ?></h5>

    <br>
    <br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    Resource to Update: <select style="text-align:center" name="resource" id="options">
                   <option value=" "> </option>
                   <option name="oxygen" value="oxygen">Oxygen</option>
                   <option name="beds" value="beds">Hospital Beds</option>
                   <option name"remdesivir" value="remdesivir">Remdesivir</option>
                   <option name"fabiflu" value="fabiflu">Fabiflu</option>
                   <option name"vaccine" value="vaccine">Vaccine</option>
                   <option name"testing" value="testing">Testing</option>
<body>
    </select>

    <label for="newData">New Data:</label>
    <input name = "newdata" type="text" id="newData">
    <button id="btn">submit</button>
    <br>
    </form>

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
