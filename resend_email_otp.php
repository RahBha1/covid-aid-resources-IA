<?php

//resend_email_otp.php

$connect = new PDO("mysql:host=localhost;dbname=covid_data", "rahul", "whiplash10");

$message = '';

session_start();

if(isset($_SESSION["user_id"]))
{
 header("location:home.php");
}

if(isset($_POST["resend"]))
{
 if(empty($_POST["user_email"]))
 {
  $message = '<div class="alert alert-danger">Email Address is required</div>';
 }
 else
 {
  $data = array(
   ':user_email' => trim($_POST["user_email"])
  );

  $query = "
  SELECT * FROM register_user
  WHERE user_email = :user_email
  ";

  $statement = $connect->prepare($query);

  $statement->execute($data);

  if($statement->rowCount() > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if($row["user_email_status"] == 'verified')
    {
     $message = '<div class="alert alert-info">Email Address already verified, you can login into system</div>';
    }
    else
    {
      include ('vendor/autoload.php');
      include ('vendor/PHPMailer.php');
      include ('vendor/SMTP.php');
      include ('vendor/OAuth.php');
      include ('vendor/Exception.php');
      include ('vendor/get_oauth_token.php');
      include ('vendor/POP3.php');

      $mail = new PHPMailer;
      $mail->IsSMTP();
      $mail->Host = 'smtpout.secureserver.net';
      $mail->Port = '587';
      $mail->SMTPAuth = true;
      $mail->Username = 'rahul';
      $mail->Password = 'whiplash10';
      $mail->SMTPSecure = 'ssl';
      $mail->From = '10rbhandari@gmail.com';
      $mail->FromName = 'Rahul Bhandari';
      $mail->AddAddress($_SESSION["user_email"]);
      $mail->WordWrap = 50;
      $mail->IsHTML(true);
      $mail->Subject = 'OTP for Login';
      $message_body = '
      <p>To verify your login details, please enter this OTP when prompted: <b>'.$login_otp.'</b>.</p>
      <p>Sincerely,</p>
      <p>Rahul B</p>
     ';
     $mail->Body = $message_body;

     if($mail->Send())
     {
      echo '<script>alert("Please Check Your Email for Verification Code")</script>';
      echo '<script>window.location.replace("email_verify.php?code='.$row["user_activation_code"].'");</script>';
     }
     else
     {

     }
    }
   }
  }
  else
  {
   $message = '<div class="alert alert-danger">Email Address not found in our record</div>';
  }
 }
}

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Resend Email Verification OTP in PHP Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://code.jquery.com/jquery.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Resend Email Verification OTP in PHP Registration</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Resend Email Verification OTP</h3>
    </div>
    <div class="panel-body">
     <?php echo $message; ?>
     <form method="post">
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="email" name="user_email" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="resend" class="btn btn-success" value="Send" />
      </div>
     </form>
    </div>
   </div>
  </div>
  <br />
  <br />
 </body>
</html>
