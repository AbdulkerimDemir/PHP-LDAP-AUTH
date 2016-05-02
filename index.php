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
	<body>
	<!-- AUTHENTICATION CONFIRMATION -->
	<?php
	include("functions/LDAP_Plugin.php");
	 
		if(authenticate($_COOKIE['Username'],$_COOKIE['Password']))
		{
		} else {
			header("Location: ./login.php");
		}
	?>
		<div class="IndexWrapper">
			<div class="IndexContent">
			<span>LDAP - Index</span>
				<div class="IndexBanner">
					<div class="BannerLeft">
						<ul class="Navigation">
						<li class="current_page_item"><a href="#" title="">Home</a></li>
						<li><a href="index.php" title="">Menu2</a></li>
						<li><a href="#" title="">Menu3</a></li>
						</ul>
					</div>
					<div class="BannerRight">
						<ul class="Navigation">
						<li><h4>Welcome <?php echo $_COOKIE['Username'] ?>!</h4></li>
						<li class="Logout"><a href="./?Logout=true" title="">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php 
		if(isset($_GET['Logout'])) {
			setcookie('Username', '', time()-3600, '/');
			setcookie('Password', '', time()-3600, '/');
			header("Refresh:0");
		}
		?>
		<div class="Footer">
		<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=abdulkerim_demir2%40hotmail%2ecom&lc=NL&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted"><i class="fa fa-cc-paypal" aria-hidden="true"></i></a><br/>
		<span>Created by: Abdulkerim Demir - Free to use and modify.</span> <!-- If you found this script useful feel free to donate to support the developer -->
		</div>
	</body>
</html>