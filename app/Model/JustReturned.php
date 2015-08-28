<?php
/**
 * Model class for JustReturned records
 */
class JustReturned extends AppModel
{
	var $name = 'JustReturned';			// Name of the Model
	var $useTable = 'JustReturned';		// Table this Model is connected to
	var $primaryKey = 'BibID';	// Primary key column in table

	function findItemClasses() {

		$sql = 	"SELECT DISTINCT Item_Class FROM JustReturned";

		$types = array();

		foreach ($this->query($sql) as $type) {

			$types[] = $type['JustReturned']['Item_Class'];

		}

		return $types;
	}
}
?>