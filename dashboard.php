<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alerting Portal</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
</head>

<body> 
	<?php include 'header.php';?> 
	<section style="margin: 0px!important;">
		
			<div class="col-sm-12">
				<div class="heading">
					<h3 style="color:black">Values Shown For Last 24 Hours</h3>
				</div>
				<div class="contain">
					<div id="chartContainer" style="height: 400px; width: 100%;margin-bottom: 25px;"></div>
					<div id="chartContainer1" style="height: 400px; width: 100%;"></div>
					
					<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
				</div>
			</div>
	
	</section>

<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
<?php 

 $dataPoints500=array();
 $dataPoints504=array();

 include('connection.php');
 $query=$db->prepare('SELECT count(*) as counts,backend FROM errors500 WHERE DATE(timestamp) >= NOW() - INTERVAL 2 DAY GROUP BY backend');
$data=array();
 $execute=$query->execute($data);
 if($execute)
 {
 	 while($datarow=$query->fetch())
 	 {
 	 	$arr=array();
 	 	$arr['y']=$datarow['counts'];
 	 	$arr['label']=strtok($datarow['backend'], '/');
 	 	array_push($dataPoints500, $arr);

 	 }

 }
 $query=$db->prepare('SELECT count(*) as counts,backend FROM errors504 WHERE DATE(timestamp) >= NOW() - INTERVAL 2 DAY GROUP BY backend');
$data=array();
 $execute=$query->execute($data);
 if($execute)
 {

 	 while($datarow=$query->fetch())
 	 {
 	 	$arr=array();
 	 	$arr['y']=$datarow['counts'];
 	 	$arr['label']=strtok($datarow['backend'], '/');
 	 	array_push($dataPoints504, $arr);

 	 }

 }
 
?>

<script type="text/javascript">
	window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Response code:500"
	},
	axisY: {
		title: "Count Of Alert",
		includeZero: true,
		
    	gridThickness: 0,
    	
	},
	axisX: {
		title: "Backend",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
		dataPoints: <?php echo json_encode($dataPoints500, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 

var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title:{
		text: "Response code:504"
	},
	axisY: {
		title: "Count Of Alert",
		includeZero: true,
		gridThickness: 0
	},
	axisX: {
		title: "Backend",
		includeZero: true,
		
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
		dataPoints: <?php echo json_encode($dataPoints504, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
 
}


</script>
</body>

</html>