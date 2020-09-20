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
	echo "<h1>Sign up as passenger</h1>";
	echo "<form action='passenger_signup_b.php' method='post'>";
	echo "Username: <input type='text' name='username' id='username' placeholder='Username'><br><br>";
	echo "Name: <input type='text' name='name' id='name' placeholder='Name'><br><br>";
	echo "Password: <input type='password' name='password' id='password' placeholder='password'><br><br><br>";
	//edited for credot card adding for passenger
	// echo "<h3>Add credit card info(required *)</h3>";
	// echo 'card no : <input type="text" name="cardno" placeholder="card number"><br><br>';
	// echo 'Expiry date : <input type="date" name="Exdate" placeholder="Expiry date"><br><br>';
	// echo 'CVV : <input type="text" name="cvv" placeholder="CVV"><br><br>';
	echo "<input type='submit' name='submit' value= 'sign up'></form>";
	echo "</center>";
?>