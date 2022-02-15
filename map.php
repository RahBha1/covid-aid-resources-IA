<?php

$conn = mysqli_connect('localhost', 'rahul', 'whiplash10', 'covid_data');
if(!$conn){
echo 'database connection error!: ' . mysqli_connect_error();}
$sql = 'SELECT * FROM hospitals ORDER BY id';
$result = mysqli_query($conn, $sql);
$hospitalnames = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include('header.php'); ?>
    <br>

<h1 style="text-align:center" class= "title">Map View</h1>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

  Resource to check:
    <select style="text-align:center;display: block;;" name="resource" id="options">
    <option value=" "> </option>
    <option name="oxygen" value="oxygen">Oxygen</option>
    <option name="beds" value="beds">Hospital Beds</option>
    <option name"remdesivir" value="remdesivir">Remdesivir</option>
    <option name"fabiflu" value="fabiflu">Fabiflu</option>
    <option name"vaccine" value="vaccine">Vaccine</option>
    <option name"testing" value="testing">Testing</option>
    <body>
    </select>

    <button id="btn">submit</button>
  </form>


<section class="section-1">


  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $resource = trim($_POST["resource"]);
   foreach($hospitalnames as $hospitalname){ ?>
    <?php if ($hospitalname[$resource]==0): ?>
      <a href="hospitaldetails.php?id=<?php echo $hospitalname['id'] ?>">
      <img class="id<?php echo $hospitalname['id']?>" src="images/redpin.png" />
        </a>
    <?php else: ?>
      <a href="hospitaldetails.php?id=<?php echo $hospitalname['id'] ?>">
      <img class="id<?php echo $hospitalname['id']?>" src="images/greenpin.png" <a href="hospitaldetails.php?id=<?php echo $hospitalname['id'] ?>"/></a>
        </a>

    <?php endif; ?>
  <?php } }?>


</section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>


<style media="screen">


  .id1 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 488px;
  }

  .id2 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 434px;
    left: 483px;
  }

  .id3 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 407px;
    left: 470px;
  }

  .id4 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 376px;
    left: 466px;
  }

  .id5 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 380px;
    left: 337px;
  }

  .id6 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 369px;
    left: 410px;
  }

  .id7 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 352px;
    left: 345px;
  }

  .id8 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 352px;
    left: 349px;
  }

  .id9 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 336px;
    left: 303px;
  }

  .id10 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 336px;
    left: 303px;
  }

  .id11 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 336px;
    left: 325px;
  }

  .id12 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 320px;
    left: 240px;
  }

  .id13 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 350px;
    left: 100px;
  }

  .id14 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 345px;
    right: 110px;
  }

  .id15 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 490px;
    left: 330px;
  }

  .id16 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 60px;
    left: 60px;
  }

  .id17 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 515px;
    left: 500px;
  }

  .id18 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 130px;
    left: 5px;
  }

  .id19 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 175px;
    left: 482px;
  }

  .id20 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 250px;
    left: 200px;
  }

  .id21 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 220px;
    left: 35px;
  }

  .id22 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 230px;
    right: 90px;
  }

  .id23 {
    margin: 15;
    padding: 20;
    width: 16px;
    height: 16px;
    background-color: blue;
    position:relative;
    top: 110px;
    right: 180px;
  }



  .section-1 {
    width: 65%;
    height: 570px;
    background-color: #ccc;
    position: relative;
    top: 50px;
    left: 440px;
    background-image: url(images/map2.png);
}
  .title {
      position: relative;
      left: 550px;
    	border: 5px solid #fff;
    	padding: 30px 100px;
    	text-decoration: none;
    	text-transform: uppercase;
    	font-size: 30px;
    	margin-top: 20px;
    	display: inline-block;
    	color: #fff;
    }

  }


</style>
<?php include('footer.php'); ?>






Kamla Nehru Hospital
Mangalwar Peth Rd
Gandhinagar
20 2550 8500
411002
