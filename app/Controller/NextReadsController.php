<?php

class NextReadsController extends AppController
{
	var $name = 'NextReads';
	var $components = array('General');
	var $uses = array('NextReads', 'FormStats');

var $helpers = array('Html','Pagination','Habtm');

	function add() {


$collection = array("Children" =>"Children", "Young_Adult"=>"Young Adult","Adult"=>"Adult", "Picture_Books"=>"Picture Books", "Fiction"=>"Fiction", "Non-Fiction"=>"Non-Fiction");

$format = array("Book" =>"Book", "Large_Print"=>"Large Print","eBook"=>"eBook", "Audio_MP3"=>"Audio(MP3)", "Audio_CD"=>"Audio(CD)");

$fiction = array("General_Fiction" =>"General Fiction", "Historical"=>"Historical", "Mystery"=>"Mystery", "Suspense_Thriller"=>"Suspense/Thriller", "Horror"=>"Horror", "Romance"=>"Romance","Fantasy"=>"Fantasy", "Sci-Fi"=>"Sci-Fi", "Classic"=>"Classic", "Paranormal"=>"Paranormal");

$non_fiction = array("Biography_Memoir" =>"Biography/Memoir", "Self-Help"=>"Self-Help","Inspirational"=>"Inspirational", "Cooking"=>"Cooking", "Finances_Business"=>"Finances/Business", "History"=>"History", "Parenting"=>"Parenting", "True_Crimes"=>"True Crimes", "Travel_Geography"=>"Travel/Geography", "Science_Technology"=>"Science/Technology");

$this->set("collection", $collection);
$this->set("format", $format);
$this->set("fiction", $fiction);
$this->set("non_fiction", $non_fiction);

		$this->set("errors", false);


		if (!empty($this->data)) {

			if ($this->NextReads->save($this->data)) {

				$message = "Your Next 5 Reads\n\n";

				$message .= "The following individual has submitted Your Next 5 Reads Form through the VPL Web Site:\n\n";
				$message .= "Name: " . @$this->data["NextReads"]["name"]  . "\n";
				$message .= "Email:  " . @$this->data["NextReads"]["email"] . "\n";
				$message .= "Library Card:  " . @$this->data["NextReads"]["card"] . "\n\n";
				//$message .= "Gender:  " . @$this->data["NextReads"]["gender"] . "\n";


				$collection_temps = @$this->data["NextReads"]["collection"];
				$message .= "Collection: ";
				foreach($collection_temps as $col_temp){
								$message .= "\t". $col_temp . "\n";

				}

				$format_temps = @$this->data["NextReads"]["format"];
				$message .= "Format: ";
				foreach($format_temps as $format_temp){
					$message .=  "\t". $format_temp . "\n";

				}

				$message .= "\n";
				$fic_temps = @$this->data["NextReads"]["fiction"];
				$message .= "For Fiction: ";
				foreach($fic_temps as $fic_temp){
								$message .= "\t" . $fic_temp . "\n";

				}
				$message .= "Addition comments:";
				$message .= "\n\t".@$this->data["NextReads"]["fiction_more"] . "\n\n";

				$noFic_temps = @$this->data["NextReads"]["non_fiction"];
				$message .= "For Non-Fiction: ";
				foreach($noFic_temps as $noFic_temp){
								$message .= "\t" . $noFic_temp . "\n";

				}
				$message .= "Addition comments:";
				$message .= "\n\t" . @$this->data["NextReads"]["non_fiction_more"] . "\n\n";

				$message .= "Tell us more: " . "\n".@$this->data["NextReads"]["reason"] . "\n\n";




			$to = "Librarian.Librarian@vaughan.ca";
			//$to = "mingcong.wu@vaughan.ca"; //for testing
				$subject = "Your Next 5 Reads";
				$headers = 'From: librarian@vaughanpl.com' . "\r\nCc: vplwebmaster@vaughan.ca\r\nReply-To: ".@$this->data["NextReads"]["email"]."\r\n" .
				//$headers = 'From: Librarian@vaughanpl.com' . "\r\nReply-To: ".@$this->data["NextReads"]["email"]."\r\n" .
				"X-Mailer: PHP/\r\n";
				$mailSuccess = mail ( $to,  $subject, $message, $headers);

				if ($mailSuccess) {
					$this->render("confirm");
					$this->FormStats->insertStatsData(49);
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