<?php

	/*
	@author: Grant McKenzie (grant.mckenzie@geog.ucsb.edu)
	@client: UCSB Geotrans
	@date: May 2012
	*/

	/* $mysql_hostname = "localhost";
	$mysql_user = "geogrant_survey";
	$mysql_password = "DpBvZfETRzAbLbZt";
	$mysql_database = "geogrant_websurvey"; */
	
	$mysql_hostname = "localhost";
	$mysql_user = "websurvey";
	$mysql_password = "cMd8czq4LG56XxbC";
	$mysql_database = "websurvey";
	
	
	$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong connecting");
	mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");
	
?>