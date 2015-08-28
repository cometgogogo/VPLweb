<?php
/**
 * Model class for New Arrival queries
 */
class NewArrival extends AppModel
{
	var $name = 'NewArrival';			// Name of the Model
	var $useTable = 'NewArrivalQueries';		// Table this Model is connected to
	var $primaryKey = 'ListID';	// Primary key column in table

	// One to many relationship to the NewArrivalRecord model
	var $hasMany = array('NewArrivalRecord' =>array(
									'className' => 'NewArrivalRecord',
									'order' => 'NewArrivalRecord.ListID, NewArrivalRecord.Title ASC',
									'foreignKey' => 'ListID',
										)
						);
}
?>