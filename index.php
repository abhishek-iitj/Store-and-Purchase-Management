<?php
include 'user.php';
session_start();
include("constant.php");
$conn=mysqli_connect(SERVER,USER,PASS,DB)or die("not connect");
if (isset($_POST['xsub'])){
	$username=$_POST['xuser'];
	$password=$_POST['xpass'];
	//$type=$_POST['xtype'];
	//$user=new user();
	//$user->setUser();
	//$ret=$user->login($username, $password);
	 $chkqry="select * from users where username='$username' and password='$password'";
	 $res=mysqli_query($conn,$chkqry)or die("not fire check");
	 if(mysqli_affected_rows($conn)>=1)
	 {
	 	$row=mysqli_fetch_array($res,MYSQLI_NUM);
		$_SESSION['username']=$row[0];
		$_SESSION['name']=$row[2];
		$_SESSION['type']=$row[3];
		$_SESSION['login']=true;
		if ($_SESSION['type']=="Admin") 	
			header("location:adminHome.php");
		else
			header("location:home.php");

	}
	else	
		$xlogm="<font color='red'>INVALID CREDENTIALS</font>";
}
?>

<html>
	<head>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
		 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<!-- Compiled and minified JavaScript -->
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
  		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>	 
       <script type="text/javascript">
       		$(document).ready(function() {
		    $('select').material_select();
		  });
       </script>
         
	</head>
	<body>
		<div class="row" style="background:#2B8C67;">
			<p align="center" style="font-size:25px;padding-top:10px;color:white;">IIT Jodhpur Store Department</p>
		</div>
		<div class="row" style="margin-left:20%; ">
			<?php if(!empty($xlogm)) echo $xlogm; ?><br>
			<form method="POST">
				<div class="row">
					<div class="input-field col s12 l4">
	          			<input placeholder="User Name" id="first_name" name="xuser" type="text" required class="validate">
	        		</div>
	        	</div>
	        	<div class="row">
	        		<div class="input-field col s12 l4">
	          			<input placeholder="Password" id="first_name" name="xpass" type="password" required class="validate">
	        		</div>
        		</div>
        		<!-- <div class="row">
	        		<div class="input-field col s12 l4">
	          			 <select name="xtype">
						    <option value="" disabled selected>Choose your option</option>
						    <option value="1">Admin</option>
						    <option value="2">Student</option>
						    <option value="3">Faculty</option>
						    <option value="4">Department</option>
						  </select>
	        		</div>
        		</div> -->
        		<div class="row">
          			<input value="submit" name="xsub" type="submit" class="waves-effect waves-light btn">
        		</div>
			</form>
		</div>	
	</body>
</html>