<?php
class Purchase{
	private $item;			//Item Name of the product from purchase specification form
	private $qty;
	private $price;			//Price of the item(total price not per unit). May be double/float/integer (To 							be taken care of from the MYSQl datatype) 
	private $buyer;
	private $approved;		//A boolean to check the sattus of purchase either approved or disapproved by 							accounts section 
	public function __construct($item1, $qty1, $price1, $buyer1, $approved1){
		$this->item=$item1;
		$this->qty=$qty1;
		$this->price=$price1;
		$this->buyer=$buyer1;
		$this->approved=$approved1;
	}

	public function get_item(){
		return $this->item;
	}	
	public function get_qty(){
		return $this->qty;
	}	
	public function get_price(){
		return $this->price;
	}	
	public function get_buyer(){
		return $this->buyer;
	}	
	public function get_status(){
		return $this->approved;
	}
	public function set_status($status){
		$this->approved=$status;
	}
}




?>