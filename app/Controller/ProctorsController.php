<?php

class ProctorsController extends AppController
{
	var $name = 'Proctors';
	var $components = array('General');
	var $uses = array('Proctor','Library', 'FormStats');

var $helpers = array('Html','Pagination');

	function add() {

			$library = new Library();
			$libraries_temp = $library->generateList("District <> 'Virtual'",'BranchName ASC', null,null,'{n}.Library.BranchName');
			foreach ($libraries_temp as $key => $value) {
				$libraries[$key . " "] = $value;
			}
			$libraries = array_merge(array("empty"=>"-- please select a branch --"), $libraries);

		$this->set("libraries", $libraries);
		$this->set("errors", false);


		if (!empty($this->data)) {
			if ($this->Proctor->save($this->data)) {
				$message = "Exam Proctoring\n\n";
				$message .= "The following individual has submitted Exam Proctoring Application Form through the VPL Web Site:\n\n";
				$message .= "Name: " . @$this->data["Proctor"]["name"]  . "\n";
				$message .= "Address:  " . @$this->data["Proctor"]["address"] . "\n";
				$message .= "Telephone: " . @$this->data["Proctor"]["telephone"] . "\n";
				$message .= "Email:  " . @$this->data["Proctor"]["email"] . "\n\n";

				$message .= "Issuing Institution:\n";
				$message .= "Institution Name: " . @$this->data["Proctor"]["school_name"]  . "\n";
				$message .= "Contact Person: " . @$this->data["Proctor"]["contact"]  . "\n";
				$message .= "Address:  " . @$this->data["Proctor"]["school_address"] . "\n";
				$message .= "Telephone: " . @$this->data["Proctor"]["school_telephone"] . "\n";
				$message .= "Email:  " . @$this->data["Proctor"]["school_email"] . "\n";
				$message .= "Fax:  " . @$this->data["Proctor"]["fax"] . "\n\n";

				$message .= "Exam Information:\n";
				$message .= "To Be Proctored At: " . @$libraries[@$this->data["Proctor"]["library"]]  . "\r\n";
				$message .= "Exam Date: " . @$this->data["Proctor"]["date"]  . "\r\n";
				$message .= "Type of Exam:  " . @$this->data["Proctor"]["type"] . "\r\n";
				$message .= "Length of Exam: " . @$this->data["Proctor"]["length"] . "\r\n";
				$message .= "Format of Exam:  " . @$this->data["Proctor"]["format"] . "\r\n";
				$message .= "Equipment Needed:  " . @$this->data["Proctor"]["equipment"] . "\n\n";

				$to = "Librarian@vaughanpl.com";
				$subject = "Exam Proctoring" . " - " . @$libraries[@$this->data["Proctor"]["library"]];
				$headers = 'From: Librarian@vaughanpl.com' . "\r\nCc: vplwebmaster@vaughan.ca\r\nReply-To: ".@$this->data["Proctor"]["email"]."\r\n" .
				"X-Mailer: PHP/\r\n";
				$mailSuccess = mail ( $to,  $subject, $message, $headers);

				if ($mailSuccess) {

					$this->render("confirm");
					$this->FormStats->insertStatsData(41);
				} else {
					$this->render("email_error");
				}

			} else {
				$this->set("errors", true);
			}
		} else {
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