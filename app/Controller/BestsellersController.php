<?php
/**
 * Controller class for Bestseller Lists section
 */
class BestsellersController extends AppController
{
	var $name = 'Bestsellers';					// Name of the controller
	var $components = array('General');		// Array of components this controller will use
	var $uses = array('Bestseller','BestsellerSeason');		// Models this controller will use

	/**
	 * Display the home page
	 */
	function index() {

		// display the most recent season and the previous one

		$recent_season = $this->BestsellerSeason->recentSeason();
		$this->set('recent_season', $recent_season);

		$recent_season_lists = $this->Bestseller->findListsBySeason($recent_season);
		$this->BestsellerSeason->id = $recent_season;
		$recent_season_name = $this->BestsellerSeason->field('Season');

		$prev_season_lists = $this->Bestseller->findListsBySeason($recent_season-1);
		$this->BestsellerSeason->id = $recent_season-1;
		$prev_season_name = $this->BestsellerSeason->field('Season');


		$this->set('recent_lists', $recent_season_lists);
		$this->set('recent_season', $recent_season_name);
		$this->set('prev_season', $prev_season_name);
		$this->set('prev_lists', $prev_season_lists);

		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Award Winners","url"=>"/awards"), array("Title"=>"For Your Leisure","url"=>"/leisure"), array("Title"=>"New Arrivals","url"=>"/new_arrivals"), array("Title"=>"Just Returned","url"=>"/just_returned")))));
		$this->set('relatedContentElements', $relatedContentElements);
	}

	function view($listid = null) {


		$listAttributes = $this->Bestseller->findListAttributes($listid);

		$list_name = $listAttributes['SeasonName']." Bestseller List: " .$listAttributes['AgeGroup'];

		if (isset($listAttributes['isFic'])) {

			if ($listAttributes['isFic']) { $list_name .= " Fiction"; }
			else { $list_name .= " Non-Fiction"; }
		}

		if (isset($listAttributes['Format'])) {

			$list_name .= " ".$listAttributes['Format'];
		}

		if (isset($listAttributes['isSup']) && $listAttributes['isSup']) {

			$list_name .= " Supplement";
		}



		$this->set('bestsellers', $this->Bestseller->findAllByListid($listid));
		$this->set('listName', $list_name);


		$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Award Winners","url"=>"/awards"), array("Title"=>"For Your Leisure","url"=>"/leisure"), array("Title"=>"New Arrivals","url"=>"/new_arrivals"), array("Title"=>"Just Returned","url"=>"/just_returned")))));
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