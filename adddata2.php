
<?php
require_once "config.php";
if(!$conn){
  echo 'database connection error!: ' . mysqli_connect_error();}

$msg="";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $resource = trim($_POST["resource"]);
    $name = $_GET['id'];
    $newdata = trim($_POST["newdata"]);

    $sql3 = "UPDATE hospitals SET ".$resource."='".$newdata."' WHERE id = '".$name."'";

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/".$filename;


    if($_FILES['uploadfile']['error'] == UPLOAD_ERR_NO_FILE){
      $msg = $msg."Upload evidence please.";
      $uploadOk = 0;
    }elseif(getimagesize($_FILES["uploadfile"]["tmp_name"]) !== false) {
      $uploadOk = 1;
    } else {
      $msg = $msg."File is not an image.";
      $uploadOk = 0;
    }

    if($uploadOk == 1){
      // Get all the submitted data from the form
      $sql = "INSERT INTO image (filename) VALUES ('$filename')";

      // Execute query
      mysqli_query($conn, $sql);

      // Now let's move the uploaded image into the folder: image
      if (move_uploaded_file($tempname, $folder)) {
        $msg = $msg."Image uploaded successfully";
      }else{
        $msg = $msg."Failed to upload image";
      }
      if ($conn->query($sql3)){

        header("location: covid.php");
      }
    }


  }

  if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM hospitals WHERE id = $id";

    $result = mysqli_query($conn,$sql);

    $hospital = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

  }
  $conn->close();
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

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo htmlspecialchars($hospital['id']); ?>" method="post" enctype="multipart/form-data">

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
              <div>
              Please upload a file as evidence:
              <input type="file" name="uploadfile" value=""/>
              <br>
              <?php echo $msg; ?>
            </div>
              <button id="btn">submit</button>
            </form>

          <?php else: ?>
            <h5>No such hospital exists!</h5>
          <?php endif ?>
        </div>
      </body>

  </html>
