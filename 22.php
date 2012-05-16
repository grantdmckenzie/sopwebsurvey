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
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
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
		$query .= $nosurveys;
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
	<p>Thank you for your participation!!!  We appreciate and value your time and response.  
<br/><br/>
Your incentive payment will be processed within the next week.  You will receive information via email regarding retrieval of this incentive prize.  
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
Below is a list of survey opportunities we would like you to consider (check all that you would be interested in hearing more about):

 	</p>
 	<p>
			<table style='float:left;clear:both;'>
			<tr>
			<td><input type="checkbox" name="android" value="1" checked /></td>
			<td>Android based travel and activity diary</td>
			</tr>
			<tr>
			<td><input type="checkbox" name="diary" value="1"checked /></td>
			<td>Online based travel diary</td>
			</tr>
			<tr>
			<td><input type="checkbox" name="osn" value="1" checked /></td>
			<td>Online social network questionnaire</td>
			</tr>
			<tr>
			<td><input type="checkbox" name="nosurveys" value="1"/></td>
			<td>I am not interested in any additional surveys</td>
			</tr>
			</table>
	</p>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue22();">FINISH ></div>
 	</div>
 </body>
</html>