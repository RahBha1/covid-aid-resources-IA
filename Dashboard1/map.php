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


<form method="POST" action="map.php">
        <input type="button" name="oxygen" value="Oxygen"/>
        <input type="button" name="beds" value="Hospital Beds"/>
        <input type="button" name="remdesivir" value="Remdesivir"/>
        <input type="button" name="fabiflu" value="Fabiflu"/>
        <input type="button" name="vaccine" value="Vaccine"/>
        <button type="button" name="submit_data" class="btn btn-primary" id="submit_data">Submit</button>

</form>


<section class="section-1">





  <?php foreach($hospitalnames as $hospitalname){ ?>
    <?php if ($hospitalname['oxygen']==0): ?>
      <img class="id<?php echo $hospitalname['id']?>" src="images/redpin.png" />
    <?php else: ?>
      <img class="id<?php echo $hospitalname['id']?>" src="images/greenpin.png" />
    <?php endif; ?>
  <?php } ?>





  </section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>


<style media="screen">
  * {
    margin: 0;
    padding: 0;
  }

  .id1 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 488px;
  }

  .id2 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 434px;
    left: 483px;
  }

  .id3 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 407px;
    left: 470px;
  }

  .id4 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 376px;
    left: 466px;
  }

  .id5 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 380px;
    left: 337px;
  }

  .id6 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 369px;
    left: 410px;
  }

  .id7 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 352px;
    left: 345px;
  }

  .id8 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 352px;
    left: 349px;
  }

  .id9 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 336px;
    left: 303px;
  }

  .id10 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 336px;
    left: 303px;
  }

  .id11 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 336px;
    left: 325px;
  }

  .id12 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 320px;
    left: 240px;
  }

  .id13 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 537px;
  }

  .id14 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 541px;
  }

  .id15 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 545px;
  }

  .id16 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 549px;
  }

  .id17 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 553px;
  }

  .id18 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 557px;
  }

  .id19 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 561px;
  }

  .id20 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 565px;
  }

  .id21 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 569px;
  }

  .id22 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 573px;
  }

  .id23 {
    margin: 15;
    padding: 20;
    width: 14px;
    height: 14px;
    background-color: blue;
    position:relative;
    top: 458px;
    left: 577px;
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
