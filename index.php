<?php  session_start();?>
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
	<section style="margin: 0px!important;background:url('img/back.jpg');height:100vh;overflow:hidden">
		
			<div class="col-sm-12 col-md-12 col-lg-12" >
                <div class="contain">
                    <div class="col-12 col-sm-4 col-lg-4 col-md-4"></div>
                    <div class="col-12 col-sm-4 col-lg-4 col-md-4">
                        <div class="contain login-box container middle">
                            <div class="logo">
                                <img src="img/logo.png" alt="logo" style="width:100%";>
                            </div>
                            <div class="title">
                                <h1>IKSHANA</h1>
                            </div>
                            <div class="login-btn">
                                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-4 col-md-4"></div>
                </div>
            </div>
				
	
	</section>
</body>

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>

function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var token='<?php echo password_hash("sessioninfo", PASSWORD_DEFAULT);?>';
 		  $.ajax(
                {
                    type:'POST',
                    url:"ajax/session.php",
                    data:{name:profile.getName(),imageurl:profile.getImageUrl(),email:profile.getEmail(),token:token},
                    success:function(data)
                    {
                    	window.location.href = "dashboard.php";
                    }
                });
}
</script>
</html>