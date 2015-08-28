<?php

class EmailLibrarianController extends AppController
{
	var $name = 'EmailLibrarian';
	var $components = array('General');
	var $uses = array('EmailLibrarian','Library', 'FormStats');
	var $helpers = array('Html','Pagination');


	function add() {

		$library = new Library();
		$libraries_temp = $library->generateList("District <> 'Virtual'",'BranchName ASC', null,null,'{n}.Library.BranchName');
		foreach ($libraries_temp as $key => $value) {
			$libraries[$key . " "] = $value;
		}
		$libraries = array_merge(array("empty"=>"-- please select --"), $libraries);
		$purposes = array(
						"information"=>"ask for research assistance or suggestions on what to read next.<br />",
						/*"business"=>"search for business, industry, commerce and technology information.<br />",*/
						"catalogue"=>"get help with the online catalogue.<br />",
						"account"=>"ask a question about my library account.<br />",
						"purchase"=>"recommend an item I would like to see added to Vaughan Public Libraries collection.<br />",
						"technical"=>"send technical issues relating to this site.<br />",
						"ebook"=>"get help with ebooks.<br />",);
		$subjects = array(
						"information"=>"Email Librarian",
						/*"business"=>"Question for VPL's Business Services Librarian",*/
						"catalogue"=>"Email Librarian",
						"account"=>"Question about my library account",
						"technical"=>"Technical Issues",
						"ebook"=>"OverDrive questions",
						"purchase"=>"Suggest an Item for Purchase",
						);
		$this->set("purposes", $purposes);
		$this->set("libraries", $libraries);
		$age_levels = array("empty"=>"-- please select --",
							"preschool"=>"Preschool",
							"primary"=>"Primary (Grades 1-3)",
							"elementary"=>"Elementary (Grades 4-8)",
							"secondary"=>"Secondary (Grades 9-12)",
							"university"=>"College/University",
							"adult"=>"Adult"
							);
		$this->set("age_levels", $age_levels);
		$item_types = array("empty"=>"-- please select --",
							"book"=>"Book",
							"book_cd"=>"Audiobook",
							"cd"=>"Music CD",
							"dvd"=>"DVD",
							"blu_ray"=>"Blu-Ray",
							"ebook"=>"eBook",
							"eaudio_book"=>"eAudiobook"
							);
		$this->set("item_types", $item_types);
		$this->set("errors", false);
		if (empty($this->data)) {
			$args = func_get_args();
			$this->set("pageTitle", @$args[0]);
			if (@$args[0]=="purchase") {
				$this->data["EmailLibrarian"]["purpose"] = "purchase";
				$this->data["EmailLibrarian"]["step"] = "data";
			} elseif (@$args[0]=="information") {
				$this->data["EmailLibrarian"]["purpose"] = "information";
				$this->data["EmailLibrarian"]["step"] = "data";
			} elseif (@$args[0]=="business") {
				$this->data["EmailLibrarian"]["purpose"] = "business";
				$this->data["EmailLibrarian"]["step"] = "data";
			} elseif (@$args[0]=="account") {
				$this->data["EmailLibrarian"]["purpose"] = "account";
				$this->data["EmailLibrarian"]["step"] = "data";
			} elseif (@$args[0]=="technical") {
				$this->data["EmailLibrarian"]["purpose"] = "technical";
				$this->data["EmailLibrarian"]["step"] = "data";
			} elseif (@$args[0]=="ebook") {
				$this->data["EmailLibrarian"]["purpose"] = "ebook";
				$this->data["EmailLibrarian"]["step"] = "data";
			} elseif (@$args[0]=="catalogue") {
				$this->data["EmailLibrarian"]["purpose"] = "catalogue";
				$this->data["EmailLibrarian"]["step"] = "data";
			} else {
				$this->data["EmailLibrarian"]["step"] = "purpose";
				$this->set("pageTitle", "Email Librarian");
			}


		} else {
$this->set("pageTitle", "Email Librarian");
			if (!empty($this->data["EmailLibrarian"]["purpose"])) $this->data["EmailLibrarian"]["step"] = "data";
			if ($this->EmailLibrarian->save($this->data))
			{
				$message = $subjects[$this->data["EmailLibrarian"]["purpose"]] . "\n\n";

				if (($this->data["EmailLibrarian"]["purpose"] == "information") || ($this->data["EmailLibrarian"]["purpose"] == "catalogue")) {
					$message .= "The following individual has asked a question through the 'Email Librarian - Reference/Information' online form:\n\n";
				}
				if ($this->data["EmailLibrarian"]["purpose"] == "account") {
					$message .= "The following individual has asked a question through VPL's website:\n\n";
				}

				if ($this->data["EmailLibrarian"]["purpose"] == "technical") {
					$message .= "The following individual has asked a question through VPL's website:\n\n";
				}

				$message .= "Email: " . @$this->data["EmailLibrarian"]["email"] . "\n" .
							"First name: " . @$this->data["EmailLibrarian"]["first_name"] . "\n";

				if ($this->data["EmailLibrarian"]["purpose"] == "account") {
					$message .= "Last name: " . @$this->data["EmailLibrarian"]["last_name"] . "\n";
					$message .= "Telephone: " . @$this->data["EmailLibrarian"]["telephone"] . "\n";
				}

				if ($this->data["EmailLibrarian"]["purpose"] == "purchase") {
					$message .= "Last name: " . @$this->data["EmailLibrarian"]["last_name"] . "\n" . "Telephone: " . @$this->data["EmailLibrarian"]["telephone"] . "\n";
				}

				$message .= "Library Card Number: ".$this->data["EmailLibrarian"]["card"]."\n" .
							"Local Branch: " . @$libraries[@$this->data["EmailLibrarian"]["library"]] . "\n";

				if ($this->data["EmailLibrarian"]["purpose"] == "information") {

					$message .= "\nAge level of material: " . @$age_levels[$this->data["EmailLibrarian"]["age"]] . "\n\n";
				}
				if (($this->data["EmailLibrarian"]["purpose"] == "information") || ($this->data["EmailLibrarian"]["purpose"] == "catalogue")) {

					$message .= "Question: \n" . @$this->data["EmailLibrarian"]["question"] . "\n";
				}
				if ($this->data["EmailLibrarian"]["purpose"] == "account") {

					$message .= "\nQuestion: \n" . @$this->data["EmailLibrarian"]["question"] . "\n";
				}

				if ($this->data["EmailLibrarian"]["purpose"] == "technical" || ($this->data["EmailLibrarian"]["purpose"] == "ebook")) {
					$message .= "\nIssues or Questions: \n" . @$this->data["EmailLibrarian"]["question"] . "\n";
				}

				$subject = $subjects[$this->data["EmailLibrarian"]["purpose"]] . " - " . @$libraries[@$this->data["EmailLibrarian"]["library"]];

				$stats_item = 0;

				switch ($this->data["EmailLibrarian"]["purpose"]) {
					case "information":
						$to = "Librarian@vaughanpl.com";
						$headers = 	"From: Librarian@vaughanpl.com\r\n" .
									"X-Mailer: PHP/\r\n" .
									"Cc: vplwebmaster@vaughan.ca\r\n" .
									"Reply-To: " .  @$this->data["EmailLibrarian"]["email"];
						$stats_item = 37;
						break;
					case "catalogue":
						$to = "Librarian@vaughanpl.com";
						$headers = 	"From: Librarian@vaughanpl.com\r\n" .
									"X-Mailer: PHP/\r\n" .
									"Cc: vplwebmaster@vaughan.ca\r\n" .
									"Reply-To: " .  @$this->data["EmailLibrarian"]["email"];
						$stats_item = 37;
						break;
					case "business":
						$to = "business.services.librarian@vaughanpl.com";
						$headers = 	"From: business.services.librarian@vaughanpl.com\r\n" .
									"X-Mailer: PHP/\r\n" .
									"Cc: vplwebmaster@vaughan.ca\r\n" .
									"Reply-To: " .  @$this->data["EmailLibrarian"]["email"];
						$stats_item = 2;
						break;
					case "purchase":
						$to = "Librarian@vaughanpl.com";
						$headers = 	"From: Librarian@vaughanpl.com\r\n" .
									"X-Mailer: PHP/\r\n" .
									"Cc: vplwebmaster@vaughan.ca\r\n" .
									"Reply-To: " .  @$this->data["EmailLibrarian"]["email"];
						$stats_item = 19;

						$message .= "\nITEM REQUESTED:\n\nThis item is a: " . @$item_types[$this->data["EmailLibrarian"]["item_type"]] . "\n" .
									"Title: " . @$this->data["EmailLibrarian"]["item_title"] . "\n" .
									"Author: " . @$this->data["EmailLibrarian"]["item_author"] . "\n" .
									"Language: " . @$this->data["EmailLibrarian"]["item_language"] . "\n" .
									"Publisher: " . @$this->data["EmailLibrarian"]["item_publisher"] . "\n" .
									"Publication Date: " . @$this->data["EmailLibrarian"]["item_date"] . "\n" .
									"ISBN:" . @$this->data["EmailLibrarian"]["item_isbn"] . "\n" .
									"Additional information: " . @$this->data["EmailLibrarian"]["item_info"] . "\n\n";
						break;
					case "account":
						$to = "Library.Membership@vaughan.ca";
						$headers = 	"From: Library.Membership@vaughan.ca\r\n" .
									"X-Mailer: PHP/\r\n" .
									"Cc: vplwebmaster@vaughan.ca\r\n" .
									"Reply-To: " .  @$this->data["EmailLibrarian"]["email"];
						$stats_item = 44;
						break;
					case "technical":
						$to = "vplwebmaster@vaughan.ca";
						$headers = 	"From: vplwebmaster@vaughan.ca\r\n" .
									"X-Mailer: PHP/\r\n" .
									"Reply-To: " .  @$this->data["EmailLibrarian"]["email"];
						$stats_item = 1;
						break;
					case "ebook":
						$to = "librarian@vaughan.ca";
						$headers = 	"From: Librarian@vaughanpl.com\r\n" .
									"X-Mailer: PHP/\r\n" .
									"Cc: vplwebmaster@vaughan.ca\r\n" .
									"Reply-To: " .  @$this->data["EmailLibrarian"]["email"];
						$stats_item = 37;
						break;
				}

				$mailSuccess = @mail ( $to,  $subject, $message, $headers);
				if ($mailSuccess) {
					if (($this->data["EmailLibrarian"]["purpose"] == "information") ||($this->data["EmailLibrarian"]["purpose"] == "catalogue"))
						$this->render("confirm");
					if ($this->data["EmailLibrarian"]["purpose"] == "account")
						$this->render("confirm_account");
					if ($this->data["EmailLibrarian"]["purpose"] == "technical")
						$this->render("confirm_technical");
					if ($this->data["EmailLibrarian"]["purpose"] == "ebook")
						$this->render("confirm_ebook");
					if ($this->data["EmailLibrarian"]["purpose"] == "purchase")
						$this->render("confirm_purchase");

					$this->FormStats->insertStatsData($stats_item);
				} else {
					$this->render("email_error");
				}
			} else {

				$invalidFields = $this->EmailLibrarian->invalidFields();
				if (isset($invalidFields["purpose"]) || isset($_POST["change_purpose"])) {
					$this->data["EmailLibrarian"]["step"] = "purpose";
				} else {
					$this->data["EmailLibrarian"]["step"] = "data";
				}
				if (strpos(@$_POST["step"],$this->data["EmailLibrarian"]["step"])===false) {
					$this->EmailLibrarian->validationErrors = array();
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