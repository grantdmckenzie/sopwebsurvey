<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: Page 12
	*/
	session_start();
	if (!session_is_registered('wsuser')) {
		header("location: login.php");
	}
	$error = "";
	if (isset($_POST['firsttime'])) {
		if (isset($_POST['goods1']) && isset($_POST['identity1']) && isset($_POST['quality1']) && isset($_POST['social1']) && isset($_POST['timetravel1']) && isset($_POST['culture1']) && isset($_POST['distance1']) && isset($_POST['proximity1']) && isset($_POST['place1']) && isset($_POST['dependence1']) && isset($_POST['atmosphere1']) && isset($_POST['goods2']) && isset($_POST['identity2']) && isset($_POST['quality2']) && isset($_POST['social2']) && isset($_POST['timetravel2']) && isset($_POST['culture2']) && isset($_POST['distance2']) && isset($_POST['proximity2']) && isset($_POST['place2']) && isset($_POST['dependence2']) && isset($_POST['atmosphere2']) && isset($_POST['goods3']) && isset($_POST['identity3']) && isset($_POST['quality3']) && isset($_POST['social3']) && isset($_POST['timetravel3']) && isset($_POST['culture3']) && isset($_POST['distance3']) && isset($_POST['proximity3']) && isset($_POST['place3']) && isset($_POST['dependence3']) && isset($_POST['atmosphere3']) && isset($_POST['goods4']) && isset($_POST['identity4']) && isset($_POST['quality4']) && isset($_POST['social4']) && isset($_POST['timetravel4']) && isset($_POST['culture4']) && isset($_POST['distance4']) && isset($_POST['proximity4']) && isset($_POST['place4']) && isset($_POST['dependence4']) && isset($_POST['atmosphere4'])) {
			
			
			
			require "inc/dbase.inc";
			require "inc/user.inc";
			$wsuser = unserialize($_SESSION['wsuser']);
				
			// insert the deets.
			$query = "INSERT INTO page12 VALUES ('',".$wsuser->id.",".$_POST['goods1'].",".$_POST['identity1'].",".$_POST['quality1'].",".$_POST['social1'].",".$_POST['timetravel1'].",".$_POST['culture1'].",".$_POST['distance1'].",".$_POST['proximity1'].",".$_POST['place1'].",".$_POST['dependence1'].",".$_POST['atmosphere1'].",".$_POST['goods2'].",".$_POST['identity2'].",".$_POST['quality2'].",".$_POST['social2'].",".$_POST['timetravel2'].",".$_POST['culture2'].",".$_POST['distance2'].",".$_POST['proximity2'].",".$_POST['place2'].",".$_POST['dependence2'].",".$_POST['atmosphere2'].",".$_POST['goods3'].",".$_POST['identity3'].",".$_POST['quality3'].",".$_POST['social3'].",".$_POST['timetravel3'].",".$_POST['culture3'].",".$_POST['distance3'].",".$_POST['proximity3'].",".$_POST['place3'].",".$_POST['dependence3'].",".$_POST['atmosphere3'].",".$_POST['goods4'].",".$_POST['identity4'].",".$_POST['quality4'].",".$_POST['social4'].",".$_POST['timetravel4'].",".$_POST['culture4'].",".$_POST['distance4'].",".$_POST['proximity4'].",".$_POST['place4'].",".$_POST['dependence4'].",".$_POST['atmosphere4'].")";
			mysql_query($query) or die(mysql_error());
			
			// update the page
			$query = "UPDATE users SET page = '13', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
			mysql_query($query) or die(mysql_error());
			header("location: 13.php");
			
		} else {
			$error = "<p style='color:#ff0000;text-align:center;'>Please answer all questions</p>";	
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1101010/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>GeoTRIPS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="css/main.css" />
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

 <body>
 	<div id="wrapperHeader">
 		logo / header
 	</div>
 	<div id="wrapperProgress">Progress Bar</div>
 	<div id="wrapperContent">	
 		<?php echo $error; ?>
 	<form name="twelve" id="twelve" method="post" action="12.php">

<!-- QUESTION #1 -->
 	<p><b>1) For grocery shopping activities, on a scale of one to ten, how much does each of these criteria matter in making a decision about where the activity will take place (1 I don’t consider it, 10 I consider it a lot)</b></p>
 	
 	<table style='float:left;width:100%;'><tr>
 		<td style="padding-right:20px">Cost of goods/ services</td>
		<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td></tr><tr><td><input type="radio" name="goods1" value="1"/></td><td><input type="radio" name="goods1" value="2"/></td><td><input type="radio" name="goods1" value="3"/></td><td><input type="radio" name="goods1" value="4"/></td><td><input type="radio" name="goods1" value="5"/></td><td><input type="radio" name="goods1" value="6"/></td><td><input type="radio" name="goods1" value="7"/></td><td><input type="radio" name="goods1" value="8"/></td><td><input type="radio" name="goods1" value="9"/></td><td><input type="radio" name="goods1" value="10"/></td></tr></table></td>
		</tr><tr>
		<td>Place identity</td>
		<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="identity1" value="1"/></td><td><input type="radio" name="identity1" value="2"/></td><td><input type="radio" name="identity1" value="3"/></td><td><input type="radio" name="identity1" value="4"/></td><td><input type="radio" name="identity1" value="5"/></td><td><input type="radio" name="identity1" value="6"/></td><td><input type="radio" name="identity1" value="7"/></td><td><input type="radio" name="identity1" value="8"/></td><td><input type="radio" name="identity1" value="9"/></td><td><input type="radio" name="identity1" value="10"/></td></tr></table>
		</td></tr>
	
	<tr><td style="padding-right:20px">Quality of goods/ services</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="quality1" value="1"/></td><td><input type="radio" name="quality1" value="2"/></td><td><input type="radio" name="quality1" value="3"/></td><td><input type="radio" name="quality1" value="4"/></td><td><input type="radio" name="quality1" value="5"/></td><td><input type="radio" name="quality1" value="6"/></td><td><input type="radio" name="quality1" value="7"/></td><td><input type="radio" name="quality1" value="8"/></td><td><input type="radio" name="quality1" value="9"/></td><td><input type="radio" name="quality1" value="10"/></td></tr></table></td>
	</tr><tr>
	<td>Social place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="social1" value="1"/></td><td><input type="radio" name="social1" value="2"/></td><td><input type="radio" name="social1" value="3"/></td><td><input type="radio" name="social1" value="4"/></td><td><input type="radio" name="social1" value="5"/></td><td><input type="radio" name="social1" value="6"/></td><td><input type="radio" name="social1" value="7"/></td><td><input type="radio" name="social1" value="8"/></td><td><input type="radio" name="social1" value="9"/></td><td><input type="radio" name="social1" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Cost and time of travel to the place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="timetravel1" value="1"/></td><td><input type="radio" name="timetravel1" value="2"/></td><td><input type="radio" name="timetravel1" value="3"/></td><td><input type="radio" name="timetravel1" value="4"/></td><td><input type="radio" name="timetravel1" value="5"/></td><td><input type="radio" name="timetravel1" value="6"/></td><td><input type="radio" name="timetravel1" value="7"/></td><td><input type="radio" name="timetravel1" value="8"/></td><td><input type="radio" name="timetravel1" value="9"/></td><td><input type="radio" name="timetravel1" value="10"/></td></tr></table></td>
	</tr><tr>
	<td>Culture of SB</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="culture1" value="1"/></td><td><input type="radio" name="culture1" value="2"/></td><td><input type="radio" name="culture1" value="3"/></td><td><input type="radio" name="culture1" value="4"/></td><td><input type="radio" name="culture1" value="5"/></td><td><input type="radio" name="culture1" value="6"/></td><td><input type="radio" name="culture1" value="7"/></td><td><input type="radio" name="culture1" value="8"/></td><td><input type="radio" name="culture1" value="9"/></td><td><input type="radio" name="culture1" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Distance from home</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="distance1" value="1"/></td><td><input type="radio" name="distance1" value="2"/></td><td><input type="radio" name="distance1" value="3"/></td><td><input type="radio" name="distance1" value="4"/></td><td><input type="radio" name="distance1" value="5"/></td><td><input type="radio" name="distance1" value="6"/></td><td><input type="radio" name="distance1" value="7"/></td><td><input type="radio" name="distance1" value="8"/></td><td><input type="radio" name="distance1" value="9"/></td><td><input type="radio" name="distance1" value="10"/></td></tr></table></td>
	</tr><tr>
	<td>Place attachment</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="place1" value="1"/></td><td><input type="radio" name="place1" value="2"/></td><td><input type="radio" name="place1" value="3"/></td><td><input type="radio" name="place1" value="4"/></td><td><input type="radio" name="place1" value="5"/></td><td><input type="radio" name="place1" value="6"/></td><td><input type="radio" name="place1" value="7"/></td><td><input type="radio" name="place1" value="8"/></td><td><input type="radio" name="place1" value="9"/></td><td><input type="radio" name="place1" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Proximity to last or next place visited</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="proximity1" value="1"/></td><td><input type="radio" name="proximity1" value="2"/></td><td><input type="radio" name="proximity1" value="3"/></td><td><input type="radio" name="proximity1" value="4"/></td><td><input type="radio" name="proximity1" value="5"/></td><td><input type="radio" name="proximity1" value="6"/></td><td><input type="radio" name="proximity1" value="7"/></td><td><input type="radio" name="proximity1" value="8"/></td><td><input type="radio" name="proximity1" value="9"/></td><td><input type="radio" name="proximity1" value="10"/></td></tr></table></td>
	</tr><tr>
	<td>Place dependence</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="dependence1" value="1"/></td><td><input type="radio" name="dependence1" value="2"/></td><td><input type="radio" name="dependence1" value="3"/></td><td><input type="radio" name="dependence1" value="4"/></td><td><input type="radio" name="dependence1" value="5"/></td><td><input type="radio" name="dependence1" value="6"/></td><td><input type="radio" name="dependence1" value="7"/></td><td><input type="radio" name="dependence1" value="8"/></td><td><input type="radio" name="dependence1" value="9"/></td><td><input type="radio" name="dependence1" value="10"/></td></tr></table></td></tr>

	<tr><td style="padding-right:20px">Atmosphere of the place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="atmosphere1" value="1"/></td><td><input type="radio" name="atmosphere1" value="2"/></td><td><input type="radio" name="atmosphere1" value="3"/></td><td><input type="radio" name="atmosphere1" value="4"/></td><td><input type="radio" name="atmosphere1" value="5"/></td><td><input type="radio" name="atmosphere1" value="6"/></td><td><input type="radio" name="atmosphere1" value="7"/></td><td><input type="radio" name="atmosphere1" value="8"/></td><td><input type="radio" name="atmosphere1" value="9"/></td><td><input type="radio" name="atmosphere1" value="10"/></td></tr></table></td><td>&nbsp;</td></tr></table>
 
 
<!-- QUESTION #2 -->
<hr/>
 	<p><b>2) For other shopping activities, on a scale of one to ten, how much does this criteria matter in making a decision about where the activity will take place (1 I don’t consider it, 10 I consider it a lot)</b>
</p>
 	
 	<table style='width:100%'><tr><td style="padding-right:20px">Cost of goods/ services</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td></tr><tr><td><input type="radio" name="goods2" value="1"/></td><td><input type="radio" name="goods2" value="2"/></td><td><input type="radio" name="goods2" value="3"/></td><td><input type="radio" name="goods2" value="4"/></td><td><input type="radio" name="goods2" value="5"/></td><td><input type="radio" name="goods2" value="6"/></td><td><input type="radio" name="goods2" value="7"/></td><td><input type="radio" name="goods2" value="8"/></td><td><input type="radio" name="goods2" value="9"/></td><td><input type="radio" name="goods2" value="10"/></td></tr></table></td>
	</tr><tr>
	<td>Place identity</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="identity2" value="1"/></td><td><input type="radio" name="identity2" value="2"/></td><td><input type="radio" name="identity2" value="3"/></td><td><input type="radio" name="identity2" value="4"/></td><td><input type="radio" name="identity2" value="5"/></td><td><input type="radio" name="identity2" value="6"/></td><td><input type="radio" name="identity2" value="7"/></td><td><input type="radio" name="identity2" value="8"/></td><td><input type="radio" name="identity2" value="9"/></td><td><input type="radio" name="identity2" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Quality of goods/ services</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="quality2" value="1"/></td><td><input type="radio" name="quality2" value="2"/></td><td><input type="radio" name="quality2" value="3"/></td><td><input type="radio" name="quality2" value="4"/></td><td><input type="radio" name="quality2" value="5"/></td><td><input type="radio" name="quality2" value="6"/></td><td><input type="radio" name="quality2" value="7"/></td><td><input type="radio" name="quality2" value="8"/></td><td><input type="radio" name="quality2" value="9"/></td><td><input type="radio" name="quality2" value="10"/></td></tr></table></td>
	</tr><tr>
	<td>Social place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="social2" value="1"/></td><td><input type="radio" name="social2" value="2"/></td><td><input type="radio" name="social2" value="3"/></td><td><input type="radio" name="social2" value="4"/></td><td><input type="radio" name="social2" value="5"/></td><td><input type="radio" name="social2" value="6"/></td><td><input type="radio" name="social2" value="7"/></td><td><input type="radio" name="social2" value="8"/></td><td><input type="radio" name="social2" value="9"/></td><td><input type="radio" name="social2" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Cost and time of travel to the place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="timetravel2" value="1"/></td><td><input type="radio" name="timetravel2" value="2"/></td><td><input type="radio" name="timetravel2" value="3"/></td><td><input type="radio" name="timetravel2" value="4"/></td><td><input type="radio" name="timetravel2" value="5"/></td><td><input type="radio" name="timetravel2" value="6"/></td><td><input type="radio" name="timetravel2" value="7"/></td><td><input type="radio" name="timetravel2" value="8"/></td><td><input type="radio" name="timetravel2" value="9"/></td><td><input type="radio" name="timetravel2" value="10"/></td></tr></table></td>
	</tr><tr>
	<td>Culture of SB</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="culture2" value="1"/></td><td><input type="radio" name="culture2" value="2"/></td><td><input type="radio" name="culture2" value="3"/></td><td><input type="radio" name="culture2" value="4"/></td><td><input type="radio" name="culture2" value="5"/></td><td><input type="radio" name="culture2" value="6"/></td><td><input type="radio" name="culture2" value="7"/></td><td><input type="radio" name="culture2" value="8"/></td><td><input type="radio" name="culture2" value="9"/></td><td><input type="radio" name="culture2" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Distance from home</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="distance2" value="1"/></td><td><input type="radio" name="distance2" value="2"/></td><td><input type="radio" name="distance2" value="3"/></td><td><input type="radio" name="distance2" value="4"/></td><td><input type="radio" name="distance2" value="5"/></td><td><input type="radio" name="distance2" value="6"/></td><td><input type="radio" name="distance2" value="7"/></td><td><input type="radio" name="distance2" value="8"/></td><td><input type="radio" name="distance2" value="9"/></td><td><input type="radio" name="distance2" value="10"/></td></tr></table></td>
	</tr><tr><td>Place attachment</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="place2" value="1"/></td><td><input type="radio" name="place2" value="2"/></td><td><input type="radio" name="place2" value="3"/></td><td><input type="radio" name="place2" value="4"/></td><td><input type="radio" name="place2" value="5"/></td><td><input type="radio" name="place2" value="6"/></td><td><input type="radio" name="place2" value="7"/></td><td><input type="radio" name="place2" value="8"/></td><td><input type="radio" name="place2" value="9"/></td><td><input type="radio" name="place2" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Proximity to last or next place visited</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="proximity2" value="1"/></td><td><input type="radio" name="proximity2" value="2"/></td><td><input type="radio" name="proximity2" value="3"/></td><td><input type="radio" name="proximity2" value="4"/></td><td><input type="radio" name="proximity2" value="5"/></td><td><input type="radio" name="proximity2" value="6"/></td><td><input type="radio" name="proximity2" value="7"/></td><td><input type="radio" name="proximity2" value="8"/></td><td><input type="radio" name="proximity2" value="9"/></td><td><input type="radio" name="proximity2" value="10"/></td></tr></table></td>
	</tr><tr><td>Place dependence</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="dependence2" value="1"/></td><td><input type="radio" name="dependence2" value="2"/></td><td><input type="radio" name="dependence2" value="3"/></td><td><input type="radio" name="dependence2" value="4"/></td><td><input type="radio" name="dependence2" value="5"/></td><td><input type="radio" name="dependence2" value="6"/></td><td><input type="radio" name="dependence2" value="7"/></td><td><input type="radio" name="dependence2" value="8"/></td><td><input type="radio" name="dependence2" value="9"/></td><td><input type="radio" name="dependence2" value="10"/></td></tr></table></td></tr>

	<tr><td style="padding-right:20px">Atmosphere of the place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="atmosphere2" value="1"/></td><td><input type="radio" name="atmosphere2" value="2"/></td><td><input type="radio" name="atmosphere2" value="3"/></td><td><input type="radio" name="atmosphere2" value="4"/></td><td><input type="radio" name="atmosphere2" value="5"/></td><td><input type="radio" name="atmosphere2" value="6"/></td><td><input type="radio" name="atmosphere2" value="7"/></td><td><input type="radio" name="atmosphere2" value="8"/></td><td><input type="radio" name="atmosphere2" value="9"/></td><td><input type="radio" name="atmosphere2" value="10"/></td></tr></table></td><td>&nbsp;</td></tr></table>
 
 
<!-- QUESTION #3 -->
<hr/>
 	<p><b>3) For spending time with family, on a scale of one to ten, how much does this criteria matter in making a decision about where the activity will take place (1 I don’t consider it, 10 I consider it a lot)</b>
</p>
 	
 	<table style='width:100%'><tr><td style="padding-right:20px">Cost of goods/ services</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td></tr><tr><td><input type="radio" name="goods3" value="1"/></td><td><input type="radio" name="goods3" value="2"/></td><td><input type="radio" name="goods3" value="3"/></td><td><input type="radio" name="goods3" value="4"/></td><td><input type="radio" name="goods3" value="5"/></td><td><input type="radio" name="goods3" value="6"/></td><td><input type="radio" name="goods3" value="7"/></td><td><input type="radio" name="goods3" value="8"/></td><td><input type="radio" name="goods3" value="9"/></td><td><input type="radio" name="goods3" value="10"/></td></tr></table></td>
	</tr><tr><td>Place identity</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="identity3" value="1"/></td><td><input type="radio" name="identity3" value="2"/></td><td><input type="radio" name="identity3" value="3"/></td><td><input type="radio" name="identity3" value="4"/></td><td><input type="radio" name="identity3" value="5"/></td><td><input type="radio" name="identity3" value="6"/></td><td><input type="radio" name="identity3" value="7"/></td><td><input type="radio" name="identity3" value="8"/></td><td><input type="radio" name="identity3" value="9"/></td><td><input type="radio" name="identity3" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Quality of goods/ services</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="quality3" value="1"/></td><td><input type="radio" name="quality3" value="2"/></td><td><input type="radio" name="quality3" value="3"/></td><td><input type="radio" name="quality3" value="4"/></td><td><input type="radio" name="quality3" value="5"/></td><td><input type="radio" name="quality3" value="6"/></td><td><input type="radio" name="quality3" value="7"/></td><td><input type="radio" name="quality3" value="8"/></td><td><input type="radio" name="quality3" value="9"/></td><td><input type="radio" name="quality3" value="10"/></td></tr></table></td>
	</tr><tr><td>Social place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="social3" value="1"/></td><td><input type="radio" name="social3" value="2"/></td><td><input type="radio" name="social3" value="3"/></td><td><input type="radio" name="social3" value="4"/></td><td><input type="radio" name="social3" value="5"/></td><td><input type="radio" name="social3" value="6"/></td><td><input type="radio" name="social3" value="7"/></td><td><input type="radio" name="social3" value="8"/></td><td><input type="radio" name="social3" value="9"/></td><td><input type="radio" name="social3" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Cost and time of travel to the place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="timetravel3" value="1"/></td><td><input type="radio" name="timetravel3" value="2"/></td><td><input type="radio" name="timetravel3" value="3"/></td><td><input type="radio" name="timetravel3" value="4"/></td><td><input type="radio" name="timetravel3" value="5"/></td><td><input type="radio" name="timetravel3" value="6"/></td><td><input type="radio" name="timetravel3" value="7"/></td><td><input type="radio" name="timetravel3" value="8"/></td><td><input type="radio" name="timetravel3" value="9"/></td><td><input type="radio" name="timetravel3" value="10"/></td></tr></table></td>
	</tr><tr><td>Culture of SB</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="culture3" value="1"/></td><td><input type="radio" name="culture3" value="2"/></td><td><input type="radio" name="culture3" value="3"/></td><td><input type="radio" name="culture3" value="4"/></td><td><input type="radio" name="culture3" value="5"/></td><td><input type="radio" name="culture3" value="6"/></td><td><input type="radio" name="culture3" value="7"/></td><td><input type="radio" name="culture3" value="8"/></td><td><input type="radio" name="culture3" value="9"/></td><td><input type="radio" name="culture3" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Distance from home</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="distance3" value="1"/></td><td><input type="radio" name="distance3" value="2"/></td><td><input type="radio" name="distance3" value="3"/></td><td><input type="radio" name="distance3" value="4"/></td><td><input type="radio" name="distance3" value="5"/></td><td><input type="radio" name="distance3" value="6"/></td><td><input type="radio" name="distance3" value="7"/></td><td><input type="radio" name="distance3" value="8"/></td><td><input type="radio" name="distance3" value="9"/></td><td><input type="radio" name="distance3" value="10"/></td></tr></table></td>
	</tr><tr><td>Place attachment</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="place3" value="1"/></td><td><input type="radio" name="place3" value="2"/></td><td><input type="radio" name="place3" value="3"/></td><td><input type="radio" name="place3" value="4"/></td><td><input type="radio" name="place3" value="5"/></td><td><input type="radio" name="place3" value="6"/></td><td><input type="radio" name="place3" value="7"/></td><td><input type="radio" name="place3" value="8"/></td><td><input type="radio" name="place3" value="9"/></td><td><input type="radio" name="place3" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Proximity to last or next place visited</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="proximity3" value="1"/></td><td><input type="radio" name="proximity3" value="2"/></td><td><input type="radio" name="proximity3" value="3"/></td><td><input type="radio" name="proximity3" value="4"/></td><td><input type="radio" name="proximity3" value="5"/></td><td><input type="radio" name="proximity3" value="6"/></td><td><input type="radio" name="proximity3" value="7"/></td><td><input type="radio" name="proximity3" value="8"/></td><td><input type="radio" name="proximity3" value="9"/></td><td><input type="radio" name="proximity3" value="10"/></td></tr></table></td>
	</tr><tr><td>Place dependence</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="dependence3" value="1"/></td><td><input type="radio" name="dependence3" value="2"/></td><td><input type="radio" name="dependence3" value="3"/></td><td><input type="radio" name="dependence3" value="4"/></td><td><input type="radio" name="dependence3" value="5"/></td><td><input type="radio" name="dependence3" value="6"/></td><td><input type="radio" name="dependence3" value="7"/></td><td><input type="radio" name="dependence3" value="8"/></td><td><input type="radio" name="dependence3" value="9"/></td><td><input type="radio" name="dependence3" value="10"/></td></tr></table></td></tr>

	<tr><td style="padding-right:20px">Atmosphere of the place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="atmosphere3" value="1"/></td><td><input type="radio" name="atmosphere3" value="2"/></td><td><input type="radio" name="atmosphere3" value="3"/></td><td><input type="radio" name="atmosphere3" value="4"/></td><td><input type="radio" name="atmosphere3" value="5"/></td><td><input type="radio" name="atmosphere3" value="6"/></td><td><input type="radio" name="atmosphere3" value="7"/></td><td><input type="radio" name="atmosphere3" value="8"/></td><td><input type="radio" name="atmosphere3" value="9"/></td><td><input type="radio" name="atmosphere3" value="10"/></td></tr></table></td><td>&nbsp;</td></tr></table>
 

 
<!-- QUESTION #4 -->
<hr/>
 	<p><b>4) For outdoor recreation activities, on a scale of one to ten, how much does this criteria matter in making a decision about where the activity will take place (1 I don’t consider it, 10 I consider it a lot)</b></p>
 	
 	<table style='width:100%'><tr><td style="padding-right:20px">Cost of goods/ services</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td></tr><tr><td><input type="radio" name="goods4" value="1"/></td><td><input type="radio" name="goods4" value="2"/></td><td><input type="radio" name="goods4" value="3"/></td><td><input type="radio" name="goods4" value="4"/></td><td><input type="radio" name="goods4" value="5"/></td><td><input type="radio" name="goods4" value="6"/></td><td><input type="radio" name="goods4" value="7"/></td><td><input type="radio" name="goods4" value="8"/></td><td><input type="radio" name="goods4" value="9"/></td><td><input type="radio" name="goods4" value="10"/></td></tr></table></td>
	</tr><tr><td>Place identity</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="identity4" value="1"/></td><td><input type="radio" name="identity4" value="2"/></td><td><input type="radio" name="identity4" value="3"/></td><td><input type="radio" name="identity4" value="4"/></td><td><input type="radio" name="identity4" value="5"/></td><td><input type="radio" name="identity4" value="6"/></td><td><input type="radio" name="identity4" value="7"/></td><td><input type="radio" name="identity4" value="8"/></td><td><input type="radio" name="identity4" value="9"/></td><td><input type="radio" name="identity4" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Quality of goods/ services</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="quality4" value="1"/></td><td><input type="radio" name="quality4" value="2"/></td><td><input type="radio" name="quality4" value="3"/></td><td><input type="radio" name="quality4" value="4"/></td><td><input type="radio" name="quality4" value="5"/></td><td><input type="radio" name="quality4" value="6"/></td><td><input type="radio" name="quality4" value="7"/></td><td><input type="radio" name="quality4" value="8"/></td><td><input type="radio" name="quality4" value="9"/></td><td><input type="radio" name="quality4" value="10"/></td></tr></table></td>
	</tr><tr><td>Social place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="social4" value="1"/></td><td><input type="radio" name="social4" value="2"/></td><td><input type="radio" name="social4" value="3"/></td><td><input type="radio" name="social4" value="4"/></td><td><input type="radio" name="social4" value="5"/></td><td><input type="radio" name="social4" value="6"/></td><td><input type="radio" name="social4" value="7"/></td><td><input type="radio" name="social4" value="8"/></td><td><input type="radio" name="social4" value="9"/></td><td><input type="radio" name="social4" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Cost and time of travel to the place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="timetravel4" value="1"/></td><td><input type="radio" name="timetravel4" value="2"/></td><td><input type="radio" name="timetravel4" value="3"/></td><td><input type="radio" name="timetravel4" value="4"/></td><td><input type="radio" name="timetravel4" value="5"/></td><td><input type="radio" name="timetravel4" value="6"/></td><td><input type="radio" name="timetravel4" value="7"/></td><td><input type="radio" name="timetravel4" value="8"/></td><td><input type="radio" name="timetravel4" value="9"/></td><td><input type="radio" name="timetravel4" value="10"/></td></tr></table></td>
	</tr><tr><td>Culture of SB</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="culture4" value="1"/></td><td><input type="radio" name="culture4" value="2"/></td><td><input type="radio" name="culture4" value="3"/></td><td><input type="radio" name="culture4" value="4"/></td><td><input type="radio" name="culture4" value="5"/></td><td><input type="radio" name="culture4" value="6"/></td><td><input type="radio" name="culture4" value="7"/></td><td><input type="radio" name="culture4" value="8"/></td><td><input type="radio" name="culture4" value="9"/></td><td><input type="radio" name="culture4" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Distance from home</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="distance4" value="1"/></td><td><input type="radio" name="distance4" value="2"/></td><td><input type="radio" name="distance4" value="3"/></td><td><input type="radio" name="distance4" value="4"/></td><td><input type="radio" name="distance4" value="5"/></td><td><input type="radio" name="distance4" value="6"/></td><td><input type="radio" name="distance4" value="7"/></td><td><input type="radio" name="distance4" value="8"/></td><td><input type="radio" name="distance4" value="9"/></td><td><input type="radio" name="distance4" value="10"/></td></tr></table></td>
	</tr><tr><td>Place attachment</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="place4" value="1"/></td><td><input type="radio" name="place4" value="2"/></td><td><input type="radio" name="place4" value="3"/></td><td><input type="radio" name="place4" value="4"/></td><td><input type="radio" name="place4" value="5"/></td><td><input type="radio" name="place4" value="6"/></td><td><input type="radio" name="place4" value="7"/></td><td><input type="radio" name="place4" value="8"/></td><td><input type="radio" name="place4" value="9"/></td><td><input type="radio" name="place4" value="10"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Proximity to last or next place visited</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="proximity4" value="1"/></td><td><input type="radio" name="proximity4" value="2"/></td><td><input type="radio" name="proximity4" value="3"/></td><td><input type="radio" name="proximity4" value="4"/></td><td><input type="radio" name="proximity4" value="5"/></td><td><input type="radio" name="proximity4" value="6"/></td><td><input type="radio" name="proximity4" value="7"/></td><td><input type="radio" name="proximity4" value="8"/></td><td><input type="radio" name="proximity4" value="9"/></td><td><input type="radio" name="proximity4" value="10"/></td></tr></table></td>
	</tr><tr><td>Place dependence</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="dependence4" value="1"/></td><td><input type="radio" name="dependence4" value="2"/></td><td><input type="radio" name="dependence4" value="3"/></td><td><input type="radio" name="dependence4" value="4"/></td><td><input type="radio" name="dependence4" value="5"/></td><td><input type="radio" name="dependence4" value="6"/></td><td><input type="radio" name="dependence4" value="7"/></td><td><input type="radio" name="dependence4" value="8"/></td><td><input type="radio" name="dependence4" value="9"/></td><td><input type="radio" name="dependence4" value="10"/></td></tr></table></td></tr>

	<tr><td style="padding-right:20px">Atmosphere of the place</td>
	<td><table style="clear:both;font-size:0.8em;float:right;"><tr><td><input type="radio" name="atmosphere4" value="1"/></td><td><input type="radio" name="atmosphere4" value="2"/></td><td><input type="radio" name="atmosphere4" value="3"/></td><td><input type="radio" name="atmosphere4" value="4"/></td><td><input type="radio" name="atmosphere4" value="5"/></td><td><input type="radio" name="atmosphere4" value="6"/></td><td><input type="radio" name="atmosphere4" value="7"/></td><td><input type="radio" name="atmosphere4" value="8"/></td><td><input type="radio" name="atmosphere4" value="9"/></td><td><input type="radio" name="atmosphere4" value="10"/></td></tr></table></td><td>&nbsp;</td></tr></table>
 

		<input type="hidden" value="1" name="firsttime"/>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue12();">CONTINUE ></div>
 	</div>
 </body>
</html>