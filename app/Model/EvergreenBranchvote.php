<?php
/**
 * Model class for Awards
 */
class EvergreenBranchvote extends AppModel
{
	var $name = 'EvergreenBranchvote';			// Name of the Model
	var $useTable = 'evergreen_branchvotes';		// Table this Model is connected to
	var $primaryKey = 'BranchID';	// Primary key column in table

	function stats() {
		$sql = "SELECT EvergreenBranchvote.BranchID, EvergreenBranchvote.VoteCount, Library.BranchName 
				FROM evergreen_branchvotes AS EvergreenBranchvote, Branches AS Library 
				WHERE EvergreenBranchvote.BranchID = Library.BranchID";
		
		return $this->query($sql);
		
	}

}
?>