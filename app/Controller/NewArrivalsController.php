<?php
/**
 * Controller class for New Arrivals section
 */
class NewArrivalsController extends AppController
{
	var $name = 'NewArrivals';					// Name of the controller
	var $uses = array('NewArrival', 'NewArrivalRecord');
	var $components = array('General', 'xml');		// Array of components this controller will use

	/**
	 * Display the home page
	 */
	function index() {
		$this->layout = 'new_arrivals';
		if (isset($this->new_arrivals)) {
			unset($this->new_arrivals);
		}

		$this->set('new_arrivals', $this->NewArrival->findAllByVisible(1));

		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"How to subscribe to the lists?","url"=>"/about/faqs#q12"), array("Title"=>"Just Returned","url"=>"/just_returned"), array("Title"=>"Your Next 5 Reads","url"=>"/next_reads"), array("Title"=>"Bestseller Lists","url"=>"/bestsellers"), array("Title"=>"Online Book Clubs","url"=>"/databases/view/chapter"), array("Title"=>"Book Chat Programs ","url"=>"/programs/index/category/3")))));
		$this->set('relatedContentElements', $relatedContentElements);
	}


	function view($id = null)
	{
		$this->NewArrival->id = $id;
		$myList = $this->NewArrival->read();
		$this->set('list', $myList);

		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"How to subscribe to the lists?","url"=>"/about/faqs#q12"), array("Title"=>"Just Returned","url"=>"/just_returned"), array("Title"=>"Award Winners","url"=>"/awards"), array("Title"=>"Bestseller Lists","url"=>"/materials/bestsellers"), array("Title"=>"Online Book Clubs","url"=>"/databases/view/chapter"), array("Title"=>"Book Chat Programs ","url"=>"/programs/index/category/3")))));
		$this->set('relatedContentElements', $relatedContentElements);
	}

	/*function widget()
	{
		$myList1 = $this->NewArrivalRecord->findAllByListid(1, array(), array('NewArrivalRecord.BibID' => 'desc'),12);
		$myList2 = $this->NewArrivalRecord->findAllByListid(2, array(), array('NewArrivalRecord.BibID' => 'desc'),12);
		$myList3 = $this->NewArrivalRecord->findAllByListid(3, array(), array('NewArrivalRecord.BibID' => 'desc'),12);

		$list = array();
		foreach($myList1 as $record1) {
			array_push($list, $record1);
		}
		foreach($myList2 as $record2) {
			array_push($list, $record2);
		}
		foreach($myList3 as $record3) {
			array_push($list, $record3);
		}
		$this->set('list', $list);
		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"How to subscribe to the lists?","url"=>"/about/faqs#q12"), array("Title"=>"Just Returned","url"=>"/just_returned"), array("Title"=>"Award Winners","url"=>"/awards"), array("Title"=>"Bestseller Lists","url"=>"/materials/bestsellers"), array("Title"=>"Online Book Clubs","url"=>"/databases/view/chapter"), array("Title"=>"Book Chat Programs ","url"=>"/programs/index/category/3")))));
		$this->set('relatedContentElements', $relatedContentElements);
	}*/

	function widget()
	{

		$list = $this->NewArrivalRecord->findAdultBooksForWidget();

		$this->set('list', $list);
		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"How to subscribe to the lists?","url"=>"/about/faqs#q12"), array("Title"=>"Just Returned","url"=>"/just_returned"), array("Title"=>"Award Winners","url"=>"/awards"), array("Title"=>"Bestseller Lists","url"=>"/materials/bestsellers"), array("Title"=>"Online Book Clubs","url"=>"/databases/view/chapter"), array("Title"=>"Book Chat Programs ","url"=>"/programs/index/category/3")))));
		$this->set('relatedContentElements', $relatedContentElements);
	}


	function record($bib = null)
	{
		$this->set('bib_id', $bib);
	}

	function feed($id = null)
	{
		$this->layout = 'rss';
		//$myList = $this->NewArrival->find('first', array('conditions' => array('ListID' => $id)));
		//$this->set('list', $myList);

		//$myItems = $this->NewArrivalRecord->findAllByListId($id);
		//$this->set('items', $myItems);

		$this->NewArrival->id = $id;
		$myList = $this->NewArrival->read();
		$this->set('list', $myList);

	}

	function opac_feed($id = null)
	{
		$this->layout = 'rss';
		$this->NewArrival->id = $id;
		$myList = $this->NewArrival->read();
		$this->set('list', $myList);


	}

	function opac_feed_2($id = null)
	{
		$this->layout = 'rss';
		$this->NewArrival->id = $id;
		$myList = $this->NewArrival->read();
		$this->set('list', $myList);


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