<?php
session_start();
include ("constant.php");
$connect=mysqli_connect(SERVER, USER, PASS, DB) or die("error in myql_connect");
if ($_SESSION['login']==false )
	header("location:index.php");
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>  
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	</head>
	<body>
		<div class="row" style="background:#2B8C67;">
			<p align="center" style="font-size:25px;padding-top:5px;color:white;">Store Page</p>
		</div>
		<div class="row">
			<div class="col l4 s12"><p style="color:#2B8C67;font-size:20px;">Welcome Admin: <?php echo $_SESSION['name']?></p>
			</div>
			<div class="col l4 s12"></div>
			<div class="col l4 s12"><a class="waves-effect waves-light btn" href="logout.php">Logout</a></div>
		</div>
		 
		<div class="row">
			<div class="col l2 s12">
           	</div>
		 	<div class="col l3 s12">
		        <div class="card hoverable">
				    <div class="card-image waves-effect waves-block waves-light">
				      <img class="activator" src="images/office.jpg" >
				    </div>

				    <div class="card-content">
				      <span class="card-title activator grey-text text-darken-4" align="center"><a href="loanRegister.php" style="color:#2B8C67;"><b>Loan Register</b></a></span>
				    </div>
           		</div>
      		</div>
      		<div class="col l2 s12">
           		</div>
      		<div class="col l3 s12">
		        <div class="card hoverable">
				    <div class="card-image waves-effect waves-block waves-light">
				      <img class="activator" src="images/office.jpg" >
				    </div>

				    <div class="card-content">
				      <span class="card-title activator grey-text text-darken-4" align="center"><a href="viewStore.php" style="color:#2B8C67;"><b>Purchase Items</b></a></span>
				    </div>

           		</div>
      		</div>
      		<div class="col l2 s12">
           	</div>
      	</div>
      	<div class="row" >
      		<div class="col l4 s12"></div>
      		<div class="col l3 s12">
		        <div class="card hoverable">
				    <div class="card-image waves-effect waves-block waves-light">
				      <img class="activator" src="images/office.jpg" >
				    </div>

				    <div class="card-content">
				      <span class="card-title activator grey-text text-darken-4" align="center"><a href="viewStore.php" style="color:#2B8C67;"><b>View Store</b></a></span>
				    </div>
           		</div>
      		</div>
      	</div>
	</body>
</html>
