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
		<div class="row"><p style="color: #2B8C67;font-size: 20px;">Fill in the details</p> </div>
		<div class="row">
			<div class="col l6 12">
				<form>
			      <div class="row">
			        <div class="input-field col s6">
			          <input type="text" class="validate">
			          <label for="first_name">Item Name</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Last Name</label>
			        </div>
			      </div>
			     
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="password" type="password" class="validate">
			          <label for="password">Password</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="email" type="email" class="validate">
			          <label for="email">Email</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="col s12">
			          This is an inline input field:
			          <div class="input-field inline">
			            <input id="email" type="email" class="validate">
			            <label for="email" data-error="wrong" data-success="right">Email</label>
			          </div>
			        </div>
			      </div>
	    		</form>
			</div>
		</div>
	</body>
</html>