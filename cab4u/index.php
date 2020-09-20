<!DOCTYPE html>
<html>
    <head>
        <title>
            Login page
        </title>
        <link rel="stylesheet" href="login.css" media="screen">
        
    </head>
    <body>
        <header>
            <center><h1>c a b 4 u</h1></center>
            <div class="sign_form">
                    <h4>Don't have account yet ?</h4>
                    <h5>Create an Account here</h5>
                    <form action="#">
                        <input type="button" name="signin" value="Sign In as passeger" onclick=window.location.href='akhilesh_data/passenger_signup.php'>
                        <input type="button" name="signin" value="Sign In as driver" onclick=window.location.href='akhilesh_data/driver_signup.php'>
                    </form>
            </div>
        </header>
        <hr>
        <center>
           <div class="form1">
            <br>
               <div style="border : 1px solid black ; width:500px ; height: 200px ; border-radius: 25px">
                   <h3>Log in Form for passenger</h3>
                    <form action="validate_passenger.php" method="post">
                            <input id="text" type="text" name = "username" placeholder="Username"><br><br>
                            <input id="text" type="password" name="password" placeholder="Password"><br><br>
                            <input id="button" type="submit" name="submit_p" value="Log In">
                    </form>
               </div>
                <br><br>
                 <div style="border : 1px solid black ; width:500px ; height: 200px ; border-radius: 25px">
                     <h3>Log in Form for driver</h3>
                    <form action="validate_driver.php" method="post">
                            <input id="text" type="text" name = "username" placeholder="Username"><br><br>
                            <input id="text" type="password" name="password" placeholder="Password"><br><br>
                            <input id="button" type="submit" name="submit_d" value="Log In">
                    </form>
                 </div>
           </div>
        </center>
    </body>
</html>