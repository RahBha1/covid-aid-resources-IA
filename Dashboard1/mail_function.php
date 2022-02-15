<?php
 function sendOTP($email,$otp) {
  include('vendor/autoload.php');
  include('vendor/PHPMailer.php');
  include('vendor/SMTP.php');
  include('vendor/OAuth.php');
  include('vendor/Exception.php');
  include('vendor/get_oauth_token.php');
  include('vendor/POP3.php');


  $message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug = 0;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl'; // tls or ssl
  $mail->Port     = "587";
  $mail->Username = "10rbhandari@gmail.com";
  $mail->Password = "Whiplash10";
  $mail->Host     = "smtp.gmail.com";
  $mail->Mailer   = "smtp";
  $mail->SetFrom('10rbhandari@gmail.com', 'Rahul Bhandari');
  $mail->AddAddress($email);
  $mail->Subject = "OTP to Login";
  $mail->MsgHTML($message_body);
  $mail->IsHTML(true);
  $result = $mail->Send();
  return $result;
 }
?>
