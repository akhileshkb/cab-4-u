<?php
	session_start();

	require_once "login_info.php";	

	//Connected to sql
	$conn = new mysqli($servername , $username , $password);
	// if(!$conn){
	// 	die( "Login Error !!");
	// }
	// else{
	// 	echo "ConnectiON secc	!!";
	// }

	//USE DATABASE
	$sql = "USE $database";
	$res =  mysqli_query($conn , $sql);
	// if(!$res){
	// 	die("cant use database !!");
	// }
	// else{
	// 	echo "used database !! <br>";
	// }

	
	$user = $_SESSION['username'];
	
	//UPDATE online status of driver !
	$sql = "update $driver_table set online = 0 ,x = NULL,y = NULL where username = '$user'";

	$res = mysqli_query($conn , $sql);
	// if(!$res){
	// 	die("Cant update !!");
	// }
	// else{
	// 	die("updated !!");
	// }



	
	//destroy session and redirect to login.php

	//change status of driver to offline

	session_destroy();
	header('location:login.php');

 ?>