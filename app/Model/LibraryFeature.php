<?php
class LibraryFeature extends AppModel
{
	var $name = 'LibraryFeature';
	var $useTable = 'BranchFeatures';
	var $primaryKey = 'BranchFeatureID';

	// Many to many relationship to the Library model
	var $hasAndBelongsToMany = array('Library' =>array(
									'className' => 'Library',
									'joinTable' => 'BranchFeature',
									'foreignKey' => 'BranchFeatureID',
									'associationForeignKey' => 'BranchID',
									'order' => 'Library.BranchName',
										)
						);
	
	
	
}
?>