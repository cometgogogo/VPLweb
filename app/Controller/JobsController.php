<?php

class JobsController extends AppController
{
	var $name = 'Jobs';
	var $components = array('General');
	//var $scaffold;

	function index()
	{
		$this->set('numJobs', $this->Job->countCurrentJobs());
		$this->set('jobs', $this->Job->findAll("", null," order by EndDate DESC"));

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