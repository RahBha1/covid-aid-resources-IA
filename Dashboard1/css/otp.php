<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

//if(isset($_SESSION["OTP"]))
//{

    require_once('vendor/autoload.php');
    //$tempMail = $_SESSION["tempOTPMail"];
  //  $otp = $_SESSION["OTP"];
  function getOtp(){
    $sql2 = "SELECT * FROM otp (username) VALUES(?)";

    if($stmt2 = mysqli_prepare($conn, $sql2)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt2, "s", $param_username);

        // Set parameters
        $param_username = $username;
        $param_password = $password;
        $param_otp = $otp;

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt2)){
            // Redirect to login page
            header("location: otp.php");
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt2);
    }
  }
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
    //$mail->Body = 'OTP: '.$otp.' This is once valid for once!';
    $mail->AddAddress('rahulb@muwci.net');
    echo('hello');
    // $mail->send();
} catch (Exception $e) {
}
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(trim($_POST["OTP"])==$otp){
    echo("Correct OTP");
    header("location: adddata.php");
  }else{
    echo("Incorrect OTP");
    header("location: ".$otp."asd".$_POST["OTP"]);
  }
}
?>

<div class="col-md-6">
	<div class="panel panel-info" >
		<div class="panel-heading">
			<div class="panel-title">Enter OTP</div>
		</div>
		<div style="padding-top:30px" class="panel-body" >

			<form id="authenticateform" class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div style="margin-bottom: 25px" class="input-group">
					<label class="text-success">Enter Registered Email to get OTP</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
					<input type="text" class="form-control" id="OTP" name="OTP" placeholder="One Time Password">
				</div>
				<div style="margin-top:10px" class="form-group">
					<div class="col-sm-12 controls">
					  <input type="submit" name="authenticate" value="Submit" class="btn btn-success">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
