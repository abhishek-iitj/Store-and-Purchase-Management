<?php
//Account Section Class from the SRS. Included into purchase.php. 
//Its object is passed as a parameter to StorDept objects function.

class AccountsSection{
	public function validate_Request($connect, $price, $buyer){
		$qry1="SELECT * FROM users where username='$buyer'";
		$res=mysqli_query($connect, $qry1) or die("Error in validating from accounts section");
		while($row=mysqli_fetch_array($res)){
			echo intval($row['balance']);
			if ((intval($row['balance']))<$price){
				echo "Disapproved from account section";
				return false;
			}
			else {
				echo "Approved from account section";
				return true;
			}
		}
	}	

}

?>