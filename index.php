

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
 		<?php if (isset($_GET['e'])) { echo "<span style='color:#ff0000;font-size:14px;'>".$_GET['e']."</span>"; } ?>
 		<form id="indexpage" method="post" action="2.php">
 		<h2>To begin please create a username and id</h2>
 		<table>
 		 <tr>
 		  <td>First Name</td>
 		  <td><input type="text" value="" id="firstname" name="firstname" class="txt" /></td>
 		 </tr>
		 <tr>
 		  <td>Last Name</td>
 		  <td><input type="text" value="" id="lastname" name="lastname" class="txt" /></td>
 		 </tr>
 		 <tr>
 		  <td>E-mail Address (username)</td>
 		  <td><input type="text" value="" id="email" name="email" class="txt" /></td>
 		 </tr>
 		 <tr>
 		  <td>Password</td>
 		  <td><input type="password" value="" id="password1" name="password1" class="txt" /></td>
 		 </tr>
 		 <tr>
 		  <td>Retype Password</td>
 		  <td><input type="password" value="" id="password2" name="password2" class="txt" /></td>
 		 </tr>
 		</table>
 		<p>Please enter your valid email address.  We will not use your email address for any other purposes than to contact you for password retrieval, follow up survey participation if you choose to and for information regarding payment for participation in this survey</p>
 		<div class="bigBtn" id="start" onclick="start()">START ></div>
 		</form>
 	</div>
 </body>
</html>
