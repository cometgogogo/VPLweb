<?php
/**
 * Model class for Areas of the VPL website
 */
class Area extends AppModel
{
	var $name = 'Area';							// Name of the Model
	var $useTable = 'AreasOfVPLSite';			// Table this Model is connected to
	var $primaryKey = 'AreaID';					// Primary key column in table
	
	// One to many relationship to the AreaPage model
	var $hasMany = 	array(
							'AreaPage' =>
								array(
									'className' => 'AreaPage',
									'foreignKey' => 'AreaID',
									'order' => 'AreaPage.page_type ASC'
								)
					);
}
?>