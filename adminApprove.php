<?php
session_start();
include_once("constant.php");
include_once("storeAdmin.php");
include_once("storeDept.php");
include_once("purchaseObj.php");

$connect=mysqli_connect(SERVER, USER, PASS, DB) or die("error in myql_connect");



if (isset($_POST['xsub'])){
	$qry="SELECT * FROM store_incoming_requests where processed = '0'";
	$res=mysqli_query($connect, $qry) or die("Error in adminApprove.php at line 7");
	$count=mysqli_num_rows($res);
	$toApprove=array();
	$sum=0;
	while ($row=mysqli_fetch_array($res)) {
		array_push($toApprove, intval($row[0]));
	}
	for ($x=0; $x<count($toApprove); $x++)
	{
		if(isset($_POST[$toApprove[$x]]))
		{
			$sum++;
		}
	}
	if($sum>0)
	//Handle exception if user directly submits rather than selecting at least one radio button
	{
	for ($x=0; $x<count($toApprove); $x++){
		$var=$_POST[$toApprove[$x]];
		if ($var){
			$qry1="SELECT * FROM store_incoming_requests WHERE serial=$var";
			$res=mysqli_query($connect, $qry1) or die("Error in getiing index");	
			while($row=mysqli_fetch_array($res)){
				$storeAdmin= new StoreAdmin;
				$storeDept= new StoreDepartment;
				$purchaseObj= new Purchase($row[1], $row[2], $row[3], $row[4], true);
				 // echo $row[0];
				 // echo $row[1];
				 // echo $row[2];
				 // echo $row[3];
				$qryx="UPDATE store_incoming_requests SET processed = '1' where serial=$var";
				//echo $qryx;
				$resx=mysqli_query($connect, $qryx) or die("Error in adminApprove.php at line 7");
				$storeAdmin->reply_user($connect, $purchaseObj, $storeDept);
			}	
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
	<body style="padding:0px;margin:0px auto;">
		<div class="row" style="background:#2B8C67;">
			<p align="center" style="font-size:25px;padding:5px;color:white;">Store Page</p>
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
							echo "<tr><td>$i</td><td>$row[4]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>
								<p>
								<input name='$row[0]' type='radio' value='$row[0]'/>
								Approve
								</p>
								</td></tr>";
						}
						$i++;
					?>
				</tbody>
			</table>
			<div class="row" align="center"><input type="submit" name="xsub" value="submit"></div>
		</form>
	</body>
</html>