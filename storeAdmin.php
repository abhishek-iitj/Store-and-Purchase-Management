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
		
		$qry="INSERT INTO store_incoming_requests VALUES('$item', '$qty','$price','$buyer','0')";
		$res=mysqli_query($connect, $qry) or die("Error in inserting to store_incoming_requests tables.");
	}

	public function reply_user(){

	}

	public function get_individual_loan_register(){

	}
}


?>