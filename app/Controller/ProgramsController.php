<?php
/**
 * Controller class for Programs
 */
class ProgramsController extends AppController
{
	var $name = 'Programs';																// Name of the controller
	var $components = array('General');													// Array of components this controller will use
	var $uses = array('Program','Area','Category','AgeGroup','Library','Campaign', 'Schedule');		// Models this controller will use


	/**
	 * Display a list of Programs based on criteria secified by url arguments
	 */
	function index()
	{
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
						break;
					case "age_group":
						$ageGroupId = @$args[$i+1];
						break;
					case "category":
						$categoryId = @$args[$i+1];
						break;
					case "collection":
						$areaId = @$args[$i+1];
						break;
					case "area":
						$areaId = @$args[$i+1];
						break;
					case "schedule":
						$scheduleId = @$args[$i+1];
						break;
					case "keyword":
						$textSearch = @$args[$i+1];
						break;
					case "selected_events":
						$libraryId = @$_POST["library"];
						$ageGroupId = @$_POST["age_group"];
						$categoryId = @$_POST["category"];
						$textSearch = @$_POST["text_search"];
						break;
					default:
						$date = @$args[$i];
						$date_end = @$args[$i+1];
						$this->set('date_arg', true);
				}
				$i += 2;
			}
		}
		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET NAMES utf8");

		// Eliminate inappropriate url arguments just in case user writes them manually
		if (!is_numeric($libraryId)) {$libraryId = null; }
		if (!is_numeric($ageGroupId)) {$ageGroupId = null; }
		if (!is_numeric($categoryId)) {$categoryId = null; }
		if (empty($textSearch)) {$textSearch = null; }
		if (!is_numeric($areaId)) {$areaId = null; }
		if (!isset($date)) { $date = date("Y-m-d"); $this->set('date_arg', false);}

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
		//$programs = $this->Program->findByCriteria($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearch);

		if($date_end == "one"){$date_end = $date;} //display the programs on a specific day

		$this->Program->findByCriteria($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearch, $scheduleId, $date_end);	//Changed


		// Pass criteria from Model to the View
		$this->set('criteria', $this->Program->getCriteria());



		// Decide which elements to display and pass them to the View
		$relatedContentElements = array	();
		//if ($categoryId == 16) $relatedContentElements[] = array ('bloom_navigation', array());
		if ($areaId == 16) $relatedContentElements[] = array ('winterlights_navigation', array());
		$relatedContentElements[] = array ('calendar', array("targetDate"=>$date));

		//echo "<br/>b4 big related index Memory used: ".number_format(memory_get_usage())." bytesnn<br/>";


		$this->Library->recursive = 0;
		$relatedContentElements[] = array ('event_selector', array(
																	"categories"=>$this->Category->generateList("visible",'CategoryName ASC', null,null,'{n}.Category.CategoryName'),
																	"ageGroups"=>$this->AgeGroup->findAll(),
																	"libraries"=>$this->Library->findAll("District <> 'Virtual'")
																	));

		/*$relatedContentElements[] = array ('calendar_selector', array("libraries"=>$this->Library->findAll("District <> 'Virtual'")
																	));
		*/

		//echo "<br/>after the big related index Memory used: ".number_format(memory_get_usage())." bytesnn<br/>";
		$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/makerkit_sidebar.jpg","width"=>"200", "height"=>"257", "title"=>"Maker Kits", "link"=>"/services/maker_kit", "target"=>"self")));
		$relatedContentElements[] = array ('atl_download');

		$this->set('relatedContentElements', $relatedContentElements);



		// Prioritize programs
//		$this->prioritizePrograms($programs);

		// Send programs to the view
		//$this->set('programs', $programs);
		$this->set('programs', $this->Program);	//Changed

	}

	/**
	 * Display details of a Program
	 */
	function view($id = null)
	{

		// To improve performance we disable the Cat->Event association that retrieves all programs
		unset($this->Program->Category->hasMany['Event']);

		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET NAMES utf8");

		// Initialize Program data
		$this->Program->id = $id;
		$myProgram = $this->Program->read();

		// Pass data to the view
		$this->set('program', $myProgram);
		$this->set('id', $id);

		// Decide which elements to display and pass them to the view
		$relatedContentElements = array	();
		$relatedContentElements[] = array ('calendar', array("targetDate"=>null));
		$relatedContentElements[] = array ('category_program_index', array("categories"=>$myProgram['Category'], "summary"=>true));
		$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/makerkit_sidebar.jpg","width"=>"200", "height"=>"257", "title"=>"Maker Kits", "link"=>"/services/maker_kit", "target"=>"self")));
		$relatedContentElements[] = array ('atl_download');
		$this->set('relatedContentElements', $relatedContentElements);
	}


	/**
	 * Force this controller to pick up the appropriate style
	 */
	function beforeRender() {
		//session_start();
		$this->General->setCSS();
	}


	/**
	 * Assigns top priorities to the list of programs and adjusts the list accordingly
	 */
	function prioritizePrograms(& $programs) {

		// Include Cake's core library for data Sanitization
		uses('sanitize');

		// Do not process an empty list of Programs
		if (count($programs)==0) return;

		// Instantiate Sanitize
		$sanitize = new Sanitize();

		// Initialization
		$priorityPrograms = array();
		$currentDate = $programs[0]['Event']['date'];

		// Process programs within the current date only
		for ($i=0; $i<count($programs) && $programs[$i]['Event']['date'] == $currentDate; $i++) {

			// Sanitize (remove html from description)
			$programs[$i]['Program']['description'] = substr($sanitize->html($programs[$i]['Details']['preffix'] . $programs[$i]['Program']['description'] . $programs[$i]['Details']['suffix'], true),0,340);

			// Decide which image to use and use image to boost priority
			if(!empty($programs[$i]['Details']['image'])) {
				$programs[$i]['Program']['image'] = $programs[$i]['Details']['image'];
				$programs[$i]['Priority'] = 10;
			} else {
				$programs[$i]['Priority'] = 0;
			}

			// Add an element of randomness to the prioritization
			$programs[$i]['Priority'] += rand(0,9);

			// Keep track of the top priority programs (just array index reference)
			if (!isset($priorityPrograms[0]) || $programs[$i]['Priority'] > $programs[$priorityPrograms[0]]['Priority']) {
				if (isset($priorityPrograms[1])) $priorityPrograms[2] = $priorityPrograms[1];
				$priorityPrograms[0] = $i;
			} elseif (!isset($priorityPrograms[1]) || $programs[$i]['Priority'] > $programs[$priorityPrograms[1]]['Priority']) {
				if (isset($priorityPrograms[1])) $priorityPrograms[2] = $priorityPrograms[1];
				$priorityPrograms[1] = $i;
			} elseif (!isset($priorityPrograms[2]) || $programs[$i]['Priority'] > $programs[$priorityPrograms[2]]['Priority']) {
				$priorityPrograms[2] = $i;
			}
		}

		// Create array of top programs, these will be added at the top of the program list at the end of this method
		$topPrograms = array();
		for ($i=0; $i<count($priorityPrograms); $i++) {
			$topPrograms[$i] = $programs[$priorityPrograms[$i]];
		}

		// Unset top programs from their original position in the list
		unset($programs[$priorityPrograms[0]]);
		if (isset($priorityPrograms[1])) unset($programs[$priorityPrograms[1]]);
		if (isset($priorityPrograms[2])) unset($programs[$priorityPrograms[2]]);

		// Insert top programs at the top of the list
		array_splice($programs, 0, 0, $topPrograms);
	}
}

?>