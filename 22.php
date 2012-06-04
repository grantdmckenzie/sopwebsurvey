<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: Page 22
	*/
	session_start();
	if (!session_is_registered('wsuser')) {
		header("location: login.php");
	}
	$error = "";
	if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])) {
		require "inc/dbase.inc";
		require "inc/user.inc";
		$wsuser = unserialize($_SESSION['wsuser']);
		$android = 0;
		$diary = 0;
		$osn = 0;
		$nosurveys = 0;
		$firstname = addslashes($_POST['firstname']);
		$lastname = addslashes($_POST['lastname']);
		$email = addslashes($_POST['email']);
		$comments = addslashes($_POST['comments']);
		if (isset($_POST['android'])) { $android = $_POST['android']; }
		if (isset($_POST['diary'])) { $diary = $_POST['diary']; }
		if (isset($_POST['osn'])) { $osn = $_POST['osn']; }
		if (isset($_POST['nosurveys'])) { $nosurveys = $_POST['nosurveys']; }

		$query = "INSERT INTO page22 VALUES ('',".$wsuser->id.",";
		$query .= "'".$firstname."',";	
		$query .= "'".$lastname."',";
		$query .= "'".$email."',";
		$query .= $android.",";
		$query .= $diary.",";
		$query .= $osn.",";
		$query .= $nosurveys.",";
		$query .= "'".$comments."'";
		$query .= ");";
		// echo $query;
		mysql_query($query) or die(mysql_error());
		
		// update the page
		$query = "UPDATE users SET page = '23', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
		mysql_query($query) or die(mysql_error());
		header("location: 23.php");
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
 			<td>1. People</td>
 			<td>2. Places</td>
 			<td>3. Activities</td>
 			<td>4. About you</td>
 			<td>5. Santa Barbara</td>
 		</tr></table></div>
 	<div id="wrapperContent">
	<p>Thank you for your participation!!!  We appreciate and value your time and response.  
<br/><br/>
Your incentive will be processed shortly.  You will receive an email from giftrocket <a href="http://www.giftrocket.com" target="_blank">(www.giftrocket.com)</a>.  Please allow approximately 10 business days for an email regarding retrieval of your gift card.  Please also check your junk mail box to ensure that the email is not filtered as spam.    
<br/><br/>
To be sure we have the correct contact information please provide your 
</p>	
 		<?php echo $error; ?>
 	<form name="twentytwo" id="twentytwo" method="post" action="22.php">
 	<p>
 		<table style="float:left;clear:both;"><tr><td>First Name</td><td><input class="txt" type="text" name="firstname" id="firstname"/></td></tr>
 		<tr><td>Last Name</td><td><input class="txt" type="text" name="lastname" id="lastname"/></td></tr>
 		<tr><td>Email</td><td><input class="txt" type="text" name="email" id="email"/></td></tr></table>
 	</p>
 	<p style="clear:both;">
 	<br/><br/>
 	We would like to know if you would be interested in partaking in additional surveys that further investigate everyday travel behavior and decision making for planning purposes.
<br/><br/>
Below is a list of survey opportunities being conducted by the GeoTrans Lab that we would like you to consider.  Please click on the information icon for details, and select those that you would be interested in hearing more about:

 	</p>
 	<p>
			<table style='float:left;clear:both;'>
			<tr>
			<td><input type="checkbox" name="android" value="1" checked /></td>
			<td>Android based travel and activity diary (note: you must have an smartphone using the Android operating system to participate in this study) <a href="android.html" onClick="return popup(this, 'android')"><img style="width:16px;height:16px;" src="img/info.png" alt="info" title="More Information" /></a></td>
			</tr>
			<tr>
			<td><input type="checkbox" name="diary" value="1"checked /></td>
			<td>Web-based activity diary <a href="diary.html" onClick="return popup(this, 'diary')"><img style="width:16px;height:16px;" src="img/info.png" alt="info" title="More Information" /></a></td>
			</tr>
			<tr>
			<td><input type="checkbox" name="osn" value="1" checked /></td>
			<td>Online social network questionnaire <a href="osn.html" onClick="return popup(this, 'osn')"><img style="width:16px;height:16px;" src="img/info.png" alt="info" title="More Information" /></a></td>
			</tr>
			<tr>
			<td><input type="checkbox" name="nosurveys" value="1"/></td>
			<td>I am not interested in any additional surveys</td>
			</tr>
			</table>
	</p>
	<p style="clear:both;text-align:center;">
	<br/><br/>
	Additional general comments?  Please leave them here.<br/>
	<textarea name="comments" id="comments" style="width:690px;height:100px;font-size:1.2em;padding:5px;"></textarea>
	</p>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue22();">FINISH ></div>
 	</div>
 </body>
</html>