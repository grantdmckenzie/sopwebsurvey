<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: Page 15
	*/
	session_start();
	if (!session_is_registered('wsuser')) {
		header("location: login.php");
	}
	$error = "";
	if (isset($_POST['address']) && isset($_POST['house']) && isset($_POST['related']) && isset($_POST['income'])) {
		require "inc/dbase.inc";
		require "inc/user.inc";
		$wsuser = unserialize($_SESSION['wsuser']);
		
		$address = addslashes($_POST['address']);
		$city = addslashes($_POST['city']);
		$zip = $_POST['zip'];
		$members = $_POST['members'];
		$related = $_POST['related'];
		$house = $_POST['house'];
		$years = $_POST['years'];
		$vehicles = $_POST['vehicles'];
		$drivers = $_POST['drivers'];
		$bicycles = $_POST['bicycles'];
		$income = $_POST['income'];
		$children = $_POST['children'];
		if ($related == 6)	
			$related = $_POST['relatedother'];
		if ($house == 4)	
			$house = $_POST['houseother'];

		$query = "INSERT INTO page15 VALUES ('',".$wsuser->id;
		$query .= "'".$address."',";	
		$query .= "'".$city."',";
		$query .= "'".$zip."',";
		$query .= "'".$members."',";
		$query .= "'".$related."',";
		$query .= "'".$house."',";
		$query .= "'".$years."',";
		$query .= "'".$vehicles."',";
		$query .= "'".$drivers."',";
		$query .= "'".$bicycles."'";
		$query .= "'".$income."'";
		$query .= "'".$children."'";
		$query .= ")";
		// mysql_query($query) or die(mysql_error());
		echo $query;
		// update the page
		$query = "UPDATE users SET page = '16', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
		mysql_query($query) or die(mysql_error());
		header("location: 16.php");
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
<!-- 		<h2 style="text-align:center;">Place Questions:</h2> -->	
 		<?php echo $error; ?>
 	<form name="fifteen" id="fifteen" method="post" action="15.php">
 	<p>
 		1) What is your home address?<br/>
		<input type="text" value="" name="address" style="width:400px" id="address" />
		<br/>
		Street number and street name<br/>
		<br/>
		<select id="city" name="city"><option value="Select">Select</option><option value="Goleta">Goleta</option><option value="SantaBarbara">Santa Barbara</option></select>
		<select id="zip" name="zip"><option value="Select">Select</option><option value="93101">93101</option><option value="93102">93102</option></select><br/>
		City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zip Code<br/><br/>
		2) How many members are in your household?<br/>
		<select id="members" name="members"><option value="Select">Select</option><option value="1">1</option><option value="2">2</option></select>
		<br/><br/>
		
		3) How many children (under the age of 18) are in your household?<br/>
		<select id="children" name="children"><option value="Select">Select</option><option value="1">1</option><option value="2">2</option></select><br/><br/>
		<p>
		4) How are you related to the other members in your household?<br/>
		<table style='float:left;clear:both;'><tr>
		<td>I live alone</td>
		<td><input type="radio" name="related" value="1"/></td>
		<td>I live with acquaintances</td>
		<td><input type="radio" name="related" value="5"/></td>
		</tr><tr>
		<td>I live with my immediate family</td>
		<td><input type="radio" name="related" value="2"/></td>
		<td>Other</td>
		<td><input type="radio" name="related" value="6"/></td>
		</tr><tr>
		<td>I live with my extended family members</td>
		<td><input type="radio" name="related" value="3"/></td>
		<td><input type="text" name="relatedother"/></td>
		<td>&nbsp;</td>
		</tr><tr>
		<td>I live with friends</td>
		<td><input type="radio" name="related" value="4"/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr></table>
		</p><p style='clear:both;'>
		<br/><br/>
		5) What description best represents your house<br/>
		<table style='float:left;clear:both;'><tr>
		<td>I own my home</td>
		<td><input type="radio" name="house" value="1"/></td>
		<td>My home is provided by a job/military</td>
		<td><input type="radio" name="house" value="3"/></td>
		</tr><tr>
		<td>I rent</td>
		<td><input type="radio" name="house" value="2"/></td>
		<td>Other</td>
		<td><input type="radio" name="house" value="4"/></td>
		</tr><tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type="text" name="houseother"/></td>
		<td>&nbsp;</td>
		</tr></table>
		<p style='clear:both;'>
		<br/><br/>
		6) How many years have you lived in your current house?<br/>
		<select id="years" name="years"><option value="Select">Select</option><option value="1">1</option><option value="2">2</option></select>
		</p><p style='clear:both;'>
		<br/>
		7) What is your annual household income?<br/>

		<table style='float:left;clear:both;'>
		<tr>
		<td>Less than $10,000</td>
		<td><input type="radio" name="income" value="1"/></td>
		<td>$80,000 - $89,999</td>
		<td><input type="radio" name="income" value="9"/></td>
		</tr><tr>
		<td>$10,000 - $19,999</td>
		<td><input type="radio" name="income" value="2"/></td>
		<td>$90,000 - $99,999</td>
		<td><input type="radio" name="income" value="10"/></td>
		</tr><tr>
		<td>$20,000 - $29,000</td>
		<td><input type="radio" name="income" value="3"/></td>
		<td>$100,000 - $109,999</td>
		<td><input type="radio" name="income" value="11"/></td>
		</tr><tr>
		<td>$30,000 - $39,000</td>
		<td><input type="radio" name="income" value="4"/></td>
		<td>$110,000 - $119,999</td>
		<td><input type="radio" name="income" value="12"/></td>
		</tr><tr>
		<td>$40,000 - $49,000</td>
		<td><input type="radio" name="income" value="5"/></td>
		<td>$120,000 - $129,999</td>
		<td><input type="radio" name="income" value="13"/></td>
		</tr><tr>
		<td>$50,000 - $59,000</td>
		<td><input type="radio" name="income" value="6"/></td>
		<td>$130,000 - $139,999</td>
		<td><input type="radio" name="income" value="14"/></td>
		</tr><tr>
		<td>$60,000 - $69,000</td>
		<td><input type="radio" name="income" value="7"/></td>
		<td>$140,000 - $149,999</td>
		<td><input type="radio" name="income" value="15"/></td>
		</tr><tr>
		<td>$70,000 - $79,000</td>
		<td><input type="radio" name="income" value="8"/></td>
		<td>$150,000 or more</td>
		<td><input type="radio" name="income" value="16"/></td>
		</tr><tr>
		</tr></table>
		<p style='clear:both;'>
		<br/><br/>
		8) How many vehicles does your household own?<br/>
		<select id="vehicles" name="vehicles"><option value="Select">Select</option><option value="1">1</option><option value="2">2</option></select><br/><br/>
		</p>
		<p style='clear:both;'>
		9) How many licensed drivers are there in your household?<br/>
		<select id="drivers" name="drivers"><option value="Select">Select</option><option value="1">1</option><option value="2">2</option></select><br/><br/>
		</p>
		<p style='clear:both;'>
		10) How many bicycles does your household own?<br/>
		<select id="bicycles" name="bicycles">
			<option value="Select">Select</option>
			<option value="1">0</option>
			<option value="2">2</option>
		</select><br/><br/>
		</p>
		</p><p style='clear:both;'>
		
		<input type="hidden" value="1" name="firsttime"/>
	</p>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue15();">CONTINUE ></div>
 	</div>
 </body>
</html>