<?php
class NewcomersController extends AppController {

//var $uses=null;
var $name = 'Newcomers';
var $helpers = array('Html','Form', 'Javascript', 'Pagination');
//var $components = array( 'RequestHandler' );
var $components = array('General');
var $uses = array('Program','Area','Category','AgeGroup','Library','Schedule', 'Database','DatabaseCategory', 'Link','Subject', 'MultilingualCollection');

 function index() {

          $this->set('page_heading', 'Jquery Tab');
//-----------Program starts here-------------------

		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET NAMES utf8");
		mysql_set_charset("utf8");

		$textSearches = array('0'=>"esl", '1'=>"newcomer");
		$scheduleId = null;

		$date = null;
		$libraryId = null;
		$ageGroupId = null;
		$categoryId = null;
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


		$this->Program->findByTag($date, $libraryId, $ageGroupId, $categoryId, $areaId, $textSearches, $scheduleId, $date_end = null);	//Changed

		$this->set('criteria', $this->Program->getCriteria());

		$relatedContentElements = array	();

		$this->Library->recursive = 0;
		$relatedContentElements[] = array ('event_selector', array(
																	"categories"=>$this->Category->generateList("visible",'CategoryName ASC', null,null,'{n}.Category.CategoryName'),
																	"ageGroups"=>$this->AgeGroup->findAll(),
																	"libraries"=>$this->Library->findAll("District <> 'Virtual'")
																	));

		$this->set('relatedContentElements', $relatedContentElements);
		$this->set('programs', $this->Program);	//Changed
//-----------Program ends here --------------

//-----------Multilingual Collection Starts ----
		$lans = $this->MultilingualCollection->findLan();

		While($lan = mysql_fetch_array($lans)){

			$locations = $this->MultilingualCollection->findLocByLan($lan[0]);

			while($loc = mysql_fetch_array($locations)){

				$cols = $this->MultilingualCollection->findAllByLanLoc($lan[0], $loc[0]);
				//$branch = $this->MultilingualCollection->get_location($loc[0]);

				$details[] = array('Location'=>$loc[1], 'Collection'=>$cols, 'BranchID'=>$loc[0]);
				unset($branch);

			}

		$list[] = array('Language'=>$lan[0], 'Detail'=>$details );
		unset($details);
		}

		$this->set('list', $list);




//-----------Multilingual Ends -------------

//--------------Link Starts
		// Populate default criteria variables
		$subject = null;
		$subjectId = null;
		$broadSubject = null;
		$broadSubjectId = null;
		$area = null;
		$areaId = null;
		$criteria = null;
		$criteriaValue = "";
		$relevantSubjects = null;
		$keywords = null;

		$condition = null;						// SQL condition to limit results found
		$paginationBaseUrl = "/links/index";	// base url for page hyperlinks
		$page = 0;								// page # to be displayed

		// Retrieve url arguments

		// Initialize criteria variables from url arguments


		//$subjectId = array('0' => "500", '1' => "61");
		//$subject = $this->Subject->findBySubjectids($subjectId);

		$subjectId = 500;
		$subject = $this->Subject->findBySpecificsubjectid($subjectId);
		$broadSubject = $this->Subject->findBroadSubjectById($subject["Subject"]["BroadSubjectID"]);
		$area = $this->Area->findByAreaid($broadSubject["BroadSubject"]["AreaID"]);

		$esl_subject = $this->Subject->findBySpecificsubjectid(61);
		$esl_broadSubject = $this->Subject->findBroadSubjectById($esl_subject["Subject"]["BroadSubjectID"]);
		$esl_area = $this->Area->findByAreaid($esl_broadSubject["BroadSubject"]["AreaID"]);

		//$criteria = "subject";
		//$criteriaValue = $subject["Subject"]["SpecificSubjectName"];
		//$relevantSubjects = $this->Subject->findRelevant($area["Area"]["AreaID"], $broadSubject["BroadSubject"]["BroadSubjectID"]);




		/* Unless an area of the site is specified, use the "Recommended links" area
		if (empty($area)) {
			$area = $this->Area->findByAreaid(1);
			$areaId = $area["Area"]["AreaID"];
			$criteria = "area";
			$criteriaValue = $area["Area"]["AreaName"];
			$relevantSubjects = $this->Subject->findRelevant($area["Area"]["AreaID"]);
		}

		// Keyword search criteria comes from http post, not url
		if (isset($_POST["keywords"])) {
			$keywords .= $_POST["keywords"];
			$paginationBaseUrl .= "/keywords/" . $keywords;
		}
*/
		// Pass criteria and pagination details to View

		$this->set('links', $this->Link->findAll($areaId, $subjectId, $broadSubjectId, $keywords,$page));
		$this->set('esl_links', $this->Link->findAll($esl_areaId, 61, $esl_broadSubjectId, $keywords,$page));
	//	$this->set('totalLinks', $this->Link->findCount());
	//	$this->set('paginationBaseUrl', $paginationBaseUrl);
	//	$this->set('page', $page);
	//	$this->set('criteria', $criteria);
	//	$this->set('criteriaValue', $criteriaValue);
	//	$this->set('broadSubject',$broadSubject);
	//	$this->set('subject',$subject);
	//	$this->set('area',$area);

		// Decide which elements to display and pass them to the View
		//$relatedContentElements = array	();
		//if ($area["Area"]["AreaTypeID"] == 1) $relatedContentElements[] = array ('collection_navigation', array("area"=>$area));
		//if ($broadSubjectId == 101) //$relatedContentElements[] = array ('bloom_navigation', array());
		//$relatedContentElements[] = array ('subject_areas', array("relevantSubjects"=>$relevantSubjects,"currentBroadSubjectID"=>$broadSubject["BroadSubject"]["BroadSubjectID"],"currentSubjectID"=>$subject["Subject"]["SpecificSubjectID"]));
		//$this->set('relatedContentElements', $relatedContentElements);
//---------------Link Ends -------------


//---------------Database starts---------

$condition = "EproductID IN (SELECT E.EproductID FROM Eproducts E, Eproduct_SiteArea ES WHERE E.EproductID=ES.EproductID AND Live='1' AND (AreaID='25' OR AreaID='24'))";
//$area = $this->Area->findByAreaid(25);
//$this->set('collection', $area);
//if ($area["Area"]["AreaID"] != 3) $db_relatedContentElements[] = array ('collection_navigation', array("area"=>$area));
$this->set('databases', $this->Database->findAll($condition,null,"Name"));
//$this->set('db_relatedContentElements', $db_relatedContentElements);




//---------------Database Ends-------

	}
}
?>
