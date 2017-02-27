<?php
session_start();
include ("constant.php");
include_once ("storeDept.php");
include_once("accounts.php");
include_once("purchaseObj.php");
include_once("storeAdmin.php");
$connect=mysqli_connect(SERVER, USER, PASS, DB) or die("error in myql_connect");
if ($_SESSION['login']==false )
	header("location:index.php");


$storeDept=new StoreDepartment;
$accounts=new AccountsSection;
$storeAdmin=new StoreAdmin;

if (isset($_POST['xsub'])) {
	$item=$_POST['xitem'];
	$qty=$_POST['xqty'];
	//echo $item, $qty;

	//This code evalutes the total amount of the items in the purchase spec froms.
	$qry1="SELECT * FROM allitems where item_name='$item'";
	$res=mysqli_query($connect, $qry1) or die("Error in fire inside function");
	$price=0;
	while ($row=mysqli_fetch_array($res) ){
		$price=($qty)*(intval($row['price']));
	}
	//echo $price;
	//Upto Here

	$purchaseObj=new Purchase($item, $qty, $price, $_SESSION['username'], false);	//

	$approval=$storeDept->get_Request($accounts, $connect, $purchaseObj);
	if ($approval==true){
		//For each user we will have a notifcation history. 
		echo '<script language="javascript">';
		echo 'alert("Purchase request has been approved from Accounts Section.You will get message from store department on process completion.")';
		echo '</script>';
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Insufficient Fund in account. Request Cancelled.")';
		echo '</script>';

	}
	//Till now budget approval has been covered.
	if ($purchaseObj->get_status()){
		echo 1;
		//To check if the item is avlbl in store or not
		$storeDept->check_store($connect, $purchaseObj, $storeAdmin);		
	}


}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Store And Purchase</title>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script> 
		
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  	<script type="text/javascript" src="js/materialize.min.js"></script> 
	  	<script type="text/javascript">
	  		$(document).ready(function() {$('select').material_select();});
	  	</script>
	</head>
	<body style="margin:0px;padding:0px;">
		<div class="row" style="background:#2B8C67;">
			<p align="center" style="font-size:25px;padding-top:5px;color:white;">Store Page</p>
		</div>
		<div class="row">
			<div class="col l4 s12"><p style="color:#2B8C67;font-size:20px;">Welcome : <?php echo $_SESSION['name']?></p>
			<p style="color:#2B8C67;font-size:20px;">Withstanding Balance(in Rs.) : <?php echo $_SESSION['balance']?></p>
			</div>

		</div>
		<div class="container">
			<p style="color:#2B8C67;font-size:20px;">Purchase Specification Form<a style="color:#2B8C67;font-size:15px;">&nbsp(One item at a time)</a></p>
			<form method="POST">
				
				<div class="row">
					<div class=" input-field col s12 m12 l6">
	          			  <select name="xitem">
						      	<?php
								$qry="SELECT * FROM allitems order by item_name";
							    $res=mysqli_query($connect, $qry);

							    while ($row=mysqli_fetch_array($res) ){
							    		$var=$row["item_name"];
   										echo "<option value='$var'>".htmlspecialchars($row["item_name"])." (Price per qty:".$row['price'].")"."</option>";
									}
						      ?>
						    </select>
    					<label>Select an item</label>
	        		</div>

	        	</div>
	        	<div class="row">
	        		<div class="input-field col s12 l6">
	          			<select name="xqty">
	          				<?php
	          				for ($i=1; $i<21; $i++){
	          					echo "<option>".(string)$i."</option>";
	          				}
	          				?>
	          			</select>
	        		</div>
        		</div>
        		<div class="row">
          			<input value="submit" name="xsub" type="submit" class="waves-effect waves-light btn">
        		</div>
			</form>
		</div>
	</body>
</html>