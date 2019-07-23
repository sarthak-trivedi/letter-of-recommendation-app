<?php
	require_once "config.php";
	unset($_SESSION['access_token']);
	$gClient->revokeToken();
	session_destroy();
	if(isset($_GET["invalid_email"])){
		die("Only daiict emails are allowed <a href='index.php'>Click here</a> to login");
	}
	header('Location: index.php');
	exit();
?>