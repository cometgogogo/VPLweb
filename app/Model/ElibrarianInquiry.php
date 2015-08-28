<?php
/**
 * Model class for CONTACT ELIBRARIAN form
 */
class ElibrarianInquiry extends AppModel
{
	var $name = 'ElibrarianInquiry';		// Name of the Model
	var $useTable = false;					// Not connected to database
	
	// Model validations
	var $validate = array(
							"library" => '/[^(^empty$)]/',
							"email" => VALID_EMAIL,
							"question" => VALID_NOT_EMPTY
						);
	
	/**
	 * Custom validations
	 */
	function validates() {
		if (!empty($this->data["ElibrarianInquiry"]["telephone"]) && !eregi ("[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}",$this->data["ElibrarianInquiry"]["telephone"])) {
			 $this->invalidate("telephone");
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