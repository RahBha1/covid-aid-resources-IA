
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<title>Hospital Resource Trends</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
</head>
<body class="bg-primary darken-sm">

	<div class="welcome-text">
	<h1>Verified Pune Coronavirus Aid Resources</h1>
	<h4> <a class="bg-secondary darken-sm" href="covid.php">Home</a></h4>
	<h4> <a class="bg-secondary darken-sm" href="adminlogin.php">Add Data</a></h4>
	<h4> <a class="bg-secondary darken-sm" href="map.php">Map View</a></h4>
	<h4> <a class="bg-secondary darken-sm" href="account.php">Manage Your Account</a></h4>

	<body>
		<div class="container">
			<h2 class="text-center mt-4 mb-3">Hospital Resource Trends</a></h2>

			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<h2 class="mb-4">Please Select the Resource You Want to See:</h2>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="resource" class="resource" id="oxygen" value="oxygen" checked>
							<label class="form-check-label mb-2" for="resource_1">Oxygen</label>
						</div>
						<div class="form-check">
							<input type="radio" name="resource" id="resource_2" class="form-check-input" value="fabiflu">
							<label class="form-check-label mb-2" for="resource_2">FabiFlu</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="resource" class="resource" id="resource_3" value="beds">
							<label class="form-check-label mb-3" for="resource_3">Beds</label>
						</div>
						<div class="form-check">
							<input type="radio" name="resource" id="resource_2" class="form-check-input" value="remdesivir">
							<label class="form-check-label mb-2" for="resource_2">Remdesivir</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="resource" class="resource" id="resource_3" value="vaccine">
							<label class="form-check-label mb-3" for="resource_3">Vaccine</label>
						</div>
					</div>
					<div class="form-group">
						<button type="button" name="submit_data" class="btn btn-primary" id="submit_data">Submit</button>
					</div>
				</div>
			</div>
		<div class="container-fluid" style="margin:0 auto;">
			<div class="row center">
				<div class="col-md-12">
					<div class="card mt-5">
						<div class="card-header">Pie Chart</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="pie_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>

	<script>

	$(document).ready(
		function()
		{
			$('#submit_data').click(
				function(){
					var language = $('input[name=resource]:checked').val();

					$.ajax({
						url:"data.php",
						method:"POST",
						data:{action:'fetch', language:language},
						dataType:"JSON",
						success:function(data)
						{
							var language = [];
							var total = [];
							var color = [];

							for(var count = 0; count < data.length; count++)
							{
								language.push(data[count].language);
								total.push(data[count].total);
								color.push(data[count].color);
							}

							var chart_data = {
								labels:language,
								datasets:[
									{
										label:'Vote',
										backgroundColor:color,
										color:'#fff',
										data:total
									}
								]
							};

							var options = {
								responsive:true,
								scales:{
									yAxes:[{
										ticks:{
											min:0
										}
									}]
								}
							};

							var group_chart1 = $('#pie_chart');

							var graph1 = new Chart(group_chart1, {
								type:"pie",
								data:chart_data
							});
						},
						error: function() {
							alert('There was some error performing the AJAX call!');
						}
					})
				}

			)});

			</script>
