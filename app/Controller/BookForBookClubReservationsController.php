<?php

class BookForBookClubReservationsController extends AppController
{
	var $name = 'BookForBookClubsReservations';
	var $components = array('General');
	var $uses = array('BookForBookClubsReservation','Library','BookForBookClubs', 'FormStats');
	var $helpers = array('Html','List');


	function add()
		{


			$args = func_get_args();
			if (!isset($args[0])) $this->redirect("/services/books_for_book_clubs");

			$libraries_temp = $this->Library->generateList("District <> 'Virtual'",'BranchName ASC', null,null,'{n}.Library.BranchName');
			foreach ($libraries_temp as $key => $value) {
				$libraries[$key . " "] = $value;
			}
			$libraries = array_merge(array("empty"=>"-- please select --"), $libraries);
			$this->set('libraries',$libraries);

			$months = array(
							"--month--",
							"January",
							"February",
							"March",
							"April",
							"May",
							"June",
							"July",
							"August",
							"September",
							"October",
							"November",
							"December"
							);

			$days = array(
							"-day-",
							"1",
							"2",
							"3",
							"4",
							"5",
							"6",
							"7",
							"8",
							"9",
							"10",
							"11",
							"12",
							"13",
							"14",
							"15",
							"16",
							"17",
							"18",
							"19",
							"20",
							"21",
							"22",
							"23",
							"24",
							"25",
							"26",
							"27",
							"28",
							"29",
							"30",
							"31"
							);

			$years = array(date("Y")=>date("Y"),date("Y")+1=>date("Y")+1);


			$this->set("months", $months);
			$this->set("days", $days);
			$this->set("years", $years);

			$book = $this->BookForBookClubs->find("BookID=" . $args[0]);
			$this->set('book',$book);
			$this->BookForBookClubsReservation->maxCopies = $book["BookForBookClubs"]["NumCopies"];

			$this->set("errors", false);
			$stats_item = 0;

			if (!empty($this->data)) {
				if ($this->BookForBookClubsReservation->save($this->data)) {
					switch ($book["BookForBookClubs"]["Level"]) {
						// Kids
						case 1;
							$to = "Librarian@vaughanpl.com";
							$message = "Booking Kids' Books for Book Clubs";
							$stats_item = 24;
							break;

						// Teens
						case 2;
							$to = "Librarian@vaughanpl.com";
							$message = "Booking Teens' Books for Book Clubs";
							$stats_item = 25;
							break;

						// Adults
						case 3;
							$to = "Librarian@vaughanpl.com";
							$message = "Booking Adults' Books for Book Clubs";
							$stats_item = 26;
							break;
						//ESL
						case 4;
							$to = "Librarian@vaughanpl.com";
							$message = "Booking ESL's Books for Book Clubs";
							$stats_item = 42;
							break;
					}

					$message .= " - " . @$libraries[$this->data["BookForBookClubsReservation"]["library"]] . "\n\n";

					$message .= @$this->data["BookForBookClubsReservation"]["first_name"] . " " . @$this->data["BookForBookClubsReservation"]["last_name"] . " would like to borrow some books for their book club.\n\n";

					$message .= "Here is the information submitted by " . @$this->data["BookForBookClubsReservation"]["first_name"] . " " . @$this->data["BookForBookClubsReservation"]["last_name"] . ":\n\n";
					$message .= "Name of Book Club:  " . @$this->data["BookForBookClubsReservation"]["club_name"] . "\n";
					$message .= "First Name:  " .@$this->data["BookForBookClubsReservation"]["first_name"] . "\n";
					$message .= "Last Name:  " . @$this->data["BookForBookClubsReservation"]["last_name"] . "\n";
					$message .= "Local Branch:  " . @$libraries[@$this->data["BookForBookClubsReservation"]["library"]] . "\n";
					$message .= "Email Address:  " . @$this->data["BookForBookClubsReservation"]["email"] . "\n";
					$message .= "Telephone:  " . @$this->data["BookForBookClubsReservation"]["telephone"] . "\n";
					$message .= "Library Card Number:  " . @$this->data["BookForBookClubsReservation"]["card"] . "\n\n";
					$message .= "Title of Book:  " . $book["BookForBookClubs"]["Title"] . " by " . $book["BookForBookClubs"]["Author"] . "\n";
					$message .= "Number of Copies:  " . @$this->data["BookForBookClubsReservation"]["copies"] . "\n\n";
					$message .= "Date Wanted:\n";

					$mon_index_first = @$this->data["BookForBookClubsReservation"]["first_choice_month"];
					$mon_index_second = @$this->data["BookForBookClubsReservation"]["second_choice_month"];

					$message .= "1st choice: " . $months[$mon_index_first] . " " . @$this->data["BookForBookClubsReservation"]["first_choice_day"] . ", " . @$this->data["BookForBookClubsReservation"]["first_choice_year"] . "\n";
					$message .= "2nd choice: " . $months[$mon_index_second] . " " . @$this->data["BookForBookClubsReservation"]["second_choice_day"] . ", " . @$this->data["BookForBookClubsReservation"]["second_choice_year"] . "\n\n";
					$message .= "ACTION:\n\n";
					$message .= "1.  Please make sure that the Book Club is registered.\n\n";
					$message .= "2.  Please check to make sure that the person has a valid library card.\n\n";
					$message .= "3.  Confirm availability and reserve Book Club books as you would for internal booking of Book Chat sets.\n\n";
					$message .= "4.  When completed, email user at " . @$this->data["BookForBookClubsReservation"]["email"] . " with the following: \n";
					$message .= "a.  Confirmation that their books have been requested;\n";
					$message .= "b.  The name of the branch where they can pick the books up;\n";
					$message .= "c.  The title of the book they have requested;\n";
					$message .= "d.  The number of copies they have requested; and\n";
					$message .= "e.  The date the books can be picked up.\n\n";
					$message .= "5.  When booking the Book Club sets, be sure to leave two weeks between bookings.\n\n";
					$message .= "6.  Be sure to inform the designated processing clerk in Operations of booking to ensure timely shipping of materials.\n\n";

					$Email = @$this->data["BookForBookClubsReservation"]["email"];
					$subject = "Booking Books for Book Clubs - " . @$libraries[@$this->data["BookForBookClubsReservation"]["library"]];

					$headers = 	"From: Librarian@vaughanpl.com\r\nReply-To: $Email\r\n" .
								"X-Mailer: PHP/\r\n" .
								"Cc: elibrarian@vaughanpl.com";
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




	function index()
	{
	}

	function view($id = null)
	{
	}


	function search($query) {
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