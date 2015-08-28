<?php

class CategoriesController extends AppController
{
	var $name = 'Categories';
	var $components = array('General');
	//var $layout = 'default';

	function index()
	{
		$this->set('categories', $this->Category->find('all'));
	}

	function view($id = null)
	{
		$this->Category->id = $id;
		$myCategory = $this->Category->read();
		$this->set('category', $myCategory);
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