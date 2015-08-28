<?php
class TodaysSiteArea extends AppModel
{
	var $name = 'TodaysSiteArea';
	var $useTable = false;


	function find() {
		$sql = 	"SELECT COUNT(*) AS how_many FROM AreasOfVPLSite WHERE Image is NOT NULL";
		$howMany = $this->query($sql);
		$limit = floor(mktime()/86400) % $howMany[0][0]["how_many"];
		//$sql = 	"SELECT AreaName,URL,AreaID,Image,Description FROM AreasOfVPLSite WHERE Image is NOT NULL ORDER BY AreaID LIMIT " . $limit . ", 1";
$sql = 	"SELECT AreaName,URL,AreaID,Image,Description FROM AreasOfVPLSite WHERE Image is NOT NULL AND AreaID='3'";

		$ret = array("Campaign"=>array());
		foreach ($this->query($sql) as $site) {
			$ret["Campaign"]["Name"] = $site["AreasOfVPLSite"]["AreaName"];
			$ret["Campaign"]["Image"] = $site["AreasOfVPLSite"]["Image"];
			$ret["Campaign"]["Subtitle"] = 'Site Area of the Day';
			$ret["Campaign"]["URL"] = $site["AreasOfVPLSite"]["URL"];
			$ret["Campaign"]["AreaID"] = $site["AreasOfVPLSite"]["AreaID"];
			$ret["Campaign"]["Description"] = $site["AreasOfVPLSite"]["Description"];
		}


		return $ret;
	}


}
?>