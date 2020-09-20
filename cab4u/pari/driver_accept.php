<?php
	session_start();
//take the driver name as this page is redirected from driver mainpage session of driver is still active
$driname = $_SESSION['username'];
// $driname = "d1";

//take passsenger name posted from the form of nootification area in driver html
$passname = $_POST['victim'];
// $passname = "p1";
$_SESSION['victim'] =$passname;
//$fare = $_POST['$fare'];  //do if possible



//as driver has accepted the request of passenger passenger should be deleted from database
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
	else{
		echo "$passname !!";
	}

	//check if driver has entered the corrrect info for passenger
	$sql = "select * from notification where p_username	= '$passname'";
	$res = mysqli_query($conn , $sql);
	if(mysqli_num_rows($res) == 0){
		echo '<script> alert("the username of passenger you have entered is not availabe for you !")
		window.location.href="../notification.php";
		</script>';
		die();
	}
	//make the driver busy
	$query = "update ".$dtable." set isBusy = 1 where username = '$driname'";
	$result = mysqli_query($conn,$query);

	//take fare from the notification table
	$query = "select * from ".$ntable." where p_username = '$passname' and d_username = '$driname'";
	$result = mysqli_query($conn,$query);
	
	$row = mysqli_fetch_row($result);
	$fare = ($row[4]);
	$initial = $row[2];
	$final =  $row[3];

	//delete all entries of the passenger "$passname" the table "$table" from database "$db_name"
	$query = "delete from ".$ntable." where p_username = '$passname'";
	$result = mysqli_query($conn,$query);

	//delete all entries of the driver"
	$query = "delete from ".$ntable." where ".$dname." = '$driname'";
	$result = mysqli_query($conn,$query);

	//enter the new driver-passenger pair ($dname & $pname) in the history table with status as "null"
	$query = "insert into ".$htable." values ('$passname','$driname', $initial ,$final  ,0, $fare)";
	$result = mysqli_query($conn,$query);
	if(!$result){
		echo "why!";
	}
	echo "booked for $passname";	
	
	echo '<br><a href="finish.php"> Finish </a>';
?>