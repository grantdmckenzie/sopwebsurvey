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
	if (isset($_POST['proximity']) && isset($_POST['danger']) && isset($_POST['attractive']) && isset($_POST['familiarity'])) {
		require "inc/dbase.inc";
		require "inc/user.inc";
		$wsuser = unserialize($_SESSION['wsuser']);
		
		$proximity = $_POST['proximity'];
		$danger = $_POST['danger'];
		$attractive = $_POST['attractive'];
		$familiarity = $_POST['familiarity'];
		$todo = $_POST['todo'];

		$query = "INSERT INTO page21 VALUES ('',".$wsuser->id.",";
		$query .= $proximity.",";	
		$query .= $danger.",";
		$query .= $attractive.",";
		$query .= $familiarity.",";
		$query .= $todo;
		$query .= ");";
		// echo $query;
		mysql_query($query) or die(mysql_error());
		
		// update the page
		$query = "UPDATE users SET page = '22', lastaccess = '".date("Y-m-d H:i:s")."' WHERE id = ". $wsuser->id;
		mysql_query($query) or die(mysql_error());
		header("location: 22.php");
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
 			<td>Part 2. Places</td>
 			<td>Part 3. Activities</td>
 			<td>Part 4. About you</td>
 			<td><b>Part 5. Santa Barbara</b></td>
 		</tr></table></div>
 	<div id="wrapperContent">
	<p>On a scale of 1-10, with 1 being not important and 10 being very important, please rate how important each of these aspects are in deciding whether to travel to a specific place for an everyday activity (shopping, eating out, meeting friends, family outing, etc)?</p>	
 		<?php echo $error; ?>
 	<form name="twentyone" id="twentyone" method="post" action="21.php">
 	<p>
 		<p>
			<table style='float:left;clear:both;width:100%'><tr>
			<tr><td></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td></tr>
			<tr>
			<td width="70%">Proximity to home</td>
			<td><input type="radio" name="proximity" value="1"/></td>
			<td><input type="radio" name="proximity" value="2"/></td>
			<td><input type="radio" name="proximity" value="3"/></td>
			<td><input type="radio" name="proximity" value="4"/></td>
			<td><input type="radio" name="proximity" value="5"/></td>
			<td><input type="radio" name="proximity" value="6"/></td>
			<td><input type="radio" name="proximity" value="7"/></td>
			<td><input type="radio" name="proximity" value="8"/></td>
			<td><input type="radio" name="proximity" value="9"/></td>
			<td><input type="radio" name="proximity" value="10"/>
			</td>
			</tr>
			<tr>
			<td>Perception of danger</td>
			<td><input type="radio" name="danger" value="1"/></td>
			<td><input type="radio" name="danger" value="2"/></td>
			<td><input type="radio" name="danger" value="3"/></td>
			<td><input type="radio" name="danger" value="4"/></td>
			<td><input type="radio" name="danger" value="5"/></td>
			<td><input type="radio" name="danger" value="6"/></td>
			<td><input type="radio" name="danger" value="7"/></td>
			<td><input type="radio" name="danger" value="8"/></td>
			<td><input type="radio" name="danger" value="9"/></td>
			<td><input type="radio" name="danger" value="10"/>
			</td>
			</tr>
			<tr>
			<td>Attractiveness of the area</td>
			<td><input type="radio" name="attractive" value="1"/></td>
			<td><input type="radio" name="attractive" value="2"/></td>
			<td><input type="radio" name="attractive" value="3"/></td>
			<td><input type="radio" name="attractive" value="4"/></td>
			<td><input type="radio" name="attractive" value="5"/></td>
			<td><input type="radio" name="attractive" value="6"/></td>
			<td><input type="radio" name="attractive" value="7"/></td>
			<td><input type="radio" name="attractive" value="8"/></td>
			<td><input type="radio" name="attractive" value="9"/></td>
			<td><input type="radio" name="attractive" value="10"/>
			</td>
			</tr>
			<tr>
			<td>Familiarity with the area</td>
			<td><input type="radio" name="familiarity" value="1"/></td>
			<td><input type="radio" name="familiarity" value="2"/></td>
			<td><input type="radio" name="familiarity" value="3"/></td>
			<td><input type="radio" name="familiarity" value="4"/></td>
			<td><input type="radio" name="familiarity" value="5"/></td>
			<td><input type="radio" name="familiarity" value="6"/></td>
			<td><input type="radio" name="familiarity" value="7"/></td>
			<td><input type="radio" name="familiarity" value="8"/></td>
			<td><input type="radio" name="familiarity" value="9"/></td>
			<td><input type="radio" name="familiarity" value="10"/>
			</td>
			</tr>
			<tr>
			<td>Provides a lot of things to do</td>
			<td><input type="radio" name="todo" value="1"/></td>
			<td><input type="radio" name="todo" value="2"/></td>
			<td><input type="radio" name="todo" value="3"/></td>
			<td><input type="radio" name="todo" value="4"/></td>
			<td><input type="radio" name="todo" value="5"/></td>
			<td><input type="radio" name="todo" value="6"/></td>
			<td><input type="radio" name="todo" value="7"/></td>
			<td><input type="radio" name="todo" value="8"/></td>
			<td><input type="radio" name="todo" value="9"/></td>
			<td><input type="radio" name="todo" value="10"/>
			</td>
			</tr>
			</table>
		</p>
		<br/><br/>
	</p>
 	</form>
<br/><br/><br/><br/>
 		<div class="bigBtn" style="clear:both;" onclick="continue21();">CONTINUE ></div>
 	</div>
 </body>
</html>