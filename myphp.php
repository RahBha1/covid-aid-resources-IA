<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>My Very First PHP File</title>
	</head>
	<body>
<h1>
		<?php


		echo "Welcome to PHP!";


		?>
</h1>
	</body>
</html>

<div id="box">
     <span id="button">Login</span>
    <form action="" id="form">
      <p><input type="text" placeholder="username"/></p>
      <p><input type="password" placeholder="password" /></p>
      <p><input type="submit" value="Sign in" /></p>
    </form>
</div>

<!-- <div id = "form1" style = "display:none">
<form  id="formirri" method="post" action="" target="_parent">
       <br/><br/>
    <div id="demo">
    <table width="230px" align="center" style="box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 100);"><tr><td colspan=1></td></tr>
<tr>
    <td><a href="#" class="close-classic"></a></td>
</tr>
</table>

</div> -->

<input id="dynamic" name="Irrigation Form" type="button" value="Calulation Form" ; onclick = "Openform();"
  style="overflow:hidden;padding: 5px 5px; border-radius: 3px;font-size: 8.5pt; width:200px ; background-color: #E7FCCA; font-weight: bold; ">


	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.dropbtn {
	  background-color: #04AA6D;
	  color: white;
	  padding: 16px;
	  font-size: 16px;
	  border: none;
	}

	.dropdown {
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f1f1f1;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a {
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	.dropdown-content a:hover {background-color: #ddd;}

	.dropdown:hover .dropdown-content {display: block;}

	.dropdown:hover .dropbtn {background-color: #3e8e41;}
	</style>
	</head>
	<body>

	<h2>Hoverable Dropdown</h2>
	<p>Move the mouse over the button to open the dropdown menu.</p>

	<div class="dropdown">
	  <button class="dropbtn">Dropdown</button>
	  <div class="dropdown-content">
	    <a href="#">Link 1</a>
	    <a href="#">Link 2</a>
	    <a href="#">Link 3</a>
	  </div>
	</div>

	</body>
	</html>
