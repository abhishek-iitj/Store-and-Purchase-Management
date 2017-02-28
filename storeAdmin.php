<?php
class StoreAdmin{

	public function purchase_item($connect, $purchaseObj){
		$qty=$purchaseObj->get_qty();
		$item=$purchaseObj->get_item();
		$qry="SELECT * FROM store_items WHERE item_name='$item'";
		$res= mysqli_query($connect,$qry) or die("Error in query fire inside function purchase_item");
		$arr=mysqli_fetch_array($res);	
		$qty=$qty+$arr[2];
		$qry1="UPDATE store_items SET item_qty='$qty' WHERE item_name='$item'";
		$res1= mysqli_query($connect,$qry1) or die("Error in query fire inside function purchase_item");
	}

	public function send_req_to_admin($connect, $purchaseObj){
		//This method will put the purchase request to be viewed and processed by the store Admin.
		//Puts the data to the store_incoming_requests table
		$item=$purchaseObj->get_item();
		$qty=$purchaseObj->get_qty();
		$price=$purchaseObj->get_price();
		$buyer=$purchaseObj->get_buyer();
		$date = date('d-m-Y');
		$qry="INSERT INTO store_incoming_requests(item_name, item_qty, item_price, userid, processed) VALUES('$item', '$qty','$price','$buyer','0')";
		$res=mysqli_query($connect, $qry) or die("Error in inserting to store_incoming_requests tables.");
	}

	public function reply_user($connect, $purchaseObj, $storeDept){
		//Fetch the row for that user form store_incoming_request
		//processe
		$item=$purchaseObj->get_item();
		$price=$purchaseObj->get_price();
		$qty=$purchaseObj->get_qty();
		$buyer=$purchaseObj->get_buyer();		//LDAP ID of the USER

		$buyerName="";			//Name of the buyer. To be found from table :) 
		//echo $buyer;
		$qry="SELECT * FROM users WHERE username='$buyer'";
		$res=mysqli_query($connect, $qry) or die("Error in update_loan_register function - 1");
		while($row=mysqli_fetch_array($res)){
			$buyerName=$row[2];
		}

		$qry="SELECT * FROM store_items WHERE item_name='$item'";
		$res=mysqli_query($connect, $qry) or die("Error in updatin store by admin");
		while($row=mysqli_fetch_array($res)){
			$curQty=intval($row[2]);
		}
		$curQty=$curQty+($qty-$curQty);
		$qry="UPDATE store_items SET item_qty='$curQty' WHERE item_name='$item'";
		$res=mysqli_query($connect, $qry) or die("Error in updating store items.");
		$message="Sucessfully Purchased : ITEM NAME - ".$item." QTY - ".$qty." PRICE - ".$price;
		
		$qryy="INSERT INTO notification VALUES('$buyerName', '$message')";
		$resy=mysqli_query($connect, $qryy) or die("Notification insertion error");

		$storeDept->update_loan_register($connect, $purchaseObj);
	}

}


?>