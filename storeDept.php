<?php
//Included in purchase.php to verify storeDept's processings after user fills purchase Specifications page.
class StoreDepartment{
	public function get_Request($accounts, $connect, $item, $qty, $buyer){
		//echo "<p style='color:red;'>".$item."</p>";
		$qry1="SELECT * FROM allitems where item_name='$item'";
		$res=mysqli_query($connect, $qry1) or die("Error in fire inside function");
		$price=0;
		while ($row=mysqli_fetch_array($res) ){
			$price=($qty)*(intval($row['price']));
			//echo $price;
			if ($accounts->validate_Request($connect, $price, $buyer)==true){
				return true;
			}
			else
				return false;
		}
	}	

}


?>