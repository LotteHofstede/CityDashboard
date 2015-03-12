<?php
header('Content-type: application/json');
$stopNumber = $_GET['id'];

function getDepartures($stopNumber){
	$xml = simplexml_load_file("http://reisinfo.delijn.be/realtime/haltebord/" . $stopNumber);
	$rides = array();
	$count = 1;
 
	foreach ($xml->body[0]->div[0]->table[0]->tbody[0]->tr as $row) {
	    if (isset($row->td[1]->span) && $row->td[1]->span != "") {
	        $arrivalTime = trim((string) $row->td[2]->span, "'");
	        if (strstr($arrivalTime, ":") == false) {
	            $arrivalTime = date("H:i", strtotime("+ " . $arrivalTime . " minutes"));
	        } 
	     
	        $arrivalTime = ($arrivalTime == "01:00") ? date("H:i") : $arrivalTime;
	     	
	     	$rides["bus" . $count] = array("line" => (string) $row->td[0]->table[0]->tbody[0]->tr[0]->td[0]->span,
						"dest" => ucwords(strtolower((string) $row->td[1]->span)),
						"arrival" => $arrivalTime,
						"live" => (isset($row->td[3]->img)) ? 1 : 0
			);
			$count++;
	    }
	}
	$rides["stopNumber"] = $stopNumber;
	echo json_encode($rides);
}

getDepartures($stopNumber);
 
?>