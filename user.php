<?php
class User{
	private $type;				//User's type either faculty, department-in-charge or store admin
	private $LDAP_id;			//USer's LDAP ID as string
	private $LDAP_password;		//User's password
	//Getter setter functions
	public function setUser($a, $b, $c){
		$type=$a;
		$LDAP_id=$b;
		$LDAP_password=$c;
	}
	public function getType(){
		return $type;
	}
	public function getLDAP_id(){
		return $LDAP_id;
	}
	public function getLDAP_password(){
		return $LDAP_password;
	}
	
}
?>