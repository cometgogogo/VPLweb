<?php
/**
 * Model class for Beyond the Basics: Computer Tutor Volunteer Application Form
 */
class Multilingual extends AppModel
{
	var $name = 'Multilingual';				// Name of the Model
	var $useTable = false;				// Not connected to database

	// Model validations
	 var $validate = array(
					"name" => VALID_NOT_EMPTY,
					"help" => VALID_NOT_EMPTY,
					"homephone" => VALID_NOT_EMPTY,
					"card_number" => VALID_NOT_EMPTY,
						"library" => '/[^(^empty$)]/'
						);




	/**
	 * Nothing is saved in database, just validated
 		*/
	function Save($data) {

		$this->set($data);


				if (!empty($this->data["Multilingual"]["homephone"]) && !eregi ("[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}",$this->data["Multilingual"]["homephone"])) {
					 $this->invalidate("homephone");
				}

				$isValid = false;

				if (!empty($this->data["Multilingual"]["card_number"])) {

					$valid_card_number_prefix = array("23288", "29158", "23287", "22971", "23164", "25923", "23278", "23663", "33288", "22328", "22388", "23238", "26288", "32880");

					$special_card_number_numbers = array("000925152", "002663809", "02901795", "2288014594", "2328", "8800265", "88002883407");


					foreach ($valid_card_number_prefix as $pre) {
						if (substr($this->data["Multilingual"]["card_number"], 0, 5) == $pre) $isValid = true;
					}
					foreach ($special_card_number_numbers as $special) {
						if ($this->data["Multilingual"]["card_number"] == $special) $isValid = true;
					}
					if (substr($this->data["Multilingual"]["card_number"], 0, 6) == "NoHzBC") $isValid = true;
					if (substr($this->data["Multilingual"]["card_number"], 0, 8) == "DYNIXPBC") $isValid = true;
				}

				if (!$isValid && !empty($this->data["Multilingual"]["card_number"])) 	$this->invalidate("card_number");
				if(count(@$this->data["Multilingual"]["language"])<= 1) $this->invalidate("language");

				return count($this->invalidFields()) == 0;



	}

}
?>