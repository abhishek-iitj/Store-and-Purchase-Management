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
	</head>

	<body>
		<div class="row" style="background:#2B8C67;">
			<p align="center" style="font-size:25px;padding-top:5px;color:white;">Store Page</p>
		</div>
		<div class="row">
			<p align="center" style="font-size:15px;color:#2B8C67;">Requests Under Process</p>
		</div>
		<div class="container">
			 <table class="striped">
		        <thead>
		          <tr>
		              	<th>Sl. No.</th>
						<th>Buyer ID</th>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Total Price</th>
		          </tr>
		        </thead>

		        <tbody>
		         <?php
		         	$id=$_SESSION['username'];
		         	$qry="SELECT * FROM store_incoming_requests WHERE userid='$id'";
		         	$res=mysqli_query($connect, $qry) or die("Error in firing query inside table");
					while($arr=mysqli_fetch_array($res)){
						echo"<tr><td>$arr[0]</td><td>$arr[4]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>";
					}

		         ?>
		        </tbody>
      		</table>
		</div>

	</body>
</html>