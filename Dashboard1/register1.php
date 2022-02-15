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

$loginname = $email = $password = $confirm_password = "";
$loginname_wrong = $email_wrong = $password_wrong = $confirm_password_wrong = "";

function sendEmail1($otp, $email){
try{
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Mailer = "smtp";
  $mail->SMTPDebug  = false;
  $mail->Port = 587;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'smtp.gmail.com';
  $mail->Username = 'covidresource10@gmail.com';
  $mail->Password = 'coronawhiplash10';
  $mail->SetFrom('covidresource10@gmail.com');
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Covid Resource Aid Registration OTP';
  $mail->Body    = 'Your OTP for COVID Resource Aid Registration is <b>'.$otp.'</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  $mail->Body = 'OTP: '.$otp.' This is once valid for once!';
  $mail->AddAddress($email);
  $mail->send();
} catch (Exception $e) {
}
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
$sameDeleted = FALSE;

$sqldl = "DELETE FROM accounts WHERE created_at < DATE_ADD(NOW(),INTERVAL -15 MINUTE) AND verify = 'false'";
if($conn->query($sqldl) === TRUE){

  $sql = "DELETE FROM accounts WHERE loginname = ? AND email = ? AND verify='false'";

  if($stmt = mysqli_prepare($conn, $sql)){

    mysqli_stmt_bind_param($stmt, "ss", $param_loginname, $param_email);

    $param_loginname = trim($_POST["loginname"]);
    $param_email = trim($_POST["email"]);

    if(mysqli_stmt_execute($stmt)){
        $sameDeleted = TRUE;
    }else{
      echo "Error1";
    }
  }
}else{
  echo "Error2";
}
mysqli_stmt_close($stmt);

if($sameDeleted == TRUE){

  if(empty(trim($_POST["loginname"]))){
    $loginname_wrong = "Please enter a login name.";
  } elseif(!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["loginname"]))){
    $loginname_wrong = "Login name can only contain letters and numbers.";
  } else{

    $sql = "SELECT id FROM accounts WHERE loginname = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
      mysqli_stmt_bind_param($stmt, "s", $param_loginname);

      $param_loginname = trim($_POST["loginname"]);

      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt) == 1){
          $loginname_wrong = "This loginname is already taken.";
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
    $email_wrong = "Please enter an email.";
  } else{

    $sql2 = "SELECT id FROM accounts WHERE email = ?";

    if($stmt2 = mysqli_prepare($conn, $sql2)){

      mysqli_stmt_bind_param($stmt2, "s", $param_email);


      $param_email = trim($_POST["email"]);


      if(mysqli_stmt_execute($stmt2)){

        mysqli_stmt_store_result($stmt2);

        if(mysqli_stmt_num_rows($stmt2) == 1){
          $email_wrong = "This email is already in use by another user.";
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
  $password_wrong = "Please enter a password.";
} elseif(strlen(trim($_POST["password"])) < 8){
  $password_wrong = "Password must have atleast 8 characters.";
} else{
  $password = trim($_POST["password"]);
}

if(empty(trim($_POST["confirm_password"]))){
  $confirm_password_wrong = "Please confirm password.";
} else{
  $confirm_password = trim($_POST["confirm_password"]);
  if(empty($password_wrong) && ($password != $confirm_password)){
    $confirm_password_wrong = "Password did not match.";
  }
}


if(empty($loginname_wrong) && empty($email_wrong) && empty($password_wrong) && empty($confirm_password_wrong)){

  session_start();
  $_SESSION['loginname']=trim($_POST["loginname"]);
  $_SESSION['email']=trim($_POST["email"]);
  $_SESSION['password']=trim($_POST["password"]);
  $otp=mt_rand(1111,9999);
  $_SESSION['otp']=$otp;

  $sql3 = "INSERT INTO accounts (loginname, email, password, otp, verify) VALUES(?,?,?,?,'false')";

  if($stmt3 = mysqli_prepare($conn, $sql3)){

    mysqli_stmt_bind_param($stmt3, "ssss", $param_loginname, $param_email, $param_password, $param_otp);

    $param_loginname = $loginname;
    $param_email = $email;
    $param_password = password_hash($password, PASSWORD_DEFAULT);
    $param_otp = $otp;

    if(mysqli_stmt_execute($stmt3)){
      sendEmail1($otp, $email);
      header("location: otp.php");
    } else{
      echo "Oops! Something went wrong. Please try again later.";
    }
    mysqli_stmt_close($stmt3);
  }
}
mysqli_close($conn);
}
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
  <section class="container grey-text">
    <h4 class="center">Contributor Registration</h4>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="blue lighten-4" method="post">
      <div class="form-group">
        <label>Login Name</label>
        <input type="text" name="loginname" class="form-control <?php echo (!empty($loginname_wrong)) ? 'is-invalid' : ''; ?>" value="<?php echo $loginname; ?>">
        <span class="invalid-feedback"><?php echo $loginname_wrong; ?></span>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control <?php echo (!empty($email_wrong)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
        <span class="invalid-feedback"><?php echo $email_wrong; ?></span>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control <?php echo (!empty($password_wrong)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
        <span class="invalid-feedback"><?php echo $password_wrong; ?></span>
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_wrong)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
        <span class="invalid-feedback"><?php echo $confirm_password_wrong; ?></span>
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
        <span class="invalid-feedback"><?php echo $loginname_wrong; ?></span>
      </div>
      <div class="form-group">
        <input type="confirm" class="btn btn-primary" value="Confirm">
      </div>
    </form>
  </section>
  <?php include('footer.php'); ?>

  </html>
