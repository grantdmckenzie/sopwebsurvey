<?php
	/*
	@author: Grant McKenzie
	@client: Geotrans Lab @ UCSB
	@project: Sense of Place Web Survey
	@date: May 2012
	@description: Login page
	*/
	session_start();
	require "inc/dbase.inc";
	require "inc/user.inc";
	
	if (isset($_POST['email'])) {
		
		$password = md5($_POST['password']);
		$email = addslashes($_POST['email']);
		
		$query = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		$count=mysql_num_rows($result);
		
		if($count==1) {
			$wsuser = new wsuser();
			$wsuser->addFromDB($row);
			session_register("wsuser");
			$_SESSION['wsuser'] = serialize($wsuser);
			header("location: ".$wsuser->page.".php");
		} else  {
			$error = "Incorrect username or password. Please try again.<br/>";
		}
	}

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
 		Welcome
 	</div>
 	<!-- <div id="wrapperProgress"></div> -->
 	<div id="wrapperContent" style="text-align:center">
 		<?php echo $error; ?>
 		
 		<h2>Login</h2>
 		<form id="login1" name="login1" method="post" action="login.php">
 		<table>
 		 <tr>
 		  <td>Username (E-mail)</td>
 		  <td><input type="text" value="" id="email" name="email" class="txt" /></td>
 		 </tr>
 		 <tr>
 		  <td>Password</td>
 		  <td><input type="password" value="" id="password" name="password" class="txt" /></td>
 		 </tr>
 		</table>
 		</form>
 		<div class="bigBtn" id="start" onclick="logmein();">LOGIN ></div>
 		
 	</div>
 </body>
</html>
