<?php 
	
	//session_start
	session_start();

	//passenger det5ails
	$uname =  $_SESSION['username'];

	require_once "../login_info.php";

	//connection
	$conn   = new mysqli($servername , $username , $password , $database);

	$sql = "update history set status=1 where p_username='$uname'";
	$res = mysqli_query($conn , $sql);

	header('location:passenger_mainpage.php');


 ?>