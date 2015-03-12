<?php
    function getUrl($filepath, $params = 0){
        require_once('config.php');
        $baseUrl = $SITE_PATH;
        return $baseUrl . $filepath . _getParams($params);
    }

    function _getParams($params) {
        if ($params) {
            $urlParams = "?";
            foreach ($params as $k => $v) {
                $urlParams .= $k . "=" . $v . "&";
            }
            return $urlParams;
        }

    }
?>