<?php
/**
 * Controller class for the home page.
 */
class TodayEventsController extends AppController
{
	var $name = 'TodayEvents';												// Name of the controller
	var $components = array('General');								// Array of components this controller will use
			// Models this controller will use
var $uses = array('Program','Area','Category','AgeGroup','Library','Campaign', 'Schedule', 'TodaysSiteArea');
	/**
	 * Display the home page
	 */
	function view()
	{



		$args=func_get_args();
		$libraryId = null;

		$libraryId = @$args[0];




		// Find the programs to display and pass them to the view
		$this->Program->findByCriteria(date("Y-m-d"), $libraryId, null,null,null,null,null);
mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET NAMES utf8");
		$this->set('programs', $this->Program);
		$this->set('criteria', $this->Program->getCriteria());
		$this->set('libraryId', $libraryId);

		// Decide which elements to display and pass them to the view
		$relatedContentElements = array	();

	//$relatedContentElements[] = array ('today_display', array("programs"=>$this->Program, "criteria"=>$this->Program->getCriteria()));


	//$this->set('relatedContentElements', $relatedContentElements);
	}

	function feed($id = null)
	{
		$this->layout = 'rss';
		//$myList = $this->NewArrival->find('first', array('conditions' => array('ListID' => $id)));
		//$this->set('list', $myList);

		//$myItems = $this->NewArrivalRecord->findAllByListId($id);
		//$this->set('items', $myItems);



		$this->Program->findByCriteria(date("Y-m-d"), $id, null,null,null,null,null);

		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET NAMES utf8");

		$this->set('programs', $this->Program);
		$this->set('criteria', $this->Program->getCriteria());
		$this->set('libraryId', $id);

	}

	function kidzone_feed($id = null)
		{
			$this->layout = 'rss';

			$this->Program->findByCriteria(date("Y-m-d"), $id, '1',null,null,null,null);

			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES utf8");

			$this->set('programs', $this->Program);
			$this->set('criteria', $this->Program->getCriteria());
			$this->set('libraryId', $id);

		}

		function opac_feed($id = null)
		{
			$this->layout = 'rss';
			//$myList = $this->NewArrival->find('first', array('conditions' => array('ListID' => $id)));
			//$this->set('list', $myList);

			//$myItems = $this->NewArrivalRecord->findAllByListId($id);
			//$this->set('items', $myItems);



			$this->Program->findByCriteria(date("Y-m-d"), $id, null,null,null,null,null);

			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES utf8");

			$this->set('programs', $this->Program);
			$this->set('criteria', $this->Program->getCriteria());
			$this->set('libraryId', $id);

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