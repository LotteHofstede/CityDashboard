<?php
	session_start();
	session_destroy();
	header('Location: ../intro/index.php'); 
?>