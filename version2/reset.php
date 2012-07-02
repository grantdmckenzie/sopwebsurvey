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

	$error = "";
	if (isset($_POST['email'])) {
		if (empty($_POST['email'])) {
			$error = "Please enter a valid email address";
		} else {

			$email = addslashes($_POST['email']);
			
			require "inc/dbase.inc";
			
			$query = "SELECT COUNT(*) FROM users WHERE email = '".$email."'";
			$result = mysql_query($query)or die('Could not find member: ' . mysql_error());
		    if (!mysql_result($result,0,0)>0) {
		        $error = "Sorry, your Email address was not found in our system.";
		    } else {
				$random_password=md5(uniqid(rand()));
				$emailpassword=substr($random_password, 0, 8);
				$newpassword = md5($emailpassword);
				
				$query2 = sprintf("UPDATE users SET password = '".mysql_real_escape_string($newpassword)."' WHERE email = '".$email."'");
 				mysql_query($query2)or die('Could not update users: ' . mysql_error());
 				
 				$subject = "Your New Password";
 				
				$message = "Your new password is as follows:\n\n";
				$message .= "----------------------------\n";
				$message .= "Password: ".$emailpassword."\n";
				$message .= "----------------------------\n";
				$message .= "Please keep this password in a safe place\n\n";
				$message .= "This email was automatically generated.\n\n"; 
				$message .= "- GeoTRIPS Team";
				 
		         if(!mail($email, $subject, $message,  "FROM: transportsurvey@geog.ucsb.edu")){
		             die ("Sending Email Failed, Please Contact Site Admin! (transportsurvey@geog.ucsb.edu)");
		         } else {
		                header("location: login.php");
		         } 
				 
		    }
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>GeoTRIPS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="css/main.css" />
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

 <body>
 	<div id="wrapperHeader"></div>
 	<div id="wrapperProgress">
 		<table width="90%" align="right"><tr>
 			<td>&nbsp;</td>
 			
 		</tr></table>
 	</div>
 	<div id="wrapperContent">
 	
 	<font size="3">
 	<?php echo $error; ?><br/><br/>
 	Forgot your password?  No problem.  Please enter your email address below and we will generate a new password and email it to you.</font>
	<br/><br/>
	<form name="reset" id="reset" method="post" action="reset.php">
		Email Address: <input type="input" name="email" id="email" class="txt" />
	</form>
</p>
 		<div class="bigBtn" style="clear: both;width:300px;" onclick="resetpassw()">RESET PASSWORD ></div>
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