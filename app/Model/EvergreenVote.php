<?php
/**
 * Model class for Awards
 */
class EvergreenVote extends AppModel
{
	var $name = 'EvergreenVote';			// Name of the Model
	var $useTable = 'evergreen_votes';		// Table this Model is connected to
	var $primaryKey = 'ItemID';	// Primary key column in table

	function afterSave() {
	
		unset($this->data);
	
	}

}
?>