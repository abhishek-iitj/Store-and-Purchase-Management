<?php
	session_start();
	include ("constant.php");
	include_once("purchaseObj.php");
	include_once("storeAdmin.php");
	$connect=mysqli_connect(SERVER, USER, PASS, DB) or die("error in myql_connect");

	if ($_SESSION['login']==false )
		header("location:index.php");
		
	if(isset($_POST['xsub'])){
		$item1=$_POST['xitem'];
		$qty1=$_POST['xqty'];
		$storeAdmin=new StoreAdmin;

		$qry2="SELECT * FROM store_items WHERE item_name ='$item1'";
		$res1=mysqli_query($connect,$qry2) or die("Error in fire inside function");
		$arr=mysqli_fetch_array($res1,MYSQLI_NUM);
		$price1=$arr[1]*$qty1;
		//$purchaseObj=$storeAdmin->purchase_item($item1, $qty1, $price1, "pradhan.1");
		$PurchaseObj=new Purchase($item1, $qty1, $price1, "pradhan.1", true);//admin=pradhan.1
		$storeAdmin->purchase_item($connect,$PurchaseObj);

		echo '<script language="javascript">';
		echo 'alert("Purchase Department has successfully purchased.")';
		echo '</script>';
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
	  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	</head>
	<body style="margin:0px;padding:0px;">
		<div class="row" style="background:#2B8C67;">
			<p align="center" style="font-size:25px;padding-top:5px;color:white;">Purchase Items</p>
		</div>
		<div class="row">
			<div class="col l4 s12"><p style="color:#2B8C67;font-size:20px;">Welcome : <?php echo $_SESSION['name']?></p>
			</div>
			<div class="col l6"></div>
			<div class="col l2"><a href="adminHome.php" style="color:#2B8C67;"> <i class="medium material-icons">home</i></a></div>

		</div>
		<div class="container">
			<p style="color:#2B8C67;font-size:20px;">Purchase Specification Form<a style="color:#2B8C67;font-size:15px;">&nbsp(One item at a time)</a></p>
			<form method="POST">
				
				<div class="row">
					<div class=" input-field col s12 m12 l6">
	          			  <select name="xitem">
						      	<?php
									$qry="SELECT * FROM store_items order by item_name";
							    	$res=mysqli_query($connect, $qry);

							    	while ($row=mysqli_fetch_array($res) ){
							    		$var=$row["item_name"];
   										echo "<option value='$var'>".htmlspecialchars($row["item_name"])." (Price per qty:".$row['item_price'].")"."</option>";
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