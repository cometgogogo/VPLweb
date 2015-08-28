<?php
/**
 * Model class for Event (an actual occurrence of an event on a specific sate and time)
 */
class Event extends AppModel
{
	var $name = 'Event';				// Name of the Model
	var $useTable = 'ATL_Event_Time';	// Table this Model is connected to
}
?>