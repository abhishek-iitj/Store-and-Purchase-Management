<?php
class user{
	private $type;
	private $LDAP_id;
	private $LDAP_password;

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