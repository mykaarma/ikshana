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
                            <a href="myktools.php"  >MyK DevOps Tools</a>
                            <a href="detail500.php" class="active">500 Detailed View</a>
                            <a href="detail504.php">504 Detailed View</a>
                            <a href="chaos.php">Chaos Engineering</a>
                            <a href="slow.php">Slow Query Summary</a>
                            </div>
                        
                        <div class="col-sm-12 paddoff">
                            <div class="box" style="height:100%;margin-top: 17px;">
                                <div class="contain">
                                    <div class="contain-heading">
                                        <div class="heading" style="color:black;"> <h2>Filtered View For 500</h2></div>
                                    </div>
                                    <div class="upper-body">
                            <form>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="backend">Backend</label>
                                    <div id="backends"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="backend">Time Range</label>
                                    <select id="timerange" name="timerange" class="form-control">
                                        <option value="2">Today</option>
                                        <option value="7">Last 7 Days</option>
                                        <option value="15">Last 15 Days</option>
                                        <option value="30">Last 30 Days</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4" style="text-align: center;">
                                <button type="submit" name="submit" class="btn btn-success" onclick="getdata()" style="margin: 23px 0px;text-align: center;width: 100%;">Submit</button>
                            </div>
                            </form>
                        </div>
                                </div>
                                <div class="contain">
                                    <div class="col-sm-6">
                                        
                                            <div id="chart1" style="height: 400px; width: 100%;"></div>
                                          </div>
                                          
                                        
                                   
                                    <div class="col-sm-6">
                                        <div class="backend-table" id="backend-table" style="max-height: 400px;overflow-x: scroll;"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                           
</section>
<section style="margin: 25px!important;">
        
            <div class="col-sm-12">
                <div class="contain">
                    
                    <div class="contain-body">
                        
                        <div class="lower-body">
                            <div class="contain-tables" id="contain-tables" style="width:100%;float: left;height: 482px;">
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
<script type="text/javascript">
    var d;
    var g=[];
    function getdatagraph(r)
    {

    var token='<?php echo password_hash("graph", PASSWORD_DEFAULT);?>';
   
        $.ajax(
                {
                    type:'POST',
                    url:"ajax/getgraph.php",
                    data:{token:token,code:'500',time:r},
                    async:false,
                    success:function(data)
                    {
                        console.log(data);
                        d=JSON.parse(data);
                        for(var i=0;i<10;i++)
                        {

                            g.push(d[i]);
                        }
                        console.log(g);
                        
                    }
                });
        var chart = new CanvasJS.Chart("chart1", {
                        height:400,
                        dataPointMaxWidth: 50,
                        animationEnabled: true,
                        title:{
                        text: "Response code:500"
                        },
                        axisX: {
                            labelMaxWidth: 40,
                            labelWrap: true,   // change it to false
                    
                        },
                        axisY: {
                           
                            scaleBreaks: {
                                  autoCalculate: true
                                 },
                            gridThickness: 0,
                            
                            
                        },
                        

                        data: [{
                            indexLabel: "{y}",

                            indexLabelPlacement: "outside",
                            indexLabelFontWeight: "bolder",
                            indexLabelFontColor: "black",
                            dataPoints: g
                        }]
                    });
                    chart.render();
                     var table='<table class="table table-striped table-responsive table-bordered"><thead class="thead-dark"><tr><td>Sr.No</td><td>Backend</td><td>Count</td></tr></thead>';
         for(var i=0;i<d.length;i++)
         {
            table=table+'<tr><td>'+(i+1)+'</td><td>'+d[i]["label"]+'</td><td>'+d[i]["y"]+'</td></tr>';
         }
          table=table+'</table>';
          $('#backend-table').html(table);
                         

    }
                        
              
                        
function getbackend()
    {
        var token='<?php echo password_hash("backend", PASSWORD_DEFAULT);?>';
        

                $.ajax(
                {
                    type:'POST',
                    url:"ajax/getbackend500.php",
                    data:{token:token},
                    success:function(data)
                    {
                        $('#backends').html(data);
                    }
                });
    }
    getbackend();
    function getdata()
    {

        var token='<?php echo password_hash("dataget", PASSWORD_DEFAULT);?>';
        var time=document.getElementById('timerange').value;
        var backend=document.getElementById('backend').value;

                $.ajax(
                {
                    type:'POST',
                    url:"ajax/getdata500.php",
                    data:{backend:backend,time:time,token:token},
                    success:function(data)
                    {
                        
                        $('#contain-tables').html(data);
                    }
                });
                g=[];
                getdatagraph(time);
    }
    function getdefaultdata()
    {
        var token='<?php echo password_hash("dataget", PASSWORD_DEFAULT);?>';
          $.ajax(
                {
                    type:'POST',
                    url:"ajax/getdata500.php",
                    data:{backend:'all',time:1,token:token},
                    success:function(data)
                    {
                        
                        $('#contain-tables').html(data);
                    }
                });
          getdatagraph(1);
    }
    getdefaultdata();                    
                        

</script>
</html>