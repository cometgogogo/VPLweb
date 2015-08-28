<?php
/**
 * Model class for Winners of a specific Award
 * The Award model has a one to many relationship defined to this model
 */
class AwardWinner extends AppModel
{
	var $name = 'AwardWinner';				// Name of the Model
	var $useTable = 'Award_winners';		// Table this Model is connected to
}
?>