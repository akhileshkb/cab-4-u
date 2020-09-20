<?php 

		//START SESSION
		session_start();

		//precation
		if(!isset($_POST['submit_d'])){
			header('location:login.php');
		}

		//ALL REQUIRED INFO FOR CONNECTION WITH SQL
		require_once "login_info.php";


		//CONNECTION
		$conn = new mysqli($servername , $username , $password);
		if(!$conn){
			die("Connection cant be made with SQL !!");
		}

		// //MAKE DATABASE NAMED CAB
		// $sql = "create database $database";
		// if(!mysqli_query($conn , $sql)){
		// 	die("Cant create database !!");
		// }

		//USE DATABASE
		$sql = "USE $database";
		if(!mysqli_query($conn , $sql)){
			die("Error while using database !!");
		}

		// //MAKE TABLE FOR PASSENGER
		// $sql = "create table $driver_table( name varchar(120) , username varchar(120) , password varchar(120) , isBusy BOOL default 0, wallet INT(4) default 1000 , online BOOL default 0)" ;
		// if(!mysqli_query($conn , $sql)){
		// 	die("Error while creating passenger table  !!");
		// }

		// //MAKE TABLE FOR DRIVER
		// $sql = "create table $driver_table( username varchar(120) , password varchar(120) , isBusy BOOL , wallet INT(4) , online BOOL)";
		// if(!mysqli_query($conn , $sql)){
		// 	die("Error while creating driver table  !!");
		// }

		// echo "ALL things Worked successsfully !!";

		if(isset($_POST['submit_d'])){
			//username and password of user logging in
			$user = $_POST['username'];
			$pass = $_POST['password'];

			//write code for username and password to check if they are present in it .....
			//if present redirect them to their corresponding passenger / driver page (paritosh....)
			//Code goes here
			$sql = "select * from $driver_table where username ='$user' && password = '$pass'";
			$res = mysqli_query($conn , $sql);

			if(mysqli_num_rows($res) != 1){
				//if username / password are not correct , redirect to main page (login.php)
				echo "<h1>The username/password you have entered is incorrect </h1>";
				die("<h4> Please click here to <a href = 'login.php' > try agian </h4>");
			}
			else{
				//redirect to passenger dashboard page (not yet done)
				$_SESSION['username'] = $user;
				$sql = "update $driver_table SET online = 1 where username = '$user'";

				$res = mysqli_query($conn , $sql);
				if(!$res){
					echo "Error in online setting !!";
				}

				//function for current location of driver
				echo '<script>

						function getLocation() {
						if (navigator.geolocation) {
							navigator.geolocation.getCurrentPosition(showPosition);
						} 
							else { 
								document.write("Rupesh cant access !!");
							}
						}

						function showPosition(position) {

							window.location.href="geolocation.php?x= "+position.coords.latitude+"&y="+position.coords.longitude+"";
							// document.write(position.coords.latitude);
						}

				</script>';
				echo '<script>getLocation()</script>';
			}	
			

		}
		else{
			//IF NOT SET SUBMIT_d REDIRECT TO LOGIN PAGE
			header('location:login.php');
		}
		


 ?>