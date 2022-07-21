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

<body>
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
                            <div class="profile-image">
                                <img src="<?php echo $_SESSION['image'];?>" alt="profile_pic" style="width:50px;border-radius:50%;">
                            </div>
                            <div class="profile-name">
                                <p><?php echo $_SESSION['name'];?></span></p>
                               
                            </div>

                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="contain">
                        
                            <div class="sidenav" id="sidenav">
							
                            <a href="dashboard.php" >Dashboard</a>
                            <a href="myktools.php" class="active" >MyK DevOps Tools</a>
                            <a href="detail500.php">500 Detailed View</a>
                            <a href="detail504.php">504 Detailed View</a>
                            <a href="chaos.php">Chaos Engineering</a>
                            <a href="slow.php">Slow Query Summary</a>
                            </div>
                        
                        <div class="col-sm-12 paddoff">
                            <div class="box" style="height:100%;">
                            <div class="product-details">
                
                                <ul class="nav" role="tablist" >
                                    <li class="nav-item" style="padding-bottom:10px!important;">
                                        <a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">PROD Tools</a>
                                    </li>
                                    <li class="nav-item" style="padding-bottom:10px!important;">
                                        <a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">QA Tools</a>
                                    </li>
                                    
                                    
                                </ul>
              
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                <div class="tab-content">
                                <!-- single tab content -->
                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                                    <div class="contain bg-white pad10 round-border25">
                                        <div class="col-sm-4">
                                            <div class="tool-list">
                                                <h2>Monitoring</h2>
                                                <ul>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">DMS-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">APP-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">INFRA-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Grafana  is used for monitoring the metrics of the Server !" data-placement="right">Grafana</a></li>
                                                </ul>
                                            </div>
                                            <div class="tool-list">
                                                <h2>Monitoring</h2>
                                                <ul>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">DMS-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">APP-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">INFRA-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Grafana  is used for monitoring the metrics of the Server !" data-placement="right">Grafana</a></li>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm-4">
                                        <div class="tool-list">
                                                <h2>Monitoring</h2>
                                                <ul>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">DMS-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">APP-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">INFRA-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Grafana  is used for monitoring the metrics of the Server !" data-placement="right">Grafana</a></li>
                                                </ul>
                                            </div>
                                            <div class="tool-list">
                                                <h2>Monitoring</h2>
                                                <ul>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">DMS-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">APP-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">INFRA-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Grafana  is used for monitoring the metrics of the Server !" data-placement="right">Grafana</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <div class="tool-list">
                                                <h2>Monitoring</h2>
                                                <ul>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">DMS-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">APP-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">INFRA-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Grafana  is used for monitoring the metrics of the Server !" data-placement="right">Grafana</a></li>
                                                </ul>
                                            </div>
                                            <div class="tool-list">
                                                <h2>Monitoring</h2>
                                                <ul>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">DMS-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">APP-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Graylog  is used for monitoring the logs of the application!" data-placement="right">INFRA-Graylog</a></li>
                                                    <li><a href="#" data-toggle="tooltip" title="Grafana  is used for monitoring the metrics of the Server !" data-placement="right">Grafana</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                                    <p>QA</p>
                                </div>
                                
                                
                                </div>
                                </div>
                                <div class="col-sm-2"></div>
                                
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

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</html>