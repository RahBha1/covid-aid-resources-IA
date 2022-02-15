<?php
use PHPMailer\PHPMailer\PHPMailer;
use pPHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
echo('hello');
//if(isset($_SESSION["OTP"]))
//{

    require_once('vendor/autoload.php');
    //$tempMail = $_SESSION["tempOTPMail"];
  //  $otp = $_SESSION["OTP"];
function sendEmail2(){
  try{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 1;
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'covidresource10@gmail.com';
    $mail->Password = 'coronawhiplash10';
    $mail->SetFrom('covidresource10@gmail.com');
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Covid Resource Aid Registration OTP';
    $otp = mt_rand(10000, 999999);
    $mail->Body    = 'Your OTP for COVID Resource Aid Registration is <b>'.$otp.'</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    //$mail->Body = 'OTP: '.$otp.' This is once valid for once!';
    $mail->AddAddress('rahulb@muwci.net');
    $mail->send();
    return($otp);
} catch (Exception $e) {
}
}
    //$_SESSION["OTP"]=null;
    //echo("<script>window.location.href='otp.php'</script>");
 //}
 ?>


###############################################################################################


<?php

// if($_SERVER['REQUEST_METHOD']=="POST")
// {
//     include('connection.php');
//     $complete=true;
//     if(empty($_POST["mail"])){alert("Email-id is required to proceed!");$complete = false;}
//     else
//     {
//         $email = $_POST["mail"];
//         if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ALERT("Incorrect format for email!");$complete = false;}
//     }
//     if($complete==true)
//     {
//         $otp = mt_rand(10000, 999999);
//         $sqlSendOTP = mysqli_query($connection,"INSERT INTO otp (email,otp) VALUES ('$email', '$otp');");
//         $_SESSION["tempOTPMail"] = $otp;
//         $_SESSION["otp"] = $otp;
//         header("Location: mailSender.php");
//     }
// }
//function alert($message)[echo("<script>alert('$message');</script>");]
?>

##########################################################################################
<?php

//if(isset($_POST["otp"]))
//{
//    include('connection.php');
//    $mailToSearch = $_SESSION["tempOTPMail"];
//    $otpQuery = mysqli_query($connection,"SELECT * FROM otp WHERE email='$mailToSearch' ORDER BY id DESC LIMIT 0,1");
//    $otp = mysqli_fetch_array($otpQuery);$finalOTP = $otp["otp"];
//    if($_POST["otp"]==$finalOTP)
//    {
//        echo("<script>alert('You can openssl_spki_export_challenge your password now!');</script>");
//        echo("<script>window.location.href='changePassword.php';</script>");
//    }
//    else
//    {
//        echo("<script>alert('Wrong OTP!');</script>");
//        echo("<script>window.location.href='forgotPassword.php';</script>");
//    }
//}
