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
				
				<div class="contain">
					<div id="chartContainer" style="width: 100%;margin-bottom: 25px;"></div>
					
					<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
				</div>
			</div>
	
	</section>

<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
<?php 

 $dataPoints=array();


 include('connection.php');
 $date="";
  $query=$db->prepare('Select Date(date) as maxdate from slowquery ORDER BY date DESC LIMIT 1');
$data=array();
 $execute=$query->execute($data);
 if($execute)
 {
 	while($datarow=$query->fetch())
 	{
 		$date=$datarow['maxdate'];
 	}
 }
 $query=$db->prepare('Select * from slowquery where DATE(date)=?');
$data=array($date);
 $execute=$query->execute($data);

 if($execute)
 {
 	 while($datarow=$query->fetch())
 	 {
 	 	$arr=array();
 	 	$arr['y']=$datarow['count'];
 	 	$arr['label']=$datarow['user'];
 	 	array_push($dataPoints, $arr);

 	 }

 }
?>

<script type="text/javascript">
	window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Slow Query Summary for <?php echo $date ?>"
	},
	axisY: {
		title: "Count Of Alert",
		includeZero: true,
		
    	gridThickness: 0,
    	scaleBreaks: {
			autoCalculate: true
		}
    	
	},
	axisX: {
		title: "User",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "column",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
 

</script>
</body>

</html>