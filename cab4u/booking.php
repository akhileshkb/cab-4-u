<?php   

    require_once "login_info.php";

    //session_start
    session_start();

    //passenger name from session
    $username_p = $_SESSION['username'];

    //distance function in PHP
    function distance($lat1, $lon1, $lat2, $lon2) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
          return ($miles * 1.609344);
        }
    }

    //calculate fare for driver;
    function calc_fare($x_initial , $y_initial , $x_final , $y_final){
        return (distance($x_initial , $y_initial , $x_final , $y_final)*100);
    }


    //connection with database in sql
    $conn = new mysqli($servername , $username  ,$password , $database);
    
    if(isset($_POST['submit'])){
        $initial = $_POST['pickup'];
        $final = $_POST['drop'];
        if($initial == $final){
            //yad rakhoo !!!
            echo "<script>
                alert('Please choose different destinations !!');
                window.location.href='./pari/passenger_mainpage.php';
            </script>";
        }
        if($final == -1 || $initial == -1){
            echo "<script>
              alert('Please choose a destinations !!');
              window.location.href='./pari/passenger_mainpage.php';
             </script>";
        }
       
        else{
             //check amount in passengers account

             //check location for passenger initial spot
             $sql = "select * from locations where location = $initial";
             $res = mysqli_query($conn , $sql);
 
             $row = mysqli_fetch_assoc($res);
             $x_initial = $row["x"];
             $y_initial = $row["y"];
 
             //get location for final destination
             $sql = "select * from locations where location = $final";
             $res = mysqli_query($conn , $sql);
 
             $row = mysqli_fetch_assoc($res);
             $x_final = $row["x"];
             $y_final = $row["y"];
 

            //GET DISTANCE between TWO
             $final_fare = calc_fare($x_initial , $y_initial , $x_final , $y_final);
             //get money in passsengers account
             $sql = "select * from passenger where username='$username_p'";
             $res = mysqli_query($conn , $sql);
             $row = mysqli_fetch_assoc($res);
             $passenger_balance = $row['wallet'];

             //check if passenger has enough money
             if($final_fare <= $passenger_balance){
                // echo $final_fare;
                // die();
                 $passenger_balance = $passenger_balance - $final_fare;
                 $_SESSION['final_fare'] = $final_fare;
                 $_SESSION['passenger_balance']= $passenger_balance;
                 // echo $_SESSION['final_fare'];echo "<br>";
                 // echo $_SESSION['passenger_balance'];
                 // die()
                 // $sql = "update passenger set wallet=$passenger_balance where username='$username_p'";
                 // mysqli_query($conn , $sql);
             }
             else{
                 echo '<script> alert("You Dont have enough Money for this Ride , Please recharge your account !!");
                     window.location.href="./pari/passenger_mainpage.php" ;</script>';
                     die();
             }






            // backend for driver selection;
            echo "SUCCESS !!<br>";

            //first get x , y for initial position
            $sql = "select * from locations where location = $initial";
            $res = mysqli_query($conn , $sql);

            $row = mysqli_fetch_assoc($res);
            $x_initial = $row["x"];
            $y_initial = $row["y"];

            // echo $x_initial."<br>";
            // echo $y_initial;die();

            //checkk
            // echo $x_initial;
            // echo "<br> $y_initial";
            
            
            $sql = "select * from $driver_table where online = 1 && isBusy = 0";
            $res = mysqli_query($conn , $sql);
            if(mysqli_num_rows($res) > 0){
                $flag=0;
                while($row = mysqli_fetch_assoc($res)) {
                    $xx = $row["x"];
                    $yy = $row["y"];
                    $dist = distance($xx , $yy , $x_initial , $y_initial );
                    if($dist <= 1){
                        $username_d = $row['username'];
                        $sql = "insert into notification(p_username , d_username , initial , final , fare)
                            values('$username_p', '$username_d' , $initial , $final , $final_fare)";
                             mysqli_query($conn , $sql);
                             $flag=1;
                    }


                }
                if($flag==0){
                    echo '<script> alert("Sorry for inconvineance !! No driver available !!");
                window.location.href = "./pari/passenger_mainpage.php";
                </script>';
                    die();
                }
                // header('location:./pari/noti_passenger.php');
                echo '<script> 
                      window.location.href="./pari/noti_passenger.php";
                   </script>';
            }
            else{
                echo '<script> alert("Sorry for inconvineance !! No driver available !!");
                window.location.href = "./pari/passenger_mainpage.php";
                </script>';
            }
        
        }
    }
    else{
        header('location:./pari/passenger_mainpage.php');
    }

?>