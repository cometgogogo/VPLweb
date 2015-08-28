<?php
/**
 * Model class for New Arrival records
 */
class NewArrivalRecord extends AppModel
{
	var $name = 'NewArrivalRecord';			// Name of the Model
	var $useTable = 'NewArrivalRecords';		// Table this Model is connected to
	var $primaryKey = 'BibID';	// Primary key column in table


	function findAdultBooksForWidget() {
		$result = mysql_query("SELECT * FROM NewArrivalRecords WHERE ListID=1 OR ListID=2 OR ListID=3 ORDER BY RecordModified DESC Limit 40");

		$lists = array();

		while ($myrow = mysql_fetch_array($result)) {

			$list[] = array("ListID"=>$myrow['ListID'], "BibID"=>$myrow['BibID'], "Title"=>$myrow['Title'], "AltTitle"=>$myrow['AltTitle'], "Details"=>$myrow['Details'], "ISBN"=>$myrow['ISBN'], "VideoID"=>$myrow['VideoID'], "DateUpdated"=>$myrow['DateUpdated']);

		}

		return $list;


	}

}
?>