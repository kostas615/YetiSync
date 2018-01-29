<?php
/**
* @file
*
* Yeti-API
*
* Author: Konstantinos Chatzis <kostaschatzis01@gmail.com>
*
* 28/01/2018
*/


	class ApiGetJson {

		public function __construct(){}

		public function getToken () {
			try{
				// Import API Settings
				include ('api-config.php');

				// Login to API
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$login_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
				curl_setopt($ch, CURLOPT_POSTFIELDS, array(
					'userName' => $username,
					'password' => $password
					));
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					"x-api-key: $api_key",
					"x-encrypted: 0"
					)
				);
				$curl_response = curl_exec($ch);
				curl_close($ch);

				// Load decoded response
				$response = json_decode($curl_response);

				// Get token
				$token = $response->{'result'}->{'token'};

				return $token ;

			}
			catch (\Exception $e){
	      echo 'Caught exception: ',  $e->getMessage(), "\n";
	    }

			return 0;
		}

		public function getAccounts () {
			try {
				// Import API Settings
				include ('api-config.php');

				// Get a current token for the API
				$token = $this->getToken();

				// Get Contacts
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$get_accounts_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					"x-api-key: $api_key",
					"x-token: $token",
					"x-encrypted: 0",
					"x-fields: [\"accountname\",\"email1\",\"phone\",\"addresslevel8a\",\"addresslevel7a\",\"addresslevel5a\",\"addresslevel3a\"]"
					)
				);
				$curl_response = curl_exec($ch);
				curl_close($ch);

				// Load decoded response
				$response = json_decode($curl_response);

				return $response;

			}
			catch (\Exception $e){
	      echo 'Caught exception: ',  $e->getMessage(), "\n";
	    }

			return 0;
		}


		public function getContacts () {
			try {
				// Import API Settings
				include ('api-config.php');

				// Get a current token for the API
				$token = $this->getToken();

				// Get Contacts
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$get_contacts_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					"x-api-key: $api_key",
					"x-token: $token",
					"x-encrypted: 0",
					"x-fields: [\"firstname\",\"lastname\",\"email\",\"phone\",\"addresslevel8a\",\"addresslevel7a\",\"addresslevel5a\",\"addresslevel3a\"]"
					)
				);
				$curl_response = curl_exec($ch);
				curl_close($ch);

				// Load decoded response
				$response = json_decode($curl_response);

				return $response;

			}
			catch (\Exception $e){
	      echo 'Caught exception: ',  $e->getMessage(), "\n";
	    }

			return 0;
		}


		public function getLeads () {
			try {
				// Import API Settings
				include ('api-config.php');

				// Get a current token for the API
				$token = $this->getToken();

				// Get Contacts
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$get_leads_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					"x-api-key: $api_key",
					"x-token: $token",
					"x-encrypted: 0",
					"x-fields: [\"accountname\",\"email\",\"phone\",\"addresslevel8a\",\"addresslevel7a\",\"addresslevel5a\",\"addresslevel3a\"]"
					)
				);
				$curl_response = curl_exec($ch);
				curl_close($ch);

				// Load decoded response
				$response = json_decode($curl_response);

				return $response;

			}
			catch (\Exception $e){
	      echo 'Caught exception: ',  $e->getMessage(), "\n";
	    }

			return 0;
		}

	}

?>
