<?php 
	session_set_cookie_params(0);
	session_start();
	
	require_once('../php/MongoDBHandler.php');
    require_once('../php/dbconnect.php');
	if(isset($_SESSION['hasPos'])){
		$cityCap = $_SESSION['city'];
		header('Location: ../cities/');
	} else if (!isset($_SESSION['hasPos'])) {
		$latitude = floatval($_GET['lat']);
		$longitude = floatval($_GET['long']);

		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['latitude'] = $latitude;
		$_SESSION['longitude'] = $longitude;
		$_SESSION['hasPos'] = floatval($_GET['hasPos']);


        $COLLECTION = 'cities';
        $array = MongoDBHandler::request($COLLECTION);
        $_SESSION['city'] = $array[0]['name'];


		$data = json_encode(
  			array(
  				'ip' => $_SESSION['ip'],
				'loc' => array($latitude,$longitude),
				'city' => $_SESSION['city'],
				'date' => new DateTime(),
				'method' => $_GET['method']
  		));
  		
  		$COLLECTION = "visitors";
        $url = MongoDBHandler::requestURL($COLLECTION);

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

		header('Location: ../cities');
	}
	
?>
