<?php
    require_once 'my.php';

    $conn = new mysqli($db_hostname, $db_user, $db_password, $db_database);
    if(!$conn){
        echo "Connection error !!";
    }

    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    // $card_number = $_POST['cardno'];
    // $date = $_POST['Exdate'];
    // $cvv = $_POST['cvv'];
    // strrev($date);


    if($username==NULL ||  $name==NULL ||  $password==NULL){
        echo '<script>alert("Dont leave any blank space !!")</script>';
        include 'passenger_signup.php';
        die();
    }

    // $query = "USE $db_database";
    // $result = $conn->query($query);
    // if (!$result) die ("Database access failed");

    $query = "SELECT * FROM $db_passenger WHERE username='$username'";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed");

    $rows = $result->num_rows;
    if($rows==0)
    {

        //add into passenger table
    	$query = "INSERT INTO $db_passenger (username,name,password) VALUES('$username','$name','$password')";
        $result = $conn->query($query);

        /////////////////////////////////////////////////////////////////////////
        //add credit info into credit table for that username
        // $sql = "insert into credit values('$card_number' , '$date' , $cvv , '$username')";
        // $result = $conn->query($sql);
        /////////////////////////////////////////////////////////////////////////

    // for main web page redirection 
        echo '<script>alert("You are registered successfully as passenger !!")</script>';
        echo "<a href = '../login.php'> LogIn </a>";
    }
	if ($rows>0) 
	{
		// echo "hi it is working2";
        echo '<script>alert("username is already in used. Please try to use another one")</script>';
        include 'passenger_signup.php';
		//header("Location:/var/www/html/lab project");
	}

?>