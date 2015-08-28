<?php
/**
 * Model class for BOOK CLUBS REGISTRATION FORM
 */
class BookForBookClubsRegistration extends AppModel
{
	var $name = 'BookForBookClubsRegistration';				// Name of the Model
	var $useTable = false;									// Not connected to database

	// Model validations
	public $validate = array(
							"club_name" => array('rule' => 'notEmpty', 'message' => 'Please fill in the name of your book club.'),
							"type" => array('rule' => array('multiple', array('min' => 1)), 'message' => 'Please choose one type'),
							"first_name" => array('rule' => 'notEmpty', 'message' => 'Please fill in your first name.'),
							"last_name" => array('rule' => 'notEmpty', 'message' => 'Please fill in your last name.'),
							"age" => array('rule' => array('multiple', array('min' => 1)), 'message' => 'Please choose one age category'),
							"library" => array('rule' => 'notEmpty', 'message' => 'Please choose a library branch.'),
							"email" => array('rule' => array('email', true), 'message' => 'Please enter a valid email address.'),
							"telephone" => array('rule' => '/[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}/','allowEmpty'=>false, 'message' => 'Please enter a valid phone number - numbers only (example 4161234567).'),
							"card" => array('rule' => '/[0-9]{14}/','allowEmpty'=>false, 'message' => 'Please enter your 14-digit library card number - numbers only.')
						);

	/**
	 * Custom validations
	 */
	/*function validates() {
		if (!empty($this->data["BookForBookClubsRegistration"]["telephone"]) && !eregi ("[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}",$this->data["BookForBookClubsRegistration"]["telephone"])) {
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