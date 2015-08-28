<?php
class LocalStudiesController extends AppController {

var $name = 'LocalStudies';
//var $helpers = array('Html','Form', 'Javascript', 'Pagination');
var $components = array('General');
var $uses = array('Area', 'Library', 'Database','DatabaseCategory', 'Link','Subject');

 function index() {

          $this->set('page_heading', 'Jquery Tab');

//--------------Link Starts
		$broadSubjectId = 40;
		$broadSubject = $this->Subject->findBroadSubjectById($broadSubjectId);
		$area = $this->Area->findByAreaid($broadSubject["BroadSubject"]["AreaID"]);
		$criteria = "subject";
		$criteriaValue = $broadSubject["BroadSubject"]["BroadSubjectName"];
		$relevantSubjects = $this->Subject->findRelevant($area["Area"]["AreaID"], $broadSubject["BroadSubject"]["BroadSubjectID"]);

		$subjects = array();
		$specificSubjects = $this->Subject->findAllInBroadSubject($broadSubjectId);
		foreach ($specificSubjects as $specific) {
			$subjects[] = array("subjectID"=>$specific['Subject']['SpecificSubjectID'], "subjectName"=>$specific['Subject']['SpecificSubjectName'], "links"=>$this->Link->findAll($area["Area"]["AreaID"], $specific['Subject']['SpecificSubjectID'],null, null,null));

		}
		$this->set('subjects', $subjects);



//---------------Link Ends -------------


//---------------Database starts---------

//$condition = "EproductID IN (SELECT E.EproductID FROM Eproducts E, Eproduct_SiteArea ES WHERE E.EproductID=ES.EproductID AND Live='1' AND AreaID='11')";

//$this->set('databases', $this->Database->findAll($condition,null,"Name"));

		$sql = "SELECT * FROM Eproducts where EproductID IN (SELECT E.EproductID FROM Eproducts E, Eproduct_SiteArea ES WHERE E.EproductID=ES.EproductID AND Live='1' AND AreaID='11') ORDER BY Name";
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
