<?php

class AwardsController extends AppController
{
	var $name = 'Awards';
	var $components = array('General');
	//var $scaffold;

	function index()
	{
		$this->set('awards', $this->Award->find('all'));

		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Literature Resources","url"=>"/databases/index/category/10"), array("Title"=>"Online Book Clubs","url"=>"/databases/view/chapter"), array("Title"=>"Books for Book Clubs","url"=>"/library_services#club"),array("Title"=>"Book Chat Programs ","url"=>"/programs/index/category/3")))));
		$this->set('relatedContentElements', $relatedContentElements);

	}

	function view($id = null)
	{
		$this->Award->id = $id;

		$this->set('award', $this->Award->findByAwardid($id));
		//$this->set('myWinners', $this->Award->findAwardWinners($id));

		$myCategories = $this->Award->findAwardCategories($id);
		foreach($myCategories as $cat) {

				$winners = $this->Award->findAwardWinnersByCat($id, $cat['year'], $cat['CatID']);
				$list[] = array('year'=>$cat['year'], 'CatID'=>$cat['CatID'], 'Category'=>$cat['Category'], 'winners'=>$winners);

		}

		$this->set('myWinners2', $list);

		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Literature Resources","url"=>"/databases/index/category/10"), array("Title"=>"Online Book Clubs","url"=>"/databases/view/chapter"), array("Title"=>"Books for Book Clubs","url"=>"/library_services#club"),array("Title"=>"Book Chat Programs ","url"=>"/programs/index/category/3")))));
		$this->set('relatedContentElements', $relatedContentElements);


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