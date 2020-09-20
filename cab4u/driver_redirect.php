<?php
    //THIS PAGE IS MEANT FOR PAGE REDIRECTION
    session_start();
    
    if(isset($_POST['MyProfile'])){
        header('location:driver_profile.php');
    }
    if(isset($_POST['MyWallet'])){
        header('location:driver_wallet.php');
    }
    if(isset($_POST['History'])){
        header('location:driver_history.php');
    }
    if(isset($_POST['logout'])){
        header('location:logout.php');
    }
?>