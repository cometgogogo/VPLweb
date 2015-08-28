<?php

class AdministrationInquiriesController extends AppController
{
	var $name = 'AdministrationInquiries';
	var $components = array('General');
	var $uses = array('AdministrationInquiry','Library', 'FormStats');
	//var $helpers = array('Html','List');


	function add()
		{
			$libraries_temp = $this->Library->find('list', array('conditions' => array('District !=' => 'Virtual'), 'order' => 'BranchName ASC', 'fields' => array('Library.BranchName')));

			foreach ($libraries_temp as $key => $value) {
				$libraries[$key . " "] = $value;
			}
			//$libraries = array_merge(array("empty"=>"-- please select --"), $libraries);
			$this->set('libraries',$libraries);

			$this->set("errors", false);
			$this->AdministrationInquiry->set($this->request->data);

			if (!empty($this->request->data["AdministrationInquiry"])) {
				if ($this->AdministrationInquiry->validates()){
				//if ($this->AdministrationInquiry->save($this->request->data)) {
					$to = "vpl.admin@vaughan.ca";
					//$to = "yue.sun@vaughan.ca";

					$message = "Question for VPL's Administration\n".
								"The following individual has asked a question through the \"Question for VPL's Administration\" form on the VPL Web Site:\n".
								"\n".
								"Name:  ". @$this->request->data["AdministrationInquiry"]["first_name"] . " " . @$this->data["AdministrationInquiry"]["last_name"] . "\n" .
								"Telephone:  ". @$this->request->data["AdministrationInquiry"]["telephone"] . "\n".
								"Email Address:  ". @$this->request->data["AdministrationInquiry"]["email"] . "\n".
								"Local Branch:  " . @$libraries[@$this->request->data["AdministrationInquiry"]["library"]] . "\n".
								"\n".
								"Question:\n".
								@$this->request->data["AdministrationInquiry"]["question"] . "\n";

					$Email = @$this->request->data["AdministrationInquiry"]["email"];
					$subject = "Question for VPL's Administration - " . @$libraries[@$this->request->data["AdministrationInquiry"]["library"]];
					$headers = 	"From: vpl.admin@vaughan.ca\r\nReply-To: $Email\r\n" .
								"X-Mailer: PHP/";
					$mailSuccess = @mail ( $to,  $subject, $message, $headers);
					if ($mailSuccess) {
						$this->render("confirm");
						$this->FormStats->insertStatsData(40);
					} else {
						$this->render("email_error");
					}
				}else {
					$this->set("errors", true);
				}

			}
		}


	function beforeRender() {
		//session_start();
		$this->General->setCSS();
	}


}

?>