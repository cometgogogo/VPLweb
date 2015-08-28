<?php

class BookForBookClubRegistrationsController extends AppController
{
	var $name = 'BookForBookClubsRegistrations';
	var $components = array('General');
	var $uses = array('BookForBookClubsRegistration','Library', 'FormStats');
	//var $helpers = array('Html','List');


	function add()
		{
			$libraries_temp = $this->Library->find('list', array('conditions' => array('District !=' => 'Virtual'), 'order' => 'BranchName ASC', 'fields' => array('Library.BranchName')));
			foreach ($libraries_temp as $key => $value) {
				$libraries[$key . " "] = $value;
			}
			//$libraries = array_merge(array("empty"=>"-- please select --"), $libraries);
			$this->set('libraries',$libraries);

			$types = array(3=>"Adults", 2=>"Teens", 1=>"Children", 4=>"ESL");
			$this->set("types", $types);

			$ages = array("16"=>"16 years of age or older", "under16"=>"Less than 16 years of age");
			$this->set("ages", $ages);


			$this->set("errors", false);
			$this->BookForBookClubsRegistration->set($this->request->data);

			$stats_item = 0;

			if (!empty($this->request->data["BookForBookClubsRegistration"])) {
				//if ($this->BookForBookClubsRegistration->save($this->data)) {
				if ($this->BookForBookClubsRegistration->validates()){
					switch ($this->data["BookForBookClubsRegistration"]["type"]) {
						// Kids
						case 1;
							$to = "Librarian@vaughan.ca";
							$message = "Books for Book Clubs - Registration - Kids";
							$stats_item = 27;
							break;

						// Teens
						case 2;
							$to = "Librarian@vaughan.ca";
							$message = "Books for Book Clubs - Registration - Teens";
							$stats_item = 28;
							break;

						// Adults
						case 3;
							$to = "Librarian@vaughan.ca";
							$message = "Books for Book Clubs - Registration - Adults";
							$stats_item = 29;
							break;
							// Adults
						case 4;
							$to = "Librarian@vaughan.ca";
							$message = "Books for Book Clubs - Registration - ESL";
							$stats_item = 43;
							break;
					}
					$message .= " - " . @$libraries[$this->data["BookForBookClubsRegistration"]["library"]] . "\n\n";

					$message .= "Books for Book Clubs\n\n";

					$message .= @$this->data["BookForBookClubsRegistration"]["club_name"] . " is registering for Books for Book Clubs.\n\n";

					$message .= "Type of Book Club:  " . @$types[$this->data["BookForBookClubsRegistration"]["type"]] . "\n\n";

					$message .=  @$this->data["BookForBookClubsRegistration"]["first_name"] . " " . @$this->data["BookForBookClubsRegistration"]["last_name"] . " would like to be the contact person and is registering on behalf of the " . @$this->data["BookForBookClubsRegistration"]["club_name"] . ". Here is the information submitted:\n\n";

					$message .= "Book Club Name:  " . @$this->data["BookForBookClubsRegistration"]["club_name"] . "\n";

					$message .= "Type of Book Club:  " . @$types[$this->data["BookForBookClubsRegistration"]["type"]] . "\n";

					$message .= "First Name:  " . @$this->data["BookForBookClubsRegistration"]["first_name"] . "\n";
					$message .= "Last Name:  " . @$this->data["BookForBookClubsRegistration"]["last_name"] . "\n";
					$message .= "Age:  " . @$ages[$this->data["BookForBookClubsRegistration"]["age"]] . "\n";
					$message .= "Local Branch:  " . @$libraries[$this->data["BookForBookClubsRegistration"]["library"]] . "\n";
					$message .= "Email Address:  " . @$this->data["BookForBookClubsRegistration"]["email"] . "\n";
					$message .= "Telephone:  " . @$this->data["BookForBookClubsRegistration"]["telephone"] . "\n";
					$message .= "Library Card Number:  " . @$this->data["BookForBookClubsRegistration"]["card"] . "\n\n";

					$message .= "ACTION:\n\n";

					$message .= "	1.  Please check to make sure that the person registering on behalf of their Book Club has a valid library card.  If the person does not have a valid library card, please let them know they must join the library first (Please use the template prepared for you).  If the person is less than 16 years of age, send them an email using the Ask an Adult to Register on Behalf of Your Group email form;\n";

					$message .= "	2.  Add information about this Book Club to the Book Chat Book Sets duotang at the reference desk (note: the Book Chat Book Sets duotang is yellow) for reference at a future date.\n";
					$message .= "	3.  Let the individual know they are now registered as the contact person for their Book Club (Please use the template prepared for you).\n";

					$Email = @$this->data["BookForBookClubsRegistration"]["email"];
					$subject = "Books for Book Clubs - Registration - " . @$libraries[$this->data["BookForBookClubsRegistration"]["library"]];


					$headers = 	"From: Librarian@vaughan.ca\r\nReply-To: $Email\r\n" .
								"X-Mailer: PHP/\r\n" .
								"Cc: vplwebmaster@vaughan.ca";
					$mailSuccess = @mail ( $to,  $subject, $message, $headers);
					if ($mailSuccess) {
						$this->render("confirm");
						$this->FormStats->insertStatsData($stats_item);
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