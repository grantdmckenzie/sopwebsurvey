<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	require('dbase.inc');

	$query = "SELECT geom FROM geom LIMIT 1";
	$result = mysql_query($query) or die(mysql_error());
	while ($row = mysql_fetch_array($result)) {
    	$json = json_decode($row[0]); 
	}

	if (!$result) 
	{
	  die('Invalid query: ' . mysql_error());
	}

$kml = array('<?xml version="1.0" encoding="UTF-8"?>');
$kml[] = '<kml xmlns="http://www.opengis.net/kml/2.2">';
$kml[] = ' <Placemark>';
$kml[] = '<name>The Pentagon</name><Polygon><extrude>1</extrude><altitudeMode>relativeToGround</altitudeMode><outerBoundaryIs><coordinates>';

// Iterates through the rows, printing a node for each row.
	for ($i=0;$i<count($json->rings[0]);$i++) {
		$kml[] = $json->rings[0][$i][0] . "," . $json->rings[0][$i][1] . ",100";
	}

// End XML file
$kml[] = '</coordinates></outerBoundaryIs></Polygon></Placemark>';
$kml[] = '</kml>';
$kmlOutput = join("\n", $kml);
header('Content-type: application/vnd.google-earth.kml+xml');
echo $kmlOutput;


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