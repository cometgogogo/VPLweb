<?php
/**
 * Model class for Bestseller records
 */
class Bestseller extends AppModel
{
	var $name = 'Bestseller';			// Name of the Model
	var $useTable = 'Bestsellers';		// Table this Model is connected to
	var $primaryKey = 'ItemID';	// Primary key column in table

	function recentList() {
		$listID = 1;

		if ($result = $this->query("SELECT MAX( ListID ) AS max FROM Bestsellers")) {
		/*if ($myrow = mysql_fetch_array($result)) {
			$listID = $myrow[0];
		}*/
			$listID = $result[0][0];
		}

		return $listID;
	}

	function isFictionList($listID) {

		$result = $this->query("SELECT Distinct isFiction FROM Bestsellers WHERE ListID='$listID'");
		/*
		if ($myrow = mysql_fetch_array($result)) {
			return $myrow[0];
		} else {
			return null;
		}*/
		return $result[0][0];

	}


	function findListAttributes($listID) {

		$sql = "SELECT Distinct Bestsellers.isFiction, Bestsellers.Format, Bestsellers.SeasonYear, Bestsellers.AgeGroup, Bestsellers.Supplement, Bestsellers_Seasons.Season AS SeasonName FROM Bestsellers INNER JOIN Bestsellers_Seasons ON Bestsellers_Seasons.SeasonID = Bestsellers.SeasonYear WHERE Bestsellers.ListID='$listID'";

		foreach ($this->query($sql) as $myrow) {
			return array("ListID"=>$listID, "isFic"=>$myrow['Bestsellers']['isFiction'], "Format"=>$myrow['Bestsellers']['Format'], "AgeGroup"=>$myrow['Bestsellers']['AgeGroup'], "isSup"=>$myrow['Bestsellers']['Supplement'], "SeasonName"=>$myrow['Bestsellers_Seasons']['SeasonName']);;

		}
		return null;

	}

	function findSeasonByList($listID) {
		$season = "";
		$result = $this->query("SELECT Distinct SeasonYear FROM Bestsellers WHERE ListID='$listID'");

		//if ($myrow = mysql_fetch_array($result)) {
		//	$season = $myrow[0];
		//}
		return $result[0][0];
	}

	function findListsBySeason($season) {
		$sql = "SELECT Distinct Bestsellers.ListID, Bestsellers.isFiction, Bestsellers.Format, Bestsellers.AgeGroup, Bestsellers.Supplement, Bestsellers_Seasons.Season AS SeasonName FROM Bestsellers INNER JOIN Bestsellers_Seasons ON Bestsellers_Seasons.SeasonID = Bestsellers.SeasonYear WHERE SeasonYear = '$season' ORDER BY AgeGroup";

		$list = array();

		foreach ($this->query($sql) as $myrow) {

			$list[] = array("ListID"=>$myrow['Bestsellers']['ListID'], "isFic"=>$myrow['Bestsellers']['isFiction'], "Format"=>$myrow['Bestsellers']['Format'], "AgeGroup"=>$myrow['Bestsellers']['AgeGroup'], "isSup"=>$myrow['Bestsellers']['Supplement'], "SeasonName"=>$myrow['Bestsellers_Seasons']['SeasonName']);

		}

		return $list;
	}

	function findAllByListid($listID) {
		$sql = "SELECT * FROM Bestsellers WHERE ListID='$listID' ORDER BY Author";

		$list = array();

		foreach ($this->query($sql) as $myrow) {
			$list[] = array("Author"=>$myrow['Bestsellers']['Author'], "BibID"=>$myrow['Bestsellers']['BibID'], "Title"=>$myrow['Bestsellers']['Title'], "ISBN"=>$myrow['Bestsellers']['ISBN'], "CallNumber"=>$myrow['Bestsellers']['CallNumber']);

		}

		return $list;
	}

}
?>