<?php

class MultilingualsController extends AppController
{
	var $name = 'Multilinguals';
	var $components = array('General');
	var $uses = array('Multilingual','Library', 'FormStats');

var $helpers = array('Html','Pagination','Habtm');

	function add() {

			$library = new Library();
			$libraries_temp = $library->generateList("District <> 'Virtual'",'BranchName ASC', null,null,'{n}.Library.BranchName');
			foreach ($libraries_temp as $key => $value) {
				$libraries[$key . " "] = $value;
			}
			$libraries = array_merge(array("empty"=>"-- please select a branch --"), $libraries);

		$this->set("libraries", $libraries);

$language = array("Arabic"=>"Arabic", "Bulgarian"=>"Bulgarian", "Cantonese"=>"Cantonese", "Croatian"=>"Croatian", "Farsi"=>"Farsi", "French"=>"French", "German"=>"German", "Gujarati"=>"Gujarati", "Hebrew"=>"Hebrew", "Hindi"=>"Hindi", "Illocano"=>"Illocano", "Italian"=>"Italian", "Japanese"=>"Japanese", "Kannada"=>"Kannada", "Korean"=>"Korean", "Malayalam"=>"Malayalam", "Mandarin"=>"Mandarin", "Panjabi"=>"Panjabi", "Polish"=>"Polish", "Portuguese"=>"Portuguese", "Russian"=>"Russian", "Serbian"=>"Serbian", "Sign Language"=>"Sign Language", "Spanish"=>"Spanish", "Tagalog"=>"Tagalog", "Tamil"=>"Tamil", "Tulu"=>"Tulu", "Ukrainian"=>"Ukrainian", "Urdu"=>"Urdu", "Vietnamese"=>"Vietnamese");

$this->set("language", $language);

		$this->set("errors", false);


		if (!empty($this->data)) {

			if ($this->Multilingual->save($this->data)) {

				$message = "Multilingual Services Request Form\n\n";

				$message .= "The following individual has submitted Multilingual Services Request Form through the VPL Web Site:\n\n";
				$message .= "Name: " . @$this->data["Multilingual"]["name"]  . "\n";
				$message .= "Home Phone: " . @$this->data["Multilingual"]["homephone"] . "\n";
				$message .= "Library Card Number: " . @$this->data["Multilingual"]["card_number"] . "\n\n";

				$app_temps = @$this->data["Multilingual"]["language"];
				$message .= "Language(s): ";
				foreach($app_temps as $app_temp){
								$message .= $app_temp . "\n";

				}

				$message .= "\nHow may we help you: " . @$this->data["Multilingual"]["help"] . "\n\n";



				$message .= "Home branch: " . @$libraries[@$this->data["Multilingual"]["library"]] . "\n\n";


				//$to = "Librarian@vaughanpl.com";
				$to = "mingcong.wu@vaughan.ca"; //for testing
				$subject = "Multilingual Services Request Form" . " - " . @$libraries[@$this->data["Multilingual"]["library"]];
				//$headers = 'From: Librarian@vaughanpl.com' . "\r\nCc: vplwebmaster@vaughan.ca\r\nReply-To: ".@$this->data["Multilingual"]["email"]."\r\n" .
				$headers = 'From: Librarian@vaughanpl.com' . "\r\nReply-To: ".@$this->data["Multilingual"]["email"]."\r\n" .
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