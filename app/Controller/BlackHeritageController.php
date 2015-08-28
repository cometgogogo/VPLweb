<?php
class BlackHeritageController extends AppController {

//var $uses=null;
var $name = 'BlackHeritage';
//var $helpers = array('Html','Form', 'Javascript', 'Pagination','Habtm');
//var $components = array( 'RequestHandler' );
var $components = array('General');
var $uses = array('Program','Area','Category','AgeGroup','Library','Schedule', 'Database','DatabaseCategory', 'Link','Subject','FormStats');


 function index() {

          $this->set('page_heading', 'Jquery Tab');
//-----------Program starts here-------------------

		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");
		//mysql_set_charset("utf8");

		$textSearch = "";
		$scheduleId = null;

		$date = null;
		$libraryId = null;
		$ageGroupId = null;
		$categoryId = '26';
		$areaId = null;

		if (!isset($date)) $date = date("Y-m-d");

		if (isset($date)) { // if date conflicts with schedule, we take date

			$schedules = $this->Schedule->findLive();

			foreach($schedules as $schedule) {

				if (($schedule['id'] == $scheduleId) && (($date<$schedule['start_date']) || ($date>$schedule['end_date']))) {
					$scheduleId = null;
				}
			}
		}


		$this->Program->findByCriteria($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearch, $scheduleId, $date_end = null);


		$this->set('criteria', $this->Program->getCriteria());

		$relatedContentElements = array	();

		$this->Library->recursive = 0;
		$relatedContentElements[] = array ('event_selector', array(
																	"categories"=>$this->Category->find('list', array('conditions' => array('visible' => 1), 'order' => 'CategoryName ASC', 'fields' => array('Category.CategoryName'))),
																	"ageGroups"=>$this->AgeGroup->find('all'),
																	"libraries"=>$this->Library->find('all', array('conditions' => array('District !=' => 'Virtual')))
																	));

		$this->set('relatedContentElements', $relatedContentElements);
		$this->set('programs', $this->Program);	//Changed
//-----------Program ends here --------------




//--------------Link Starts
		// Populate default criteria variables
		$subject = null;
		$subjectId = null;
		$broadSubject = null;
		$broadSubjectId = null;
		$area = null;
		$areaId = '4';
		$criteria = null;
		$criteriaValue = "";
		$relevantSubjects = null;
		$keywords = null;

		$condition = null;						// SQL condition to limit results found
		$paginationBaseUrl = "/links/index";	// base url for page hyperlinks
		$page = 0;

		$area = $this->Area->findByAreaid($areaId);
		$criteria = "collection";
		$criteriaValue = $area["Area"]["AreaName"];
		$relevantSubjects = $this->Subject->findRelevant($area["Area"]["AreaID"]);

		$this->set('links', $this->Link->findAll($areaId, $subjectId, $broadSubjectId, $keywords,$page));
		$this->set('area', $area);

//---------------Link Ends -------------


//---------------Database starts---------


		//$area = $this->Area->findByAreaid(25);
		//$this->set('collection', $area);
		//if ($area["Area"]["AreaID"] != 3) $db_relatedContentElements[] = array ('collection_navigation', array("area"=>$area));
		$sql = "SELECT * FROM Eproducts where EproductID IN (SELECT E.EproductID FROM Eproducts E, Eproduct_SiteArea ES WHERE E.EproductID=ES.EproductID AND Live='1' AND (AreaID='4')) ORDER BY Name";
		$query = $this->Database->query($sql);
		$this->set('databases', $query);


		//$this->set('db_relatedContentElements', $db_relatedContentElements);




//---------------Database Ends-------



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
