<?php

/**
* Example controller for the Calendar Helper
*
*	Copyright 2008 John Elliott
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
*
*
* @author John Elliott
* @copyright 2008 John Elliott
* @link http://www.flipflops.org More Information
* @license			http://www.opensource.org/licenses/mit-license.php The MIT License
*
*/

uses('sanitize');

class EventsCalendarsController extends AppController {

	var $name = 'EventsCalendars';
	var $helpers = array('Html', 'Form', 'Calendar');

	var $components = array('General');													// Array of components this controller will use
	var $uses = array('Program','Area','Category','AgeGroup','Library','Schedule');		// Models this controller will use

	function getScheduleType($program) {

		if ((!isset($program['Event']['date']) || substr($program['Event']['date'],8,2) == "00") || ($program['Event']['date'] != $program['Event']['end_date'])) {
			return "period";
		} elseif (isset($program['Event']['date']) && (substr($program['Event']['date'],8,2) != "00") && ($program['Event']['date'] == $program['Event']['end_date'])) {
			return "date";
		} else {
			return "other";
		}
	}


function calendar($year = null, $month = null){

//------------------calendar start --------------------------
		$this->Calendar_Event->recursive = 0;

		$month_list = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		$day_list = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
		$base_url = $this->webroot . 'calendar_events/eventcalendar'; // NOT not used in the current helper version but used in the data array
		$view_base_url = $this->webroot. 'calendar_events';


// Retrieve url arguments
		$args=func_get_args();

		// Populate default criteria variables
		$condition = null;
		$date = null;
		$libraryId = null;
		$ageGroupId = null;
		$categoryId = null;
		$areaId = null;
		$scheduleId = null;

		// Initialize criteria variables from url arguments
		if (isset($args[0])) {
			$i=0;
			while ($i<count($args)) {
				switch ($args[$i]) {
					case "library":
						$libraryId = @$args[$i+1];
						//echo $libraryId;
						break;
					case "selected_events":
						$libraryId = @$_POST["library"];
						break;
					default:
						$year = @$args[$i];
						$month = @$args[$i+1];
				}
				$i += 2;
			}
		}
if (!is_numeric($libraryId)) {$libraryId = null; }

if(!$year || !$month) {
	$year = date('Y');
	$month = date('F');
	$month_num = date('n');
	$item = null;
}
$tax =0;
$flag = 0;

for($i = 0; $i < 12; $i++) { // check the month is valid if set
	//if(strtolower($month) == $month_list[$i]) {
	if(strtolower($month) == strtolower($month_list[$i])) {
		if(intval($year) != 0) {
			$flag = 1;
			$month_num = $i + 1;
			$month_name = $month_list[$i];
			break;
		}
	}
}

if($flag == 0) { // if no date set, then use the default values
	$year = date('Y');
	$month = date('M');
	$month_name = date('F');
	$month_num = date('m');
				}

$date = date("Y-m-d", mktime(0, 0, 0, $month_num, 1, $year));
$date_end = date("Y-m-d", mktime(0, 0, 0, $month_num+1, 0, $year));


		// Eliminate inappropriate url arguments just in case user writes them manually
		if (!is_numeric($libraryId)) {$libraryId = null; }
		if (!is_numeric($ageGroupId)) {$ageGroupId = null; }
		if (!is_numeric($categoryId)) {$categoryId = null; }
		if (empty($textSearch)) {$textSearch = null; }
		if (!is_numeric($areaId)) {$areaId = null; }
		if (!isset($date)) $date = date("Y-m-d");

		if (isset($date)) { // if date conflicts with schedule, we take date

			$schedules = $this->Schedule->findLive();

			foreach($schedules as $schedule) {
				if (($schedule['id'] == $scheduleId) && (($date<$schedule['start_date']) || ($date>$schedule['end_date']))) {
					$scheduleId = null;
				}
			}
		}
		$this->set('schedules', $schedules);

		// Get programs from the Model

		if($date_end == "one"){$date_end = $date;} //display the programs on a specific day

		$this->Program->findByCriteria($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearch, $scheduleId, $date_end);	//Changed


		// Pass criteria from Model to the View
		$this->set('criteria', $this->Program->getCriteria());


$this->Library->id = $libraryId;

		$this->Library->recursive = 0;

		$relatedContentElements = array	();
		$relatedContentElements[] = array ('calendar_selector', array("libraries"=>$this->Library->findAll("District <> 'Virtual'")
																	));

		//$relatedContentElements[] = array ('library_events_index', array("events"=>$this->Library->nextEvents()));


	//	$relatedContentElements[] = array ('related_pages', array("pages"=>array(array("Title"=>"All programs @ VPL","url"=>"/programs/index/"))));

		$this->set('relatedContentElements', $relatedContentElements);

		$data = null;
		$ongoings = null;
		$program = $this->Program->getNextProgram();
		$days_in_month = date("t", mktime(0, 0, 0, $month_num, 1, $year));


			 if ($program) {
				$currentScheduleType = "";
				$currentProgramId = -99;
				while ($program) {
//echo  $program['Program']['name']."---";
		//	$i = 0;
					$newScheduleType = $this->getScheduleType($program);
				//	$i++;
					$currentScheduleType = $newScheduleType;


					switch ($currentScheduleType) {
						case "date":
								$currentDate = $program['Event']['date'];
							//echo $currentDate."--in date";
							$displayTime = 	"";
if (isset($program['Event']['time']) && $program['Event']['time'] != "00:00:00") $displayTime .= date("g:i A ",strtotime('2000-01-01'.$program['Event']['time'])) . " to " . date("g:i A ",strtotime('2000-01-01 '.$program['Event']['end_time']));



								while ($program && $this->getScheduleType($program) == "date" && $program['Event']['date'] == $currentDate) {

									$day = intval(substr($currentDate, 8 , 2));

									$data[$day] .= '<br /><a href="/programs/view/'. $program['Program']['id'] . '" title="' . $displayTime . '
' . $program['Library']['name'] . '" >'. $program['Program']['name'] . '</a>';

									$program = $this->Program->getNextProgram();

									//$i++;
								}

							break;
						case "period":

							$currentProgramId = $program['Program']['id'];

							while ($program && $this->getScheduleType($program) == "period" && $program['Program']['id'] == $currentProgramId) {

							  foreach ($program['EventSlots'] as $slot) {
								$displayTime = 	"";
								if(!isset($slot['day_of_week'])){
										$ongoings[] = $program;
									}else{

									if (isset($slot['time']) && $slot['time'] != "00:00:00") $displayTime .= date("g:i A ",strtotime('2000-01-01 '.$slot['time'])) . " to " . date("g:i A ",strtotime('2000-01-01 '.$slot['end_time']));


										for ($j =1; $j <= $days_in_month; $j++){
											$currentdayofweek = date('l', mktime(0, 0, 0, $month_num, $j, $year));
											$currentdate = date('Y-m-d', mktime(0, 0, 0, $month_num, $j, $year));
											 if ($currentdayofweek == $slot['day_of_week'] && (empty($slot['date']) || substr($slot['date'],8,2) == "00" || ($currentdate >= $slot['date'] && $currentdate <= $slot['end_date']))){
												$data[$j] .= '<br /><a href="/programs/view/'. $program['Program']['id'] . '" title="' . $displayTime . '
' . $program['Library']['name'] . '" >' . $program['Program']['name'] . '</a>';

											 }
										}
									}
							}//end for
								$program = $this->Program->getNextProgram();

							}//end while


							break;

						//--- end of 2012--2-29--------/
						default:
							$ongoings[] = $program;
							$program = $this->Program->getNextProgram();

							//$i++;
							break;
					} // end switch
				}//end while
	 }//end if



//-----------Calendar -------
		$this->set('year', $year);
		$this->set('month', $month);
		$this->set('branch', $libraryId);
		$this->set('data', $data);
$this->set('ongoings', $ongoings);
		//$this->set('relatedContentElements', $relatedContentElements);
//echo $tax . "****" . $i . "****";
	}


}


?>