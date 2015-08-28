<?php
/**
 * Model class for Bestseller Season/Year
 */
class BestsellerSeason extends AppModel
{
	var $name = 'BestsellerSeason';				// Name of the Model
	var $useTable = 'Bestsellers_Seasons';		// Table this Model is connected to
	var $primaryKey = 'SeasonID';				// Primary key column in table


	function recentSeason() {
		//$season = $this->find('first', array('fields' => array('MAX(SeasonID)')));

		//$result = $this->query("SELECT MAX( SeasonID ) AS Season FROM Bestsellers_Seasons");
		$result = $this->find('first', array('fields' => array('MAX(SeasonID) AS Season')));
		$season = $result[0]['Season'];
		return $season;
	}
}
?>