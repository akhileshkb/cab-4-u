<?php

    session_start();

    require_once "login_info.php";

    $conn = new mysqli($servername , $username , $password , $database);
    if(!$conn){
        echo "ERROR in connection ";
        die();
    }
    $x = $_GET['x'];
    $y = $_GET['y'];    
    if($x == -1 && $y == -1){
        echo "No location perission !!";
        die();
    }
    $uname =  $_SESSION['username'];
    $sql = "update $driver_table set x = $x , y = $y where username = '$uname'";
    $res = mysqli_query($conn , $sql);

    if(!$res){
        echo "ERROR !!";
        die();
    }
    else{
        echo "SUCCES !";
    }

    header('location:driver_dash.php');

?>