<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: Page 14
	*/
	session_start();
	if (!session_is_registered('wsuser')) {
		header("location: login.php");
	}
	$error = "";
	if (isset($_POST['firsttime'])) {
		if (isset($_POST['likert1']) && isset($_POST['likert2']) && isset($_POST['likert3']) && isset($_POST['likert4']) && isset($_POST['likert5']) && isset($_POST['likert6']) && isset($_POST['likert7']) && isset($_POST['likert8']) && isset($_POST['likert9']) && isset($_POST['likert10']) && isset($_POST['likert11']) && isset($_POST['likert12']) && isset($_POST['likert13'])) {
			
			require "inc/dbase.inc";
			require "inc/user.inc";
			$wsuser = unserialize($_SESSION['wsuser']);
				
			// insert the deets.
			$query = "INSERT INTO page14 VALUES ('',".$wsuser->id.",".$_POST['likert1'].",".$_POST['likert2'].",".$_POST['likert3'].",".$_POST['likert4'].",".$_POST['likert5'].",".$_POST['likert6'].",".$_POST['likert7'].",".$_POST['likert8'].",".$_POST['likert9'].",".$_POST['likert10'].",".$_POST['likert11'].",".$_POST['likert12'].",".$_POST['likert13'].",'".addslashes($_POST['years'])."','".addslashes($_POST['times'])."')";
			mysql_query($query) or die(mysql_error());
			
			// update the page
			$query = "UPDATE users SET page = '9', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
			mysql_query($query) or die(mysql_error());
			header("location: 9.php");
			
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
 	</div>
 	<div id="wrapperProgress">
 	<table width="90%" align="right"><tr>
 			<td>Part 1. People</td>
 			<td>Part 2. Places</td>
 			<td><b>Part 3. Activities</b></td>
 			<td>Part 4. About you</td>
 			<td>Part 5. Santa Barbara</td>
 		</tr></table></div>
 	<div id="wrapperContent">
 		<!-- <h2 style="text-align:center;">Place Questions:</h2> -->	
 		<?php echo $error; ?>
 	<form name="fourteen" id="fourteen" method="post" action="8.php">
	<!-- <p>Sense of place development/ strength</p> -->
<!-- QUESTION #1 -->
 	<p><b>To what degree do the following statements describe you? </b>
</p>
 	<hr/>
 	<table><tr><td style="padding-right:20px">I tend to develop strong preferences for specific places.</td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;"><tr><td>strongly<br/>disagree</td><td><br/>&nbsp;</td><td>&nbsp;</td><td>neutral</td><td>&nbsp;</td><td><br/>&nbsp;</td><td>&nbsp;&nbsp;&nbsp;strongly<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;agree</td></tr></table><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert1" value="1"/></td><td><input type="radio" name="likert1" value="2"/></td><td><input type="radio" name="likert1" value="3"/></td><td><input type="radio" name="likert1" value="4"/></td><td><input type="radio" name="likert1" value="5"/></td><td><input type="radio" name="likert1" value="6"/></td><td><input type="radio" name="likert1" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">The only thing that matters to me in deciding where to go is convenience.</td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert2" value="1"/></td><td><input type="radio" name="likert2" value="2"/></td><td><input type="radio" name="likert2" value="3"/></td><td><input type="radio" name="likert2" value="4"/></td><td><input type="radio" name="likert2" value="5"/></td><td><input type="radio" name="likert2" value="6"/></td><td><input type="radio" name="likert2" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">There are places in the Santa Barbara area (besides home) that I would be disappointed if they didn't exist.</td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert3" value="1"/></td><td><input type="radio" name="likert3" value="2"/></td><td><input type="radio" name="likert3" value="3"/></td><td><input type="radio" name="likert3" value="4"/></td><td><input type="radio" name="likert3" value="5"/></td><td><input type="radio" name="likert3" value="6"/></td><td><input type="radio" name="likert3" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Certain places in the Santa Barbara area (besides my home) make me feel happy. </td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert4" value="1"/></td><td><input type="radio" name="likert4" value="2"/></td><td><input type="radio" name="likert4" value="3"/></td><td><input type="radio" name="likert4" value="4"/></td><td><input type="radio" name="likert4" value="5"/></td><td><input type="radio" name="likert4" value="6"/></td><td><input type="radio" name="likert4" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Certain places in the Santa Barbara area (besides my home) make me feel at ease.  </td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert5" value="1"/></td><td><input type="radio" name="likert5" value="2"/></td><td><input type="radio" name="likert5" value="3"/></td><td><input type="radio" name="likert5" value="4"/></td><td><input type="radio" name="likert5" value="5"/></td><td><input type="radio" name="likert5" value="6"/></td><td><input type="radio" name="likert5" value="7"/></td></tr></table></td></tr>

	<tr><td style="padding-right:20px">Certain places in the Santa Barbara area (besides my home) make me feel proud to live here. </td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert6" value="1"/></td><td><input type="radio" name="likert6" value="2"/></td><td><input type="radio" name="likert6" value="3"/></td><td><input type="radio" name="likert6" value="4"/></td><td><input type="radio" name="likert6" value="5"/></td><td><input type="radio" name="likert6" value="6"/></td><td><input type="radio" name="likert6" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">I feel a strong attachment to certain places in the Santa Barbara area.</td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert7" value="1"/></td><td><input type="radio" name="likert7" value="2"/></td><td><input type="radio" name="likert7" value="3"/></td><td><input type="radio" name="likert7" value="4"/></td><td><input type="radio" name="likert7" value="5"/></td><td><input type="radio" name="likert7" value="6"/></td><td><input type="radio" name="likert7" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Specific places that I like to visit say something about who I am.</td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert8" value="1"/></td><td><input type="radio" name="likert8" value="2"/></td><td><input type="radio" name="likert8" value="3"/></td><td><input type="radio" name="likert8" value="4"/></td><td><input type="radio" name="likert8" value="5"/></td><td><input type="radio" name="likert8" value="6"/></td><td><input type="radio" name="likert8" value="7"/></td></tr></table></td></tr>
	
	</table>
 
 <br/><br/>
 <!--<p>Respondent history / lifestyle in Santa Barbara</p> -->
<!-- QUESTION #2 -->
<!-- <hr/> -->
 	<p>How many years have you lived in the Santa Barbara area?<br/><input id="years" type="text" name="years" class="txt" style="width:150px;" /></p>
 	<p>How many times have you move to a new residence in the Santa Barbara area?<br/><input id="times" type="text" name="times" class="txt" style="width:150px;"/></p>
 	<p>Please respond to the following questions with how well the statement describes your lifestyle:</p>
 	<table><tr><td style="padding-right:20px">I spend a lot of my free time outside doing physical activities</td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;"><tr><td>strongly<br/>disagree</td><td><br/>&nbsp;</td><td>&nbsp;</td><td>neutral</td><td>&nbsp;</td><td><br/>&nbsp;</td><td>&nbsp;&nbsp;&nbsp;strongly<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;agree</td></tr></table><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert9" value="1"/></td><td><input type="radio" name="likert9" value="2"/></td><td><input type="radio" name="likert9" value="3"/></td><td><input type="radio" name="likert9" value="4"/></td><td><input type="radio" name="likert9" value="5"/></td><td><input type="radio" name="likert9" value="6"/></td><td><input type="radio" name="likert9" value="7"/></td></tr></table></td></tr>
	 
	<tr><td style="padding-right:20px">I like to spend a lot of my free time reading, browsing<br/>on the computer, doing arts or crafts, home improvement<br/>and similar home based activities.</td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert10" value="1"/></td><td><input type="radio" name="likert10" value="2"/></td><td><input type="radio" name="likert10" value="3"/></td><td><input type="radio" name="likert10" value="4"/></td><td><input type="radio" name="likert10" value="5"/></td><td><input type="radio" name="likert10" value="6"/></td><td><input type="radio" name="likert10" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">I like to spend a lot of my free time with friends or family members. </td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert11" value="1"/></td><td><input type="radio" name="likert11" value="2"/></td><td><input type="radio" name="likert11" value="3"/></td><td><input type="radio" name="likert11" value="4"/></td><td><input type="radio" name="likert11" value="5"/></td><td><input type="radio" name="likert11" value="6"/></td><td><input type="radio" name="likert11" value="7"/></td></tr></table></td></tr>

	<tr><td style="padding-right:20px">I eat a lot of my meals at restaurants.</td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert12" value="1"/></td><td><input type="radio" name="likert12" value="2"/></td><td><input type="radio" name="likert12" value="3"/></td><td><input type="radio" name="likert12" value="4"/></td><td><input type="radio" name="likert12" value="5"/></td><td><input type="radio" name="likert12" value="6"/></td><td><input type="radio" name="likert12" value="7"/></td></tr></table></td></tr>
			
	<tr><td style="padding-right:20px">I enjoy being in places where there is a lot of activity and social scene.</td>
	<td><table style="float:left;clear:both;font-size:0.8em;width:300px;">
	<tr><td><input type="radio" name="likert13" value="1"/></td><td><input type="radio" name="likert13" value="2"/></td><td><input type="radio" name="likert13" value="3"/></td><td><input type="radio" name="likert13" value="4"/></td><td><input type="radio" name="likert13" value="5"/></td><td><input type="radio" name="likert13" value="6"/></td><td><input type="radio" name="likert13" value="7"/></td></tr></table></td></tr></table>
	
		<input type="hidden" value="1" name="firsttime"/>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue14();">CONTINUE ></div>
 	</div>
 </body>
</html>