<?php
/**
 * Model class for Campaigns
 */
class Campaign extends AppModel
{
	var $name = 'Campaign';				// Name of the Model
	var $useTable = 'Campaigns';		// Table this Model is connected to
	var $primaryKey = 'CampaignID';		// Primary key column in table
}
?>