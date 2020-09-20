<!-- <html>
<head>
	<title>sign up page</title>
</head>
<body>
	<form action="signup_b.php" method="post" enctype="multipart/form-data">
	username<input type="text" name="username"><br><br>
	Name <input type="text" name="name"><br><br>
	password<input type="password" name="password"><br><br>
	
	<input type="submit" value="check for username" name="">
</body> -->
<?php
	echo "<center>";
	echo "<h1> Sign up as DRIVER !! </h1>";
	echo "<form action='driver_signup_b.php' method='post'>";
	echo "Username: <input type='text' name='username' id='username'><br><br>";
	echo "Name: <input type='text' name='name' id='name'><br><br>";
	echo "Password: <input type='password' name='password' id='password'><br><br><br>";
	echo "<input type='submit' name='submit' value= 'sign up'></form>";
	echo "</center>";
?>