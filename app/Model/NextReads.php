<?php
/**
 * Model class for Beyond the Basics: Computer Tutor Volunteer Application Form
 */
class NextReads extends AppModel
{
	var $name = 'NextReads';				// Name of the Model
	var $useTable = false;				// Not connected to database

	// Model validations
	 var $validate = array(
					"name" => VALID_NOT_EMPTY,
					"card" => VALID_NOT_EMPTY,
						"email" => VALID_NOT_EMPTY

						);




	/**
	 * Nothing is saved in database, just validated
 		*/
	function Save($data) {

		$this->set($data);
	$isValid = false;

		if (!empty($this->data["NextReads"]["email"])) $this->validate["email"] = VALID_EMAIL;

		$num_checked = count(@$this->data["NextReads"]["collection"]);
		$format_checked = count(@$this->data["NextReads"]["format"]);

	if($num_checked <= 1 ){

		$this->invalidate("collection");
	}
	if($format_checked <= 1 ){
			$this->invalidate("format");
	}

	if (!empty($this->data["NextReads"]["card"])) {

				$valid_card_prefix = array("2328800", "2915800", "2297100");

				foreach ($valid_card_prefix as $pre) {
					if (substr($this->data["NextReads"]["card"], 0, 7) == $pre && strlen($this->data["NextReads"]["card"]) == 14) $isValid = true;
				}

			}

			if (!$isValid && !empty($this->data["NextReads"]["card"])) $this->invalidate("card");

		return $this->validates();


	}

}
?>