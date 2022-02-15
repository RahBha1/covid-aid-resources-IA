<?php

//data.php

$connect = new PDO("mysql:host=localhost;dbname=covid_data", "rahul", "whiplash10");

if(isset($_POST["action"]))
{
	if($_POST["action"] =='fetch')
	{
		$resources = $_POST['resources'];

		$query = "
		SELECT name, (" . $resources . ") AS Total
		FROM hospitals
		WHERE (" . $resources . ") > 0
		GROUP BY name;
		";

		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'resources'		=>	$row["name"],
				'total'			=>	$row["Total"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}

		echo json_encode($data);
	}
}else {
	alert("error");
}


?>
