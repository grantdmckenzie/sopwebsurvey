

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
 <head>
  <title>GeoTRIPS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  
  <link rel="stylesheet" href="css/main.css" />
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  

 <body>
 	<div id="wrapperHeader"></div>
 	<!-- <div id="wrapperProgress"></div> -->
 	<div id="wrapperContent" style="text-align:center">
 		<?php if (isset($_GET['e'])) { echo "<span style='color:#ff0000;font-size:14px;'>".$_GET['e']."</span>"; } ?>
 		<table><tr>
 		<td valign="top" style='padding:10px;'>
 			<h1>Register</h1>
	 		<form id="indexpage" method="post" action="2.php">
	 		<p>To begin please create a username and id</p>
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
	 		 <tr>
	 		  <td colspan="2" style="font-size:0.7em">
	 		  	<?php
	 		  	$date = date("Ymd");
				$rand = rand(0,9999999999999);
				$height = "80";
				$width  = "240";
				$img    = "$date$rand-$height-$width.jpgx";
				echo "<input type='hidden' name='img' value='$img'>";
				echo "<img src='http://www.opencaptcha.com/img/$img' height='$height' alt='captcha' width='$width' border='0'/><br />";
	 		  	
	 		  	?><br/>
	 		  	As a security check, please type the<br/>text you see in the image above:
	 		  	<br/>
	 		  	<input type="text" class="txt" name="code" style="width:100px"/>
	 		  </td>
	 		 </tr>
	 		</table>
	 		<p style='font-size:0.8em'>Please enter your valid email address.  We will not use your email address for any other purposes than to contact you for password retrieval, follow up survey participation if you choose to and for information regarding payment for participation in this survey</p>
	 		<div class="bigBtn" id="start" onclick="start()">START ></div>
	 		</form>
 		</td>
 		<td valign="top" style='border-left:solid 1px #666666;padding:10px;'>
 			<h1>Login</h1>
 		 	<form id="login1" name="login1" method="post" action="login.php">
 		 	<p>Log in with your existing email address and password. <br></br><i><font size="3">(Please only use this if you are returning to the survey)</font></i></p>
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
 		</td>
 		</tr></table>
 	</div>
 </body>
</html>
