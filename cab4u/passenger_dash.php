<?php 

	session_start();
	if(!isset($_SESSION['username'])){
		session_destroy();
		header('location:login.php');	
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Passenger Dashboard</title>
</head>
<body>
	<?php 

		echo  '<h1> Welcome ' . $_SESSION['username'] . ' , </h1> ';

	 ?>
	 <br><br>
	<h3>This is passenger DashBoard</h3>
	<a href='logout.php' > Logout </a>
</body>
</html>