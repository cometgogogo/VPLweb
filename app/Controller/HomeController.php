<?php
/**
 * Controller class for the home page.
 */
class HomeController extends AppController
{
	var $name = 'Home';												// Name of the controller
	var $components = array('General');								// Array of components this controller will use
	var $uses = array('Campaign', 'TodaysSiteArea', 'Program', 'Survey', 'SurveyData');		// Models this controller will use

	/**
	 * Display the home page
	 */
	function view($id = 1)
	{

		$this->set('votes', $this->SurveyData->findAllData(12));

		$this->set('options', $this->SurveyData->findSurveyOptions(12));

		$this->set('survey_name', $this->Survey->findBySurveyid('12'));

		if (!empty($this->data['SurveyData']['result'])) {
				if ($this->SurveyData->save($this->data)) {
					$this->SurveyData->UpdateSurveyData(12,$this->data['SurveyData']['result']);
				} else {
					$this->set("errors", true);
				}
		}



	//$todaysSiteArea = $this->TodaysSiteArea->find();
	//$this->set('todaysSiteArea', $todaysSiteArea);

		// Find the campaigns to display and pass them to the view
		//$campaigns = $this->Campaign->findAll("start_date <= '" . date("Y-m-d") . "' AND end_date >= '" . date("Y-m-d") . "'", null, "promotion_level DESC, RAND()");
		$campaigns = $this->Campaign->find('all',"start_date <= '" . date("Y-m-d") . "' AND end_date >= '" . date("Y-m-d") . "'", null, "promotion_level DESC, RAND()");
		$this->set('campaigns', $campaigns);

		// Find the programs to display and pass them to the view
		$this->Program->findByCriteria(date("Y-m-d"),null,null,null,null,null,null);
		$this->set('programs', $this->Program);
		$this->set('criteria', $this->Program->getCriteria());

		// Decide which elements to display and pass them to the view
		$relatedContentElements = array	();
		$relatedContentElements[] = array ('calendar', array("targetDate"=>date("Y-m-d")));
		//$relatedContentElements[] = array ('social_media');
		//$relatedContentElements[] = array ('blog_headlines');
	//$relatedContentElements[] = array ('tweets');
	$relatedContentElements[] = array ('today_display', array("programs"=>$this->Program, "criteria"=>$this->Program->getCriteria()));
		$relatedContentElements[] = array ('right_nav_sites');
		//$relatedContentElements[] = array ('sub_sites');
		//$relatedContentElements[] = array ('ask_on');
		//$relatedContentElements[] = array ('atl_download');

		$this->set('relatedContentElements', $relatedContentElements);
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