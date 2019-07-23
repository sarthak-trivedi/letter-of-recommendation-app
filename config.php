<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("788666455159-rgdf9r9suqc0b4l4blhme4vdmfgeer7h.apps.googleusercontent.com");
	$gClient->setClientSecret("88WRDH3_nMelHZrRFjtV8nxB");
	$gClient->setApplicationName("Letter of Recommendation - DAIICT");
	$gClient->setRedirectUri("http://localhost/lor/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
