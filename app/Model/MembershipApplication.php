<?php
class MembershipApplication extends AppModel
{
	var $name = 'MembershipApplication';
	var $useTable = false;
	var $validate = array(
							"age" => VALID_NOT_EMPTY,
							"first_name" => VALID_NOT_EMPTY,
							"last_name" => VALID_NOT_EMPTY,
							"eligibility" => VALID_NOT_EMPTY,
							"library" => "/[^(^empty$)]/",
							"previous_card" => VALID_NOT_EMPTY,
							"address" => VALID_NOT_EMPTY,
							"city" => VALID_NOT_EMPTY,
							"postal_code" => VALID_NOT_EMPTY,
							"telephone" => VALID_NOT_EMPTY,
							"email" => VALID_EMAIL,
							"opt_in" => VALID_NOT_EMPTY,
							"pin" => VALID_NOT_EMPTY
						);


	function validates() {
		if (!empty($this->data["MembershipApplication"]["telephone"]) && !eregi ("[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}",$this->data["MembershipApplication"]["telephone"])) {
			 $this->invalidate("telephone");
		}
		if (!empty($this->data["MembershipApplication"]["pin"]) && strlen($this->data["MembershipApplication"]["pin"]) < 4 ) {
			 $this->invalidate("pin_4_digits");
		}
		if (!empty($this->data["MembershipApplication"]["pin"]) && !is_numeric($this->data["MembershipApplication"]["pin"])) {
			 $this->invalidate("pin_numeric");
		}
		if (($this->data["MembershipApplication"]["age"])=="kid"){
			if(empty($this->data["MembershipApplication"]["parent_first_name"])) {
					 $this->invalidate("parent_first_name");
			}
			if(empty($this->data["MembershipApplication"]["parent_last_name"])) {
					$this->invalidate("parent_last_name");
			}

		}
		return count($this->invalidFields()) == 0;
	}


	function Save($data) {
		$this->set($data);
		return $this->validates();
	}



	function mandatoryFields($purpose) {return array();}




}
?>