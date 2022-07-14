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
					<div class="contain-heading">
						<div class="heading" style="color:black;">Chaos Engineering</div>
					</div>
					<div class="contain-body">
						<div class="upper-body">
							<form>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="backend">Test Name</label>
									<select id="testname" name="testname" class="form-control">
										<option value="all">All Test</option>
										<option value="application">Test 1 - App</option>
										<option value="alb-test">Test2 - ALB</option>
										<option value="eks_node">Test3 - EKS Node</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="date">Date</label>
									<input type="date" name="date" id="date" class="form-control">
								</div>
							</div>
							<div class="col-sm-4" style="text-align: center;">
								<button type="submit" name="submit" class="btn btn-success" onclick="getdata()" style="margin: 23px 0px;text-align: center;width: 100%;">Submit</button>
							</div>
							</form>
						</div>
						<div class="lower-body">
							<div class="contain-tables" id="contain-tables" style="width:100%;float: left;height: 482px;">
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
<script type="text/javascript">

	function getdata()
	{

        var token='<?php echo password_hash("dataget", PASSWORD_DEFAULT);?>';
        var testname=document.getElementById('testname').value;
        var date=document.getElementById('date').value;

                $.ajax(
                {
                    type:'POST',
                    url:"ajax/chaosdata.php",
                    data:{testname:testname,date:date,token:token},
                    success:function(data)
                    {
                    	
                        $('#contain-tables').html(data);
                    }
                });
    }
 	function getdefaultdata()
 	{
 		var token='<?php echo password_hash("dataget", PASSWORD_DEFAULT);?>';
 		  $.ajax(
                {
                    type:'POST',
                    url:"ajax/chaosdata.php",
                    data:{testname:'all',date:'all',token:token},
                    success:function(data)
                    {
                    	
                        $('#contain-tables').html(data);
                    }
                });
 	}
 	getdefaultdata();
	

	
</script>
</body>

</html>