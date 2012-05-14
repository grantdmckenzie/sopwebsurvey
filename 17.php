<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: Page 17: Update map
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
		$why = $_POST['why'];
		
		if (strlen($geom) > 25 && strlen($why) > 2) {
			// insert the deets.
			$query = "INSERT INTO geom VALUES ('',".$wsuser->id.",17,'".addslashes($geom)."','".addslashes($why)."')";
			mysql_query($query) or die(mysql_error());
			
			// update the page
			$query = "UPDATE users SET page = '18', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
			mysql_query($query) or die(mysql_error());
			header("location: 17.php");
		} else {
			$error = "Please draw at least one region on the map.";	
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>Sense of Place: Web Survey</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/1.6/js/dojo/dijit/themes/tundra/tundra.css">
  <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.8/js/esri/dijit/css/Popup.css">
  <link rel="stylesheet" href="css/main.css" />
  <script src="http://serverapi.arcgisonline.com/jsapi/arcgis/?v=2.8" type="text/javascript"></script>
  <script type="text/javascript" src="js/json2.js"></script>
  <script type="text/javascript" src="js/hex2.js"></script>
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
 <script type="text/javascript" src="js/main.js"></script>
 <script type="text/javascript">
      dojoConfig = {
        parseOnLoad: true
      }
    </script>
   
 <script type="text/javascript" src="js/map2.js"></script>
 <body>
 	<div id="wrapperHeader">
 		logo / header
 	</div>
 	<div id="wrapperProgress">Progress Bar</div>
 	<div id="wrapperContent">
 		<h2 style="text-align:center;">Place Questions:</h2>
 		<p style="text-align:center;">Now, we would like to gain an understanding of your views about Santa Barbara.</p>
 		<p style="text-align:center;">For the following questions about Santa Barbara, please rank each area with a number from 1-10, 1 being strongly disagree and 10 being strongly agree  </u></p>
 		<p style="color:#ff0000; font-weight:bold;text-align:center;"><?php echo $error; ?><br/></p>	
 	<form name="seventeen" id="seventeen" method="post" action="17.php">
 	<a href="help.html" target="_blank" style="float:right">Need Help?</a>
 	<p>	
 		<div id="map" dojotype="dijit.layout.ContentPane" region="center"></div>
 		<input type="hidden" name="geom" id="geom"/>
 	</p>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue17();">CONTINUE ></div>
 	</div>
 </body>
</html>