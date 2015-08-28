<?php
/**
 * Model class for Administration Inquiry (Contact Vaughan Public Libraries Administration)
 */
class AdministrationInquiry extends AppModel
{
	var $name = 'AdministrationInquiry';		// Name of the Model
	var $useTable = false;						// Not connected to database

	// Model validations
	public $validate = array(
							"telephone" => array('rule' => '/[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}/','allowEmpty'=>true, 'message' => 'Please enter a valid phone number - numbers only (example 4161234567).'),
							"email" => array('rule' => array('email', true), 'message' => 'Please enter a valid email address.'),
							"library" => array('rule' => 'notEmpty', 'message' => 'Please choose a library branch.'),
							"question" => array('rule' => 'notEmpty', 'message' => 'Please fill in the question.')
						);

	/**
	 * Custom validations
	 */
	/*public function validates($options) {
		if (!empty($this->data["AdministrationInquiry"]["telephone"]) && !eregi ("[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}",$this->data["AdministrationInquiry"]["telephone"])) {
			 $this->invalidate("telephone");
		}
		return count($this->invalidFields()) == 0;
	}*/

	/**
	 * Nothing is saved in database, just validated
	 */
	/*function Save($data) {
		$this->set($data);
		return $this->validates();
	}*/


}
?>