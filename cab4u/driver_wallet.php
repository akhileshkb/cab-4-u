<?php

    session_start();
    $uname = $_SESSION['username'];
    require_once "login_info.php";

    $conn = new mysqli($servername , $username , $password , $database);
    if(!$conn){
    	echo "error at driver wallet !!";
    	die();
    }

    $sql = "select * from driver where username = '$uname'";
    $res = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($res);

    echo "<center><h1>My Wallet</h1>";
    echo "<h2><hr><br><br>Balance : ".$row['wallet']."</h2> </center> ";

?>