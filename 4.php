<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
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
	$error = "";
	require "inc/dbase.inc";
	require "inc/user.inc";
	$wsuser = unserialize($_SESSION['wsuser']);	
	$types = array("immediate"=>"Family (immediate)","extended"=>"Family (extended)","friends"=>"Friends","coworkers"=>"Coworkers / Colleagues","peers"=>"Students (peers)","mentors"=>"Students (mentors, teachers, etc)","groups"=>"Organization group (church, non profit, etc)");
	
	if (isset($_POST['socialgroup'])) {
		$socialgroup = $_POST['socialgroup'];
		$type = "";
		if (isset($_POST['decison'])) { $type .= $_POST['decison']."/"; }
		if (isset($_POST['group'])) { $type .= $_POST['group']."/"; }
		if (isset($_POST['follower'])) { $type .= $_POST['follower']."/"; }
		if (isset($_POST['other'])) { $type .= $_POST['other']; }
		if (isset($_POST['size'])) { $size = $_POST['size']; } else { $error = "Please complete question #2"; }
		if (isset($_POST['contact'])) { $contact = $_POST['contact']; } else { $error = "Please complete question #3"; }
		if (isset($_POST['strong'])) { $strong = $_POST['strong']; } else { $error = "Please complete question #4"; }
	
		if (strlen($error) < 2) {
			// insert the deets.
			$query = "INSERT INTO socialgroups VALUES ('',".$wsuser->id.",'".$socialgroup."','".$type."',".$size.",".$contact.",".$strong.")";
			mysql_query($query) or die(mysql_error());
			
			// update the social group in the surveys table so that we know we already completed it.
			$query = "UPDATE survey SET ".$socialgroup." = 2 WHERE userid = ". $wsuser->id;
			mysql_query($query) or die(mysql_error());
		
		}
	}
	
	$query = "SELECT immediate, extended, friends, coworkers, peers, mentors, groups FROM survey WHERE userid = ". $wsuser->id ." LIMIT 1";
	$result = mysql_query($query) or die(mysql_error());
	$social = "";
	$match = false;
	while ($row = mysql_fetch_array($result)) {
		foreach ($row as $k=>$v) {
	        if ($v == 1 && !is_int($k)) {
	        	$social = $k;
	        	$match = true;
	        	break;
	        }
	    }
	}
	// no social roles selected or we've already gone through them all.
	if (!$match)
		header("location: 5.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
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
 		<h2>Social Roles</h2>
 		<span style="color:#ff0000; font-weight:bold"><?php echo $error; ?><br/></span>
 	<form name="four" id="four" method="post" action="4.php">
 	<p>1) In the social group, <b><?php echo $types[$social]; ?></b>, please indicate the type of role you play:</p>
 		<input type="checkbox" name="decison" value="1"/>Decision maker (I generally have a large say in the decisions made)
<br/>
 		<input type="checkbox" name="group" value="2"/>Group member (I partake in decision making, but not more than most others)
<br/>
 		<input type="checkbox" name="follower" value="3"/>Follower (I go along with decisions made by others)
<br/>
 		Other<input type="text" name="other" id="other" /><br/>
 		
 		<input type="hidden" name="socialgroup" value="<?php echo $social; ?>"/>
 	<p>2) For the social group, <b><?php echo $types[$social]; ?></b>, please indicate the approximate size of the group:</p>
 		<input type="radio" name="size" value="1"/>1 - 5 persons
<br/>
 		<input type="radio" name="size" value="2"/>6 - 10 persons
<br/>
 		<input type="radio" name="size" value="3"/>10-20 persons
<br/>
 		<input type="radio" name="size" value="4"/>20-50 persons
<br/>
		<input type="radio" name="size" value="5"/>50-100 persons
<br/>
		<input type="radio" name="size" value="6"/>larger than 100 persons
<br/>


 	<p>3) In the social group, <b><?php echo $types[$social]; ?></b>, how much contact do you have with the people within this social group?</p>
 		<input type="radio" name="contact" value="1"/>Every day<br/>
 		<input type="radio" name="contact" value="2"/>A few times a week<br/>
 		<input type="radio" name="contact" value="3"/>Once a week<br/>
 		<input type="radio" name="contact" value="4"/>A few times a month<br/>
 		<input type="radio" name="contact" value="5"/>Once a month<br/>
 		<input type="radio" name="contact" value="6"/>Less than once a month<br/>

<p>4) How strong are your relationships to people within this group (1 to 10 with 1 being weak and 10 being strong)</p>
	<table style="width:90%">
	 <tr>
	  <td>1</td>
	  <td>2</td>
	  <td>3</td>
	  <td>4</td>
	  <td>5</td>
	  <td>6</td>
	  <td>7</td>
	  <td>8</td>
	  <td>9</td>
	  <td>10</td>
	 </tr>
	 <tr>
	  <td><input type="radio" name="strong" value="1"/></td>
	  <td><input type="radio" name="strong" value="2"/></td>
	  <td><input type="radio" name="strong" value="3"/></td>
	  <td><input type="radio" name="strong" value="4"/></td>
	  <td><input type="radio" name="strong" value="5"/></td>
	  <td><input type="radio" name="strong" value="6"/></td>
	  <td><input type="radio" name="strong" value="7"/></td>
	  <td><input type="radio" name="strong" value="8"/></td>
	  <td><input type="radio" name="strong" value="9"/></td>
	  <td><input type="radio" name="strong" value="10"/></td>
	 </td>
	</table>
	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue4();">CONTINUE ></div>
 	</div>
 </body>
</html>