<?php
	//$uname = $_SESSION['username'];
	session_start();
	$uname = $_SESSION['username'];
	echo "<h1>Welcome, $uname</h1>";
?>
<doctype!=html>
<head>
	<script>
		function logout(){
			if(window.confirm("Do you want to logout?")){
				// redirect to login page
				setTimeout(location.href="../logout.php",0);
			}
		}
		function profile(){
			setTimeout(location.href="./passenger_profile.php",0);
		}
		function history(){
			setTimeout(location.href="./noti_passenger.php",0);
		}
		function wallet(){
			setTimeout(location.href="./passenger_wallet.php",0);
		}

		//reload function
		// function reload() {
		// 		var x = document.getElementById("pickup");
		// 		var y = document.getElementById("drop");
		// 		document.write("img src="+this.link+">");
				
		// }

		function change(){
				var image = document.getElementById("map");
				var _x = document.getElementById("pickup");
				var _y = document.getElementById("drop");
				var x =_x.options[_x.selectedIndex].value;
				var y = _y.options[_y.selectedIndex].value;
				var xn = parseInt(x);
				var yn = parseInt(y);
				if(xn==-1 || yn==-1){
					return;
				}
				if(xn==yn){
					alert("Pickup and destination should be different!");
					document.getElementById("drop").selectedIndex = 0;
					return;
				}
				//alert((typeof(xn)));
				// document.write( "../maps/"+x+"to"+y+".jpg");
				if(xn>yn){
					var temp = x;
					x=y;
					y=temp;
				}
				image.src = "../maps/"+x+"to"+y+".jpg";
				// document.write(x , "  " , y);
		}
	</script>
	<link rel="stylesheet" href = "passenger_mainpage.css">
	<title>
		cab4u
	</title>
</head>
<body>
	<br><br><br><br>
	<hr><center><div class="btn-group" style="width:80%">
		<button id="profile" onclick="profile()">My Profile</button>
		<button id="history" onclick="history()">History</button>
		<button id="wallet" onclick = "wallet()">My_Wallet</button>
		<button id="logout" onclick = "logout()">Log_out</button>
	</div></center><hr>
	<br><br>
	<p>
	<div class="row">
		<form id = "details" action="../booking.php" method="POST">
			<fieldset id="booking_area">
				<legend>BOOK A CAB</legend>
				<p><label>Pickup point</label><br>
				<select name="pickup" id="pickup"  onchange="change();">	
					<option value="-1"  >Choose here</option>
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
				<select name="drop" id="drop" onchange="change();">	
					<option value="-1"  >Choose here</option>
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
				<input id="submit" type="submit" name="submit" value="Book !">
				<!-- <input type="button" name="change" value="show map" onclick="change();"> -->
				<!-- <button id="change map" onclick = "change();return false;">show map</button> -->
				</center></p>
			</fieldset>
		</form>
			<img style="float:right" src="img.jpeg" id="map" alt="map" height="60%" width="30%">
	</div></p>
</body>
</html>