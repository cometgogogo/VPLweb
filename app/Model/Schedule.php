<?php
/**
 * Model class for ATL_Schedule
 */
class Schedule extends AppModel
{
	var $name = 'Schedule';				// Name of the Model
	var $useTable = 'ATL_Schedule';	// Table this Model is connected to

	function findLive() {
		$sql = 	"SELECT * FROM ATL_Schedule WHERE EndDate>=CURDATE()";

		$schedules = array();

		foreach ($this->query($sql) as $schedule) {

			$schedules[] = array("id"=>$schedule['ATL_Schedule']['ScheduleID'], "start_date"=>$schedule['ATL_Schedule']['StartDate'], "end_date"=>$schedule['ATL_Schedule']['EndDate']);

		}

		return $schedules;

	}
}
?>