<?php
/**
 * Controller class for Just Returned section
 */
class JustReturnedController extends AppController
{
	var $name = 'JustReturned';					// Name of the controller
	var $components = array('General');		// Array of components this controller will use
	var $uses = array('JustReturned','JustReturnedType');		// Models this controller will use

	/**
	 * Display the home page
	 */
	function index() {

		$item_types = $this->JustReturnedType->findAll();

		foreach($item_types as $type) {
			$type_id = $type['JustReturnedType']['ItemTypeID'];
			$type_name = $type['JustReturnedType']['ItemTypeName'];
			$items = $this->JustReturned->findAllByItemtype($type_id);
			$list[] = array('ItemTypeID'=>$type_id, 'ItemTypeName'=>$type_name, 'Items'=>$items);
		}

		$this->set('list', $list);

		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"For Your Leisure","url"=>"/leisure"), array("Title"=>"New Arrivals","url"=>"/new_arrivals"), array("Title"=>"Award Winners","url"=>"/awards"), array("Title"=>"Bestseller Lists","url"=>"/bestsellers"), array("Title"=>"Your Next 5 Reads","url"=>"/next_reads")))));
		$this->set('relatedContentElements', $relatedContentElements);
	}

	function widget()
	{
		$myList = $this->JustReturned->findAll('ItemType<6');

		$this->set('list', $myList);

	}

	function widget2()
	{
		$myList = $this->JustReturned->findAll('ItemType<6');

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