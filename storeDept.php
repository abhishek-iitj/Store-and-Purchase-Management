<?php
include_once("purchaseObj.php");
include_once("storeAdmin.php");
//Included in purchase.php to verify storeDept's processings after user fills purchase Specifications page.
class StoreDepartment{
	public function get_Request($acc, $connect, $purchaseObj){			//Sends users request to accounts 																		section for verification...
		if ($acc->validate_Request($connect, $purchaseObj)==true)
			return true;
		else
			return false;
	}

	public function check_store($connect, $purchaseObj, $storeAdmin){	//Account Section has verified. 																		Check the availibilty in the store
		$item=$purchaseObj->get_item();
		$qty=$purchaseObj->get_qty();
		//echo $item;
		$qry="SELECT * from store_items WHERE item_name='$item'";
		//echo $qry;
		$res=mysqli_query($connect, $qry) or die("Error in validating from store");
		while($row=mysqli_fetch_array($res)){
			echo "available quantitiy";
			echo $row[2];
			echo "required Quantitiy";
			echo $qty;		
			if((intval($row[2]))<$qty)									//Send to admin here if necessary
				$storeAdmin->send_req_to_admin($connect, $purchaseObj);
			else{
				$this->update_loan_register($connect, $purchaseObj);
			}
		}
	}

	public function update_loan_register($connect, $purchaseObj){
		$item=$purchaseObj->get_item();
		$qty=$purchaseObj->get_qty();
		$price=$purchaseObj->get_price();
		$buyer=$purchaseObj->get_buyer();		//LDAP ID of the USER

		$buyerName="";			//Name of the buyer. To be found from table :) 
		echo $buyer;
		$qry="SELECT * FROM users WHERE username='$buyer'";
		$res=mysqli_query($connect, $qry) or die("Error in update_loan_register function - 1");
		while($row=mysqli_fetch_array($res)){
			$buyerName=$row[2];
		}
		$pricePerUnit=(intval($price))/(intval($qty));
		$qry="INSERT INTO loan_register VALUES('$buyerName', '$buyer', '$item', '$qty', '$pricePerUnit', '$price')";
		$res=mysqli_query($connect, $qry) or die("Error in updating loan register - 2");
		echo "\nLOAN REGISTRE UPDATED for ", $buyer;
		$this->update_store($connect, $purchaseObj);

	}

	public function update_store($connect, $purchaseObj){
		$item=$purchaseObj->get_item();
		$qty=$purchaseObj->get_qty();
		$qry="SELECT * FROM store_items WHERE item_name='$item'";
		$res=mysqli_query($connect, $qry) or die("Error in finding item in store to update..allthough loan reg updated.");
		$curQty=0;
		while($row=mysqli_fetch_array($res)){
			$curQty=intval($row[2]);
			$curQty=$curQty-$qty;
		}
		$qry="UPDATE store_items SET item_qty='$curQty' WHERE item_name='$item'";
		$res=mysqli_query($connect, $qry) or die("Error in updating store items.");
		echo "Store Updated";
		
	}

}


?>