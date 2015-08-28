<?php
class TodaysDatabase extends AppModel
{
	var $name = 'TodaysDatabase';
	var $useTable = false;


	function find() {
		$sql = 	"SELECT COUNT(*) AS how_many FROM Eproducts";
		$howMany = $this->query($sql);
		$limit = floor(mktime()/86400) % $howMany[0][0]["how_many"];
		$sql = 	"SELECT Name,Description,URL,EproductID FROM Eproducts LIMIT " . $limit . ", 1";


		$ret = array("Campaign"=>array());
		foreach ($this->query($sql) as $database) {
			$ret["Campaign"]["Name"] = $database["Eproducts"]["Name"];
			$ret["Campaign"]["Image"] = 'keyboard-cd.jpg';
			$ret["Campaign"]["Subtitle"] = 'Database of the day';
			$ret["Campaign"]["Description"] = $database["Eproducts"]["Description"];
			$ret["Campaign"]["URL"] = $database["Eproducts"]["URL"];
			$ret["Campaign"]["EproductID"] = $database["Eproducts"]["EproductID"];
		}


		return $ret;
	}


}
?>