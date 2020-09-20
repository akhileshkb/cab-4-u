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

 echo '<img src='.$fin.' width="500" height="500">';
}


echo<<<end
<div class="row">
  <form id = "details" action="main.php" method="POST">
    <fieldset id="booking_area">
      <legend>BOOK A CAB</legend>
      <p><label>Pickup point</label><br>
      <select name="pickup" id="pickup">
        <option value="" selected disabled hidden >Choose here</option>
        <option value="1">Academic Block</option>
        <option value="2">Bhoopali</option>
        <option value="3">Roti Ghar</option>
        <option value="4">Jubli Circle</option>
        <option value="5">Railway Station</option>
        <option value="6">Dharwad New Bus Stand</option>
        <option value="7">Dharwad CBT</option>
        <option value="8">Hubbali Airport</option>
        <option value="9">Dominos</option>
        <option value="10">More Store</option>
      </select></p>
      <p><label>Destination</label><br>
      <select name="drop" id="drop">
        <option value="" selected disabled hidden >Choose here</option>
        <option value="1">Academic Block</option>
        <option value="2">Bhoopali</option>
        <option value="3">Roti Ghar</option>
        <option value="4">Jubli Circle</option>
        <option value="5">Railway Station</option>
        <option value="6">Dharwad New Bus Stand</option>
        <option value="7">Dharwad CBT</option>
        <option value="8">Hubbali Airport</option>
        <option value="9">Dominos</option>
        <option value="10">More Store</option>
      </select>
      </p>
      <p><center><br>
      <input id="submit" type="submit" name="submit" value="Book !"></p></center>
    </fieldset>
  </form>
  <img src="img.jpeg" id="image" alt="map">
</div>
end;

 ?>
