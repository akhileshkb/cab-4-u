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
	require_once 'database.php';

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
	$query = "select * from ".$ptable." where username  = '$uname'";

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
	// <br>location : $row[3],$row[5]; //add in below echo 
	echo "<p>username : $row[1]
		<br>name : $row[0]
		
		<br>amount : $row[3]</p>";
	echo '<script>
	function redirect(){
		window.location.href="passenger_wallet.php";
	}
	</script>';
	echo '<br><br><br><button onclick="redirect()">add money in account</button>';


?>