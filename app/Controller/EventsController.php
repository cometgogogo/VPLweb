<?php

class EventsController extends AppController 
{
	var $name = 'Events';
	var $components = array('General');
	//var $scaffold;

	function index($library = null, $category = null, $program = null) 
	{
		$this->set('events', $this->Event->findAll());
	}

	function view($id = null)
	{
		$this->Event->id = $id;
		$myEvent = $this->Event->read();
		$this->set('event', $myEvent);
	}

	function search($query) {
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