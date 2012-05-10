<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: User Object
	*/
	session_start();
	if (!session_is_registered('wsuser')) {
		header("location: index.php");
	}
	if ($_POST['agree'] == 'on' && $_POST['initials'] != "") {
		require "inc/dbase.inc";
		require "inc/user.inc";
		$wsuser = unserialize($_SESSION['wsuser']);	
		$query = "UPDATE users SET agree = 1 WHERE id = ". $wsuser->id;
		mysql_query($query) or die(mysql_error());
	} else {
		header("location: 2consent.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>Sense of Place: Web Survey</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="css/main.css" />
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

 <body>
 	<div id="wrapperHeader">
 		logo / header
 	</div>
 	<div id="wrapperProgress">Progress Bar</div>
 	<div id="wrapperContent">
 		<h2>Social Roles</h2>
 		<p>First, we would like to gain an understanding of your social involvement and roles.  In a typical week, I interact with the following groups of people:</p>
	<table style="float:left">
 	 <tr>
	  <td><input type="checkbox" name="immediate" id="immediate" style="float:left" /></td>
	  <td>Family (immediate)</td>
	 </tr>
 	 <tr>
	  <td><input type="checkbox" name="extended" id="extended" style="float:left" /></td>
	  <td>Family (extended)</td>
	 </tr>
	 <tr>
	  <td><input type="checkbox" name="friends" id="friends" style="float:left" /></td>
	  <td>Friends</td>
	 </tr>
	 <tr>
	  <td><input type="checkbox" name="coworkers" id="coworkers" style="float:left" /></td>
	  <td>Coworkers / Colleagues</td>
	 </tr>
	 <tr>
	  <td><input type="checkbox" name="peers" id="peers" style="float:left" /></td>
	  <td>Students (peers)</td>
	 </tr>
	 <tr>
	  <td><input type="checkbox" name="mentor" id="mentor" style="float:left" /></td>
	  <td>Students (as a mentor, teacher etc)</td>
	 </tr>
	 <tr>
	  <td><input type="checkbox" name="org" id="org" style="float:left" /></td>
	  <td>Organization group (church, non profit, etc)</td>
	 </tr>
	</table>
</p>
<br/><br/>
 		<div class="bigBtn" style="clear:both;">CONTINUE ></div>
 	</div>
 </body>
</html>
<?php



	/* 
		@author: Grant McKenzie
		@client: Geotrans Lab @ UCSB
		@project: Sense of Place Web Survey
		
	*/
	


?>