<?php 
	session_set_cookie_params(0);
	session_start();

	if(isset($_SESSION['hasPos'])){
		$cityCap = $_SESSION['city'];
		header('Location: ../cities/'.$cityCap.'.php'); 
	}
?>