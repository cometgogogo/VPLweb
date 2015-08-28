<?php
/**
 * Model class for CUSTOMER FEEDBACK form
 */
class Feedback extends AppModel
{
	var $name = 'Feedback';				// Name of the Model
	var $useTable = false;				// Not connected to database
	
	// Model validations
	var $validate = array(
						"comments" => VALID_NOT_EMPTY,
						"BranchID" => '/[^(^empty$)]/'
						);
	

	/**
	 * Nothing is saved in database, just validated 
	 */
	function Save($data) {
		$this->set($data);
		if (!empty($this->data["Feedback"]["telephone"])) $this->validate["telephone"] = "/[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}/";
		if (!empty($this->data["Feedback"]["email"])) $this->validate["email"] = VALID_EMAIL;
		return $this->validates();
	}


}
?>