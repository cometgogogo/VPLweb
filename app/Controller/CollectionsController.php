<?php

class CollectionsController extends AppController
{
	var $name = 'Collections';
	var $uses = array('Link','Subject','Area');
	var $components = array('General');
	var $helpers = array('Html','Pagination');


	function index() {$this->setArea(null);}

	function access_kyoto() { $this->setArea(2); }
	function access_kyoto_guides() { $this->setArea(2); }


	function adult_literacy() { $this->setArea(12); }
	function adult_literacy_program() { $this->setArea(12); }

	function black_heritage() { $this->setArea(4); }
	function black_heritage_guides() { $this->setArea(4); }

	function business_access() { $this->setArea(3); }
	function business_access_research() { $this->setArea(3); }
	function business_access_guides() { $this->setArea(3); }
	function business_access_book_club() { $this->setArea(3); }

	function cinema() { $this->setArea(14); }
	function cinema_guides() { $this->setArea(14); }

	function local_studies() { $this->setArea(11); }
	function local_studies_guides() { $this->setArea(11); }
	function villages_to_city() { $this->setArea(11); }

	function multilingual() { $this->setArea(20); }
	function new_comer() { $this->setArea(25); }

	function government_doc() {
		$this->setArea(21);
		$this->getGovLinks();

	}

	function professional_collection() { $this->setArea(22); }

	function esl() { $this->setArea(24); }
	function esl_program() { $this->setArea(24); }
	function esl_guides() { $this->setArea(24); }

	function setArea($id) {
		$myArea = $this->Area->findByAreaid($id);
		$this->set('area', $myArea);
		$relatedContentElements = array	(array ('collection_navigation', array("area"=>$myArea)));
		$this->set('relatedContentElements', $relatedContentElements);
	}


function getGovLinks()
	{

		$myLinks = $this->Link->findAll(1, 488, 24, '',1);
		// Pass criteria and pagination details to View
		$this->set('links', $myLinks);
		$this->set('totalLinks', $this->Link->findCount());

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