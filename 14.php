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
			$query = "UPDATE users SET page = '15', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
			mysql_query($query) or die(mysql_error());
			header("location: 15.php");
			
		} else {
			$error = "<p style='color:#ff0000;text-align:center;'>Please answer all questions</p>";	
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1101010/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>Sense of Place: Web Survey</title>
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
 		<!-- <h2 style="text-align:center;">Place Questions:</h2> -->	
 		<?php echo $error; ?>
 	<form name="fourteen" id="fourteen" method="post" action="14.php">
	<!-- <p>Sense of place development/ strength</p> -->
<!-- QUESTION #1 -->
 	<p><b>To what degree do the following statements describe you? </b>
</p>
 	<hr/>
 	<table><tr><td style="padding-right:20px">I tend to develop favorite places</td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert1" value="1"/></td><td><input type="radio" name="likert1" value="2"/></td><td><input type="radio" name="likert1" value="3"/></td><td><input type="radio" name="likert1" value="4"/></td><td><input type="radio" name="likert1" value="5"/></td><td><input type="radio" name="likert1" value="6"/></td><td><input type="radio" name="likert1" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">I tend to frequent the same place often because I like it best</td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert2" value="1"/></td><td><input type="radio" name="likert2" value="2"/></td><td><input type="radio" name="likert2" value="3"/></td><td><input type="radio" name="likert2" value="4"/></td><td><input type="radio" name="likert2" value="5"/></td><td><input type="radio" name="likert2" value="6"/></td><td><input type="radio" name="likert2" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">I am very disappointed when I can no longer visit a place</td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert3" value="1"/></td><td><input type="radio" name="likert3" value="2"/></td><td><input type="radio" name="likert3" value="3"/></td><td><input type="radio" name="likert3" value="4"/></td><td><input type="radio" name="likert3" value="5"/></td><td><input type="radio" name="likert3" value="6"/></td><td><input type="radio" name="likert3" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">Certain places in SB (besides my home) make me feel: Happy, </td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert4" value="1"/></td><td><input type="radio" name="likert4" value="2"/></td><td><input type="radio" name="likert4" value="3"/></td><td><input type="radio" name="likert4" value="4"/></td><td><input type="radio" name="likert4" value="5"/></td><td><input type="radio" name="likert4" value="6"/></td><td><input type="radio" name="likert4" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">at ease,  </td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert5" value="1"/></td><td><input type="radio" name="likert5" value="2"/></td><td><input type="radio" name="likert5" value="3"/></td><td><input type="radio" name="likert5" value="4"/></td><td><input type="radio" name="likert5" value="5"/></td><td><input type="radio" name="likert5" value="6"/></td><td><input type="radio" name="likert5" value="7"/></td></tr></table></td></tr>

	<tr><td style="padding-right:20px">proud to live here, </td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert6" value="1"/></td><td><input type="radio" name="likert6" value="2"/></td><td><input type="radio" name="likert6" value="3"/></td><td><input type="radio" name="likert6" value="4"/></td><td><input type="radio" name="likert6" value="5"/></td><td><input type="radio" name="likert6" value="6"/></td><td><input type="radio" name="likert6" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">attached to the place</td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert7" value="1"/></td><td><input type="radio" name="likert7" value="2"/></td><td><input type="radio" name="likert7" value="3"/></td><td><input type="radio" name="likert7" value="4"/></td><td><input type="radio" name="likert7" value="5"/></td><td><input type="radio" name="likert7" value="6"/></td><td><input type="radio" name="likert7" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">I will travel farther away to go to a specific place even<br/>if similar services are provided closer if I like the further place better</td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert8" value="1"/></td><td><input type="radio" name="likert8" value="2"/></td><td><input type="radio" name="likert8" value="3"/></td><td><input type="radio" name="likert8" value="4"/></td><td><input type="radio" name="likert8" value="5"/></td><td><input type="radio" name="likert8" value="6"/></td><td><input type="radio" name="likert8" value="7"/></td></tr></table></td></tr>
	
	</table>
 
 <br/><br/>
 <p>Respondent history / lifestyle in Santa Barbara</p>
<!-- QUESTION #2 -->
<hr/>
 	<p>How many years have you lived in SB <input type="text" name="years"/></p>
 	<p>How many times have you move to a new residence in SB <input type="text" name="times"/></p>
 	<p>Please respond to the following questions with how well the statement describes your lifestyle:</p>
 	<table><tr><td style="padding-right:20px">I spend a lot of my free time outside doing physical activities</td>
	<<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert9" value="1"/></td><td><input type="radio" name="likert9" value="2"/></td><td><input type="radio" name="likert9" value="3"/></td><td><input type="radio" name="likert9" value="4"/></td><td><input type="radio" name="likert9" value="5"/></td><td><input type="radio" name="likert9" value="6"/></td><td><input type="radio" name="likert9" value="7"/></td></tr></table></td></tr>
	 
	<tr><td style="padding-right:20px">I like to spend a lot of my free time reading, browsing<br/>on the computer, doing arts or crafts, home improvement<br/>and similar home based activities</td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert10" value="1"/></td><td><input type="radio" name="likert10" value="2"/></td><td><input type="radio" name="likert10" value="3"/></td><td><input type="radio" name="likert10" value="4"/></td><td><input type="radio" name="likert10" value="5"/></td><td><input type="radio" name="likert10" value="6"/></td><td><input type="radio" name="likert10" value="7"/></td></tr></table></td></tr>
	
	<tr><td style="padding-right:20px">I like to spend a lot of my free time with friends or family members </td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert11" value="1"/></td><td><input type="radio" name="likert11" value="2"/></td><td><input type="radio" name="likert11" value="3"/></td><td><input type="radio" name="likert11" value="4"/></td><td><input type="radio" name="likert11" value="5"/></td><td><input type="radio" name="likert11" value="6"/></td><td><input type="radio" name="likert11" value="7"/></td></tr></table></td></tr>

	<tr><td style="padding-right:20px">I eat a lot of my meals at restaurants</td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert12" value="1"/></td><td><input type="radio" name="likert12" value="2"/></td><td><input type="radio" name="likert12" value="3"/></td><td><input type="radio" name="likert12" value="4"/></td><td><input type="radio" name="likert12" value="5"/></td><td><input type="radio" name="likert12" value="6"/></td><td><input type="radio" name="likert12" value="7"/></td></tr></table></td></tr>
			
	<tr><td style="padding-right:20px">I enjoy being in crowds or places where there is a lot of activity</td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert13" value="1"/></td><td><input type="radio" name="likert13" value="2"/></td><td><input type="radio" name="likert13" value="3"/></td><td><input type="radio" name="likert13" value="4"/></td><td><input type="radio" name="likert13" value="5"/></td><td><input type="radio" name="likert13" value="6"/></td><td><input type="radio" name="likert13" value="7"/></td></tr></table></td></tr></table>
	
		<input type="hidden" value="1" name="firsttime"/>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue14();">CONTINUE ></div>
 	</div>
 </body>
</html>