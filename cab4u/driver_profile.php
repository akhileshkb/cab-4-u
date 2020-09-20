<?php
	
	session_start();

	function Error($errno,$errstr){
		echo "<script type='text/javascript'>alert('ERROR : $errstr');</script>;";
		die();
	}
	set_error_handler("Error");

	// //take user name from the session and store it in $uname
	 $uname = $_SESSION['username'];
	// $uname = "paritosh";

	//take essiantial details of sql from db.php
	require_once './pari/database.php';

	//test connection
	$conn = mysqli_connect($db_hostname,$db_user,$db_password);
	if(!$conn){
		trigger_error("1".mysqli_connect_error());
	}



	//use database '$db_name' stored in db.php
	$query = "use ".$db_name;
	$result = mysqli_query($conn,$query);
	if(!$result){
		trigger_error("2".mysqli_connect_error());
	}

	//select the table "$ptable" from database "$db_name"
	$query = "select * from ".$dtable." where username  = '$uname'";

	$result = mysqli_query($conn,$query);
	if(!$result){
		trigger_error("3".mysqli_connect_error());
	}

	//check wether only a single entry of the $uname exits in $ptable
	$numrows = mysqli_num_rows($result);
	if($numrows!=1){
		trigger_error("multiple user names found");
	}
	$row = mysqli_fetch_row($result);
	//mysqli_close($conn);
	
	//main program begins
	// $redirect = 'driver_wallet.php';
	// <br>location : $row[3],$row[5]; //add in below echo 
	echo "<p>username : $row[1]
        <br>name : $row[0]
        <br> status: online";
	echo "<br>balance : $row[4]</p>";
	// echo "<br><br><br><button onclick='<script>setTimeout(location.href=$redirect,0);</script>'>Add money in wallet</button>";


?>