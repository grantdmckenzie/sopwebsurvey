<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: Page 5: Update map
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
			$query = "INSERT INTO geom VALUES ('',".$wsuser->id.",5,'".addslashes($geom)."','".addslashes($why)."')";
			mysql_query($query) or die(mysql_error());
			
			// update the page
			$query = "UPDATE users SET page = '6', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
			mysql_query($query) or die(mysql_error());
			header("location: 6.php");
		} else {
			$error = "Please draw at least one region on the map.";	
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>GeoTRIPS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.8/js/dojo/dijit/themes/claro/claro.css">
  <link rel="stylesheet" href="css/main.css" />
  <script src="http://serverapi.arcgisonline.com/jsapi/arcgis/?v=2.8compact" type="text/javascript"></script>
  <script type="text/javascript" src="js/json2.js"></script>
  <script type="text/javascript" src="js/hex2.js"></script>
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
 	<div id="wrapperProgress"><table width="100%"><tr>
 			<td>Section one</td>
 			<td><b>Section two</b></td>
 			<td>Section three</td>
 			<td>Section four</td>
 			<td>Section five</td>
 		</tr></table></div>
 	<div id="wrapperContent">
 		<p style="text-align:center;"><i>Now, we would like to gain an understanding of your views about the Goleta, Santa Barbara and Montecito areas.</i></p>
 	 	<p style="text-align:center;">Please use the map and draw with the shape tool </p>
 	 	<br></br>
 	 	<font color="#003c73"> <b> To draw shapes:</b> <br></br> 1) left click on the map to begin drawing a shape, <br></br> 2) double click the left mouse button to close the shape.  <br></br> 3) If you are unsatisfied with the shape you have drawn, right click on the shape to delete it. 
 	 	<br></br> 
 	 	<br></br> <b>Navigation:</b>
 	 	<br></br> To zoom in and out, use either the plus and minus symbols on the map, or use your mouse scroll button
 	 	<br></br> To move the map view, press and hold the left mouse button and move the mouse to drag the map in the desired direction.  </p>
 	 	</font>
 <p style="text-align:center;"> <font size="3"><i> Please be sure to consider all area between Winchester Canyon (Goleta) and Toro Canyon Rd (Summerland). </i></font></p>
 
 <p style="text-align:center;"> <font size="4" > Please select the areas that you consider to be <u><b>places that are important areas of Santa Barbara.</b></u></font> 
 
 	<p style="color:#ff0000; font-weight:bold;text-align:center;"><?php echo $error; ?><br/></p>	
 	<form name="five" id="five" method="post" action="5.php">
 	<a href="help.html" onClick="return popup(this, 'notes')" style="float:right"><img src="img/info.png" alt="info" title="Need Help?" /></a>
 	<p>	
 		<div id="map" dojotype="dijit.layout.ContentPane" region="center"></div>
 		<input type="hidden" name="geom" id="geom"/>
 	</p>
 	<p style="text-align:center;">
 		Please describe why you think these areas are important<br/>
 		<textarea name="why" id="why" style="width:690px;height:100px;font-size:1.2em;padding:5px;"><?php if (isset($_POST['why'])) { echo $_POST['why']; } ?></textarea>
 		</p>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue5();">CONTINUE ></div>
 	</div>
 </body>
</html>