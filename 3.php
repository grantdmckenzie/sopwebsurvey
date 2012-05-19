<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: User Object
	*/
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	session_start();
	if (!session_is_registered('wsuser')) {
		header("location: index.php");
	}
	require "inc/dbase.inc";
	require "inc/user.inc";
	if (isset($_POST['agree'])) {
		if ($_POST['agree'] == 'on' && $_POST['initials'] != "") {
			$wsuser = unserialize($_SESSION['wsuser']);	
			$query = "UPDATE users SET agree = 1, page = '3', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
			mysql_query($query) or die(mysql_error());
		} else {
			header("location: 2.php");
		}
	// If this is page three posting back on itself, do the following:

	} else if (isset($_POST['a']) || isset($_POST['b']) || isset($_POST['c']) || isset($_POST['d']) || isset($_POST['e']) || isset($_POST['f']) || isset($_POST['g'])) {
		$a = 0;
		$b = 0;
		$c = 0;
		$d = 0;
		$e = 0;
		$f = 0;
		$g = 0;
		if (isset($_POST['a']) && $_POST['a'] == 'on') { $a = 1; }
		if (isset($_POST['b']) && $_POST['b'] == 'on') { $b = 1; }
		if (isset($_POST['c']) && $_POST['c'] == 'on') { $c = 1; }
		if (isset($_POST['d']) && $_POST['d'] == 'on') { $d = 1; }
		if (isset($_POST['e']) && $_POST['e'] == 'on') { $e = 1; }
		if (isset($_POST['f']) && $_POST['f'] == 'on') { $f = 1; }
		if (isset($_POST['g']) && $_POST['g'] == 'on') { $g = 1; }
		$wsuser = unserialize($_SESSION['wsuser']);	
		$query = "UPDATE users SET page = '4', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
		mysql_query($query) or die(mysql_error());
		$query = "INSERT INTO survey (userid, immediate, extended, friends, coworkers, peers, mentors, groups) VALUES (".$wsuser->id.",".$a.",".$b.",".$c.",".$d.",".$e.",".$f.",".$g.")";
		mysql_query($query) or die(mysql_error());
		header("location: 4.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>GeoTRIPS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="css/main.css" />
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
 <body>
 	<div id="wrapperHeader">
 	</div>
 	<div id="wrapperProgress">Progress Bar</div>
 	<div id="wrapperContent">
 		<p><i>First, we would like to gain an understanding of your social involvement and roles.</i></p>
 		<p><b>In a typical week, which of the following types of people groups do you spend time with:</b></p>
 	<form name="three" id="three" method="post" action="3.php">
	<table style="float:left">
 	 <tr>
	  <td><input type="checkbox" name="a" id="immediate" style="float:left" /></td>
	  <td>Family (immediate)</td>
	 </tr>
 	 <tr>
	  <td><input type="checkbox" name="b" id="extended" style="float:left" /></td>
	  <td>Family (extended)</td>
	 </tr>
	 <tr>
	  <td><input type="checkbox" name="c" id="friends" style="float:left" /></td>
	  <td>Friends</td>
	 </tr>
	 <tr>
	  <td><input type="checkbox" name="d" id="coworkers" style="float:left" /></td>
	  <td>Coworkers / Colleagues</td>
	 </tr>
	 <tr>
	  <td><input type="checkbox" name="e" id="peers" style="float:left" /></td>
	  <td>Students (as peers)</td>
	 </tr>
	 <tr>
	  <td><input type="checkbox" name="f" id="mentor" style="float:left" /></td>
	  <td>Students (as a mentor, teacher, coach, etc.)</td>
	 </tr>
	 <tr>
	  <td><input type="checkbox" name="g" id="org" style="float:left" /></td>
	  <td>Organization (religious, non profit, sport, etc.)</td>
	 </tr>
	</table>
	</form>
</p>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue3();">CONTINUE ></div>
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