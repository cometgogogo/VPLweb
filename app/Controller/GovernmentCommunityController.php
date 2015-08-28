<?php
class GovernmentCommunityController extends AppController {

var $name = 'GovernmentCommunity';
//var $helpers = array('Html','Form', 'Javascript', 'Pagination');
var $components = array('General');
var $uses = array('Area', 'Library', 'Database','DatabaseCategory', 'Link','Subject');

 function index() {

          $this->set('page_heading', 'Jquery Tab');

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


		$broadSubjectId = 24;
		$broadSubject = $this->Subject->findBroadSubjectById($broadSubjectId);
		$area = $this->Area->findByAreaid($broadSubject["BroadSubject"]["AreaID"]);
		$criteria = "subject";
		$criteriaValue = $broadSubject["BroadSubject"]["BroadSubjectName"];
		//$relevantSubjects = $this->Subject->findRelevantLinks($area["Area"]["AreaID"], $broadSubject["BroadSubject"]["BroadSubjectID"]);




		$this->set('links', $this->Link->findAllGroupBySubject($areaId, $subjectId, $broadSubjectId, $keywords,$page));



//---------------Link Ends -------------


//---------------Database starts---------

//$condition = "EproductID IN (SELECT E.EproductID FROM Eproducts E, Eproduct_Category EC WHERE E.EproductID=EC.EproductID AND Live='1' AND CategoryID='6')";

$this->set('category', $this->DatabaseCategory->findByCategoryid(5,array("CategoryName"),null,0));
//$this->set('databases', $this->Database->findAll($condition,null,"Name"));


$sql = "SELECT * FROM Eproducts where EproductID IN (SELECT E.EproductID FROM Eproducts E, Eproduct_Category EC WHERE E.EproductID=EC.EproductID AND Live='1' AND CategoryID='6')";

$query = $this->Database->query($sql);

$this->set('databases', $query);

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
