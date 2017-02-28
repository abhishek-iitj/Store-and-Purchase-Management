<?php
include_once("purchaseObj.php");
//Account Section Class from the SRS. Included into purchase.php. 
//Its object is passed as a parameter to StorDept objects function.

class AccountsSection{
	public function validate_Request($connect, $purchaseObj){
		$buyer=$purchaseObj->get_buyer();
		$price=$purchaseObj->get_price();
		$qry1="SELECT * FROM users where username='$buyer'";
		$res1=mysqli_query($connect, $qry1) or die("Error in validating from accounts section");
		while($row=mysqli_fetch_array($res1)){
			//echo intval($row['balance']);
			if ((intval($row['balance']))<$price){
				//echo "Disapproved from account section";
				return false;
			}
			else {
				//echo "Approved from account section";
																	//Update Financial Limits of the user
				$purchaseObj->set_status(true);
				$qry="SELECT * FROM users WHERE username='$buyer'";
				$res=mysqli_query($connect, $qry) or die("Error in fetching row while updating balance");
				while($userRow=mysqli_fetch_array($res)){
					$curBalance=intval($userRow[4]);
					$curBalance=$curBalance-$price;
					$_SESSION['balance']=$curBalance;
					echo "Balance Fetched\n";
				}
				$qry0="UPDATE users SET balance='$curBalance' WHERE username='$buyer'";
				$res0=mysqli_query($connect, $qry0) or die("Error in updating balance");
				echo "Balance Updated\n";
				return true;
			}
		}
	}	

}

?>