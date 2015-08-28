<?php
/**
 * Controller class for Email notification request form
 */
class LibraryNotificationRequestsController extends AppController
{
	var $name = 'LibraryNotificationRequests';		// Name of the controller
	var $components = array('General');				// Array of components this controller will use
	var $uses = array('EmailNotificationRequest','FormStats');

	/**
	 * Add a request for email notification
	 */
	function add() {

		// Initialize possible submission purposes and pass to the View
		$purposes = array(
						"texting"=>"begin receiving library notices by text message.<br />",
						"begin"=>"begin receiving library notices by email.<br />",
						"stop"=>"go back to receive library notices by phone.<br />",
						);
		$this->set("purposes", $purposes);

		// Initialize View's defaul error state
		$this->set("errors", false);

		// Initialize default purpose for initial form display
		if (empty($this->data)) {
			$this->data["EmailNotificationRequest"]["step"] = "purpose";

		// Process submitted data
		} else {

			// Validate model
			if ($this->EmailNotificationRequest->save($this->data)) {

				// Compose alert
				$message = "";
				if ($this->data["EmailNotificationRequest"]["purpose"] == "begin") {
					$message .= "Sign Up for Email Notification\n\n";
					$message .= @$this->data["EmailNotificationRequest"]["first_name"] . " " . @$this->data["EmailNotificationRequest"]["last_name"] . " has signed up to BEGIN receiving library notices by EMAIL";
				} else if ($this->data["EmailNotificationRequest"]["purpose"] == "stop") {
					$message .= "Sign Up for Telephone Notification\n\n";
					$message .= @$this->data["EmailNotificationRequest"]["first_name"] . " " . @$this->data["EmailNotificationRequest"]["last_name"] . " has signed up to begin receiving notices by TELEPHONE";
				} else if ($this->data["EmailNotificationRequest"]["purpose"] == "texting") {
					$message .= "Sign Up for Text Notification\n\n";
					$message .= @$this->data["EmailNotificationRequest"]["first_name"] . " " . @$this->data["EmailNotificationRequest"]["last_name"] . " has signed up to BEGIN receiving library notices by TEXT Message";
				}
				$message .= " through the 'Sign Up for Library Notification' form on the VPL Web Site:\n\n";
				$message .= "Name:  ". @$this->data["EmailNotificationRequest"]["first_name"] . " " . @$this->data["EmailNotificationRequest"]["last_name"] . "\n";
				$message .= "Library Card Number:  " . @$this->data["EmailNotificationRequest"]["card"] . "\n";

				if ($this->data["EmailNotificationRequest"]["purpose"] == "begin") {
					$Email = @$this->data["EmailNotificationRequest"]["email"];
					$message .= "Email Address:  " . $Email . "\n";
					$subject = "Sign Up for Email Notification";
				} else if ($this->data["EmailNotificationRequest"]["purpose"] == "stop"){
					$message .= "Telephone Number:  " . @$this->data["EmailNotificationRequest"]["telephone"] . "\n";
					$subject = "Sign Up for Telephone Notification";
				} else if ($this->data["EmailNotificationRequest"]["purpose"] == "texting"){
					$message .= "Cell Phone Number:  " . @$this->data["EmailNotificationRequest"]["cellphone"] . "\n";
					$message .= "Email Address:  " . @$this->data["EmailNotificationRequest"]["email"] . "\n";
					$message .= "Additional Library Card Number(s):  " . @$this->data["EmailNotificationRequest"]["card_plus"] . "\n";
					$subject = "Sign Up for Text Notification";
				}

				if (!empty($this->data["EmailNotificationRequest"]["purpose_buzz"])) {
						$message .= "\nNOTE: The customer also wanted to sign up for VPL's eNewsletter - The Buzz. \n\n";
				}




				$to = "library.membership@vaughanpl.com";
				$headers = 	"From: library.membership@vaughanpl.com\r\n" .
									"X-Mailer: PHP/\r\n" .
									"Cc: vplwebmaster@vaughan.ca\r\n" .
									"Reply-To: " . @$this->data["EmailNotificationRequest"]["email"];
				// Send mail alert
				$mailSuccess = @mail ( $to,  $subject, $message, $headers);

				// Notify sucess/failure to user
				if ($mailSuccess) {
					$this->render("confirm");
if ($this->data["EmailNotificationRequest"]["purpose"] == "begin"){
					$this->FormStats->insertStatsData(38);
}else if ($this->data["EmailNotificationRequest"]["purpose"] == "texting"){
					$this->FormStats->insertStatsData(48);

}
				} else {
					$this->render("email_error");
				}

			// Model validation failed
			} else {
				$invalidFields = $this->EmailNotificationRequest->invalidFields();

				// Decide which of the two steps (select a purpose or enter additional data) the user must complete
				if (isset($invalidFields["purpose"]) || isset($_POST["change_purpose"])) {
					$this->data["EmailNotificationRequest"]["step"] = "purpose";
				} else {
					$this->data["EmailNotificationRequest"]["step"] = "data";
				}

				// Update view's error state
				if (strpos(@$_POST["step"],$this->data["EmailNotificationRequest"]["step"])===false) {
					$this->EmailNotificationRequest->validationErrors = array();
				} else {
					$this->set("errors", true);
				}
			}
		}
	}

	/**
	 * Force this controller to pick up the appropriate style
	 */
	function beforeRender() {

		//session_start();
		$this->General->setCSS();
	}
}

?>