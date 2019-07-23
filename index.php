<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: home.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hello</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body bgcolor="white" >
<!-- style="background-image: linear-gradient(to right, #1f1c2c, #928dab);" -->
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
					
					
					<div class="container-login100-form-btn">
						<button class="btn-danger btn-lg" onclick="window.location = '<?php echo $loginURL ?>';">
							Login in with G-Suit
						</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						
					</div>

					<div class="w-full text-center">
						
					</div>
				</div>

				<div class="login100-more">
					<img src="images/logo-2018.png" style="padding-top:50%; padding-left:5%;">
				</div>
			</div>
		</div>
	</div>
	
	



</body>
</html>