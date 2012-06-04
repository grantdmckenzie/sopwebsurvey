<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	// $id = $_GET['id'];
	
	require "inc/dbase.inc";
	// $query = "SELECT geom, id FROM geom WHERE id = " . $id;
	$q = "SELECT geom, id FROM geom";
	$result = mysql_query($q) or die(mysql_error());
	while ($row = mysql_fetch_array($result)) {
		$data = stripslashes(substr($row[0],1,strlen($row[0])-2));

    	$json = json_decode($data); 
    	$id = $row['id'];
    	echo '{ "type": "FeatureCollection", "features": [{ "type": "Feature","id":"'.$id.'", "properties":{"name":"Kate Data"}';
		for ($j=0;$j<count($json->features);$j++) {		
			echo ', "geometry": { "type": "Polygon", "coordinates": [ [';
			for ($i=0;$i<count($json->features[$j]->geometry->rings[0]);$i++) {
				if ($i>0)
					echo ",";
				echo "[" . $json->features[$j]->geometry->rings[0][$i][0] . ",";
				echo $json->features[$j]->geometry->rings[0][$i][1] . "]";
			}
			echo '] ] }';
		}
		echo '} ] }';
		echo "<br/><br/>";
	}
	// var_dump($json);
	// var_dump($json->features[0]->geometry->rings) . "<br/><br/>";
	

	
	
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