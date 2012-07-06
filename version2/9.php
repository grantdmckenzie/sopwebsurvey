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
		$address = 0;
		$city = 0;
		$zip = 0;
		if (isset($_POST['address'])) { $address = addslashes($_POST['address']); }
		if (isset($_POST['city'])) { $city = addslashes($_POST['city']); }
		if (isset($_POST['zip'])) { $zip = addslashes($_POST['zip']); }

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
		$query = "UPDATE users SET page = '10', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
		mysql_query($query) or die(mysql_error());
		header("location: hexinfo.html");
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
 			<td>Part 1. People</td>
 			<td>Part 2. Activities</td>
 			<td><b>Part 3. About you</b></td>
 			<td>Part 4. Santa Barbara</td>
 			<td>Part 5. Places</td>
 		</tr></table></div>
 	<div id="wrapperContent">
<!-- 		<h2 style="text-align:center;">Place Questions:</h2> -->	
 		<?php echo $error; ?>
 		<h2>Now, we would like to know a little about you</h2>
 	<form name="sixteen" id="sixteen" method="post" action="9.php">
 	<p>
 		<b>1) What is your birth month?</b>
 		<select id="month" name="month">
 			<option value="Select">Select</option>
 			<option value="1">January</option>
 			<option value="2">February</option>
 			<option value="3">March</option>
 			<option value="4">April</option>
 			<option value="5">May</option>
 			<option value="6">June</option>
 			<option value="7">July</option>
 			<option value="8">August</option>
 			<option value="9">September</option>
 			<option value="10">October</option>
 			<option value="11">November</option>
 			<option value="12">December</option>
 			<option value= "0">Decline to state </option>
 			
 		</select> 
		and year
		<select id="year" name="year">
 			<option value="Select">Select</option>
 			<option value="1915">1915</option>
 			<option value="1916">1916</option>
 			<option value="1917">1917</option>
 			<option value="1918">1918</option>
 			<option value="1919">1919</option>
 			<option value="1920">1920</option>
 			<option value="1921">1921</option>
 			<option value="1922">1922</option>
 			<option value="1923">1923</option>
 			<option value="1924">1924</option>
 			<option value="1925">1925</option>
 			<option value="1926">1926</option>
 			<option value="1927">1927</option>
 			<option value="1928">1928</option>
 			<option value="1929">1929</option>
 			<option value="1930">1930</option>
 			<option value="1931">1931</option>
 			<option value="1932">1932</option>
 			<option value="1933">1933</option>
 			<option value="1934">1934</option>
 			<option value="1935">1935</option>
 			<option value="1936">1936</option>
 			<option value="1937">1937</option>
 			<option value="1938">1938</option>
 			<option value="1939">1939</option>
 			<option value="1940">1940</option>
 			<option value="1941">1941</option>
 			<option value="1942">1942</option>
 			<option value="1943">1943</option>
 			<option value="1944">1944</option>
 			<option value="1945">1945</option>
 			<option value="1946">1946</option>
 			<option value="1947">1947</option>
 			<option value="1948">1948</option>
 			<option value="1949">1949</option>
 			<option value="1950">1950</option>
 			<option value="1951">1951</option>
 			<option value="1952">1952</option>
 			<option value="1953">1953</option>
 			<option value="1954">1954</option>
 			<option value="1955">1955</option>
 			<option value="1956">1956</option>
 			<option value="1957">1957</option>
 			<option value="1958">1958</option>
 			<option value="1959">1959</option>
 			<option value="1960">1960</option>
 			<option value="1961">1961</option>
 			<option value="1962">1962</option>
 			<option value="1963">1963</option>
 			<option value="1964">1964</option>
 			<option value="1965">1965</option>
 			<option value="1966">1966</option>
 			<option value="1967">1967</option>
 			<option value="1968">1968</option>
 			<option value="1969">1969</option>
 			<option value="1970">1970</option>
 			<option value="1971">1971</option>
 			<option value="1972">1972</option>
 			<option value="1973">1973</option>
 			<option value="1974">1974</option>
 			<option value="1975">1975</option>
 			<option value="1976">1976</option>
 			<option value="1977">1977</option>
 			<option value="1978">1978</option>
 			<option value="1979">1979</option>
 			<option value="1980">1980</option>
 			<option value="1981">1981</option>
 			<option value="1982">1982</option>
 			<option value="1983">1983</option>
 			<option value="1984">1984</option>
 			<option value="1985">1985</option>
 			<option value="1986">1986</option>
 			<option value="1987">1987</option>
 			<option value="1988">1988</option>
 			<option value="1989">1989</option>
 			<option value="1990">1990</option>
 			<option value="1991">1991</option>
 			<option value="1992">1992</option>
 			<option value="1993">1993</option>
 			<option value="1994">1994</option>
 			<option value="1995">1995</option>
 			<option value="1996">1996</option>
 			<option value="1997">1997</option>
 			<option value="1998">1998</option>
 			<option value="1999">1999</option>
 			<option value="2000">2000</option>
 			<option value="1000">decline to state</option>
 			
 		</select> 
 		<br/><br/>
 		<b>2) What is your gender?</b><br/>
 		<table style="float:left;padding-left:20px;margin:0"><tr>
 			<td>Male</td><td><input type="radio" name="gender" value="m"/></td>
 			<td>Female</td><td><input type="radio" name="gender" value="f"/></td>
 		</tr></table>
		<br/><br/>
		<p style='clear:both;'>
		<b>3) What is your employment status (select all that apply)?</b><br/>
		<table style='float:left;clear:both;width:100%'><tr>
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
		<td><input type="checkbox"/></td>
		</tr><tr>
		<td valign="top">Home duties full time</td>
		<td valign="top"><input type="checkbox" id="em_6" name="em_6" value="6"/></td>
		<td colspan="2">&nbsp;&nbsp;Please explain:<br/>&nbsp;&nbsp;<input type="text" id="em_11" name="em_11" value="" /></td>
		</tr><tr>
		</table>
		</p><p style='clear:both;'>
		<br/><br/>
		<b>4) What is your occupation (ex. registered nurse, auto mechanic,<br/>accountant, retail sales clerk, etc.)?</b><i> (please type "none" if you are not currently employed)</i><br/>
		<input type="text" id="occupation" name="occupation" class="txt" />
		
		</p><p style='clear:both;'>
		<b>5) Are you of Hispanic, Latino or Spanish origin?</b><br/>
		<table style='float:left;clear:both;width:100%;'><tr>
		<td valign="top">No, not of Hispanic, Latino or Spanish origin</td>
		<td valign="top"><input type="checkbox" id="hi_1" name="hi_1" value="1"/></td>
		<td valign="top">Yes, Cuban</td>
		<td valign="top"><input type="checkbox" id="hi_4" name="hi_4" value="4"/></td>
		</tr><tr>
		<td valign="top">Yes, Mexican, Mexican American, Chicano</td>
		<td valign="top"><input type="checkbox" id="hi_2" name="hi_2" value="2"/></td>
		<td valign="top">Yes, another Hispanic, Latino or Spanish origin</td>
		<td valign="top"><input type="checkbox"/></td>
		</tr><tr>
		<td valign="top">Yes, Puerto Rican</td>
		<td valign="top"><input type="checkbox" id="hi_3" name="hi_3" value="1"/></td>
		<td colspan="2">&nbsp;&nbsp;Please explain:<br/>&nbsp;&nbsp;<input type="text" id="hi_5" name="hi_5" value=""/></td>
		</tr>
		</table>

		</p><p style='clear:both;'>
		<br/><br/>
		<b>6) What is your race (select all that apply)?</b><br/>
		<table style='float:left;clear:both;width:100%;'><tr>
		<td>White</td>
		<td><input type="checkbox" id="ra_1" name="ra_1" value="1"/></td>
		<td>Black or African American</td>
		<td><input type="checkbox" id="ra_2" name="ra_2" value="2"/></td>
		</tr><tr>
		<td>American Indian or Alaska Native</td>
		<td><input type="checkbox" id="ra_3" name="ra_3" value="3"/></td>
		<td>Asian Indian</td>
		<td><input type="checkbox" id="ra_4" name="ra_4" value="4"/></td>
		</tr><tr>
		<td>Guamanian or Chamorro</td>
		<td><input type="checkbox" id="ra_10" name="ra_10" value="10"/></td>
		<td>Japanese</td>
		<td><input type="checkbox" id="ra_5" name="ra_5" value="5"/></td>
		</tr><tr>
		<td>Filipino</td>
		<td><input type="checkbox" id="ra_11" name="ra_11" value="11"/></td>
		<td>Native Hawaiian</td>
		<td><input type="checkbox" id="ra_6" name="ra_6" value="6"/></td>
		</tr><tr>
		<td>Vietnamese</td>
		<td><input type="checkbox" id="ra_12" name="ra_12" value="12"/></td>
		<td>Chinese</td>
		<td><input type="checkbox" id="ra_7" name="ra_7" value="7"/></td>
		</tr><tr>
		<td>Samoan</td>
		<td><input type="checkbox" id="ra_13" name="ra_13" value="13"/></td>
		<td>Korean</td>
		<td><input type="checkbox" id="ra_8" name="ra_8" value="8"/></td>
		</tr><tr>
		<td>Other Asian or other Pacific Islander</td>
		<td><input type="checkbox"/></td>
		<td>Other race not listed</td>
		<td><input type="checkbox"/></td>
		</tr><tr>
		<td colspan="2">&nbsp;&nbsp;Please explain:<br/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="ra_14" name="ra_14" value=""/></td>
		<td colspan="2">&nbsp;&nbsp;Please explain:<br/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="ra_9" name="ra_9" value=""/></td>
		</tr>
		</table>
		
		</p><p style='clear:both;'>
		<br/><br/>
		<b>7) Do you have a drivers license?</b><br/>
		<table style="float:left;;margin:0"><tr>
 			<td>Yes</td><td><input type="radio" name="license" value="1"/></td>
 			<td>No</td><td><input type="radio" name="license" value="0"/></td>
 		</tr></table>
		<br/><br/>
		</p><p style='clear:both;'>
		<b>8) What is the highest education level completed?</b><br/>

		<table style='float:left;clear:both;width:100%'>
		<tr>
		<td>No school completed</td>
		<td><input type="radio" name="education" value="1"/></td>
		<td>Some college- no degree</td>
		<td><input type="radio" name="education" value="6"/></td>
		</tr><tr>
		<td>Elementary school</td>
		<td><input type="radio" name="education" value="2"/></td>
		<td>Bachelors degree</td>
		<td><input type="radio" name="education" value="7"/></td>
		</tr><tr>
		<td>Less than high school graduate</td>
		<td><input type="radio" name="education" value="3"/></td>
		<td>Master's degree</td>
		<td><input type="radio" name="education" value="8"/></td>
		</tr><tr>
		<td>High school graduate</td>
		<td><input type="radio" name="education" value="4"/></td>
		<td>Professional school degree</td>
		<td><input type="radio" name="education" value="9"/></td>
		</tr><tr>
		<td>Associate degree in college</td>
		<td><input type="radio" name="education" value="5"/></td>
		<td>Doctoral degree</td>
		<td><input type="radio" name="education" value="10"/></td>
		</tr></table>
		</p>
		
		<p style='clear:both;'>
		<br/><br/>
		<b>9) What is your marital status?</b><br/>

		<table style='float:left;clear:both;width:100%'>
		<tr>
		<td width="50%">Single, never married</td>
		<td><input type="radio" name="marital" value="1"/></td>
		<td>Divorced</td>
		<td><input type="radio" name="marital" value="4"/></td>
		</tr><tr>
		<td>Currently married / domestic partner</td>
		<td><input type="radio" name="marital" value="2"/></td>
		<td>Widowed</td>
		<td><input type="radio" name="marital" value="5"/></td>
		</tr><tr>
		<td>Separated</td>
		<td><input type="radio" name="marital" value="3"/></td>
		</tr></table>
		</p>
		
		<p style='clear:both;'>
		<br/><br/>
		<b>10) What is your work address?</b><br/>
		<input type="text" value="" name="address" style="width:400px" id="address" class="txt" />
		<br/>
		<span style='font-size:0.8em'>Street number and street name</span>
		<br/>
		<table style='float:left;clear:both;margin:0'>
		<tr>
			<td style='width:200px'><input type="text" value="" name="city" id="city" class="txt" style="width:100px;" /></td>
			<td><input type="text" value="" name="zip" id="zip" class="txt" style="width:100px;" /></td>
		</tr><tr>
			<td><span style='font-size:0.8em'>City</span></td>
			<td><span style='font-size:0.8em'>Zip Code</span></td>
		</tr>
		</table>
		<input type="hidden" value="1" name="firsttime"/>
	</p>
 	</form>
<br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue16();">CONTINUE ></div>
 	</div>
 </body>
</html>