<?php 

	$page = $_SERVER['PHP_SELF'];
	$sec = "10";

	session_start();
	if(!isset($_SESSION['username'])){
		session_destroy();
		header('location:login.php');	
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="driver_dash.css" media="screen">
</head>
<body>
	<header>
        <?php
            //Uncomment when connected to auth.php for admin 
			$user = $_SESSION['username'];
			echo "<h1>Welcome on Board , $user !<h1>";
		 ?>
		<div class="sline"></div>
    	<div class="sline"></div>
	</header>
	<nav>
			<form action="driver_redirect.php" method="POST">
				<ul>
					<li><input class="button" type="submit" name="MyProfile"  value="MyProfile"></li>
					<li><input class="button" type="submit" name="MyWallet"  value="MyWallet"></li>
					<li><input class="button" type="submit" name="History"  value="History"></li>
					<li><input class="button" type="submit" name="logout" value="Log Out"></li>
				</ul>
			</form>
	</nav>
	
	<section class="outer-section">
		<aside class="left-pane">
			<br>
			<!-- notificatioins block -->


		</aside>
		<section class="middle-pane">
			<br><br><br><br></br>
			<center>
				<div style="float: center ; width: 300px ; height: 300px ; margin-left: 25px">
						<button class="button" name="notifications" onclick = window.location.href="notification.php">Notifications</button>
				</div>
			</center>
			<!-- <form action="redirect.php" method="POST">
					<input class="button" type="submit" name="host"   value="Host a Contest">
			</form> -->
		</section>

		

	</section>
	<footer>
		<p>Logged in as <b><i>Driver</i></b></p>
	</footer>
</body>
</html>