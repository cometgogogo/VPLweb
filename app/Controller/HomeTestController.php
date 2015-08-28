<?php
/**
 * Controller class for the home page.
 */
class HomeTestController extends AppController
{
	var $name = 'HomeTest';												// Name of the controller
	var $components = array('General');								// Array of components this controller will use
	var $uses = array('Campaign', 'TodaysSiteArea', 'Program', 'Survey', 'SurveyData');		// Models this controller will use

	/**
	 * Display the home page
	 */
	function view($id = 1)
	{
$this->set('page_heading', 'Jquery Tab');

		// Find the programs to display and pass them to the view
		$this->Program->findByCriteria(null,null,null,null,null,null,'32',null);


	$this->set('programs', $this->Program);
		$this->set('criteria', $this->Program->getCriteria());

		// Decide which elements to display and pass them to the view
		$relatedContentElements = array	();
		$relatedContentElements[] = array ('calendar', array("targetDate"=>date("Y-m-d")));

	//$relatedContentElements[] = array ('tweets');
	$relatedContentElements[] = array ('today_test', array("programs"=>$this->Program, "criteria"=>$this->Program->getCriteria()));
		$relatedContentElements[] = array ('right_nav_sites');


		$this->set('relatedContentElements', $relatedContentElements);
	}



	/**
	 * Force this controller to pick up the appropriate style
	 */
	function beforeRender() {

		//session_start();
		$this->General->setCSS();
	}

function getScheduleType($program) {

	if ((!isset($program['Event']['date']) || substr($program['Event']['date'],8,2) == "00") || ($program['Event']['date'] != $program['Event']['end_date'])) {
		return "period";
	} elseif (isset($program['Event']['date']) && (substr($program['Event']['date'],8,2) != "00") && ($program['Event']['date'] == $program['Event']['end_date'])) {
		return "date";
	} else {
		return "other";
	}
}

}

?>