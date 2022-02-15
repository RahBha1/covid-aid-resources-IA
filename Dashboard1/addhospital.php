<?php
$conn = mysqli_connect('localhost', 'rahul', 'whiplash10', 'covid_data');

// checking if it has connected properly
if(!$conn){
echo 'database connection error!: ' . mysqli_connect_error();}

$street = $borough = $hospital_name = $zipcode = '';
$hospital_phone = 'please do not put area code';
$errors =  array('hospital_name'=>'', 'street'=>'', 'hospital_phone'=>'', 'borough'=>'', 'zipcode'=>'');

if(empty($_GET['hospital_name'])){
  echo 'A hospital name is required <br />';}
else{
  $hospital_name = $_GET['hospital_name'];
   if(!preg_match('/^[a-zA-X\s]+$/', $hospital_name)){
     $errors['hospital_name'] = "The hospital's name must be letters and spaces only <br />";}
}


if(empty($_GET['street'])){
  echo 'A street for the hospital is required <br />';}
else{
  $street = $_GET['street'];
   if(!preg_match('/^[a-zA-X\s]+$/', $street)){
     $errors['street'] = 'The street for the hospital must be letters and spaces only <br />';}
}


if(empty($_GET['borough'])){
  echo 'A street number for the hospital is required <br />';}
else{
  $borough = $_GET['borough'];
    if(!preg_match('/^[a-zA-X\s]+$/', $borough)){
        $errors['borough'] = 'The borough for the hospital must be letters and spaces only <br />';}
}


if(empty($_GET['hospital_phone'])){
  echo 'A phone number for the hospital is required <br />';}
else{
  $hospital_phone = $_GET['hospital_phone'];
   if(!preg_match('/^[1-9][0-9]{9}+$/', $hospital_phone)){
     $errors['hospital_phone'] = 'The hospital phone number must be exactly 10 digits <br />';}
}


if(empty($_GET['zipcode'])){
  echo 'A hospital zipcode is required <br />';}
else{
  $zipcode = $_GET['zipcode'];
    if(!preg_match('/^[1-9][0-9]{5}+$/', $zipcode)){
      $errors['zipcode'] = 'The zipcode must be exactly 6 digits <br />';}
}

if(array_filter($errors)){
  echo 'THERE ARE ERRORS IN THE FORM';
}
else{

  $hospital_name = mysqli_real_escape_string($conn, $_GET['hospital_name']);
  $street = mysqli_real_escape_string($conn, $_GET['street']);
  $borough = mysqli_real_escape_string($conn, $_GET['borough']);
  $hospital_phone = mysqli_real_escape_string($conn, $_GET['hospital_phone']);
  $zipcode = mysqli_real_escape_string($conn, $_GET['zipcode']);

  $sql = "INSERT INTO hospitals(name,streetname,borough,phonenumber,zipcode) VALUES('$hospital_name', '$street', '$borough', '$hospital_phone', '$zipcode')";

if(mysqli_query($conn, $sql)){
  header('Location: adddata.php');

} else{
  echo 'query error: ' . mysqli_error($conn);
}

      }
?>

<!DOCTYPE html>
<html land="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" href="contributerregistration.css" href="dashboard/css/bootstrap.css">

<?php include('header.php'); ?>

<section class="container grey-text">
  <h3 class="center">Add a Hospital
  </h4>
  <h5 class="center">State: Maharastra
  </h5>
  <h5 class="center">City: Pune
  </h5>
  <form class="blue lighten-4" action="addhospital.php" method"GET">


    <label>Hospital Name:</label>
    <input type="text" name="hospital_name" value="<?php echo htmlspecialchars($hospital_name) ?>">
    <div class="red-text">
      <?php echo $errors['hospital_name']; ?>
    </div>

    <label>Street Name:</label>
    <input type="text" name="street" value="<?php echo htmlspecialchars($street) ?>">
    <div class="red-text">
      <?php echo $errors['street']; ?>
    </div>

    <label>Borough:</label>
    <input type="text" name="borough" value="<?php echo htmlspecialchars($borough) ?>">
    <div class="red-text">
      <?php echo $errors['borough']; ?>
    </div>

    <label>Hospital Phone Number:</label>
    <input type="text" name="hospital_phone" value="<?php echo htmlspecialchars($hospital_phone) ?>">
    <div class="red-text">
      <?php echo $errors['hospital_phone']; ?>
    </div>

    <label>Zipcode:</label>
    <input type="text" name="zipcode" value="<?php echo htmlspecialchars($zipcode) ?>">
    <div class="red-text">
      <?php echo $errors['zipcode']; ?>
    </div>

    <div class="center">
      <input type="submit" name="submit" value="submit" class"btn blue">
    </div>
  </form>
</section>

<?php include('footer.php'); ?>

</html>
