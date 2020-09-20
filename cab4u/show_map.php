<?php
if(isset($_POST["submit"]))
{
 $x=$_POST["pickup"];
 $y=$_POST["drop"];
 if($x<$y)
 $fin=$x."to".$y.".jpg";
 else {
   $fin=$y."to".$x.".jpg";
}

 echo '<img src=./maps/'.$fin.' width="500" height="500">';
}