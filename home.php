<?php
session_start();
include ('user.php');
include ("constant.php");
$connect=mysqli_connect(SERVER, USER, PASS, DB) or die("error in myql_connect");
if ($_SESSION['login']==false )
	header("location:index.php");
$user=new User($_SESSION['username'], $_SESSION['password']);
$id=$_SESSION['name'];



if(isset($_POST['xsub']))
{
	$qry="DELETE FROM notification WHERE 1";
	$res=mysqli_query($connect,$qry) or die("Error in firing query for deleting notifications");
}
$qryz="Select * from notification where userid='$id'";
$resz=mysqli_query($connect, $qryz) or die("Error in home.php line 38");
$count=mysqli_num_rows($resz);
if ($count!=0){
	echo '<script language="javascript">';
	echo 'alert("New Notifiaction(s)!")';
	echo '</script>';
		}


?>
<html>
	<head>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      	<script type="text/javascript" src="js/materialize.min.js"></script> 
	</head>

	<body>
		<div class="row" style="background:#2B8C67;">
			<p align="center" style="font-size:25px;padding-top:5px;color:white;">Home</p>
		</div>
		<div class="row">
			<div class="col l4 s12"><p style="color:#2B8C67;font-size:20px;">Welcome : <?php echo $_SESSION['name']?></p>
			<p style="color:#2B8C67;font-size:20px;">Balance(in Rs.) : <?php echo $_SESSION['balance']?></p>
			</div>
			<div class="col l4"></div>
			<div class="col l4 s12" align="right">
				<button data-target="modal1" class="btn">Notifications</button>
				<div id="modal1" class="modal">
			  	<!-- Modal content -->
				  <div  class="modal-content">
				  <form method='post' action='#'>
				    <table>
				    <?php
					    $id=$_SESSION['name'];
					    $qryz="Select * from notification where userid='$id'";
					    $resz=mysqli_query($connect, $qryz) or die("Error in home.php line 38");
					    $count=mysqli_num_rows($resz);
					    if ($count==0){
					    	echo "<tr><td>No new notification</td></tr>";
					    }
					    else{
					    	while($row=mysqli_fetch_array($resz)){
					    		echo "<tr><td>$row[1]</td></tr>";
					    	}
					    }
					    echo "<input type='submit' name='xsub' value='Clear All'>";
				    ?>
				    </table>
				    </form> 
				  </div>
				</div>
			
			<div class="row" style="margin-top:20px;" salign="right"><a class="waves-effect waves-light btn" href="logout.php">Logout</a>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col l2 s12">
           	</div>
		 	<div class="col l3 s12">
		        <div class="card hoverable">
				    <div class="card-image waves-effect waves-block waves-light">
				      <a href="userLoanReg.php"><img class="activator" src="images/loan_register.jpg" width="100px" height="200px"></a>
				    </div>

				    <div class="card-content">
				      <span class="card-title activator grey-text text-darken-4" align="center"><a href="userLoanReg.php" style="color:#2B8C67;"><b>Loan Register</b></a></span>
				    </div>
           		</div>
      		</div>
      		<div class="col l2 s12">
           		</div>
      		<div class="col l3 s12">
		        <div class="card hoverable">
				    <div class="card-image waves-effect waves-block waves-light">
				      <a href="purchase.php"><img class="activator" href="purchase.php" src="images/7-Purchase-Request.jpg" width="100px" height="200px"></a>
				    </div>
				    <div class="card-content">
				      <span class="card-title activator grey-text text-darken-4" align="center"><a href="purchase.php" style="color:#2B8C67;"><b>Purchase</b></a></span>
				    </div>

           		</div>
      		</div>
      		<div class="col l2 s12">
           	</div>
      	</div>
      	<div class="row">
      		<div class="col l4 s12"></div>
      		<div class="col l3 s12" style="margin-left:25px;">
      			<div class="card hoverable">
				    <div class="card-image waves-effect waves-block waves-light">
				      <a href="requestUnderProcess.php"><img class="activator" src="images/modules_wlists.png" width="100px" height="200px">
				    </div></a>

				    <div class="card-content">
				      <span class="card-title activator grey-text text-darken-4" align="center"><a href="requestUnderProcess.php" style="color:#2B8C67;"><b>Pending Requests</b></a></span>
				    </div>

           		</div>
      		</div>
      	</div>
      	<script type="text/javascript">
      		  $(document).ready(function(){
			    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
			    $('.modal').modal();
			  });
			       
      	</script>
	</body>
</html>
