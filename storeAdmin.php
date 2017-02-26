<?php
class StoreAdmin{
	private $LDAP_id;			//USer's LDAP ID as string
	private $LDAP_password;		//User's password


	public function get_LDAP_id(){
		return $this->LDAP_id;
	}

	public function purchase_item($connect){

	}

	public function send_req_to_admin($connect, $purchaseObj){
		//This method will put the purchase request to be viewed and processed by the store Admin.
		//Puts the data to the store_incoming_requests table
		$item=$purchaseObj->get_item();
		$qty=$purchaseObj->get_qty();
		$price=$purchaseObj->get_price();
		$buyer=$purchaseObj->get_buyer();
		echo "I am in store_incoming_requests";	
		$qry="INSERT INTO store_incoming_requests(item_name, item_qty, item_price, userid, processed) VALUES('$item', '$qty','$price','$buyer','0')";
		$res=mysqli_query($connect, $qry) or die("Error in inserting to store_incoming_requests tables.");
	}

	public function reply_user($connect, $purchaseObj, $storeDept){
		//Fetch the row for that user form store_incoming_request
		//processe
		$item=$purchaseObj->get_item();
		$price=$purchaseObj->get_price();
		$qty=$purchaseObj->get_qty();

		$qry="SELECT * FROM store_items WHERE item_name='$item'";
		$res=mysqli_query($connect, $qry) or die("Error in updatin store by admin");
		while($row=mysqli_fetch_array($res)){
			$curQty=intval($row[2]);
		}
		$curQty=$curQty+$qty;
		$qry="UPDATE store_items SET item_qty='$curQty' WHERE item_name='$item'";
		$res=mysqli_query($connect, $qry) or die("Error in updating store items.");
		echo "Store Updated";
		$storeDept->update_loan_register($connect, $purchaseObj);
	}

	public function get_individual_loan_register(){

	}
}


?>