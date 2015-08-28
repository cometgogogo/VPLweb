<?php
/**
 * Model class that handles iPortal interaction for patron information
 */
class Account extends AppModel
{
	var $name = 'Account';	// Name of the Model
	var $useTable = false;	// Not connected to database
	var $sessionId;			// catalogue session id
	var $patronName;		// catalogue patron name
	var $response;			// The http response from teh catalog
	var $errors;			//


	/**
	 * Login on catalogue
	 */
	function login($card,$password)
	{

		// Handle entry form errors
		$this->errors = array();
		if (empty($card)) $this->errors[] = "card";
		if (empty($password)) {
			$this->errors[] = "pin";
		} else {
			if (!is_numeric($password)) $this->errors[] = "pin_numeric";
			if (strlen($password)<4) $this->errors[] = "pin_length";
		}

		// Attempt catalogue login
		if (count($this->errors) == 0) {

			// Query catalogue through http
			$url = "http://catalogue.vaughanpl.info/cgi-bin/gw/chameleon";
			/*$data = http_build_query(
									array(
										"function"=>"PATRONATTEMPT",
										"search"=>"PATRON",
										"lng"=>"en",
										"conf"=>"http://catalogue.vaughanpl.info/cgi-bin/gw/chameleon/chamaleon.conf",
										"skin"=>"vaughan",
										"u1"=>"12",
										"SourceScreen"=>"PATRONLOGIN",
										"inst"=>"consortium",
										"patronid"=>$card,
										"patronpassword"=>$password,
										"patronhost"=>"localhost 1111 DEFAULT"
									)
			);*/
			$data = http_build_query(
												array(
													"function"=>"PATRONATTEMPT",
													"search"=>"PATRON",
													"lng"=>"en",
													"skin"=>"vaughan",
													"u1"=>"12",
													"inst"=>"consortium",
													"patronid"=>$card,
													"patronpassword"=>$password,
													"patronhost"=>"localhost 1111 DEFAULT"
												)
			);



			$params = array('http' => array(
				  'method' => 'POST',
				  'content' => $data
			   ));
			$ctx = stream_context_create($params);
			$originalTimeout = ini_set('default_socket_timeout', 10);
			$fp = @fopen($url, 'rb', false, $ctx);
			ini_set('default_socket_timeout', $originalTimeout);
			$this->response = @stream_get_contents($fp);


			// Handle possible error situations by the contents of the http response
			if (empty($this->response)) $this->errors[] = "no_connection";
			if (strpos($this->response,'Login Error Occurred')) $this->errors[] = "invalid_login";
			if (strpos($this->response,'Invalid User ID or Password')) $this->errors[] = "invalid_login";

			// Initialize session data from the contents of the http response
			$sessionid = substr($this->response,strpos($this->response,"sessionid=")+10,19);
			$nameStarts = strpos($this->response,'<td class="patSumWelcome">')+34;
			$nameStarts = strpos($this->response,'Welcome ', $nameStarts)+8;
			$nameEnds = strpos($this->response,' (',$nameStarts+1);
			$name = substr($this->response,$nameStarts,$nameEnds-$nameStarts);
			$this->sessionId = $sessionid;
			$this->patronName = $name;
		}
	}
}
?>