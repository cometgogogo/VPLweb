<?php
/**
 * Model class for CurrentJobs
 */
class Job extends AppModel
{
	var $name = 'Job';			// Name of the Model
	var $useTable = 'Jobs';		// Table this Model is connected to
	var $primaryKey = 'Job_ID';	// Primary key column in table


	function countCurrentJobs() {
			$numJobs = 	"SELECT " .
					"	COUNT(*) AS count " .
					"FROM " .
					"	Jobs " .
					"WHERE " .
					"	EndDate >= CURDATE()";

			$result = $this->query($numJobs);
			$result = $result[0][0]["count"];
			return $result;
	}


}
?>