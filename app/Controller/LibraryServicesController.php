<?php
class LibraryServicesController extends AppController {

//var $uses=null;
var $name = 'LibraryServices';
//var $helpers = array('Html','Form','Ajax','Javascript');
var $components = array('General');

 	function index() {

          $this->set('page_heading', 'Jquery Tab');



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
