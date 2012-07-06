<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: Page 8: Update map
	*/
	session_start();
	if (!session_is_registered('wsuser')) {
		header("location: index.php");
	}
	if (isset($_POST['geom'])) {
		$error = "";
		require "inc/dbase.inc";
		require "inc/user.inc";
		$wsuser = unserialize($_SESSION['wsuser']);	
		$geom = $_POST['geom'];
		
			// insert the deets.
			$query = "INSERT INTO geom VALUES ('',".$wsuser->id.",11,'".addslashes($geom)."','')";
			mysql_query($query) or die(mysql_error());
			
			// update the page
			$query = "UPDATE users SET page = '22', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
			mysql_query($query) or die(mysql_error());
			header("location: 22.php");

	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1101010/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>GeoTRIPS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.7/js/dojo/dijit/themes/claro/claro.css" />
  <link rel="stylesheet" href="css/main.css" />
  <script src="http://serverapi.arcgisonline.com/jsapi/arcgis/?v=2.8compact" type="text/javascript"></script>
  <script type="text/javascript" src="js/json2.js"></script>
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
 <script type="text/javascript" src="js/main.js"></script>
 <script type="text/javascript">
      dojoConfig = {
        parseOnLoad: true
      }
    </script>
 <script type="text/javascript" src="js/map.js"></script>
 <body>
 	<div id="wrapperHeader">
 	</div>
 	<div id="wrapperProgress">
 	<table width="90%" align="right"><tr>
 			<td>Part 1. People</td>
 			<td>Part 2. Activities</td>
 			<td>Part 3. About you</td>
 			<td>Part 4. Santa Barbara</td>
 			<td><b>Part 5. Places</b></td>
 		</tr></table></div>
 	<div id="wrapperContent">
	
	 <p style="text-align:center;"><i>Now, we would like to gain an understanding of your views about the Goleta, Santa Barbara and Montecito areas.</i></p>
 		<p style="text-align:center;"> <font size="4" > Please use the map and draw shape areas with your cursor that you consider to be:</font></p> 
 		<p style="text-align:center; color:#3B6E9E; font-size:20px; font-weight:bold;">the area from your home that you would condider walkable.</p> 
 		<p style="text-align:center;"> <font size="3"><i> Please be sure to consider all area between Winchester Canyon (Goleta) and Toro Canyon Rd (Summerland), and zoom in for a more detailed map. </i></font></p>


      <p style="color:#ff0000; font-weight:bold;text-align:center;"><?php echo $error; ?><br/></p>	
 	<form name="eleven" id="eleven" method="post" action="21.php">
 	<p style= "text-align:center; font-style:italic; font-size:13px">Click <a href="polyhelp.html" onClick="return popup(this, 'notes')">here</a> for help remembering how to use the map. </p>
 	<p>	
 		<div id="map" dojotype="dijit.layout.ContentPane" region="center"></div>
 		<input type="hidden" name="geom" id="geom"/>
 
 	</p>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue11();">CONTINUE ></div>
 	</div>
 </body>
</html>