<?php
    $cities = array(
        "antwerpen" => array("weather", "forecast", "bikes", "twitterTrends", "map-canvas", "news", "bus", "commentBox", "instagram", "air", "trafficCams", "wikipedia", "policeTweets", "events", "delijnTweets", "foursquare", "latestTweets"),
        "leuven" => array("weather", "forecast", "twitterTrends", "map-canvas", "news", "cars", "bus", "commentBox", "instagram", "air", "trafficCams", "wikipedia", "policeTweets", "events", "delijnTweets", "foursquare", "latestTweets"),
        "brussels" => array("weather", "forecast", "twitterTrends", "map-canvas", "news", "bus", "commentBox", "instagram", "trafficCams", "wikipedia", "policeTweets", "events", "delijnTweets", "foursquare", "latestTweets"),
        "gent" => array("weather", "forecast", "twitterTrends", "map-canvas", "cars", "news", "bus", "commentBox", "instagram", "air", "trafficCams", "wikipedia", "events", "delijnTweets", "foursquare", "latestTweets")
    );
    $_SESSION["city"] = $_SESSION["city"]?$_SESSION["city"]:"leuven";
    foreach($cities[$_SESSION["city"]] as $widget) {
        readfile("widgets/" . $widget . ".html");
    }

?>