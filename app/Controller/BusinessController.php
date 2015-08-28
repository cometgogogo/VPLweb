<?php
class BusinessController extends AppController {

//var $uses=null;
var $name = 'Business';
//var $helpers = array('Html','Form', 'Javascript', 'Pagination','Habtm');
//var $components = array( 'RequestHandler' );
var $components = array('General');
var $uses = array('Program','Area','Category','AgeGroup','Library','Schedule', 'Database','DatabaseCategory', 'Link','Subject', 'MultilingualCollection', 'NewArrival', 'NewArrivalRecord', 'BusinessWorkshop', 'FormStats');


 function index() {

          $this->set('page_heading', 'Jquery Tab');
//-----------Program starts here-------------------

		//mysql_query("SET CHARACTER SET utf8");
		//mysql_query("SET NAMES utf8");
		//mysql_set_charset("utf8");

		$textSearches = array('0'=>"business");
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
																	"categories"=>$this->Category->find('list', array('conditions' => array('visible' => 1), 'order' => 'CategoryName ASC', 'fields' => array('Category.CategoryName'))),
																	"ageGroups"=>$this->AgeGroup->find('all'),
																	"libraries"=>$this->Library->find('all', array('conditions' => array('District !=' => 'Virtual')))
																	));

		$this->set('relatedContentElements', $relatedContentElements);
		$this->set('programs', $this->Program);	//Changed


//-----------Program ends here --------------
//---------------New Arrival starts---------

		$this->NewArrival->id = 31;
		$myList = $this->NewArrival->read();
		$this->set('list', $myList);


//---------------New Arrival Ends-------



//--------------Link Starts
		// Populate default criteria variables

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

		$broadSubjectId = 135;
		$broadSubject = $this->Subject->findBroadSubjectById($broadSubjectId);
		$area = $this->Area->findByAreaid($broadSubject["BroadSubject"]["AreaID"]);
		$criteria = "subject";
		$criteriaValue = $broadSubject["BroadSubject"]["BroadSubjectName"];
		$relevantSubjects = $this->Subject->findRelevant($area["Area"]["AreaID"], $broadSubject["BroadSubject"]["BroadSubjectID"]);

		$subjects = array();
		$specificSubjects = $this->Subject->findAllInBroadSubject($broadSubjectId);
		foreach ($specificSubjects as $specific) {
			$subjects[] = array("subjectID"=>$specific['Subject']['SpecificSubjectID'], "subjectName"=>$specific['Subject']['SpecificSubjectName'], "links"=>$this->Link->findAll($areaId, $specific['Subject']['SpecificSubjectID'],null, $keywords,$page));

		}
		$this->set('subjects', $subjects);

//---------------Link Ends -------------


//---------------Database starts---------

		//$condition = "EproductID IN (SELECT E.EproductID FROM Eproducts E, Eproduct_SiteArea ES WHERE E.EproductID=ES.EproductID AND Live='1' AND (AreaID='3'))";
		//$area = $this->Area->findByAreaid(25);
		//$this->set('collection', $area);
		//if ($area["Area"]["AreaID"] != 3) $db_relatedContentElements[] = array ('collection_navigation', array("area"=>$area));
		//$this->set('databases', $this->Database->findAll($condition,null,"Name"));
		//$this->set('db_relatedContentElements', $db_relatedContentElements);

		$sql = "SELECT * FROM Eproducts where EproductID IN (SELECT E.EproductID FROM Eproducts E, Eproduct_SiteArea ES WHERE E.EproductID=ES.EproductID AND Live='1' AND (AreaID='3')) ORDER BY Name";
		$query = $this->Database->query($sql);
		$this->set('databases', $query);




//---------------Database Ends-------

//---------------Workshop starts---------

	$library = new Library();

	$libraries_temp = $this->Library->find('list', array('conditions' => array('District !=' => 'Virtual'), 'order' => 'BranchName ASC', 'fields' => array('Library.BranchName')));
	foreach ($libraries_temp as $key => $value) {
		$libraries[$key . " "] = $value;
	}
	//$libraries = array_merge(array("empty"=>"-- please select a branch --"), $libraries);

	$this->set("libraries", $libraries);

	$time_slot = array("Daytime"=>"Daytime", "Evenings"=>"Evenings", "Weekends"=>"Weekends");

	$this->set("time_slot", $time_slot);

	$source = array("VBEC"=>"VBEC", "What'sOn_Magazine"=>"What'sOn Magazine", "Poster_in_library"=>"Poster in library", "Staff_referral"=>"Staff referral", "Community_event"=>"Community event", "Other"=>"Other");

	$this->set("source", $source);
	$this->set("errors", false);
	$this->BusinessWorkshop->set($this->request->data);


	if (!empty($this->request->data["BusinessWorkshop"])) {

		if ($this->BusinessWorkshop->validates()) {

			$message = "";

			$message .= "The following individual has submitted One-On-One Company and Industry Information Workshop Request Form through the VPL Web Site:\n\n";
			$message .= "Name: " . @$this->request->data["BusinessWorkshop"]["name"]  . "\n";
			$message .= "Phone Number: " . @$this->request->data["BusinessWorkshop"]["homephone"] . "\n";
			$message .= "Email: " . @$this->request->data["BusinessWorkshop"]["email"] . "\n\n";
			$message .= "Home branch: " . @$libraries[@$this->request->data["BusinessWorkshop"]["library"]] . "\n";


			$app_temps = @$this->request->data["BusinessWorkshop"]["time_slot"];

			$message .= "Time slot(s): ";
			foreach($app_temps as $app_temp){
							$message .= $app_temp . " ";

			}
			$message .= "\n\n";

			$message .= "\nFor what kind of information are you looking?\n" . @$this->request->data["BusinessWorkshop"]["help"] . "\n";

			$message .= "\nDo you require this information for a business plan? " . @$this->request->data["BusinessWorkshop"]["plan"] . "\n";

			unset($app_temps);

			$app_temps = @$this->request->data["BusinessWorkshop"]["source"];
			$message .= "\nHow did you find out about this program?\n";
			foreach($app_temps as $app_temp){
							$message .= $app_temp . "\n";

			}

			unset($app_temps);
			$to = "melanie.raymond@vaughan.ca";
		//$to = "mingcong.wu@vaughan.ca"; //for testing
			//$to = "yue.sun@vaughan.ca"; //for testing

			$subject = "One-On-One Company and Industry Information Workshop Request Form";
			//$headers = 'From: Librarian@vaughanpl.com' . "\r\nCc: elibrarian@vaughanpl.com\r\nReply-To: ".@$this->request->data["BusinessWorkshop"]["email"]."\r\n" .
			$headers = 'From: Librarian@vaughan.ca' . "\r\nReply-To: ".@$this->request->data["BusinessWorkshop"]["email"]."\r\n" .
			"X-Mailer: PHP/\r\n";
			$mailSuccess = mail ( $to,  $subject, $message, $headers);

			if ($mailSuccess) {

				$this->render("confirm");
			//	$this->FormStats->insertStatsData(41);
			} else {
				$this->render("email_error");
			}

		} else {
			$this->set("errors", true);
		}
	} else {
	}




//---------------Workshop Ends-------

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
