<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	require "inc/dbase.inc";
	$query = "SELECT geom FROM geom LIMIT 1";
	$result = mysql_query($query) or die(mysql_error());
	while ($row = mysql_fetch_array($result)) {
    	$json = json_decode($row[0]); 
    	// echo $row[0];
	}
	echo '{ "type": "FeatureCollection", "features": [';
	echo '{ "type": "Feature", "geometry": { "type": "Polygon", "coordinates": [ [';
	for ($i=0;$i<count($json->rings[0]);$i++) {
		if ($i>0)
			echo ",";
		echo "[" . $json->rings[0][$i][0] . ",";
		echo $json->rings[0][$i][1] . "]";
	}
	echo '] ] } } ] }';
	
	
	function json_decode($content, $assoc=false) {
        require_once 'JSON.php';
        if ($assoc) {
            $json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
        }
        else {
            $json = new Services_JSON;
        }
        return $json->decode($content);
    }
?>