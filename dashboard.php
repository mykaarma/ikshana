<?php session_start();
if(!isset($_SESSION['name']))
{
  header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IKSHANA | Mykaarma</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<meta name="google-signin-client_id" content="247685355631-81gt1flv72jpkc7cb3guv5ctefiijvps.apps.googleusercontent.com">
</head>

<body style="background:#091B3E;">
    <section>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 paddoff">
            <div class="contain">
                <div class="upper-head">
                    <div class="col-sm-2">
					<span style="font-size:36px;cursor:pointer;color:white" onclick="openNav()" id="openbtn">&#9776;</span>
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closebtn">&times;</a>
                    <div class="logo" >
					
                                    <img src="img/logo.png" alt="mykaarma_logo" style="width:200px" >
                    </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="contain">
                            <div class="heading">
                            <h2>IKSHANA : Alerting Portal</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="profile-details">
                            <!-- <div class="profile-image">
                                <img src="<?php echo $_SESSION['image'];?>" alt="profile_pic" style="width:50px;border-radius:50%;">
                            </div> -->
                            <div class="profile-name">
                                <p><?php echo $_SESSION['name'];?></span></p>
                               
                            </div>

                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="contain">
                        
                            <div class="sidenav" id="sidenav">
							
                            <a href="dashboard.php" class="active">Dashboard</a>
                            <a href="myktools.php">MyK Tools</a>
                            <a href="detail500.php">500 Detailed View</a>
                            <a href="detail504.php">504 Detailed View</a>
                            <a href="chaos.php">Chaos Engineering</a>
                            <a href="slow.php">Slow Query Summary</a>
                            </div>
                        
                        <div class="col-sm-12 paddoff">
                            <div class="box" style="height:100%;">
                                <div class="col-sm-6"   style="margin-top: 17px;">
                                    <div class="contain-chart" id="chart1" style="height:400px;width:100%;"></div>
                                </div>
                                <div class="col-sm-6" style="margin-top: 17px;"> 
                                    <div class="contain-chart" id="chart2" style="height:400px;width:100%;"></div>
                                </div>
								<div class="col-sm-6" style="margin-top: 17px;">
                                    <div class="contain-chart" id="chart3" style="height:400px;width:100%;"></div>
                                </div>
                                <div class="col-sm-6" style="margin-top: 17px;">
                                    <div class="contain-chart" id="chart4" style="height:400px;width:100%;"></div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
function openNav() {
	document.getElementById("openbtn").style.display = "none";
	document.getElementById("closebtn").style.display = "block";
  document.getElementById("sidenav").style.width = "250px";
}

function closeNav() {

	document.getElementById("closebtn").style.display = "none";
	document.getElementById("openbtn").style.display = "block";
  document.getElementById("sidenav").style.width = "0";
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
<?php 

 $dataPoints500=array();
 $dataPoints504=array();

 include('connection.php');
 $query=$db->prepare('SELECT count(*) as counts,DATE(timestamp) as odate FROM errors500 GROUP BY odate ORDER BY odate DESC LIMIT 7');
$data=array();
 $execute=$query->execute($data);
 if($execute)
 {
 	 while($datarow=$query->fetch())
 	 {
 	 	$arr=array();
 	 	$arr['y']=$datarow['counts'];
 	 	$arr['label']=$datarow['odate'];
 	 	array_push($dataPoints500, $arr);

 	 }

 }
 $query=$db->prepare('SELECT count(*) as counts,DATE(timestamp) as odate FROM errors504 GROUP BY odate ORDER BY odate DESC LIMIT 7');
$data=array();
 $execute=$query->execute($data);
 if($execute)
 {

 	 while($datarow=$query->fetch())
 	 {
 	 	$arr=array();
 	 	$arr['y']=$datarow['counts'];
 	 	$arr['label']=$datarow['odate'];
 	 	array_push($dataPoints504, $arr);

 	 }

 }
 
?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chart1", {
	height:400,
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
		title: "Date",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},

	data: [{
		indexLabelFontColor: "darkSlateGray",
		name: "views",
		type: "column",
		yValueFormatString: "#,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints500, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
var chart1 = new CanvasJS.Chart("chart2", {
	animationEnabled: true,
	height:400,
	title:{
		text: "Response code:504"
	},
	axisY: {
		title: "Count Of Alert",
		includeZero: true,
		
    	gridThickness: 0,
		
    	
	},
	axisX: {
		title: "Date",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		indexLabelFontColor: "darkSlateGray",
		name: "views",
		type: "column",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints504, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
var chart3 = new CanvasJS.Chart("chart3", {
	animationEnabled: true,
	height:400,
	title:{
		text: "Response code:504"
	},
	axisY: {
		title: "Count Of Alert",
		includeZero: true,
		
    	gridThickness: 0,
		
    	
	},
	axisX: {
		title: "Date",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		indexLabelFontColor: "darkSlateGray",
		name: "views",
		type: "column",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "black",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints504, JSON_NUMERIC_CHECK); ?>
	}]
});
chart3.render();

}

</script>
</html>