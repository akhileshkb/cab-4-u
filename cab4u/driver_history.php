<?php 

	session_start();

	require_once "login_info.php";

	//username 
	$uname = $_SESSION['username'];

	$conn = new mysqli($servername , $username , $password , $database);

	$sql = "select * from history where d_username='$uname'";
	$res = mysqli_query($conn , $sql);

	echo "<center><h1> MY HISTORY </h1><hr>";

	//chech for rows
	if(mysqli_num_rows($res) > 0){
		while($row = mysqli_fetch_assoc($res)){
			echo '<ul>';
			echo "<li>passenger : ".$row['p_username']."</li><br>";
			$sql = "select * from locations where location=".$row['initial'];
			$res1 = mysqli_query($conn , $sql);
			$r1 = mysqli_fetch_assoc($res1);
			echo "<li>From : ".$r1['place']."</li><br>";
			$sql = "select * from locations where location=".$row['final'];
			$res2 = mysqli_query($conn , $sql);
			$r1 = mysqli_fetch_assoc($res2);
			echo "<li>To : ".$r1['place']."</li><br>";
			echo "<li>fare : ".$row['fare']."</li><br>";
			echo "<hr><hr>";
			echo "</ul>";
		}
	}
	echo "</center>"




 ?>