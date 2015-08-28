<?php
/**
 * Model class that handles iPortal interaction for book information
 */
class Catalogue extends AppModel
{
	var $name = 'Catalogue';	// Name of the Model
	var $useTable = false;		// Not connected to database

	/**
	 * Find book in catalogue
	 */
	function bookExists($title,$author)
	{

		// Query catalogue through http
		$url = "http://66.146.131.168/cgi-bin/gw/chameleon";
		$data = http_build_query(
								array(
									"t1"=>$author,
									"u1"=>"1003",
									"op1"=>"AND",
									"t2"=>$title,
									"u2"=>"4",
									"skin"=>"vaughan",
									"inst"=>"consortium",
									"submittheform"=>"",
									"usersrch"=>"1",
									"beginsrch"=>"1",
									"elementcount"=>"3",
									"function"=>"INITREQ",
									"search"=>"KEYWORD",
									"rootsearch"=>"KEYWORD",
									"lng"=>"en",
									"pos"=>"1",
									"conf"=>"./chameleon.conf",
									"patronhost"=>"localhost 1111 DEFAULT",
									"sortby"=>"pubti",
									"sortdirection"=>"1",
									"host"=>"localhost+1111+DEFAULT"
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
		$response = @stream_get_contents($fp);

		// Handle possible error situations by the contents of the http response and return suces/failure
		if (empty($response)) throw new Exception("No catalogue connection");
		return (strpos($response,"No Results Found")===false);
	}
}
?>