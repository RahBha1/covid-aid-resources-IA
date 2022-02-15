<?php include('header.php') ?>
<?php


session_start();


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>yo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body{ font: 15px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h2 class="my-5">Hello, <b><?php echo htmlspecialchars($_SESSION["loginname"]); ?></b>. Select a Management Option Below.</h2>
    <p>
        <a href="reset_password1.php" class="btn blue">Change Your Password</a>
        <a href="logout.php" class="btn blue">Signout From Profile</a>
    </p>
</body>
<?php include('footer.php'); ?>
</html>
