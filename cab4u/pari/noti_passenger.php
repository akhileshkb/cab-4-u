
<?php


    //start session
    session_start();


    $page = $_SERVER['PHP_SELF'];
    $sec = "10";


    require_once "../login_info.php";

    $conn   = new mysqli($servername , $username , $password , $database);
    
    $uname =  $_SESSION['username'];

    // $sql = "select * from history where p_username = '$uname' && status = 0";
    // $res = mysqli_query($conn , $sql);

    echo "<h1>History and Notifications</h1><hr>";

   $sql = "select * from notification where p_username = '$uname'";
   $res = mysqli_query($conn , $sql);
   if(mysqli_num_rows($res)>0){
         echo "<h2>Waiting for a driver to accept your ride .....   </h2>";
         echo '<script>
                function cancel(){
                    window.locatoin.href="cancel.php";
                }</script>';
            echo '<a href="cancle.php">cancel the Ride</a>';
   }
   else{
        //check for passenger confirmation
        $sql = "select * from history where p_username='$uname' && status = -1";
        $res = mysqli_query($conn , $sql);
        if(mysqli_num_rows($res) > 0){
            echo "<h2>Please Confirm that You are arrived at your destination !!
                and grant permissoin for transaction !! ;
            </h2>";
            echo '<script>function redirect(){
                alert("Transaction Successfull !");
                    window.location.href="confirm_money.php";
                }</script>';
            echo '<button onclick="redirect()">Confirm</button>';
        }



        $sql = "select * from history where p_username = '$uname' && status=0";
        $res = mysqli_query($conn , $sql);
        if(mysqli_num_rows($res) > 0){
            echo "<h2>Ongoing Rides : </h2>";
            while($row = mysqli_fetch_assoc($res)){
                echo "Driver alloted : ".$row['d_username']."<br>";
                //get place from location
                $i = $row['initial'];
                $sql = "select * from locations where location=$i";
                $res = mysqli_query($conn, $sql);
                $r1 = mysqli_fetch_assoc($res);
                echo "initial position : ".$r1['place']."<br>";

                //get place from location
                $f = $row['final'];
                $sql = "select * from locations where location=$f";
                $res = mysqli_query($conn , $sql);
                $r1 = mysqli_fetch_assoc($res);
                echo "final destination : ".$r1['place']."<br>";
                echo "fare : ".$row['fare']."<br>";
                                                                                                                    
            }
        } 
        $sql = "select * from history where p_username = '$uname' && status=1";
        $res = mysqli_query($conn , $sql);
        if(mysqli_num_rows($res) > 0){
            echo "<h2><br>completed Rides : </h2>";
            while($row = mysqli_fetch_assoc($res)){
                echo "Driver alloted : ".$row['d_username']."<br>";
                //get place from location
                $i = $row['initial'];
                $sql = "select * from locations where location=$i";
                $res1 = mysqli_query($conn, $sql);
                $r1 = mysqli_fetch_assoc($res1);
                echo "initial position : ".$r1['place']."<br>";

                //get place from location
                $f = $row['final'];
                $sql = "select * from locations where location=$f";
                $res2 = mysqli_query($conn , $sql);
                $r1 = mysqli_fetch_assoc($res2);
                echo "final destination : ".$r1['place']."<br>";
                echo "fare : ".$row['fare']."<br>";
                echo "<hr><br>";
            }

        } 
   }
    // if(mysqli_num_rows($res) > 0){
    //     while($row = mysqli_fetch_assoc($res)){
    //         echo "Driver alloted : ".$row['d_username']."<br>";
    //         echo "initial destination : ".$row['initial']."<br>";
    //         echo "final destination : ".$row['final']."<br>";
    //         echo "fare : ".$row['fare']."<br>";
    //     }
    // }   


    //completed rides
    // $sql = "select * from history where p_username = '$uname' && status = 1";
    // $res = mysqli_query($conn , $sql);

    // echo "<h2>completed  rides  : </h2>";
    // if(mysqli_num_rows($res) > 0){
    //     while($row = mysqli_fetch_assoc($res)){
    //         echo "Driver alloted : ".$row['d_username']."<br>";
    //         echo "initial destination : ".$row['initial']."<br>";
    //         echo "final destination : ".$row['final']."<br>";
    //         echo "fare : ".$row['fare']."<br>";
    //     }
    // }   
        

?>

<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    <?php
        // echo "Watch the page reload itself in 10 second!";
    ?>
    </body>
</html>