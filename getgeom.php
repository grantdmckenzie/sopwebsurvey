<?php

	require "inc/dbase.inc";
	$query "SELECT geom FROM geom LIMIT 1";
	$result = mysql_query($query) or die(mysql_error());
	while ($row = mysql_fetch_array($result)) {
    	$json = json_decode($row[0]); 
	}
	var_dump($json);
?>