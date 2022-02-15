
<?php

$conn = mysqli_connect('localhost', 'rahul', 'whiplash10', 'covid_data');
if(!$conn){
echo 'database connection error!: ' . mysqli_connect_error();}

if(isset($_GET['id'])){

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "SELECT * FROM hospitals WHERE id = $id";

  $result = mysqli_query($conn,$sql);

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
    Resource to Update: <select style="text-align:center" name="resource" id="options">
                   <option value=" "> </option>
                   <option value="oxygen">Oxygen</option>
                   <option value="beds">Hospital Beds</option>
                   <option value="remdesivir">Remdesivir</option>
                   <option value="fabiflu">Fabiflu</option>
                   <option value="vaccine">Vaccine</option>
                   <option value="testing">Testing</option>

<body>
<section class="container grey-text">
                       <h4 class="center">Contributor Registration</h4>
                           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="blue lighten-4" method="post">
                               <div class="form-group">
                                   <label>Login Name</label>
                                   <input type="text" name="loginname" class="form-control <?php echo (!empty($loginname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $loginname; ?>">
                                   <span class="invalid-feedback"><?php echo $loginname_err; ?></span>
                               </div>
                               <div class="form-group">
                                   <label>Email</label>
                                   <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                                   <span class="invalid-feedback"><?php echo $email_err; ?></span>
                               </div>
                               <div class="form-group">
                                   <label>Password</label>
                                   <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                   <span class="invalid-feedback"><?php echo $password_err; ?></span>
                               </div>
                               <div class="form-group">
                                   <label>Confirm Password</label>
                                   <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                                   <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                               </div>
                               <div class="form-group">
                                   <input type="submit" class="btn btn-primary" value="Submit">
                                   <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                               </div>
                               <p>Already have an account? <a href="login1.php">Login here</a>.</p>
                             </form>

                             <form action="" class="blue lighten-4" method="post">
                               <div class="form-group">
                                   <label>OTP</label>
                                   <input type="text" name="otp">
                                   <span class="invalid-feedback"><?php echo $loginname_err; ?></span>
                               </div>
                               <div class="form-group">
                                   <input type="confirm" class="btn btn-primary" value="Confirm">
                               </div>
    </form>
  </section>



    </select>
    <label for="newData">New Data:</label>
    <input type="text" id="newData">
    <button id="btn">submit</button>
    <br>

    <form action="adddata2.php?id=<?php echo $hospitalname['id'] ?>" method="post">
    New Data: <input type="text" name="newdata"><br>
    <input type="submit">
    </form>

    <?php

    $servername = "localhost";
    $username = "rahul";
    $password = "whiplash10";
    $dbname = "covid_data";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE hospitals SET 'resource'='newdata' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }

    $conn->close();

    ?>

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




<?php

  require_once "config.php";
  include_once 'planningcrap.php';

  $loginname = $email = $password = $confirm_password = "";
  $loginname_err = $email_err = $password_err = $confirm_password_err = "";


  if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["loginname"]))){
        $loginname_err = "Please enter a login name.";
    } elseif(!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["loginname"]))){
        $loginname_err = "Login name can only contain letters and numbers.";
    } else{

        $sql = "SELECT id FROM accounts WHERE loginname = ?";

        if($stmt = mysqli_prepare($conn, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_loginname);


            $param_loginname = trim($_POST["loginname"]);


            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $loginname_err = "This loginname is already taken.";
                } else{
                    $loginname = trim($_POST["loginname"]);
                }
            } else{
                echo "There was an issue while registering.";
            }


            mysqli_stmt_close($stmt);
        }
    }





      if(empty(trim($_POST["email"]))){
          $email_err = "Please enter an email.";
      } else{

          $sql2 = "SELECT id FROM accounts WHERE email = ?";

          if($stmt2 = mysqli_prepare($conn, $sql2)){

              mysqli_stmt_bind_param($stmt2, "s", $param_email);


              $param_email = trim($_POST["email"]);


              if(mysqli_stmt_execute($stmt2)){

                  mysqli_stmt_store_result($stmt2);

                  if(mysqli_stmt_num_rows($stmt2) == 1){
                      $email_err = "This email is already in use by another user.";
                  } else{
                      $email = trim($_POST["email"]);
                  }
              } else{
                  echo "There was an issue while registering.";
              }


              mysqli_stmt_close($stmt2);
          }
      }







      if(empty(trim($_POST["password"]))){
          $password_err = "Please enter a password.";
      } elseif(strlen(trim($_POST["password"])) < 8){
          $password_err = "Password must have atleast 8 characters.";
      } else{
          $password = trim($_POST["password"]);
      }


      if(empty(trim($_POST["confirm_password"]))){
          $confirm_password_err = "Please confirm password.";
      } else{
          $confirm_password = trim($_POST["confirm_password"]);
          if(empty($password_err) && ($password != $confirm_password)){
              $confirm_password_err = "Password did not match.";
          }
      }


      if(empty($loginname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){

          session_start();
          $_SESSION['loginname']=trim($_POST["loginname"]);
          $_SESSION['email']=trim($_POST["email"]);
          $_SESSION['password']=trim($_POST["password"]);
          $otp=mt_rand(1111,9999);
          $_SESSION['otp']=$otp;

          $sql3 = "INSERT INTO accounts (loginname, email, password, otp) VALUES(?,?,?,?)";

          if($stmt3 = mysqli_prepare($conn, $sql3)){

              mysqli_stmt_bind_param($stmt3, "ssss", $param_loginname, $param_email, $param_password, $param_otp);


              $param_loginname = $loginname;
              $param_email = $email;
              $param_password = password_hash($password, PASSWORD_DEFAULT);
              $param_otp = $otp;


              if(mysqli_stmt_execute($stmt3)){

                  header("location: adddata.php");
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }


              mysqli_stmt_close($stmt3);
          }

      }


      mysqli_close($conn);
  }
  ?>

</html>
