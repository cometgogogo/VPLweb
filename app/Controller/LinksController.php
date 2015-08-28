<?php
/**
 * Controller class for Recommended links
 */
class LinksController extends AppController
{
	var $name = 'Links';							// Name of the controller
	var $components = array('General');				// Array of components this controller will use
	var $uses = array('Link','Subject','Area');		// Models this controller will use
	var $helpers = array('Html','Pagination');		// Helpers this controller will use

	/**
	 * Display a list of links based on criteria secified by url arguments
	 */
	function index()
	{
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
		$page = 1;								// page # to be displayed

		// Retrieve url arguments
		$args=func_get_args();

		// Initialize criteria variables from url arguments
		if (isset($args[0])) {
			$i=0;
			while ($i<count($args)) {
				switch ($args[$i]) {
					case "collection":
						$areaId = @$args[$i+1];
						$area = $this->Area->findByAreaid($areaId);
						$criteria = "collection";
						$criteriaValue = $area["Area"]["AreaName"];
						$relevantSubjects = $this->Subject->findRelevant($area["Area"]["AreaID"]);
						break;
					case "broad_subject":
						$broadSubjectId = @$args[$i+1];
						$broadSubject = $this->Subject->findBroadSubjectById($broadSubjectId);
						$area = $this->Area->findByAreaid($broadSubject["BroadSubject"]["AreaID"]);
						$criteria = "subject";
						$criteriaValue = $broadSubject["BroadSubject"]["BroadSubjectName"];
						$relevantSubjects = $this->Subject->findRelevant($area["Area"]["AreaID"], $broadSubject["BroadSubject"]["BroadSubjectID"]);
						break;
					case "subject":
						$subjectId = @$args[$i+1];
						$subject = $this->Subject->findBySpecificsubjectid($subjectId);
						$broadSubject = $this->Subject->findBroadSubjectById($subject["Subject"]["BroadSubjectID"]);
						$area = $this->Area->findByAreaid($broadSubject["BroadSubject"]["AreaID"]);
						$criteria = "subject";
						$criteriaValue = $subject["Subject"]["SpecificSubjectName"];
						$relevantSubjects = $this->Subject->findRelevant($area["Area"]["AreaID"], $broadSubject["BroadSubject"]["BroadSubjectID"]);
						break;
					case "keywords":
						$keywords = @$args[$i+1];
						break;
					default:
				}
				if (is_numeric($args[$i])) {
					$page = $args[$i];
				} else {
					$paginationBaseUrl .= "/" . $args[$i] . "/" . @$args[$i+1];
				}
				$i += 2;
			}
		}

		// Unless an area of the site is specified, use the "Recommended links" area
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

		// Pass criteria and pagination details to View
		$this->set('links', $this->Link->findAll($areaId, $subjectId, $broadSubjectId, $keywords,$page));
		$this->set('totalLinks', $this->Link->findCount());
		$this->set('paginationBaseUrl', $paginationBaseUrl);
		$this->set('page', $page);
		$this->set('criteria', $criteria);
		$this->set('criteriaValue', $criteriaValue);
		$this->set('broadSubject',$broadSubject);
		$this->set('subject',$subject);
		$this->set('area',$area);

		// Decide which elements to display and pass them to the View
		$relatedContentElements = array	();
		if ($area["Area"]["AreaTypeID"] == 1) $relatedContentElements[] = array ('collection_navigation', array("area"=>$area));
		//if ($broadSubjectId == 101) //$relatedContentElements[] = array ('bloom_navigation', array());
		$relatedContentElements[] = array ('subject_areas', array("relevantSubjects"=>$relevantSubjects,"currentBroadSubjectID"=>$broadSubject["BroadSubject"]["BroadSubjectID"],"currentSubjectID"=>$subject["Subject"]["SpecificSubjectID"]));
		$this->set('relatedContentElements', $relatedContentElements);
	}

	/**
	 * Display details of a Recommended link
	 */
	function view($id = null)
	{
		$this->Link->id = $id;
		$myLink = $this->Link->read();
		$this->set('link', $myLink);
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