<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: Page 18: Update map
	*/
	session_start();
	if (!session_is_registered('wsuser')) {
		header("location: index.php");
	}
	if (isset($_POST['s1'])) {
		$error = "";
		require "inc/dbase.inc";
		require "inc/user.inc";
		$wsuser = unserialize($_SESSION['wsuser']);	
		$query = "INSERT INTO hexagons VALUES ('',".$wsuser->id.",18";
		foreach($_POST as $key=>$value) {
			if ($key != "gm")
			//echo $key.":". $value ."<br/>";
				$query .= ",".$value;

		}
		$query .= ")";
		mysql_query($query) or die(mysql_error());
		// update the page
		$query = "UPDATE users SET page = '13', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;

		mysql_query($query) or die(mysql_error());
		header("location: 13.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>GeoTRIPS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/1.6/js/dojo/dijit/themes/tundra/tundra.css">
  <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.8/js/esri/dijit/css/Popup.css">
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
   
 <script type="text/javascript" src="js/map2.js"></script>
 <body>
 	<div id="wrapperHeader">
 	</div>
 	<div id="wrapperProgress">
 	<table width="90%" align="right"><tr>
 			<td>Part 1. People</td>
 			<td>Part 2. Places</td>
 			<td>Part 3. Activities</td>
 			<td>Part 4. About you</td>
 			<td><b>Part 5. Santa Barbara</b></td>
 		</tr></table></div>
 	<div id="wrapperContent">
 		
 		<p style="text-align:center"><i>Now, we would like to gain an understanding of your views about Santa Barbara.</i></p>
 		<p style="text-align:center;">For the following questions about Santa Barbara, please rank each area with a number from -3 to 3.
 		</p></font>
 		<p style="text-align:center;">
 			-3 (strongly disagree) <img src="img/colors.png" alt="colors" /> 3 (strongly agree)
 		</p>
 		<p style="text-align:center;">Indicate how much you agree or disagree to the statement </p> 
 		<p style="text-align:center; color:#3B6E9E; font-size:20px; font-weight: bold">This area is a dangerous area of Santa Barbara.</p>
 		<p style= "text-align:center; font-style:italic; font-size:13px">Click <a href="hexhelp.html" onClick="return popup(this, 'notes')">here</a> for help remembering how to use the map. </p>

 		<p style="color:#ff0000; font-weight:bold;text-align:center;"><?php echo $error; ?><br/></p>	
 	<form name="eighteen" id="eighteen" method="post" action="12.php">
 	<!--<a href="help.html" onClick="return popup(this, 'notes')" style="float:right"><img src="img/info.png" alt="info" title="Need Help?" /></a> -->
 	<p>	
 		<div id="map" dojotype="dijit.layout.ContentPane" region="center" style="width:90%"></div>
 		<input type="hidden" name="s0" id="s0"/>
 		<input type="hidden" name="s1" id="s1"/>
 		<input type="hidden" name="s2" id="s2"/>
 		<input type="hidden" name="s3" id="s3"/>
 		<input type="hidden" name="s4" id="s4"/>
 		<input type="hidden" name="s5" id="s5"/>
 		<input type="hidden" name="s6" id="s6"/>
 		<input type="hidden" name="s7" id="s7"/>
 		<input type="hidden" name="s8" id="s8"/>
 		<input type="hidden" name="s9" id="s9"/>
 		<input type="hidden" name="s10" id="s10"/>
 		<input type="hidden" name="s11" id="s11"/>
 		<input type="hidden" name="s12" id="s12"/>
 		<input type="hidden" name="s13" id="s13"/>
 		<input type="hidden" name="s14" id="s14"/>
 		<input type="hidden" name="s15" id="s15"/>
 		<input type="hidden" name="s16" id="s16"/>
 		<input type="hidden" name="s17" id="s17"/>
 		<input type="hidden" name="s18" id="s18"/>
 		<input type="hidden" name="s19" id="s19"/>
 		<input type="hidden" name="s20" id="s20"/>
 		<input type="hidden" name="s21" id="s21"/>
 		<input type="hidden" name="s22" id="s22"/>
 	</p>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue18();">CONTINUE ></div>
 	</div>
 </body>
</html>