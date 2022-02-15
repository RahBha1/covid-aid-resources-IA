<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login1.php");
    exit;
}

require_once "config.php";
$reset = $correct = "";
$reset_wrong = $correct_wrong = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(empty(trim($_POST["reset"]))){
        $reset_wrong = "Type your new passkey.";
    } elseif(strlen(trim($_POST["reset"])) < 8){
        $reset_wrong = "Passkey must be 8 characters minimum.";
    } else{
        $reset = trim($_POST["reset"]);
    }


    if(empty(trim($_POST["correct"]))){
        $correct_wrong = "Enter the passkey again.";
    } else{
        $correct = trim($_POST["correct"]);
        if(empty($reset_wrong) && ($reset != $correct)){
            $correct_wrong = "The passkeys did not match.";
        }
    }


    if(empty($reset_wrong) && empty($correct_wrong)){

        $sqli = "UPDATE accounts SET password = ? WHERE id = ?";

        if($statement = mysqli_prepare($connect, $sqli)){

            mysqli_stmt_bind_param($statement, "si", $pmrt_passkey, $pmrt_id);


            $pmrt_passkey = password_hash($reset, PASSWORD_DEFAULT);
            $pmrt_id = $_SESSION["id"];


            if(mysqli_stmt_execute($statement)){

                session_destroy();
                header("location: login1.php");
                exit();
            } else{
                echo "There was an issue while reseting password, please try again.";
            }


            mysqli_stmt_close($statement);
        }
    }


    mysqli_close($connect);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" href="dashboard/css/bootstrap.css" href="contributwrongegistration.css">
    <?php include('header.php'); ?>
    <br>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
  <section class="container grey-text">
    <h4 class="center">Reset Password</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="blue lighten-4" method="post">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="reset" class="form-control <?php echo (!empty($reset_wrong)) ? 'is-invalid' : ''; ?>" value="<?php echo $reset; ?>">
                <span class="invalid-feedback"><?php echo $reset_wrong; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="correct" class="form-control <?php echo (!empty($correct_wrong)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $correct_wrong; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="covid.php">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
