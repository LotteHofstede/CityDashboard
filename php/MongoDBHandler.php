<?php
/**
 * Created by PhpStorm.
 * User: lotte
 * Date: 12/03/15
 * Time: 10:25
 */

require_once "dbconnect.php";

class MongoDBHandler {
    public static function request($collection) {

        require_once "dbconnect.php";
        session_start();
        $lat = $_SESSION['latitude'];
        $long = $_SESSION['longitude'];
        /**THIS IS FOR RUNNING LOCALLY ONLY --> NOT SAFE
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );**/


        $url = 'https://api.mongolab.com/api/1/databases/' . DatabaseConfig::$DB . '/collections/' . $collection . '?q={"loc":{"$near":['. $lat . ',' . $long . ']}}&l=3&apiKey=' . DatabaseConfig::$MONGOLAB_API_KEY;
        $jsondata = file_get_contents($url);
        return json_decode($jsondata, true);
    }

    public static function requestURL($collection) {

        require_once "dbconnect.php";
        session_start();

        return 'https://api.mongolab.com/api/1/databases/' . DatabaseConfig::$DB . '/collections/' . $collection. '&apiKey=' . DatabaseConfig::$MONGOLAB_API_KEY;
    }
} 