<?php 
	
	//start session
	session_start();

	//for refreshing the  page
	$page = $_SERVER['PHP_SELF'];
	$sec = "10";



	//driver and pasenger name
	$drivername = $_SESSION['username'];
    $passengername = $_SESSION['victim'];

	//get sql info
	require_once "login_info.php";

	$conn = mysqli_connect($servername,$username,$password,$database);

	$sql = "select * from history where d_username = '$drivername' && p_username = '$passengername'";
	$res = mysqli_query($conn , $sql);
	$row = mysqli_fetch_assoc($res);
	if($row['status'] == -1){
		echo "<h2>Wait till Passenger Confirms his Ride ........!!</h2>";
	}
	else{
			//take passenger balance from pasenger table
	    $sql = "select * from passenger where username = '$passengername'";
	    $res = mysqli_query($conn , $sql);
	    $row = mysqli_fetch_assoc($res);
	    $passenger_balance = $row['wallet'];

	    //take fare from history
	    $sql = "select * from history where p_username='$passengername' && d_username='$drivername'";
	    $res = mysqli_query($conn , $sql);
	    $row = mysqli_fetch_assoc($res);
	    $final_fare = $row['fare'];

	    $passenger_balance = $passenger_balance - $final_fare;
	    //update passenger wallet
	    $sql = "update passenger set wallet=$passenger_balance where username='$passengername'";
	    mysqli_query($conn , $sql); 

	    // add in drivers acount
	    $sql = "select * from driver where username='$drivername'";
	    $res = mysqli_query($conn , $sql);
	    $row = mysqli_fetch_assoc($res);
	    $driver_balance = $row['wallet'];
	    $driver_balance = $driver_balance + $final_fare;
	    $sql = "update driver set wallet=$driver_balance where username='$drivername'";
	    mysqli_query($conn , $sql); 

	    //turn driver off
	    $sql = "update driver set isBusy = 0 where username = '$drivername'";   
	    $res =  mysqli_query($conn , $sql);
	    echo '<script>
	    		alert("Money is transfered to your account !!");
	    		window.location.href="driver_dash.php";
	    	</script>';
	    // header('location:driver_dash.php');
	}



 ?>


 <html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    <?php
        // echo "Watch the page reload itself in 10 second!";
    ?>
    </body>
</html>