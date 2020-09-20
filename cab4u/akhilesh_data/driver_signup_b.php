<?php
    require_once 'my.php';
    
    $conn = new mysqli($db_hostname, $db_user, $db_password, $db_database);
    if($conn->connect_error)
        die ("fatal Error");
        

    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    if($username==NULL ||  $name==NULL ||  $password==NULL){
        echo '<script>alert("Dont leave any blank space !!")</script>';
        include 'driver_signup.php';
        die();
    }


    $query = "SELECT * FROM $db_driver WHERE username='$username'";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed");
    $rows = $result->num_rows;
    if($rows==0)
    {
    	$query = "INSERT INTO $db_driver (name,username,password) VALUES('$name','$username','$password')";
        $result = $conn->query($query);
        // echo "hi it is working";
    // for main web page redirection 
         
        //  header('location:../login.php');
         echo '<script>alert("You are registered successfully as driver !!")</script>';
         echo "<a href = '../login.php'> LogIn </a>";
    }
	if ($rows>0) 
	{
		// echo "hi it is working2";
        echo '<script>alert("username is already in used. Please try to use another one")</script>';
        include 'driver_signup.php';
		//header("Location:/var/www/html/lab project");
	}

?>