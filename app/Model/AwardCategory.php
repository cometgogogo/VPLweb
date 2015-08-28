<?php
/**
 * Model class for Categoriess of a specific Award
 * The Award model has a one to many relationship defined to this model
 */
class AwardCategory extends AppModel
{
	var $name = 'AwardCategory';				// Name of the Model
	var $useTable = 'Award_Categories';		// Table this Model is connected to
}
?>