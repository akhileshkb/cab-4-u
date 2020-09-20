<?php
    $page = $_SERVER['PHP_SELF'];
    $sec = "10";

    //start session
    session_start();

    require_once "login_info.php";

    $conn = new mysqli($servername , $username , $password , "publications");

    $uname = $_SESSION['username'];
    // $sql = "select * from notification where d_username ='$driver'";
    $sql =  "select * from notification where d_username ='$uname'";
    $res = mysqli_query($conn , $sql);
    if(!$res){
        echo "ERRORRR !";
    }

    echo "<h1>Notifications </h1>";
   if( mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)) {

            echo 'username : ' . $row['p_username'];
            echo "<br>";
                $i = $row['initial'];
                $sql = "select * from locations where location=$i";
                $res2 = mysqli_query($conn, $sql);
                $r1 = mysqli_fetch_assoc($res2);
                echo "initial position : ".$r1['place']."<br>";

                //get place from location
                $f = $row['final'];
                $sql = "select * from locations where location=$f";
                $res1 = mysqli_query($conn , $sql);
                $r1 = mysqli_fetch_assoc($res1);
                echo "final destination : ".$r1['place']."<br>";
                echo "fare : ".$row['fare']."<br>";
                echo '<hr><br>';

        }
   }
   else{
        echo "No notifications";
   }


?>

<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>

    <!-- use drop down menu -->
    <form action = "./pari/driver_accept.php" method=post>
        <input type="text" name = "victim" >
        <input type="submit" name ="submit" value="accept">
    </form>
    </body>
</html>