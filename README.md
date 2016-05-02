# PHP-LDAP-AUTH
This is a LDAP Authentication script purely made with PHP. Before you start using this you do need to edit LDAP_Plugin.php in \functions\LDAP_Plugin.php . 

	$ldaphost = "IP ADDRESS";  //LDAP HOST IP For example 192.168.204.131
	$ldapport = 389;	//LDAP PORT STANDARD PORT = 389
	$ldap_dn = "CN=Users,DC=PoliForma,DC=nl"; //DOMAIN LOCATION FOR USERS DEFINE CURRENTLY SET TO Users OU

	$ldap_user_group = "ENTER MEMBERGROUP";	//USERS MUST BE MEMBEROF
  
	$ldap_usr_dom = '@ENTER DOMAIN NAME'; //@DOMAIN.NAME For example @Google.com
	
Make sure that you edit these variables to whatever you need it to be otherwise it will not work. I hope this is a good enough example to help you out making your own or even using this LDAP Authentication script. I tried my hardest to make it look organized and easy for even beginners.

If this helped you out and you feel generous feel free to donate to support the creator: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=abdulkerim_demir2%40hotmail%2ecom&lc=NL&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted



############BEAWARE############
I recommend creating a separate user group to grant users access to login with the LDAP Authenticator. I've noticed that this code can have some issues due to "primaryKey" some standard user groups can have. When I made this I had to have a separate user group so I didn't investigate this issue.
