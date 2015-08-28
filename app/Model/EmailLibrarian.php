<?php
class EmailLibrarian extends AppModel
{
	var $name = 'EmailLibrarian';
	var $useTable = false;
	var $validate = array("purpose" => VALID_NOT_EMPTY);


	function validates() {
		if (!empty($this->data["EmailLibrarian"]["telephone"]) && !eregi ("[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}",$this->data["EmailLibrarian"]["telephone"])) {
			 $this->invalidate("telephone");
		}

		$isValid = false;

		// Daniel 03/10/2008: removed telephone from this condition
		//if (!empty($this->data["EmailLibrarian"]["telephone"]) && !empty($this->data["EmailLibrarian"]["card"])) {
		if (!empty($this->data["EmailLibrarian"]["card"])) {

			$valid_card_prefix = array("23288", "29158", "23287", "22971", "23164", "25923", "23278", "23663", "33288", "22328", "22388", "23238", "26288", "32880");

			$special_card_numbers = array("000925152", "002663809", "02901795", "2288014594", "2328", "8800265", "88002883407");


			foreach ($valid_card_prefix as $pre) {
				if (substr($this->data["EmailLibrarian"]["card"], 0, 5) == $pre) $isValid = true;
			}
			foreach ($special_card_numbers as $special) {
				if ($this->data["EmailLibrarian"]["card"] == $special) $isValid = true;
			}
			if (substr($this->data["EmailLibrarian"]["card"], 0, 6) == "NoHzBC") $isValid = true;
			if (substr($this->data["EmailLibrarian"]["card"], 0, 8) == "DYNIXPBC") $isValid = true;
		}

		if (!$isValid && !empty($this->data["EmailLibrarian"]["card"]))
			$this->invalidate("card");

		if (
			@$this->data["EmailLibrarian"]["purpose"] == "purchase" &&
			empty($this->data["EmailLibrarian"]["item_title"]) &&
			empty($this->data["EmailLibrarian"]["item_author"]) &&
			empty($this->data["EmailLibrarian"]["item_isbn"]) &&
			empty($this->data["EmailLibrarian"]["item_info"])
			) {
			$this->invalidate("item_info");
		}

		return count($this->invalidFields()) == 0;
	}


	function Save($data) {
		$this->set($data);
		$this->validate = array("purpose" => VALID_NOT_EMPTY, "step" => '/^data$/');
		if (isset($this->data["EmailLibrarian"]["purpose"])) {
			$this->validate = array_merge($this->validate, $this->mandatoryFields($this->data["EmailLibrarian"]["purpose"]));
		}
		return $this->validates();
	}


	function mandatoryFields($purpose) {
		$ret = array();
		switch ($purpose) {
			case "information":
				$ret["email"] = VALID_EMAIL;
				$ret["library"] = '/[^(^empty$)]/';
				$ret["age"] = '/[^(^empty$)]/';
				$ret["question"] = VALID_NOT_EMPTY;
				break;
			case "catalogue":
				$ret["email"] = VALID_EMAIL;
				$ret["library"] = '/[^(^empty$)]/';
				$ret["card"] = VALID_NOT_EMPTY;
				$ret["question"] = VALID_NOT_EMPTY;
				break;
			case "business":
				$ret["email"] = VALID_EMAIL;
				$ret["library"] = '/[^(^empty$)]/';
				$ret["question"] = VALID_NOT_EMPTY;
				break;
			case "purchase":
				$ret["email"] = VALID_EMAIL;
				$ret["telephone"] = VALID_NOT_EMPTY;
				$ret["card"] = VALID_NOT_EMPTY;
				$ret["library"] = '/[^(^empty$)]/';
				$ret["item_type"] = '/[^(^empty$)]/';
				//$ret["item_type"] = VALID_NOT_EMPTY;
				//$ret["item_title"] = VALID_NOT_EMPTY;
				break;
			case "account":
				$ret["email"] = VALID_EMAIL;
				//$ret["telephone"] = VALID_NOT_EMPTY;
				$ret["first_name"] = VALID_NOT_EMPTY;
				$ret["last_name"] = VALID_NOT_EMPTY;
				$ret["card"] = VALID_NOT_EMPTY;
				$ret["library"] = '/[^(^empty$)]/';
				$ret["question"] = VALID_NOT_EMPTY;
				break;
			case "technical":
				$ret["email"] = VALID_EMAIL;
				//$ret["card"] = VALID_NOT_EMPTY;
				$ret["library"] = '/[^(^empty$)]/';
				$ret["question"] = VALID_NOT_EMPTY;
				break;
			case "ebook":
				$ret["email"] = VALID_EMAIL;
				$ret["card"] = VALID_NOT_EMPTY;
				$ret["library"] = '/[^(^empty$)]/';
				$ret["question"] = VALID_NOT_EMPTY;
			break;
		}
		return $ret;
	}


}
?>