<?php

class MembershipApplicationsController extends AppController
{
	var $name = 'MembershipApplications';
	var $components = array('General');
	var $uses = array('MembershipApplication','Library', 'FormStats');
	//var $helpers = array('Html','Pagination');


	function add() {

		//$library = new library();
		$libraries_temp = $this->Library->find('list', array('conditions' => array('District !=' => 'Virtual'), 'order' => 'BranchName ASC', 'fields' => array('Library.BranchName')));
		foreach ($libraries_temp as $key => $value) {
			$libraries[$key . " "] = $value;
		}
		//$libraries = array_merge(array("empty"=>"-- please select --"), $libraries);
		$ages = array(
						"adult"=>"18 Years of Age and Older<br/>",
						"kid"=>"Less than 18 Years of Age<br/>"
						);
		$eligibilities = array(
						"resident"=>"Reside in the City of Vaughan<br/>",
						"student"=>"Attend School<br/>",
						"property"=>"Own Property in the City of Vaughan<br/>",
						"work"=>"Work in the City of Vaughan<br/>"
						);
		$previousCards = array(
						"yes"=>"Yes, I have had a Vaughan Public Libraries Card in the past",
						"no"=>"No, I have never had a Vaughan Public Libraries Card in the past"
						);

		$this->set("ages", $ages);
		$this->set("eligibilities", $eligibilities);
		$this->set("previousCards", $previousCards);
		$this->set("libraries", $libraries);
		$this->set("errors", false);
		if (empty($this->request->data)) {
			$this->request->data["MembershipApplication"]["step"] = "age";
		} else {
			if ($this->MembershipApplication->save($this->request->data)) {

				$message = "Online VPL Membership Application\n\n";
				$message .= @$this->request->data["MembershipApplication"]["first_name"] . " " . @$this->request->data["MembershipApplication"]["last_name"] . " has applied online for membership in Vaughan Public Libraries.\n\n";
				$message .= "Please ensure that the individual is eligible to obtain a VPL Library card. If this person does meet the requirements, please create a record in Virtua and prepare a Library Card for " . @$this->request->data["MembershipApplication"]["first_name"] . " " . @$this->request->data["MembershipApplication"]["last_name"] . " using the following information:\n\n";

				$message .= "First Name: " . @$this->request->data["MembershipApplication"]["first_name"] . "\n";
				$message .= "Last Name: " . @$this->request->data["MembershipApplication"]["last_name"] . "\n\n";

if (@$this->request->data["MembershipApplication"]["age"] == "kid") {
				$message .= "Age: Less than 18 Years of Age\n";
				$message .= "Parent/Guardian First Name: " . @$this->request->data["MembershipApplication"]["parent_first_name"] . "\n";
				$message .= "Parent/Guardian Last Name: " . @$this->request->data["MembershipApplication"]["parent_last_name"] . "\n\n";
}

				$message .= "Eligibility: " . @$eligibilities[@$this->request->data["MembershipApplication"]["eligibility"]] . "\n";
				if (@$this->request->data["MembershipApplication"]["eligibility"] == "work") {
					$message .= "\n An employee of City of Vaughan?: " . @$this->request->data["MembershipApplication"]["cityemployee"] . "\n";
					if (@$this->request->data["MembershipApplication"]["cityemployee"] == "yes") {
							$message .= "\n Department in City of Vaughan: " . @$this->request->data["MembershipApplication"]["city_dept"] . "\n";
					}
				}


				$message .= "\nHad a VPL Library Card in the Past: " . @$this->request->data["MembershipApplication"]["previous_card"] . "\n";

				$message .= "Local Branch: " . @$libraries[@$this->request->data["MembershipApplication"]["library"]] . "\n\n";

				$message .= "Address: " . @$this->request->data["MembershipApplication"]["address"] . "\n";
				$message .= "Suite/Apt: " . @$this->request->data["MembershipApplication"]["suite"] . "\n";
				$message .= "City: " . @$this->request->data["MembershipApplication"]["city"] . "\n";
				$message .= "Province: " . @$this->request->data["MembershipApplication"]["province"] . "\n";
				$message .= "Postal Code: " . @$this->request->data["MembershipApplication"]["postal_code"] . "\n";
				$message .= "Telephone: " . @$this->request->data["MembershipApplication"]["telephone"] . "\n";
				$Email = @$this->request->data["MembershipApplication"]["email"];
				$message .= "Email Address: " . $Email . "\n";
				$message .= "Want to receive library notices by email:	" . @$this->request->data["MembershipApplication"]["opt_in"] . "\n";
				$message .= "PIN Number: " . @$this->request->data["MembershipApplication"]["pin"] . "\n\n";

				$message .= "When you are finished preparing a card for this individual, please notify them by email at " . @$this->request->data["MembershipApplication"]["email"] . ". If the applicant is a City of Vaughan employee, please mail the card to the applicant through inter-office mail.\n\n";

				$subject = "Online VPL Membership Application - " . @$libraries[@$this->request->data["MembershipApplication"]["library"]];

				$to = "library.membership@vaughanpl.com";
				$headers = 	"From: library.membership@vaughanpl.com\r\nReply-To: $Email\r\n" .
							"X-Mailer: PHP/\r\n" .
							"Cc: vplwebmaster@vaughan.ca";

				$mailSuccess = @mail ( $to,  $subject, $message, $headers);
				if ($mailSuccess) {
					$this->render("confirm");
					$this->FormStats->insertStatsData(17);
				} else {
					$this->render("email_error");
				}

			} else {
				$invalidFields = $this->MembershipApplication->invalidFields();
				if (isset($invalidFields["age"]) || isset($_POST["change_age"])) {
					$this->request->data["MembershipApplication"]["step"] = "age";
				} else {
					$this->request->data["MembershipApplication"]["step"] = "data";
				}
				if (strpos(@$_POST["step"],$this->request->data["MembershipApplication"]["step"])===false) {
					$this->MembershipApplication->validationErrors = array();
				} else {
					$this->set("errors", true);
				}
			}
		}
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