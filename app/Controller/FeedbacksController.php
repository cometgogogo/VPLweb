<?php

class FeedbacksController extends AppController
{
	var $name = 'Feedbacks';
	var $components = array('General');
	var $uses = array('Feedback','Library', 'FormStats');
	//var $helpers = array('Html','Pagination');


	function add() {
		$libraries_temp = $this->Library->generateList("District <> 'Virtual'",'BranchName ASC', null,null,'{n}.Library.BranchName');
		foreach ($libraries_temp as $key => $value) {
			$libraries[$key . " "] = $value;
		}
		$libraries = array_merge(array("empty"=>"-- please select --"), $libraries);
		$this->set('libraries',$libraries);

		$this->set("errors", false);


		if (!empty($this->data)) {
			if ($this->Feedback->save($this->data)) {
				$message = "Customer Feedback\n\n";
				$message .= "The following individual has submitted feedback through the Customer Feedback form on the VPL Web Site:\n\n";
				$message .= "Name: " . @$this->data["Feedback"]["first_name"] . " " . @$this->data["Feedback"]["last_name"] . "\n";
				$message .= "Telephone: " . @$this->data["Feedback"]["telephone"] . "\n";
				$message .= "Email Address:  " . @$this->data["Feedback"]["email"] . "\n";
				$message .= "Local Branch:  " . $libraries[$this->data["Feedback"]["BranchID"]] . "\n\n";
				$message .= "Feedback:\n";
				$message .= $this->data["Feedback"]["comments"] . "\n\n";

				$to = "vpl.admin@vaughanpl.com";
				$subject = "Customer Feedback - " . $libraries[$this->data["Feedback"]["BranchID"]];
				$headers = 'From: vpl.admin@vaughanpl.com' . "\r\nReply-To: ".@$this->data["Feedback"]["email"]."\r\n" .
				"X-Mailer: PHP/\r\n";
				$mailSuccess = mail ( $to,  $subject, $message, $headers);

				if ($mailSuccess) {

					$this->render("confirm");
					$this->FormStats->insertStatsData(39);
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