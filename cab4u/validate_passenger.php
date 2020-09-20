<?php 

		//START SESSION
		session_start();

		//precaution
		if(!isset($_POST['submit_p'])){
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
		// $sql = "create table $passenger_table( name varchar(120) , username varchar(120) , password varchar(120) , isBusy BOOL default 0, wallet INT(4) default 1000 , online BOOL default 0)" ;
		// if(!mysqli_query($conn , $sql)){
		// 	die("Error while creating passenger table  !!");
		// }

		// //MAKE TABLE FOR DRIVER
		// $sql = "create table $driver_table( username varchar(120) , password varchar(120) , isBusy BOOL , wallet INT(4) , online BOOL)";
		// if(!mysqli_query($conn , $sql)){
		// 	die("Error while creating driver table  !!");
		// }

		// echo "ALL things Worked successsfully !!";

		if(isset($_POST['submit_p'])){
			//username and password of user logging in
			$user = $_POST['username'];
			$pass = $_POST['password'];

			//write code for username and password to check if they are present in it .....
			//if present redirect them to their corresponding passenger / driver page (paritosh....)
			//Code goes here
			$sql = "select * from $passenger_table where username ='$user' && password = '$pass'";
			$res = mysqli_query($conn , $sql);

			if(mysqli_num_rows($res) != 1){
				//if username / password are not correct , redirect to main page (login.php)
				echo "<h1>The username/password you have entered is incorrect </h1>";
				die("<h4> Please click here to <a href = 'login.php' > try agian </h4>");
			}
			else{
				//redirect to passenger dashboard page (not yet done)
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $pass;
				header('location:pari/passenger_mainpage.php');
			}	
			

		}
		else{
			//IF NOT SET submit_p REDIRECT TO LOGIN PAGE
			header('location:login.php');
		}
		


 ?>