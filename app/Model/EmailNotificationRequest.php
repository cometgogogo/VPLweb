<?php
/**
 * Model class SIGN UP FOR E-MAIL NOTIFICATION form
 */
class EmailNotificationRequest extends AppModel
{
	var $name = 'EmailNotificationRequest';		// Name of the Model
	var $useTable = false;						// Not connected to database

	// Model validations
	var $validate = array(
							"purpose" => VALID_NOT_EMPTY,
							"first_name" => VALID_NOT_EMPTY,
							"last_name" => VALID_NOT_EMPTY,
							"card" => VALID_NOT_EMPTY
							);

	/**
	 * Nothing is saved in database, just validated
	 */
	function Save($data) {
		$this->set($data);
		if (@$this->data["EmailNotificationRequest"]["purpose"] == "stop") {
			$this->validate["telephone"] = "/[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}/";
		} elseif (@$this->data["EmailNotificationRequest"]["purpose"] == "begin") {
			$this->validate["email"] = VALID_EMAIL;
		} elseif (@$this->data["EmailNotificationRequest"]["purpose"] == "texting") {
			$this->validate["cellphone"] = "/[0-9]{3}[^0-9]*[0-9]{3}[^0-9]*[0-9]{4}/";
			$this->validate["email"] = VALID_EMAIL;
		}
		return $this->validates();
	}


}
?>