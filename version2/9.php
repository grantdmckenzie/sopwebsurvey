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

		$query = "INSERT INTO page15 VALUES ('',".$wsuser->id.",";
		$query .= "'".$address."',";	
		$query .= "'".$city."',";
		$query .= "'".$zip."',";
		$query .= "'".$members."',";
		$query .= "'".$related."',";
		$query .= "'".$house."',";
		$query .= "'".$years."',";
		$query .= "'".$vehicles."',";
		$query .= "'".$drivers."',";
		$query .= "'".$bicycles."',";
		$query .= "'".$income."',";
		$query .= "'".$children."'";
		$query .= ")";
		// echo $query;
		mysql_query($query) or die(mysql_error());
		
		// update the page
		$query = "UPDATE users SET page = '10', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
		mysql_query($query) or die(mysql_error());
		header("location: 10.php");
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
 	<div id="wrapperProgress"><table width="100%"><tr>
 			<td>Part 1. People</td>
 			<td>Part 2. Places</td>
 			<td>Part 3. Activities</td>
 			<td><b>Part 4. About you</b></td>
 			<td>Part 5. Santa Barbara</td>
 		</tr></table></div>
 	<div id="wrapperContent">
<!-- 		<h2 style="text-align:center;">Place Questions:</h2> -->

<p><i>Next, we would like to know a little about your household.</i></p>	
 		<?php echo $error; ?>
 	<form name="fifteen" id="fifteen" method="post" action="9.php">
 	<p>
 		<b>1) What is your home address?</b><br/><br/>
		<input type="text" value="" name="address" style="width:400px" id="address" class="txt" />
		<br/>
		<span style='font-size:0.8em'>Street number and street name</span>
		<br/>
		<table style='float:left;clear:both;margin:0'>
		<tr>
			<td style='width:200px'><select id="city" name="city"><option value="Select">Select</option><option value="Carpinteria">Carpinteria</option><option value="Goleta">Goleta</option><option value="SantaBarbara">Santa Barbara</option></select></td>
		<td><select id="zip" name="zip">
			<option value="Select">Select</option>
			<option value="93013">93013</option>
			<option value="93067">93067</option>
			<option value="93101">93101</option>
			<option value="93102">93102</option>
			<option value="93103">93103</option>
			<option value="93105">93105</option>
			<option value="93106">93106</option>
			<option value="93107">93107</option>
			<option value="93108">93108</option>
			<option value="93109">93109</option>
			<option value="93110">93110</option>
			<option value="93111">93111</option>
			<option value="93117">93117</option>
			<option value="93120">93120</option>
			<option value="93121">93121</option>
			<option value="93130">93130</option>
			<option value="93140">93140</option>
			<option value="93150">93150</option>
			<option value="93160">93160</option>
			<option value="93190">93190</option>
		</select></td>
		</tr><tr>
			<td><span style='font-size:0.8em'>City</span></td>
			<td><span style='font-size:0.8em'>Zip Code</span></td>
		</tr>
		</table>
	</p>
	<p style='clear:both;'><br/>
		<b>2) How many members are in your household? (a household is defined as persons living together sharing a common cooking facility)</b><br/>
		<select id="members" name="members">
		<option value="Select">Select</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">more than 10</option>
		</select>
	</p>
	<p style='clear:both;'><br/>
		<b>3) How many children (under the age of 18) are in your household?</b><br/>
		<select id="children" name="children">
		<option value="Select">Select</option>
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">more than 10</option>
		</select><br/>
	</p>
	<p style='clear:both;'><br/>
	
	
	<!--
	<tr><td style="padding-right:20px">I tend to frequent the same place often because I like it best</td>
	<td><table style="float:left;clear:both;font-size:0.8em"><tr><td>strongly disagree</td><td>disagree</td><td>slightly disagree</td><td>neutral</td><td>slightly agree</td><td>agree</td><td>strongly agree</td></tr>
	<tr><td><input type="radio" name="likert2" value="1"/></td><td><input type="radio" name="likert2" value="2"/></td><td><input type="radio" name="likert2" value="3"/></td><td><input type="radio" name="likert2" value="4"/></td><td><input type="radio" name="likert2" value="5"/></td><td><input type="radio" name="likert2" value="6"/></td><td><input type="radio" name="likert2" value="7"/></td></tr></table></td></tr>
	-->
	
		<b>4) How are you related to the other members in your household?</b><br/>
		<table style='float:left;clear:both;width:50%;margin:0 0'><tr>
		<td>I live alone</td>
		<td><input type="radio" name="related" value="1"/></td>
		</tr><tr>
		<td>I live with my immediate family</td>
		<td><input type="radio" name="related" value="2"/></td>
		</tr><tr>
		<td>I live with my extended family members</td>
		<td><input type="radio" name="related" value="3"/></td>
		</tr><tr>
		<td>I live with friends</td>
		<td><input type="radio" name="related" value="4"/></td>
		</tr><tr>
		<td>I live with acquaintances</td>
		<td><input type="radio" name="related" value="5"/></td>
		</tr><tr>
		<td>Other</td>
		<td><input type="radio" name="related" value="6"/></td>
		</tr><tr>
		<td>&nbsp;&nbsp;If "other", please explain:</td>
		<td></td>
		</tr><tr>
		<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="relatedother" class="txt"/></td>
		</tr></table>
		
		
	</p>
	<p style='clear:both;'>
		<br/><br/>
		<b>5) What description best represents your house</b><br/>
		<table style='float:left;clear:both;width:80%;margin:0'><tr>
		<td>My home is owned by myself or someone else who makes payments (mortgage and/or property taxes) on my behalf</td>
		<td><input type="radio" name="house" value="1"/></td>
		</tr><tr>
		<td>My home is rented by myself or someone else who makes payments on my behalf</td>
		<td><input type="radio" name="house" value="2"/></td>
		</tr><tr>
		<td>My home is provided by a job/military</td>
		<td><input type="radio" name="house" value="3"/></td>
		</tr><tr>
		<td>Other</td>
		<td><input type="radio" name="house" value="4"/></td>
		</tr><tr>
		<td>&nbsp;&nbsp;If "other", please explain:</td>
		<td></td>
		</tr><tr>
		<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="house" class="txt"/></td>
		</tr></table>

		
		
		<!--<b>5) What description best represents your house</b><br/>
		<table style='float:left;clear:both;'><tr>
		<td width="35%">My home is owned by myself or someone else who makes payments (mortgage and/or property taxes) on my behalf</td>
		<td width="15%" style='text-align:right'><input type="radio" name="house" value="1"/></td>
		<td width="35%">My home is provided by a job/military</td>
		<td width="15%" style='text-align:right'><input type="radio" name="house" value="3"/></td>
		</tr><tr>
		<td width="35%">My home is rented by myself or someone else who makes payments on my behalf</td>
		<td width="15%" style='text-align:right'><input type="radio" name="house" value="2"/></td>
		<td width="35%">Other</td>
		<td width="15%" style='text-align:right'><input type="radio" name="house" value="4"/></td>
		</tr><tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;&nbsp;Please explain:</td>
		<td></td>
		</tr><tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;&nbsp;<input type="text" name="houseother" class="txt"/></td>
		</tr></table> -->
	
	
	</p>
	<p style='clear:both;'>
		<br/><br/>
		<b>6) How many years have you lived in your current house?</b><br/>
		<select id="years" name="years">
		<option value="Select">Select</option>
		<option value="0">less than one year</option>
			<option value="1">1 year</option>
			<option value="2">2 years</option>
			<option value="3">3 years</option>
			<option value="4">4 years</option>
			<option value="5">5 years</option>
			<option value="6">6 years</option>
			<option value="7">7 years</option>
			<option value="8">8 years</option>
			<option value="9">9 years</option>
			<option value="10">10 years</option>
			<option value="11">11 years</option>
			<option value="12">12 years</option>
			<option value="13">13 years</option>
			<option value="14">14 years</option>
			<option value="15">15 years</option>
			<option value="16">16 years</option>
			<option value="17">17 years</option>
			<option value="18">18 years</option>
			<option value="19">19 years</option>
			<option value="20">20 years</option>
			<option value="21">more than 20 years</option>
		</select>
	</p>
	<p style='clear:both;'>
		<br/><br/>
		<b>7) What is your annual household income?</b><br/>

		<table style='float:left;clear:both;width:100%'>
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
		<td>$20,000 - $29,999</td>
		<td><input type="radio" name="income" value="3"/></td>
		<td>$100,000 - $109,999</td>
		<td><input type="radio" name="income" value="11"/></td>
		</tr><tr>
		<td>$30,000 - $39,999</td>
		<td><input type="radio" name="income" value="4"/></td>
		<td>$110,000 - $119,999</td>
		<td><input type="radio" name="income" value="12"/></td>
		</tr><tr>
		<td>$40,000 - $49,999</td>
		<td><input type="radio" name="income" value="5"/></td>
		<td>$120,000 - $129,999</td>
		<td><input type="radio" name="income" value="13"/></td>
		</tr><tr>
		<td>$50,000 - $59,999</td>
		<td><input type="radio" name="income" value="6"/></td>
		<td>$130,000 - $139,999</td>
		<td><input type="radio" name="income" value="14"/></td>
		</tr><tr>
		<td>$60,000 - $69,999</td>
		<td><input type="radio" name="income" value="7"/></td>
		<td>$140,000 - $149,999</td>
		<td><input type="radio" name="income" value="15"/></td>
		</tr><tr>
		<td>$70,000 - $79,999</td>
		<td><input type="radio" name="income" value="8"/></td>
		<td>$150,000 or more</td>
		<td><input type="radio" name="income" value="16"/></td>
		</tr><tr>
		</tr></table>
		<p style='clear:both;'>
		<br/><br/>
		<b>8) How many vehicles does your household own?</b><br/>
		<select id="vehicles" name="vehicles">
		<option value="Select">Select</option>
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">more than 6</option>
		</select><br/><br/>
		</p>
		<p style='clear:both;'>
		<b>9) How many licensed drivers are there in your household?</b><br/>
		<select id="drivers" name="drivers">
			<option value="Select">Select</option>
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">more than 6</option>
		</select><br/><br/>
		</p>
		<p style='clear:both;'>
		<b>10) How many bicycles does your household own?</b><br/>
		<select id="bicycles" name="bicycles">
			<option value="Select">Select</option>
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">more than 6</option>
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