<?php
	session_start();

	require_once('dbconnect.php');
	$COLLECTION = "comments";
	
	if (strlen(trim($_POST['antiSpam']))){
	
	} else {
		$data = json_encode(array(
			'ip' => $_SESSION['ip'],
			'city' => $_SESSION['city'],
			'loc' => array($_SESSION['latitude'],$_SESSION['longitude']),
			'date' => new DateTime(),
			'comment' => $_POST['comment']
		));
    	    
		$url = "https://api.mongolab.com/api/1/databases/$DB/collections/$COLLECTION?apiKey=$MONGOLAB_API_KEY";
 
		try { 
  			$ch = curl_init();
 
  			curl_setopt($ch, CURLOPT_URL, $url);
  			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  			curl_setopt($ch, CURLOPT_POST, 1);
  			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      			'Content-Type: application/json',
      			'Content-Length: ' . strlen($data),
      		));
 
  			$response = curl_exec($ch);
 			$error = curl_error($ch);
  			$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  			curl_close($ch);
 
  			
		} catch (Exception $e) {
  			echo "FAIL";
		}
	}
		
	$cityCap = $_SESSION['city'];
	header('Location: ../cities/'.$cityCap.'.php'); 
?>