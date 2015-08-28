<?php
/**
 * Model class for Beyond the Basics: Computer Tutor Volunteer Application Form
 */
class BusinessWorkshop extends AppModel
{
	var $name = 'BusinessWorkshop';				// Name of the Model
	var $useTable = false;				// Not connected to database

	// Model validations
	 public $validate = array(
					"name" => array('rule' => 'notEmpty', 'message' => 'Please fill in your name.'),
					"homephone" => array('rule' => '/[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}/','allowEmpty'=>true, 'message' => 'Please enter a valid phone number - numbers only (example 4161234567).'),
					"help" => array('rule' => 'notEmpty', 'message' => 'Please fill in the question.'),
					"email" => array('rule' => array('email', true), 'message' => 'Please enter a valid email address.'),
					"library" => array('rule' => 'notEmpty', 'message' => 'Please choose a library branch.'),
					"time_slot" => array('rule' => array('multiple', array('min' => 1)), 'message' => 'Please choose one time slot')
						);




	/**
	 * Nothing is saved in database, just validated
 		*/
	/*function Save($data) {

		$this->set($data);


				if (!empty($this->data["BusinessWorkshop"]["homephone"]) && !eregi ("[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}",$this->data["BusinessWorkshop"]["homephone"])) {
					 $this->invalidate("homephone");
				}

				$isValid = false;

				/*
				if (!empty($this->data["BusinessWorkshop"]["card_number"])) {

					$valid_card_number_prefix = array("23288", "29158", "23287", "22971", "23164", "25923", "23278", "23663", "33288", "22328", "22388", "23238", "26288", "32880");

					$special_card_number_numbers = array("000925152", "002663809", "02901795", "2288014594", "2328", "8800265", "88002883407");


					foreach ($valid_card_number_prefix as $pre) {
						if (substr($this->data["BusinessWorkshop"]["card_number"], 0, 5) == $pre) $isValid = true;
					}
					foreach ($special_card_number_numbers as $special) {
						if ($this->data["BusinessWorkshop"]["card_number"] == $special) $isValid = true;
					}
					if (substr($this->data["BusinessWorkshop"]["card_number"], 0, 6) == "NoHzBC") $isValid = true;
					if (substr($this->data["BusinessWorkshop"]["card_number"], 0, 8) == "DYNIXPBC") $isValid = true;
				}*/

				//if (!$isValid && !empty($this->data["BusinessWorkshop"]["card_number"])) 	$this->invalidate("card_number")

				/*
				if(count(@$this->data["BusinessWorkshop"]["time_slot"])<= 1) $this->invalidate("time_slot");

				return count($this->invalidFields()) == 0;



	}*/

}
?>