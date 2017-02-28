<?php
class User{
	//private $type;				//User's type either faculty, department-in-charge or store admin
	private $LDAP_id;			//USer's LDAP ID as string
	private $LDAP_password;		//User's password
	//Getter setter functions

	public function __construct($id, $pass){
		$this->LDAP_id=$id;
		$this->LDAP_password=$pass;
	}

	public function getLDAP_id(){
		return $this->LDAP_id;
	}
	public function getLDAP_password(){
		return $this->LDAP_password;
	}

	public function login($connect, $username, $password){
		$chkqry="select * from users where username='$username' and password='$password'";
		$res=mysqli_query($connect,$chkqry)or die("not fire check");
		 if(mysqli_affected_rows($connect)>=1){
		 	$row=mysqli_fetch_array($res,MYSQLI_NUM);
			$_SESSION['username']=$row[0];
			$_SESSION['name']=$row[2];
			$_SESSION['type']=$row[3];
			$_SESSION['password']=$row[1];
			$_SESSION['login']=true;
			$_SESSION['balance']=$row[4];
			if ($_SESSION['type']=="Admin") 	
				header("location:adminHome.php");
			else
				header("location:home.php");

		}
		else{
			echo '<script language="javascript">';
	      	echo 'alert("Invalid Credentital")';
	      	echo '</script>';
		}
	}
	// public function logout(){
	// 	$_SESSION['login']=false;
	// 	unset($_SESSION['username']);
	// 	unset($_SESSION['password']);
	// 	header("location:index.php");
	// 	return true;
	// }
}
?>