<?php
/**
 * Model class for Maker Kit Reservation
 */
class MakerReservation extends AppModel
{
	var $name = 'MakerReservation';		// Name of the Model
	var $useTable = false;						// Not connected to database

	// Model validations
	var $validate = array(
							"first_name" => VALID_NOT_EMPTY,
							"last_name" => VALID_NOT_EMPTY,
							"telephone" => VALID_NOT_EMPTY,
							"card" => VALID_NOT_EMPTY,
							"email" => VALID_EMAIL,
							"time" => VALID_NOT_EMPTY,
							"kit" => '/[^(^empty$)]/'
						);

	/**
	 * Custom validations
	 */
	function validates() {
		if (!empty($this->data["MakerReservation"]["telephone"]) && !eregi ("[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}",$this->data["MakerReservation"]["telephone"])) {
			 $this->invalidate("telephone");
		}

		if ((!empty($this->data["MakerReservation"]["card"]) && (substr($this->data["MakerReservation"]["card"], 0, 5) != "23288") && (substr($this->data["MakerReservation"]["card"], 0, 5) != "29158")) || (strlen($this->data["MakerReservation"]["card"])!=14)) {
			 $this->invalidate("card");
		}

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