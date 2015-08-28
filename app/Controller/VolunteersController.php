<?php


//uses('sanitize');

class VolunteersController extends AppController {

	var $name = 'Volunteers';
	//var $helpers = array('Html', 'Form');

	var $components = array('General');													// Array of components this controller will use
	var $uses = array('Program','Area','Category','AgeGroup','Library','Schedule');		// Models this controller will use

function index()
	{
		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");
		//mysql_set_charset("utf8");

		//$textSearch = "volunteer";
		$textSearches = array('0' => "volunteer");

		$scheduleId = null;

		$date = null;
		$libraryId = null;
		$ageGroupId = null;
		$categoryId = null;
		$areaId = null;

		if (!isset($date)) $date = date("Y-m-d");

		if (isset($date)) { // if date conflicts with schedule, we take date

			$schedules = $this->Schedule->findLive();

			foreach($schedules as $schedule) {

				if (($schedule['id'] == $scheduleId) && (($date<$schedule['start_date']) || ($date>$schedule['end_date']))) {
					$scheduleId = null;
				}
			}
		}


		$this->Program->findByTag($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearches, $scheduleId, $date_end = null);	//Changed
//$this->Program->findByTagTest($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearches, $scheduleId, $date_end = null);	//Changed

		// Pass criteria from Model to the View
		$this->set('criteria', $this->Program->getCriteria());



		// Decide which elements to display and pass them to the View
		$relatedContentElements = array	();

		//echo "<br/>b4 big related index Memory used: ".number_format(memory_get_usage())." bytesnn<br/>";


		$this->Library->recursive = 0;
		$relatedContentElements[] = array ('event_selector', array(
																	"categories"=>$this->Category->find('list', array('conditions' => array('visible' => 1), 'order' => 'CategoryName ASC', 'fields' => array('Category.CategoryName'))),
																	"ageGroups"=>$this->AgeGroup->find('all'),
																	"libraries"=>$this->Library->find('all', array('conditions' => array('District !=' => 'Virtual')))
																	));


		//echo "<br/>after the big related index Memory used: ".number_format(memory_get_usage())." bytesnn<br/>";

		$this->set('relatedContentElements', $relatedContentElements);



		// Prioritize programs
//		$this->prioritizePrograms($programs);

		// Send programs to the view
		//$this->set('programs', $programs);
		$this->set('programs', $this->Program);	//Changed



	}

	/**
	 * Force this controller to pick up the appropriate style
	 */
	function beforeRender() {

		//session_start();
		$this->General->setCSS();
	}

}


?>