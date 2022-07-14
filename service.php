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
						<div class="heading" style="color:black;">Detailed View For 500</div>
					</div>
					<div class="contain-body">
						<div class="upper-body">
							<form>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="backend">Backend</label>
									<div id="backends"></div>
								</div>
							</div>
							<div class="col-sm-6" style="text-align: center;">
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
	function getbackend()
	{
		var token='<?php echo password_hash("backend", PASSWORD_DEFAULT);?>';
        

                $.ajax(
                {
                    type:'POST',
                    url:"ajax/getallbackend.php",
                    data:{token:token},
                    success:function(data)
                    {
                        $('#backends').html(data);
                    }
                });
	}
    getbackend();
	
 	
	

	
</script>
</body>

</html>