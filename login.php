<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title>LDAP Authenticator - Abdulkerim Demir</title>
		<link rel="stylesheet" href="css/style.css">
		<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
		<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">	
	</head>
	<body style="padding: 10% 30% 10% 30%;">
		<div class="LoginWrapper">
			<div class="LoginContent">
			<span>LDAP - Authentication</span>
			<form action="login.php" method="post">
				<input class="inputs" type="text" name="userLogin" placeholder="Username"/><br/>
				<input class="inputs" type="password" name="userPassword" placeholder="Password"/><br/>
				<input type="submit" class="send" name="submit" value="Submit" />
			</form>
			</div>
		</div>
		<div class="Footer">
		<span>Created by: Abdulkerim Demir - Free to use and modify.</span><br/> <!-- If you found this script useful feel free to donate to support the developer -->
		<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=abdulkerim_demir2%40hotmail%2ecom&lc=NL&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted"><i class="fa fa-cc-paypal" aria-hidden="true"></i></a>
		</div>
	
	<!-- SHAKE EFFECT  -->
	<script type = "text/javascript" language = "javascript">
            function Shake(){
               $(".LoginWrapper").effect( "shake", {times:4}, 600 );
            };		
    </script>
	<!-- AUTHENTICATION CONFIRMATION -->
	<?php
	include("functions/LDAP_Plugin.php");
	 
	if(isset($_POST['userLogin'])){
		setcookie('Username', $_POST['userLogin'], time() + (900 * 30), "/",'',$_SERVER["HTTPS"]); // 900 = 15 minuten
		$_COOKIE['Username'] = $_POST['userLogin'];
		setcookie('Password', $_POST['userPassword'], time() + (900 * 30), "/",'',$_SERVER["HTTPS"]); // 900 = 15 minuten
		$_COOKIE['Password'] = $_POST['userPassword'];
		
		if(authenticate($_COOKIE['Username'],$_COOKIE['Password']))
		{
			header("Location: ./index.php");
			die();
		} else {
			echo '<script type="text/javascript">', 'Shake();', '</script>';
		}
	}
	?>
	</body>
</html>