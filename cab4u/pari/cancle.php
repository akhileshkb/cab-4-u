<?php 
	
	session_start();

	require_once "../login_info.php";

    $conn   = new mysqli($servername , $username , $password , $database);

    $uname =  $_SESSION['username'];

    $sql = "delete from notification where p_username='$uname'";
    mysqli_query($conn , $sql);

    header('location:passenger_mainpage.php');

 ?>