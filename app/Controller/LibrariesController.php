<?php
/**
 * Controller class for Libraries.
 */
class LibrariesController extends AppController
{
	var $name = 'Libraries';				// Name of the controller
	var $components = array('General');		// Array of components this controller will use

	/**
	 * Display a list of Libraries
	 */
	function index() {

		// To improve performance we disable the Category->Events association that retrieves all programs
		unset($this->Library->hasMany['Event']);

		// Pass data to the view

		//$this->set('libraries', $this->Library->find('all',array('conditions' => array('District !=' => 'Virtual'), 'order' => 'BranchName ASC', 'fields' => array('Library.BranchName'))));
		$this->Library->hasMany['Event'];
		$this->Library->hasAndBelongsToMany['LibraryFeature'];
		$this->Library->find('all',array('conditions' => array('District !=' => 'Virtual'), 'order' => 'BranchName ASC', 'fields' => array('Library.BranchName')));

		//$log = $this->Library->getDataSource()->getLog(false,false);
		//debug($log);
		echo debug($libraries);



/*$this->set('libraries', $this->Library->findAll(array('conditions'=>array( "District" => "<> Virtual"),
												'fields'=>'BranchID',
                        'order'=>'BranchID ASC',
                        'limit'=>20,
                        'recursive'=>0)));

*/

		// Decide which elements to display and pass them to the view
		$relatedContentElements = array	();
		$relatedContentElements[] = array ('excerpt', array("excerpt"=>"<b>VPL's Vision Statement:</b><br/>Enrich&nbsp;&nbsp;&nbsp;Inspire&nbsp;&nbsp;&nbsp;Transform<b><br/><br/>VPL's Mission:</b><br/>Vaughan Public Libraries offer welcoming destinations that educate, excite and empower our community."));
		$this->set('relatedContentElements', $relatedContentElements);
	}


	/**
	 * Display details of a Library
	 */
	function view($id = null)
	{
		// Retrieve url arguments
		$args = func_get_args();

		// Initialize Library data
		$this->Library->id = $id;
		$myLibrary = $this->Library->read();

		// Pass data to the view
		$this->set('library', $myLibrary);
		$this->set('details', $this->Library->getDetails());
		if (@is_numeric($args[1])) {
			$this->set('currentPicture', $args[1] - 1);
		} else {
			$this->set('currentPicture', 0);
		}

		// Decide which elements to display and pass them to the view
		$relatedContentElements = array	();
		$relatedContentElements[] = array ('related_pages', array("pages"=>array(
																				array("Title"=>"Holiday Hours","url"=>"/about/holiday_hours"),
																				array("Title"=>"Join the Library","url"=>"/services/membership"),
																				array("Title"=>"Email Librarian","url"=>"/email_librarian"),
																				array("Title"=>"Suggest an Item for Purchase","url"=>"/email_librarian/add/purchase")
																				)));
		if($this->Library->id != '10') $relatedContentElements[] = array ('library_events_index', array("events"=>$this->Library->nextEvents()));
		$this->set('relatedContentElements', $relatedContentElements);
	}

	/**
	 * Display map of libraries
	 */
	function map() {
	}

	function map2() {
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