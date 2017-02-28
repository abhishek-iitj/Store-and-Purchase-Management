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
		<div class="container"> 

			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search any keyword.." title="Type in a name">

		</div>
		<div class="container">
			 <table class="striped" id="myTable">
		        <thead>
		          <tr>
		              <th >Name</th>
		              <th >User ID</th>
		              <th >Item Name</th>
		              <th >Item Quantity</th>
		              <th >Item Price</th>
		              <th >Amount Used</th>
		          </tr>
		        </thead>

		        <tbody>
		         <?php
		         	$result = mysqli_query( $connect, "SELECT * FROM loan_register");
					while($arr=mysqli_fetch_array($result)){
						$var=$arr[0];
						echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td><td>$arr[5]</td></tr>";
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