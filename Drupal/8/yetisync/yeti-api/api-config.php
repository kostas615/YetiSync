<?php
/**
* @file
*
* Yeti-API
*
* Author: Konstantinos Chatzis <kostaschatzis01@gmail.com>
*
* 26/01/2018
*/

	// You have to set your YetiForce's settings before using the API.
	//
	// For the $username and $password open Web Services > Users,
	// and create a new user. You can't use your ordinary Login
	// creadentials here!
	//
	// For the $api_ket open Web Services > applications,
	// and create a new application. Then insert it's key here.
	//
	// The $main_url is the way your webservice is being accessed remotely,
	// example: "http://myyeti.com/api/webservice"

	$username = 'username';
	$password = 'password';
	$api_key = '------api-key------';
	$main_url = 'https://---------/api/webservice';




	// The following settings should NOT be changed.
	$login_url = $main_url . '/Users/Login';
	$get_accounts_url = $main_url . '/Accounts/RecordsList';
	$get_contacts_url = $main_url . '/Contacts/RecordsList';


?>
