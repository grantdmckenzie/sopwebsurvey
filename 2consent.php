<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: User Object
	*/
	$error = "";
	if (isset($_POST['email'])) {
		if (empty($_POST['firstname'])) {
			$error = "Please enter a FIRST NAME";
			header("location: index.php?e=".$error);
		} else if (empty($_POST['password1'])) {
			$error = "Please enter a PASSWORD";
			header("location: index.php?e=".$error);
		} else if (empty($_POST['lastname'])) {
			$error = "Please enter a LAST NAME";
			header("location: index.php?e=".$error);
		} else if (empty($_POST['email'])) {
			$error = "Please enter an EMAIL ADDRESS";
			header("location: index.php?e=".$error);
		} else if ($_POST['password1'] != $_POST['password2']) {
			$error = "Please make sure that the two passwords match";
			header("location: index.php?e=".$error);
		} else {
		
			$username = addslashes($_POST['username']);
			$password = md5($_POST['password1']);
			$firstname = addslashes($_POST['firstname']);
			$lastname = addslashes($_POST['lastname']);
			$email = addslashes($_POST['email']);
			
			require "inc/dbase.inc";
			require "inc/user.inc";
			
			$query1 = "INSERT INTO users VALUES('','".$firstname."','".$lastname."','".$email."','".$password."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','')";
			mysql_query($query1) or die(mysql_error());
			$insertid = mysql_insert_id();
			
			$wsuser = new wsuser();
			$wsuser->username = $username;
			$wsuser->first = $firstname;
			$wsuser->last = $lastname;
			$wsuser->email = $email;
			$wsuser->id = $insertid;
			
			session_register("wsuser");
			$_SESSION['wsuser'] = serialize($wsuser);
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>Sense of Place: Web Survey</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="css/main.css" />
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

 <body>
 	<div id="wrapperHeader">
 		logo / header
 	</div>
 	<div id="wrapperProgress">Progress Bar</div>
 	<div id="wrapperContent">
 		<h2>Consent Information</h2>
 		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris massa justo, congue pulvinar rhoncus et, tincidunt et eros. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque a felis ante. Nunc nec massa orci. Maecenas egestas, magna nec laoreet ultrices, eros diam sodales lorem, vel auctor felis libero at lectus. Quisque lobortis urna a orci molestie sagittis. In in orci in magna semper commodo sit amet at libero. Ut bibendum tristique mauris, eget varius sem scelerisque et. Duis justo augue, mattis id auctor a, lobortis a turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
</p><p>
Nunc vitae est elit, id ultricies eros. Donec congue tincidunt tellus, non auctor diam venenatis a. Sed diam nulla, sollicitudin vel aliquet sed, feugiat sed velit. Fusce ac mauris et enim auctor vulputate quis at nulla. Duis at diam scelerisque nunc cursus pulvinar. Nunc vulputate porttitor massa, id elementum leo gravida ac. Mauris malesuada eros ac urna vestibulum eget facilisis est placerat. In faucibus eleifend libero, vel ultricies libero viverra in. Nulla quis ipsum non lacus ultrices rhoncus nec in augue.
</p><p>
Ut nec augue non mauris eleifend porttitor in vel leo. Vivamus est lacus, dignissim non facilisis non, blandit sed nulla. Sed bibendum orci eget turpis suscipit pellentesque. Fusce in lorem at eros lobortis scelerisque. Nunc non nibh ac nisl congue pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ac eros vel ante egestas dignissim at ac nisi. Quisque commodo interdum lectus, eget egestas lectus sodales ut. Nulla mollis adipiscing pulvinar. Phasellus lacus justo, consectetur adipiscing rutrum sit amet, commodo id felis. Curabitur sollicitudin rhoncus dui feugiat fermentum. Cras porta tristique ligula, sit amet dictum leo fermentum ut. Maecenas sit amet est vitae felis dictum tincidunt sit amet auctor lorem.
</p><p>
Nam pulvinar molestie tristique. Integer ut urna nec diam rutrum blandit ac venenatis lacus. Nullam posuere tempus orci sed aliquam. Nulla facilisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas at nibh sed dolor faucibus tincidunt et vitae quam. Morbi magna nulla, egestas pretium facilisis ut, pellentesque ultrices sem. Aenean sed arcu vel risus condimentum commodo.
</p><p>
Phasellus imperdiet urna id nunc rutrum id posuere ligula suscipit. Curabitur lobortis nulla vitae erat tincidunt vitae adipiscing purus pulvinar. Suspendisse potenti. In nibh mi, pharetra sit amet suscipit et, varius ac purus. Praesent tempor enim eget nibh tincidunt non commodo turpis interdum. Integer bibendum mauris in nulla adipiscing in tempor massa porta. Suspendisse non est quis tellus pretium semper a ac nulla. Donec leo magna, mattis ut faucibus ut, consectetur sed massa. Nulla faucibus laoreet justo a lobortis. Nam ac justo lorem, in bibendum nunc. Nam eget ipsum lectus, quis iaculis leo. Integer at sagittis dolor. Proin odio massa, posuere semper rutrum eu, vehicula non orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras et libero libero, in cursus magna.</p>
<p>
	<form name="iagree" id="iagree" method="post" action="3socialrolesmain.php">
	<table style="float:left">
 	 <tr>
	  <td><input type="checkbox" name="agree" id="agree" style="float:left" /></td>
	  <td>I agree…</td>
	 </tr>
 	 <tr>
	  <td><input type="input" name="initials" id="initials" class="txt" style="width:30px" /></td>
	  <td>Initials</td>
	 </tr>
	</table>
	</form>
</p>
 		<div class="bigBtn" style="clear: both;" onclick="continue1()">CONTINUE ></div>
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