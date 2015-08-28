<?php
/**
 * Model class for Event (an event from a branch' point of view)
 */
class EventRecord extends AppModel
{
	var $name = 'EventRecord';			// Name of the Model
	var $useTable = 'ATL_Events';		// Table this Model is connected to
	var $primaryKey = 'EventID';		// Primary key on the table
	
	// Many to one relationship, linking this event to the program it belongs to
	var $belongsTo = array('Program' =>
							array(
								'className' => 'Program',
								'foreignKey' => 'ProgramID'
							)
						);
}
?>