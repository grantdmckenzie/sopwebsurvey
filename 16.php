<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: Page 16
	*/
	session_start();
	if (!session_is_registered('wsuser')) {
		header("location: login.php");
	}
	$error = "";
	if (isset($_POST['month']) && isset($_POST['year'])) {
		require "inc/dbase.inc";
		require "inc/user.inc";
		$wsuser = unserialize($_SESSION['wsuser']);
		$em = "";
		$hi = "";
		$ra = "";
		$month = addslashes($_POST['month']);
		$year = $_POST['year'];
		$gender = $_POST['gender'];
		$occupation = addslashes($_POST['occupation']);
		if (isset($_POST['em_1'])) { $em .= $_POST['em_1']."/"; }
		if (isset($_POST['em_2'])) { $em .= $_POST['em_2']."/"; }
		if (isset($_POST['em_3'])) { $em .= $_POST['em_3']."/"; }
		if (isset($_POST['em_4'])) { $em .= $_POST['em_4']."/"; }
		if (isset($_POST['em_5'])) { $em .= $_POST['em_5']."/"; }
		if (isset($_POST['em_6'])) { $em .= $_POST['em_6']."/"; }
		if (isset($_POST['em_7'])) { $em .= $_POST['em_7']."/"; }
		if (isset($_POST['em_8'])) { $em .= $_POST['em_8']."/"; }
		if (isset($_POST['em_9'])) { $em .= $_POST['em_9']."/"; }
		if (isset($_POST['em_10'])) { $em .= $_POST['em_10']."/"; }
		if (isset($_POST['em_11'])) { $em .= $_POST['em_11']."/"; }
		
		if (isset($_POST['hi_1'])) { $hi .= $_POST['hi_1']."/"; }
		if (isset($_POST['hi_2'])) { $hi .= $_POST['hi_2']."/"; }
		if (isset($_POST['hi_3'])) { $hi .= $_POST['hi_3']."/"; }
		if (isset($_POST['hi_4'])) { $hi .= $_POST['hi_4']."/"; }
		if (isset($_POST['hi_5'])) { $hi .= $_POST['hi_5']."/"; }
		
		if (isset($_POST['ra_1'])) { $ra .= $_POST['ra_1']."/"; }
		if (isset($_POST['ra_2'])) { $ra .= $_POST['ra_2']."/"; }
		if (isset($_POST['ra_3'])) { $ra .= $_POST['ra_3']."/"; }
		if (isset($_POST['ra_4'])) { $ra .= $_POST['ra_4']."/"; }
		if (isset($_POST['ra_5'])) { $ra .= $_POST['ra_5']."/"; }
		if (isset($_POST['ra_6'])) { $ra .= $_POST['ra_6']."/"; }
		if (isset($_POST['ra_7'])) { $ra .= $_POST['ra_7']."/"; }
		if (isset($_POST['ra_8'])) { $ra .= $_POST['ra_8']."/"; }
		if (isset($_POST['ra_9'])) { $ra .= $_POST['ra_9']."/"; }
		if (isset($_POST['ra_10'])) { $ra .= $_POST['ra_10']."/"; }
		if (isset($_POST['ra_11'])) { $ra .= $_POST['ra_11']."/"; }
		if (isset($_POST['ra_12'])) { $ra .= $_POST['ra_12']."/"; }
		if (isset($_POST['ra_13'])) { $ra .= $_POST['ra_13']."/"; }
		if (isset($_POST['ra_14'])) { $ra .= $_POST['ra_14']."/"; }
		
		$license = $_POST['license'];
		$education = $_POST['education'];
		$marital = $_POST['marital'];
		$address = addslashes($_POST['address']);
		$city = addslashes($_POST['city']);
		$zip = addslashes($_POST['zip']);

		$query = "INSERT INTO page16 VALUES ('',".$wsuser->id.",";
		$query .= "'".$month."',";	
		$query .= "'".$year."',";
		$query .= "'".$gender."',";
		$query .= "'".$occupation."',";
		$query .= "'".$em."',";
		$query .= "'".$hi."',";
		$query .= "'".$ra."',";
		$query .= "'".$license."',";
		$query .= "'".$education."',";
		$query .= "'".$marital."',";
		$query .= "'".$address."',";
		$query .= "'".$city."',";
		$query .= "'".$zip."'";
		$query .= ")";
		
		// echo $query;
		mysql_query($query) or die(mysql_error());
		
		// update the page
		$query = "UPDATE users SET page = '17', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
		mysql_query($query) or die(mysql_error());
		header("location: 17.php");
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
 		<h2>Now, we would like to know a little about you</h2>
 	<form name="sixteen" id="sixteen" method="post" action="16.php">
 	<p>
 		1) What is your birth month? 
 		<select id="month" name="month">
 			<option value="Select">Select</option>
 			<option value="1">January</option>
 			<option value="2">February</option>
 		</select> 
		and year
		<select id="year" name="year">
 			<option value="Select">Select</option>
 			<option value="1915">1915</option>
 			<option value="1916">1916</option>
 		</select> 
 		<br/><br/>
 		2) What is your gender?<br/>
 		<table style="float:left;"><tr>
 			<td>Male</td><td><input type="radio" name="gender" value="m"/></td>
 			<td>Female</td><td><input type="radio" name="gender" value="f"/></td>
 		</tr></table>
		<br/><br/>
		<p style='clear:both;'>
		3) What is your employment status (select all that apply)?<br/>
		<table style='float:left;clear:both;'><tr>
		<td>Employed full time</td>
		<td><input type="checkbox" id="em_1" name="em_1" value="1"/></td>
		<td>Unemployed</td>
		<td><input type="checkbox" id="em_7" name="em_7" value="7"/></td>
		</tr><tr>
		<td>Employed part time</td>
		<td><input type="checkbox" id="em_2" name="em_2" value="2"/></td>
		<td>Looking for work</td>
		<td><input type="checkbox" id="em_8" name="em_8" value="8"/></td>
		</tr><tr>
		<td>Student full time</td>
		<td><input type="checkbox" id="em_3" name="em_3" value="3"/></td>
		<td>Retired</td>
		<td><input type="checkbox" id="em_9" name="em_9" value="9"/></td>
		</tr><tr>
		<td>Student part time</td>
		<td><input type="checkbox" id="em_4" name="em_4" value="4"/></td>
		<td>Disabled</td>
		<td><input type="checkbox" id="em_10" name="em_10" value="10"/></td>
		</tr><tr>
		<td>Self employed</td>
		<td><input type="checkbox" id="em_5" name="em_5" value="5"/></td>
		<td>Other</td>
		<td><input type="text" id="em_11" name="em_11" value=""/></td>
		</tr><tr>
		<td>Home duties full time</td>
		<td><input type="checkbox" id="em_6" name="em_6" value="6"/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr><tr>
		</table>
		</p><p style='clear:both;'>
		<br/><br/>
		4) What is your occupation (ex. registered nurse, auto mechanic, accountant, retail sales clerk, etc.)?<br/>
		<input type="text" id="occupation" name="occupation"/>
		
		</p><p style='clear:both;'>
		5) Are you of Hispanic, Latino or Spanish origin?<br/>
		<table style='float:left;clear:both;'><tr>
		<td>No, not of Hispanic, Latino or Spanish origin</td>
		<td><input type="checkbox" id="hi_1" name="hi_1" value="1"/></td>
		<td>Yes, Cuban</td>
		<td><input type="checkbox" id="hi_4" name="hi_4" value="4"/></td>
		</tr><tr>
		<td>Yes, Mexican, Mexican American, Chicano</td>
		<td><input type="checkbox" id="hi_2" name="hi_2" value="2"/></td>
		<td>Yes, another Hispanic, Latino or Spanish origin</td>
		<td><input type="text" id="hi_5" name="hi_5" value=""/></td>
		</tr><tr>
		<td>Yes, Puerto Rican</td>
		<td><input type="checkbox" id="hi_3" name="hi_3" value="1"/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
		</table>

		</p><p style='clear:both;'>
		<br/><br/>
		6) What is your race (select all that apply) ?<br/>
		<table style='float:left;clear:both;'><tr>
		<td>White</td>
		<td><input type="checkbox" id="ra_1" name="ra_1" value="1"/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr><tr>
		<td>Black or African American</td>
		<td><input type="checkbox" id="ra_2" name="ra_2" value="2"/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr><tr>
		<td>American Indian or Alaska Native</td>
		<td><input type="checkbox" id="ra_3" name="ra_3" value="3"/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr><tr>
		<td>Asian Indian</td>
		<td><input type="checkbox" id="ra_4" name="ra_4" value="4"/></td>
		<td>Guamanian or Chamorro</td>
		<td><input type="checkbox" id="ra_10" name="ra_10" value="10"/></td>
		</tr><tr>
		<td>Japanese</td>
		<td><input type="checkbox" id="ra_5" name="ra_5" value="5"/></td>
		<td>Filipino</td>
		<td><input type="checkbox" id="ra_11" name="ra_11" value="11"/></td>
		</tr><tr>
		<td>Native Hawaiian</td>
		<td><input type="checkbox" id="ra_6" name="ra_6" value="6"/></td>
		<td>Vietnamese</td>
		<td><input type="checkbox" id="ra_12" name="ra_12" value="12"/></td>
		</tr><tr>
		<td>Chinese</td>
		<td><input type="checkbox" id="ra_7" name="ra_7" value="7"/></td>
		<td>Samoan</td>
		<td><input type="checkbox" id="ra_13" name="ra_13" value="13"/></td>
		</tr><tr>
		<td>Korean</td>
		<td><input type="checkbox" id="ra_8" name="ra_8" value="8"/></td>
		<td>Other Asian or other Pacific Islander</td>
		<td><input type="text" id="ra_14" name="ra_14" value=""/></td>
		</tr><tr>
		<td>Other race not listed</td>
		<td><input type="text" id="ra_9" name="ra_9" value=""/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
		</table>
		
		</p><p style='clear:both;'>
		<br/><br/>
		7) Do you have a drivers license?<br/>
		<table style="float:left;"><tr>
 			<td>Yes</td><td><input type="radio" name="license" value="1"/></td>
 			<td>No</td><td><input type="radio" name="license" value="0"/></td>
 		</tr></table>
		<br/><br/>
		</p><p style='clear:both;'>
		8) What is your education level?<br/>

		<table style='float:left;clear:both;'>
		<tr>
		<td>No school completed</td>
		<td><input type="radio" name="education" value="1"/></td>
		<td>Associate degree in college</td>
		<td><input type="radio" name="education" value="6"/></td>
		</tr><tr>
		<td>Nursery/ pre school</td>
		<td><input type="radio" name="education" value="2"/></td>
		<td>Bachelors degree</td>
		<td><input type="radio" name="education" value="7"/></td>
		</tr><tr>
		<td>Elementary school</td>
		<td><input type="radio" name="education" value="3"/></td>
		<td>Master's degree</td>
		<td><input type="radio" name="education" value="8"/></td>
		</tr><tr>
		<td>Less than high school graduate</td>
		<td><input type="radio" name="education" value="4"/></td>
		<td>Professional school degree</td>
		<td><input type="radio" name="education" value="9"/></td>
		</tr><tr>
		<td>High school graduate</td>
		<td><input type="radio" name="education" value="5"/></td>
		<td>Doctoral degree</td>
		<td><input type="radio" name="education" value="10"/></td>
		</tr></table>
		</p>
		
		<p style='clear:both;'>
		<br/><br/>
		9) What is your marital status?<br/>

		<table style='float:left;clear:both;'>
		<tr>
		<td>Married / domestic partner</td>
		<td><input type="radio" name="marital" value="1"/></td>
		<td>Widowed</td>
		<td><input type="radio" name="marital" value="4"/></td>
		</tr><tr>
		<td>Divorced</td>
		<td><input type="radio" name="marital" value="2"/></td>
		<td>Never married</td>
		<td><input type="radio" name="marital" value="5"/></td>
		</tr><tr>
		<td>Separated</td>
		<td><input type="radio" name="marital" value="3"/></td>
		<td>Master's degree</td>
		<td><input type="radio" name="marital" value="6"/></td>
		</tr></table>
		</p>
		
		<p style='clear:both;'>
		<br/><br/>
		10) What is your work address?<br/>
		<input type="text" value="" name="address" style="width:400px" id="address" />
		<br/>
		Street number and street name<br/>
		<br/>
		<input type="text" value="" name="city" id="city" />
		<input type="text" value="" name="zip" id="zip" /><br/>
		City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zip Code<br/><br/>
		</p>
		
		<input type="hidden" value="1" name="firsttime"/>
	</p>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue16();">CONTINUE ></div>
 	</div>
 </body>
</html>