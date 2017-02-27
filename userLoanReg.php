<?php
session_start();
include ("constant.php");
$connect=mysqli_connect(SERVER, USER, PASS, DB) or die("error in myql_connect");


?>
<html>
	<head>
		<!-- Compiled and minified CSS -->
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
			<p align="center" style="font-size:15px;padding-top:5px;color:#2B8C67;">Your Loan Register</p>
		</div>
		<div class="container">
			 <table class="striped">
		        <thead>
		          <tr>
		          
		              <th >Item Name</th>
		              <th >Item Quantity</th>
		              <th >Item Price</th>
		              <th >Amount Used</th>
		          </tr>
		        </thead>

		        <tbody>
		         <?php
		         	$id=$_SESSION['username'];
		         	$qry="SELECT * FROM loan_register WHERE userid='$id'";
		         	$res=mysqli_query($connect, $qry);
					while($arr=mysqli_fetch_array($res)){
						echo"<tr><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td><td>$arr[5]</td></tr>";
					}

		         ?>
		        </tbody>
      		</table>
		</div>
	</body>
</html>