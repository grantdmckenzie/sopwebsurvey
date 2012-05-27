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
		if (isset($_POST['other1'])) { $type .= $_POST['other1']."/"; }
		if (isset($_POST['other'])) { $type .= addslashes($_POST['other']); }
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
		header("location: polyinfo.html");

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
 	<div id="wrapperProgress">	
 	<table width="90%" align="right"><tr>
 			<td><b>Part 1. People</b></td>
 			<td>Part 2. Places</td>
 			<td>Part 3. Activities</td>
 			<td>Part 4. About you</td>
 			<td>Part 5. Santa Barbara</td>
 	</tr></table></div>
 	<div id="wrapperContent">
 		<span style="color:#ff0000; font-weight:bold"><?php echo $error; ?><br/></span>
 	<form name="four" id="four" method="post" action="4.php">
 	<p>1) When decisions are made with your, <b><?php echo $types[$social]; ?></b>, please indicate the type of role you play in the decision making process:<i>(select all that apply)</i></p>
 		<input type="checkbox" id="decision" name="decison" value="1"/>&nbsp;&nbsp;I generally have a large say in the decision making process.
<br/>
 		<input type="checkbox" id="group" name="group" value="2"/>&nbsp;&nbsp;I partake in decision making, but not more than most others.
<br/>
 		<input type="checkbox" id="follower" name="follower" value="3"/>&nbsp;&nbsp;I usually just go along with decisions made by others.
<br/>
 		<input type="checkbox" id="other1" name="other1" />&nbsp;&nbsp;Other<br/>
 		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Please explain why you chose the options you did: <input type="text" name="other" id="other" class="txt" /><br/>
 		
 		<input type="hidden" name="socialgroup" value="<?php echo $social; ?>"/>
 	<p>2) Please consider the size of the group of your <b><?php echo $types[$social]; ?></b>, and select the option that best fits:</p>
 		<input type="radio" name="size" value="1"/>&nbsp;&nbsp;1 - 5 persons
<br/>
 		<input type="radio" name="size" value="2"/>&nbsp;&nbsp;6 - 10 persons
<br/>
 		<input type="radio" name="size" value="3"/>&nbsp;&nbsp;10-20 persons
<br/>
 		<input type="radio" name="size" value="4"/>&nbsp;&nbsp;20-50 persons
<br/>
		<input type="radio" name="size" value="5"/>&nbsp;&nbsp;50-100 persons
<br/>
		<input type="radio" name="size" value="6"/>&nbsp;&nbsp;larger than 100 persons
<br/>


 	<p>3) How often do you spend time with your <b><?php echo $types[$social]; ?></b> conducting activities together?</p>
 		<input type="radio" name="contact" value="1"/>&nbsp;&nbsp;Every day<br/>
 		<input type="radio" name="contact" value="2"/>&nbsp;&nbsp;A few times a week<br/>
 		<input type="radio" name="contact" value="3"/>&nbsp;&nbsp;Once a week<br/>
 		<input type="radio" name="contact" value="4"/>&nbsp;&nbsp;A few times a month<br/>
 		<input type="radio" name="contact" value="5"/>&nbsp;&nbsp;Once a month<br/>
 		<input type="radio" name="contact" value="6"/>&nbsp;&nbsp;Less than once a month<br/>

<p>4) Please rate the strength of your relationships with people within this group (1 to 10 with 1 being weak and 10 being strong)</p>
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