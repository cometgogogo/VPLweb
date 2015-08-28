<?php
class FormStats extends AppModel
{
	var $name = 'FormStats';
	var $useTable = "SiteStatsItems";


	function insertStatsData($itemID) {
		$query = "INSERT INTO SiteStatistics (ItemID, DateReceived, TimeReceived) VALUES (".$itemID.", CURDATE(), CURTIME())";

		$result = $this->query($query);
		return $result;
	}


	function getAllItems() {
		$result = $this->query("SELECT * FROM SiteStatsItems ORDER BY ItemID");

		return $result;
	}


	function collectStats($itemid, $month, $year) {
		$result = $this->query("SELECT count(SiteStatistics.StatsID) AS count FROM SiteStatistics WHERE SiteStatistics.ItemID = $itemid AND MONTH(SiteStatistics.DateReceived)=$month AND YEAR(SiteStatistics.DateReceived)=$year");

		return $result;
	}

	// $startdate format: yyyy-mm-dd
	function collectStatsForItem($itemid, $startdate) {
		$result = $this->query("SELECT MONTH(SiteStatistics.DateReceived) AS month, count(SiteStatistics.StatsID) AS count FROM SiteStatistics WHERE SiteStatistics.ItemID = $itemid AND SiteStatistics.DateReceived>='$startdate' GROUP BY month");

		return $result;
	}

}
?>