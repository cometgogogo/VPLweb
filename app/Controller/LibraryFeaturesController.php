<?php
/**
 * Controller class for Library features.
 */
class LibraryFeaturesController extends AppController
{
	var $name = 'LibraryFeatures';			// Name of the controller
	var $components = array('General');		// Array of components this controller will use

	/**
	 * Display a list of Library features
	 */
	function index() {

		// Pass data to the view
		$this->set('libraryFeatures', $this->LibraryFeature->findAll());

		// Decide which elements to display and pass them to the view
		$relatedContentElements = array	();
		$relatedContentElements[] = array ('related_pages', array("pages"=>array(
																				array("Title"=>"Libraries and Hours","url"=>"/libraries"),
																				array("Title"=>"Library Services","url"=>"/services/special"),
																				array("Title"=>"Service Charges","url"=>"/services/service_charges"),
																				array("Title"=>"Borrowing Materials","url"=>"/services/borrowing")
																				)));
		$this->set('relatedContentElements', $relatedContentElements);
	}


	/**
	 * Display details of a Feature
	 */
	function view($id = null)
	{
		// Initialize Feature data
		$this->LibraryFeature->id = $id;
		$myLibraryFeature = $this->LibraryFeature->read();

		// Pass data to the view
		$this->set('LibraryFeature', $myLibraryFeature);

		// Decide which elements to display and pass them to the view
		$relatedContentElements = array	();
		$relatedContentElements[] = array ('related_pages', array("pages"=>array(
																				array("Title"=>"Libraries and Hours","url"=>"/libraries"),
																				array("Title"=>"Library Services","url"=>"/services/special"),
																				array("Title"=>"Service Charges","url"=>"/services/service_charges"),
																				array("Title"=>"Borrowing Materials","url"=>"/services/borrowing")
																				)));
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