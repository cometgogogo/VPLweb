<?php

class ElibrarianInquiriesController extends AppController
{
	var $name = 'ElibrarianInquiries';
	var $components = array('General');
	var $uses = array('ElibrarianInquiry','Library', 'FormStats');
	//var $helpers = array('Html','List');


	function add()
		{
			//$libraries_temp = $this->Library->generateList(null,'BranchName ASC', null,null,'{n}.Library.BranchName');
			$libraries_temp = $this->Library->generateList("District <> 'Virtual'",'BranchName ASC', null,null,'{n}.Library.BranchName');
			foreach ($libraries_temp as $key => $value) {
				$libraries[$key . " "] = $value;
			}
			$libraries = array_merge(array("empty"=>"-- please select --"), $libraries);
			$this->set('libraries',$libraries);

			$this->set("errors", false);

			if (!empty($this->data)) {
				if ($this->ElibrarianInquiry->save($this->data)) {
					$to = "vplwebmaster@vaughan.ca";
					$message = "Question for VPL's ELibrarian\n\n".
								"The following individual has asked a question through the \"Contact VPL ELibrarian\" form on the VPL Web Site:\n".
								"\n".
								"Name:  ". @$this->data["ElibrarianInquiry"]["first_name"] . " " . @$this->data["ElibrarianInquiry"]["last_name"] . "\n" .
								"Telephone:  ". @$this->data["ElibrarianInquiry"]["telephone"] . "\n".
								"Email Address:  ". @$this->data["ElibrarianInquiry"]["email"] . "\n".
								"Local Branch:  " . @$libraries[@$this->data["ElibrarianInquiry"]["library"]] . "\n".
								"\n".
								"Question:\n".
								@$this->data["ElibrarianInquiry"]["question"] . "\n";

					$Email = @$this->data["ElibrarianInquiry"]["email"];
					$subject = "Question for VPL's ELibrarian - " . @$libraries[@$this->data["ElibrarianInquiry"]["library"]];
					$headers = 	"From: vplwebmaster@vaughan.ca\r\nReply-To: $Email\r\n" .
								"X-Mailer: PHP/";
					$mailSuccess = @mail ( $to,  $subject, $message, $headers);
					if ($mailSuccess) {
						$this->render("confirm");
						$this->FormStats->insertStatsData(1);
					} else {
						$this->render("email_error");
					}
				} else {
					$this->set("errors", true);
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