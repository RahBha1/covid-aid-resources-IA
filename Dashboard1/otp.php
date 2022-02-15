<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'vendor/autoload.php';
require_once "config.php";
// include_once 'planningcrap.php';

$email = $otp = $password = "";
$email_wrong = $otp_wrong = $password_wrong = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["email"]))){
        $email_wrong = "Please enter an email.";
    } elseif(empty(trim($_POST["password"]))){
        $password_wrong = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_wrong = "Password must have atleast 8 characters.";
    } elseif(empty(trim($_POST["otp"]))){
        $otp_wrong = "Please enter OTP";
    }elseif(strlen(trim($_POST["otp"])) != 4){
        $otp_wrong = "OTP must have 4 numbers.";
    }



    if(empty($email_wrong) && empty($otp_wrong) && empty($password_wrong)){

        $email=trim($_POST["email"]);
        $password=trim($_POST["password"]);
        $otp=trim($_POST["otp"]);

        //$sql3 = "SELECT * WHERE (email, password, otp) VALUES(,?,?,?)";
        $sql3 = "SELECT * FROM accounts WHERE email LIKE ? AND otp LIKE ? AND verify LIKE 'false'";

        if($stmt3 = mysqli_prepare($conn, $sql3)){

            //mysqli_stmt_bind_param($stmt3, "sss",$param_email, $param_password, $param_otp);
            mysqli_stmt_bind_param($stmt3, "ss",$param_email, $param_otp);

            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_otp = $otp;


            if(mysqli_stmt_execute($stmt3)){
              mysqli_stmt_store_result($stmt3);
              if(mysqli_stmt_num_rows($stmt3) == 1){
                $sql4 = "UPDATE accounts SET verify='true' WHERE email LIKE '".$email."'";
                echo $sql4;
                if($conn->query($sql4) === TRUE){
                  header("location: login1.php");
                }else{
                  echo "Error";
                }
              } else{
                echo "Data not found";
              }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }


            mysqli_stmt_close($stmt3);
        }

    }


    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" href="dashboard/css/bootstrap.css" href="contributerregistration.css">
    <?php include('header.php'); ?>
    <style>
        body{ font: 15px sans-serif; }
        .wrapper{ width: 371px; padding: 22px; }
    </style>
</head>
<body>
</body>
<section class="container grey-text">
  <h4 class="center">Contributor Registration</h4>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="blue lighten-4" method="post">
          <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control <?php echo (!empty($email_wrong)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
              <span class="invalid-feedback"><?php echo $email_wrong; ?></span>
          </div>
          <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" class="form-control <?php echo (!empty($password_wrong)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
              <span class="invalid-feedback"><?php echo $password_wrong; ?></span>
          </div>
          <div class="form-group">
              <label>OTP</label>
              <input type="text" name="otp" class="form-control <?php echo (!empty($otp_wrong)) ? 'is-invalid' : ''; ?>" value="<?php echo $otp; ?>">
              <span class="invalid-feedback"><?php echo $otp_wrong; ?></span>
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Confirm">
          </div>
        </form>
    </section>
</html>
