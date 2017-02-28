<?php
session_start();
include ("constant.php");
$connect=mysqli_connect(SERVER, USER, PASS, DB) or die("error in myql_connect");

if ($_SESSION['login']==false )
	header("location:index.php");
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

			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search any keyword.." title="Type in a name">

		</div>
		<div class="container">
			 <table class="striped" id="myTable">
		        <thead>
		          <tr>
		          	
		              <th >Sl. NO</th>
		              <th >Item Name</th>
		              <th >Item Quantity</th>
		              <th >Item Price</th>
		              <th >Amount </th>
		              <th >Date</th>
		          </tr>
		        </thead>

		        <tbody>
		         <?php
		         	$i=1;
		         	$id=$_SESSION['username'];
		         	$qry="SELECT * FROM loan_register WHERE userid='$id'";
		         	$res=mysqli_query($connect, $qry);
					while($arr=mysqli_fetch_array($res)){
						echo"<tr><td>$i</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td><td>$arr[5]</td><td>$arr[6]</td></tr>";
						$i++;
					}

		         ?>
		        </tbody>
      		</table>
		</div>

		<script>
		function myFunction() {
		  	var input, filter, found, table, tr, td, i, j;
		    input = document.getElementById("myInput");
		    filter = input.value.toUpperCase();
		    table = document.getElementById("myTable");
		    tr = table.getElementsByTagName("tr");
		    for (i = 0; i < tr.length; i++) {
		        td = tr[i].getElementsByTagName("td");
		        for (j = 0; j < td.length; j++) {
		            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
		                found = true;
		            }
		        }
		        if (found) {
		            tr[i].style.display = "";
		            found = false;
		        } else {
		            tr[i].style.display = "none";
		        }
		    }
		}
	</script>

	</body>
</html>