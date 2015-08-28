<?php
/**
 * Model class for CUSTOMER FEEDBACK form
 */
class Proctor extends AppModel
{
	var $name = 'Proctor';				// Name of the Model
	var $useTable = false;				// Not connected to database

	// Model validations
	 var $validate = array(
						"name" => VALID_NOT_EMPTY,
						"telephone" => VALID_NOT_EMPTY,
						"school_name"  => VALID_NOT_EMPTY,
						"contact" => VALID_NOT_EMPTY,
						"school_telephone" => VALID_NOT_EMPTY,
						"length" => VALID_NOT_EMPTY,
						"format" => VALID_NOT_EMPTY,
						"date" => VALID_NOT_EMPTY,
						"library" => '/[^(^empty$)]/'

						);


	/**
	 * Nothing is saved in database, just validated
 		*/
	function Save($data) {
		$this->set($data);
		if (!empty($this->data["Proctor"]["telephone"])) $this->validate["telephone"] = "/[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}/";
		if (!empty($this->data["Proctor"]["email"])) $this->validate["email"] = VALID_EMAIL;
		return $this->validates();
	}


}
?>