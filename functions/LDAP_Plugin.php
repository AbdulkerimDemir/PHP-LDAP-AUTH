<?php
session_start();
 
function authenticate($user, $password) {
	if(empty($user) || empty($password)) return false;

	$ldaphost = "IP ADDRESS";  //LDAP HOST IP For example 192.168.204.131
	$ldapport = 389;	//LDAP PORT STANDARD PORT = 389
	$ldap_dn = "CN=Users,DC=PoliForma,DC=nl"; //DOMAIN LOCATION FOR USERS DEFINE CURRENTLY SET TO Users OU
	
	$ldap_user_group = "ENTER MEMBERGROUP";	//USERS MUST BE MEMBEROF
  
	$ldap_usr_dom = '@ENTER DOMAIN NAME'; //@DOMAIN.NAME For example @Google.com
 
	$ldap = ldap_connect($ldaphost, $ldapport);
 
	if($bind = @ldap_bind($ldap, $user.$ldap_usr_dom, $password) or die ("Error: ".ldap_error($ldap))) {
		$filter = "(sAMAccountName=".$user.")";
		$attr = array("");
		$result = ldap_search($ldap, $ldap_dn, $filter) or exit("Unable to search LDAP server") or die ("Error searching: ".ldap_error($ldap));
		$entries = ldap_get_entries($ldap, $result);
		ldap_unbind($ldap);
		
		/*debug
		echo "ENTRY RESULTS: ";
		print_r($entries[0]['memberof']);
		echo "<br />";
		*/			
	}	
	
	foreach($entries[0]['memberof'] as $grps) {
		// IS USER MEMBEROF
		if(empty($grps) || empty($ldap_user_group)) return false;
		if(strpos($grps, $ldap_user_group)) {
			$access = 1;
		} else {
		}
	}
	
	if($access != 0) {
			$_SESSION['user'] = $user;
			$_SESSION['access'] = $access;
			return true;
		}  else {
		// INVALID USERNAME
		return false;
	}
}
?>