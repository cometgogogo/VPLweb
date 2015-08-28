<?php

class CatalogueComponent extends Object
	{
	var $controller = true;
	
	function startup(&$controller)
	{
		// This method takes a reference to the controller which is	loading it.
		// Perform controller initialization here.
		$this->controller = $controller;
	}
	
	function test_function() {
		return "test1";
	}
	
	
	function bookExists($title,$author)
	{

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
		
		$fp = @fopen($url, 'rb', false, $ctx);

		$response = @stream_get_contents($fp);

		return (strpos($response,"No results found")===false);
	}
}

?>