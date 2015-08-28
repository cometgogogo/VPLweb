<?php
/**
 * Model class for CUSTOMER FEEDBACK form
 */
class Delivery extends AppModel
{
	var $name = 'Delivery';				// Name of the Model
	var $useTable = false;				// Not connected to database

	/* Model validations
	 var $validate = array("name" => VALID_NOT_EMPTY, "address" => VALID_NOT_EMPTY, "date" => VALID_NOT_EMPTY);
	*/

function validates() {
		if (!empty($this->data["Delivery"]["telephone"]) && !eregi ("[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}",$this->data["Delivery"]["telephone"])) {
			 $this->invalidate("telephone");
		}

		$isValid = false;

		if (!empty($this->data["Delivery"]["card"])) {

			$valid_card_prefix = array("23288", "29158", "23287", "22971", "23164", "25923", "23278", "23663", "33288", "22328", "22388", "23238", "26288", "32880");

			$special_card_numbers = array("000925152", "002663809", "02901795", "2288014594", "2328", "8800265", "88002883407");


			foreach ($valid_card_prefix as $pre) {
				if (substr($this->data["Delivery"]["card"], 0, 5) == $pre) $isValid = true;
			}
			foreach ($special_card_numbers as $special) {
				if ($this->data["Delivery"]["card"] == $special) $isValid = true;
			}
			if (substr($this->data["Delivery"]["card"], 0, 6) == "NoHzBC") $isValid = true;
			if (substr($this->data["Delivery"]["card"], 0, 8) == "DYNIXPBC") $isValid = true;
		}

		if (!$isValid && !empty($this->data["Delivery"]["card"])){
			$this->invalidate("card");
		}

		return count($this->invalidFields()) == 0;
	}


	function Save($data) {
		$this->set($data);
		if (isset($this->data["Delivery"]["option"])) {
			$this->validate = array_merge($this->validate, $this->mandatoryFields($this->data["Delivery"]["option"]));
		}
		return $this->validates();
	}


	function mandatoryFields($option) {
		$ret = array();
		switch ($option) {
			case "begin":
				$ret["name"] = VALID_NOT_EMPTY;
				$ret["telephone"] = VALID_NOT_EMPTY;
				$ret["card"] = VALID_NOT_EMPTY;
				$ret["address"] = VALID_NOT_EMPTY;
				$ret["email"] = VALID_EMAIL;
				break;
			case "stop":
				$ret["name1"] = VALID_NOT_EMPTY;
				$ret["card1"] = VALID_NOT_EMPTY;
				$ret["date"] = VALID_NOT_EMPTY;
				break;

		}
		return $ret;
	}


}
?>