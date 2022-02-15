<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: adddata.php");
    exit;
}

require_once "config.php";

$loginname = $email = $password = "";
$loginname_wrong = $email_wrong = $password_wrong = $login_wrong = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(empty(trim($_POST["loginname"]))){
        $loginname_wrong = "Please enter your login name.";
    } else{
        $loginname = trim($_POST["loginname"]);
    }


    if(empty(trim($_POST["email"]))){
        $email_wrong = "Please enter your registered email address.";
    } else{
        $email = trim($_POST["email"]);
    }


    if(empty(trim($_POST["password"]))){
        $password_wrong = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }


    if(empty($loginname_wrong) && empty($email_wrong) && empty($password_wrong)){

        $sql = "SELECT id, loginname, email, password FROM accounts WHERE loginname = ? AND verify = 'true'";

        if($stmt = mysqli_prepare($conn, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_loginname, $param_email);

            $param_loginname = $loginname;
            $param_email = $email;

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);


                if(mysqli_stmt_num_rows($stmt) == 1){

                    mysqli_stmt_bind_result($stmt, $id, $loginname, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){

                            session_start();


                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["loginname"] = $loginname;
                            $_SESSION["email"] = $email;


                            header("location: adddata.php");
                        } else{
                            $login_wrong = "The entered login name or password is incorrect.";
                        }
                    }
                } else{
                    $email_wrong = "The entered email or password is incorrect.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }


            mysqli_stmt_close($stmt);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" href="dashboard/css/bootstrap.css" href="contributwrongegistration.css">
    <?php include('header.php'); ?>
    <style>
        body{ font: 15px sans-serif; }
        .wrapper{ width: 371px; padding: 22px; }
    </style>
</head>
<body>
  <section class="container grey-text">
    <h4 class="center">Contributor Login</h4>

        <?php
        if(!empty($login_wrong)){
            echo '<div class="alert alert-danger">' . $login_wrong . '</div>';
        }
        if(!empty($email_wrong)){
            echo '<div class="alert alert-danger">' . $email_wrong . '</div>';
        }
        ?>

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
                <input type="password" name="password" class="form-control <?php echo (!empty($password_wrong)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_wrong; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register1.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>
