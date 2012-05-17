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
			
			$query1 = "INSERT INTO users VALUES('','".$firstname."','".$lastname."','".$email."','".$password."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','','2')";
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
 		<p><b>PURPOSE: </b><br>
You are being asked to participate in a research study. The purpose of the study is to understand how decisions related to everyday travel behavior are made. 
</p><p>
<b>PROCEDURES: </b><br>
If you decide to participate, we will ask you to complete a survey asking questions about your attitudes about the Santa Barbara area, types of daily and weekly activities you conduct, your social life (friends, family, work, etc), and basic information about you as an individual (gender, household composition, etc.). The survey will take around 30 minutes to complete, and will involve responses from approximately 1,000 individuals. 
</p><p>
<b>RISKS: </b><br>
If at any time you are inconvenienced by the length of the survey, you may save and return later, or elect not to finish the survey. 
<br>
The answers you provide to the questions will be transmitted using a secure internet connection (https) and will be carefully stored and protected by UCSB researchers.
</p><p>
<b>BENEFITS: </b><br>
As a result of your participation, you will help us gain a better understanding of the way in which residents of Santa Barbara view their city, as well as how residents conduct their daily lives and utilize transportation. There is no direct benefit to you as an individual anticipated from your participation in this study.
</p><p>
<b>CONFIDENTIALITY: </b><br>
Data collected from this study will only be presented in aggregate form (no individual will be identifiable). Data will be kept and maintained by researchers at UCSB for the sole purpose of research. Absolute confidentiality cannot be guaranteed, since research documents are not protected from subpoena.
</p><p>
<b>COSTS/PAYMENT: </b><br>
For your participation, you will receive $10.00 per person, up to $40.00 per household. 
</p><p>
<b>RIGHT TO REFUSE OR WITHDRAW: </b><br>
You may refuse to participate and still receive any benefits you would receive if you were not in the study. You may change your mind about being in the study and quit after the study has started. 
</p><p>
<b>QUESTIONS: </b><br>
If you have any questions about this research project or if you think you may have been injured as a result of your participation, please contact:
</p><p>
Dr. Konstadinos Goulias (goulias@geog.ucsb.edu) or Kate Deutsch (deutsch@geog.ucsb.edu) by email, or by phone (805)893-3867.
</p><p>
If you have any questions regarding your rights and participation as a research subject, please contact the Human Subjects Committee at (805) 893-3807 or hsc@research.ucsb.edu. Or write to the University of California, Human Subjects Committee, Office of Research, Santa Barbara, CA 93106-2050</p>
<p>

	<form name="iagree" id="iagree" method="post" action="3.php">
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