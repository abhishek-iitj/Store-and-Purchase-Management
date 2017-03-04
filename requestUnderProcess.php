<?php
session_start();
include("constant.php");
include_once("user.php");
$connect=mysqli_connect(SERVER,USER,PASS,DB) or die("Error connectin mysql");
if($_SESSION['login']==false){
	header("location:index.php");
}
?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
			<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script> 
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	    <script type="text/javascript" src="js/materialize.min.js"></script>	
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
	</head>

	<body>
		<div class="row" style="background:#2B8C67;">
			<p align="center" style="font-size:25px;padding-top:5px;color:white;">Pending Purchase Requests</p>
		</div>
		<div class="row">
		<div class="col l4 s12" >
		</div>
		<div class="col l6 s12" >
		</div>
		<div class="col l2 s12" >
		<a href="home.php" style="color:#2B8C67;"> <i class="medium material-icons">home</i></a>
		</div>
		<div class="container">
			 <table class="striped">
		        <thead>
		          <tr>
		              	<th>Sl. No.</th>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Total Price</th>
		          </tr>
		        </thead>

		        <tbody>
		         <?php
		         	$id=$_SESSION['username'];
		         	$qry="SELECT * FROM store_incoming_requests WHERE userid='$id' AND processed='0'";
		         	$res=mysqli_query($connect, $qry) or die("Error in firing query inside table");
		         	$i=1;
					while($arr=mysqli_fetch_array($res)){
						echo"<tr><td>$i</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>";
						$i++;
					}

		         ?>
		        </tbody>
      		</table>
		</div>

	</body>
</html>