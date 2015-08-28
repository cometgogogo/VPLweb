<?php
/**
 * Model class for RESERVE A BOOK FOR BOOK CLUB form
 */
class BookForBookClubsReservation extends AppModel
{
	var $name = 'BookForBookClubsReservation';			// Name of the Model
	var $useTable = false;								// Not connected to database
	var $maxCopies;										// Maximum number of copies available for the requested book
	
	// Model validations
	var $validate = array(
							"club_name" => VALID_NOT_EMPTY,
							"first_name" => VALID_NOT_EMPTY,
							"last_name" => VALID_NOT_EMPTY,
							"library" => '/[^(^empty$)]/',
							"email" => VALID_EMAIL,
							"telephone" => VALID_NOT_EMPTY,
							"card" => VALID_NOT_EMPTY,
							"copies" => VALID_NOT_EMPTY
						);
						
	/**
	 * Custom validations
	 */
	function validates() {
		if (!empty($this->data["BookForBookClubsReservation"]["telephone"]) && !eregi ("[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}",$this->data["BookForBookClubsReservation"]["telephone"])) {
			 $this->invalidate("telephone");
		}
		
		// # of copies cannot be empty or exceed maximum available
		if (!empty($this->data["BookForBookClubsReservation"]["copies"])) {
			if (!preg_match (VALID_NUMBER,$this->data["BookForBookClubsReservation"]["copies"])) {
				 $this->invalidate("copies_number");
			} else {
				if ($this->data["BookForBookClubsReservation"]["copies"] > $this->maxCopies) $this->invalidate("copies_max");
			}
		}
		
		// Valid dates
		$choice_date = mktime(0, 0, 0, $this->data["BookForBookClubsReservation"]["first_choice_month"], $this->data["BookForBookClubsReservation"]["first_choice_day"], $this->data["BookForBookClubsReservation"]["first_choice_year"]);
		if (
			$this->data["BookForBookClubsReservation"]["first_choice_year"] != date("Y", $choice_date) ||
			$this->data["BookForBookClubsReservation"]["first_choice_month"] != date("m", $choice_date) ||
			$this->data["BookForBookClubsReservation"]["first_choice_day"] != date("d", $choice_date)
			) {
			$this->invalidate("first_choice_date");
		} elseif ($choice_date <= mktime()) {
			$this->invalidate("first_choice_date_past");
		}
		$choice_date = mktime(0, 0, 0, $this->data["BookForBookClubsReservation"]["second_choice_month"], $this->data["BookForBookClubsReservation"]["second_choice_day"], $this->data["BookForBookClubsReservation"]["second_choice_year"]);
		if (
			$this->data["BookForBookClubsReservation"]["second_choice_year"] != date("Y", $choice_date) ||
			$this->data["BookForBookClubsReservation"]["second_choice_month"] != date("m", $choice_date) ||
			$this->data["BookForBookClubsReservation"]["second_choice_day"] != date("d", $choice_date)
			) {
			$this->invalidate("second_choice_date");
		} elseif ($choice_date <= mktime()) {
			$this->invalidate("second_choice_date_past");
		}

		// Return true of false
		return count($this->invalidFields()) == 0;
	}


	/**
	 * Nothing is saved in database, just validated 
	 */
	function Save($data) {
		$this->set($data);
		return $this->validates();
	}
}
?>