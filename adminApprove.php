<?php
session_start();
include ("constant.php");
include("storeAdmin.php");
$connect=mysqli_connect(SERVER, USER, PASS, DB) or die("error in myql_connect");

$storeAdmin= new StoreAdmin;

if (isset($_POST['xsub'])){
	$qry="SELECT * FROM store_incoming_requests where processed = '0'";
	$res=mysqli_query($connect, $qry) or die("Error in adminApprove.php at line 7");
	$count=mysqli_num_rows($res);
	$toApprove=array();
	for ($x=1; $x<=$count; $x++){
		if ($_POST[$x]){
			$y=$x-1;
			$qry1="SELECT * FROM store_incoming_requests ORDER BY ID LIMIT $y, 1";
			$res=mysqli_query($connect, $qry1) or die("Error in getiing index");	
			while($row=mysqli_fetch_array($res)){
				echo $row[0];
				echo $row[1];
				echo $row[2];
				echo $row[3];
			}
		}
	}
}
?>
<html>
	<head>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
		 <!-- Bootstrap -->
      <link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel = "stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	</head>
	<body>
		<div class="row" style="background:#2B8C67;">
			<p align="center" style="font-size:25px;padding-top:5px;color:white;">Store Page</p>
		</div>
		<div class="row"> <p align="center" style="font-size:20px;padding-top:5px;color:#2B8C67;">Incoming Requests</p></div>
		<form class="container" method="POST">
			<table class="table table-striped">
				<thead><th>Sl. No.</th>
						<th>Buyer ID</th>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Total Price</th>
						<th>Action</th>
				</thead>
				<tbody>
					<?php
						$qry="SELECT * FROM store_incoming_requests where processed = '0'";
						$res=mysqli_query($connect, $qry) or die("Error retreiving table store_incoming_requests");
						$i=1;
						while ($row=mysqli_fetch_array($res)) {
							echo "<tr><td>$i</td><td>$row[3]</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>
								<p>
								<input name='$i' type='radio' value='$i'/>
								Approve
								</p>
								</td></tr>";
							$i++;
						}
					?>
				</tbody>
			</table>
			<div class="row" align="center"><input type="submit" name="xsub" value="submit"></div>
		</form>
	</body>
</html>