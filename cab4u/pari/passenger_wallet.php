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
	$query = "select * from ".$ptable." where username = '$uname'";

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
	echo "<br>Your account has amount : $row[3]</p>";
?>

<!doctype html>
	<form method = POST action='../akhilesh_data/add_money.php'>
	<fieldset id="money_area">
		<legend>Add money</legend>
		<p><label>Amount</label><br>
		<input type="text" placeholder="amount" id="amount" name="Amount_add"></input></p>
		<p><label>Card</label><br>
		<input type="text" placeholder="cardno" id="card"></input></p>
		<p><label>Expiry Date</label><br>
		<input type="text" placeholder="MM" id="month"></input>
		/<input type="text" placeholder="YY" id="year"></input>
		</p>
		<p><label>CVV</label><br>
		<input type="text" placeholder="CVV" id="card"></input></p>
		<p><label>Password of cab4u account</label><br>
		<input type="password" placeholder="password" name ="password2" id="card"></input></p>
		<p><center>
		<input id="submit" type="submit"></p></center>
	</fieldset>
	</form>
	
</html>
