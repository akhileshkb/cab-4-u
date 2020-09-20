<?php
	session_start();
	require_once 'my.php';
	$conn = new mysqli($db_hostname, $db_user, $db_password, $db_database);
	if($conn->connect_error)
    	die ("fatal Error");
    // $cardno = $_POST['cardno'];
	$passwordcheck = $_POST['password2'];
	$uname = $_SESSION['username'];
	// echo $passwordcheck;

    if($_SESSION['password']==$passwordcheck)
    {
    	$query = "select * from ".$db_passenger." where username = '$uname'";

		$result = mysqli_query($conn,$query);
		if(!$result){
			trigger_error("3".mysqli_connect_error());
		}
		//$numrows = mysqli_num_rows($result);
		$row = mysqli_fetch_row($result);
		$Amount_add = $_POST['Amount_add'];
		$total_amount = $row[3]+$Amount_add;
		$query = "update $db_passenger set wallet= $total_amount where username='$uname'";
		$res = mysqli_query($conn , $query);
		if(!$res){
			echo "Failure in transaction !!";
			die();
		}
		include '../pari/passenger_wallet.php';
		echo "<h2>Money successfully added to your account !!</h2>"; 
    }
    else
    {
    	echo '<script>alert("invalid password please verify it once again")</script>';
    	include '../pari/passenger_wallet.php';
    }
?>