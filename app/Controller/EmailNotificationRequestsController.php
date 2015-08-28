<?php
/**
 * Controller class for Email notification request form
 */
class EmailNotificationRequestsController extends AppController
{
	var $name = 'EmailNotificationRequests';		// Name of the controller
	var $components = array('General');				// Array of components this controller will use
	var $uses = array('EmailNotificationRequest','FormStats');

	/**
	 * Add a request for email notification
	 */
	function add() {

		// Initialize possible submission purposes and pass to the View
		$purposes = array(
						"begin"=>"begin receiving library notices by email.<br />",
						"stop"=>"stop receiving library notices by email.<br />",
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
					$message .= "Sign Up for EmailNotification\n\n";
					$message .= @$this->data["EmailNotificationRequest"]["first_name"] . " " . @$this->data["EmailNotificationRequest"]["last_name"] . " has signed up to BEGIN receiving library notices by Email";
				} else {
					$message .= "Sign Up for Telephone Notification\n\n";
					$message .= @$this->data["EmailNotificationRequest"]["first_name"] . " " . @$this->data["EmailNotificationRequest"]["last_name"] . " has signed up to stop receiving library notices by email and begin receiving notices by telephone";
				}
				$message .= " through the 'Sign Up for Email Notification' form on the VPL Web Site:\n\n";
				$message .= "Name:  ". @$this->data["EmailNotificationRequest"]["first_name"] . " " . @$this->data["EmailNotificationRequest"]["last_name"] . "\n";
				$message .= "Library Card Number:  " . @$this->data["EmailNotificationRequest"]["card"] . "\n";

				$Email = @$this->data["EmailNotificationRequest"]["email"];
				$message .= "Email Address:  " . $Email . "\n";
				if ($this->data["EmailNotificationRequest"]["purpose"] == "begin") {
					$subject = "Sign Up for Email Notification";
				} else {
					$message .= "Telephone Number:  " . @$this->data["EmailNotificationRequest"]["telephone"] . "\n";
					$subject = "Sign Up for Telephone Notification";
				}

				if (!empty($this->data["EmailNotificationRequest"]["purpose_buzz"])) {
						$message .= "\nNOTE: The customer also wanted to sign up for VPL's eNewsletter - The Buzz. \n\n";
				}

				$to = "library.membership@vaughanpl.com";
				$headers = 	"From: library.membership@vaughanpl.com\r\nReply-To: $Email\r\n" .
							"X-Mailer: PHP/\r\n" .
							"Cc: vplwebmaster@vaughan.ca";

				// Send mail alert
				$mailSuccess = @mail ( $to,  $subject, $message, $headers);

				// Notify sucess/failure to user
				if ($mailSuccess) {
					$this->render("confirm");
					$this->FormStats->insertStatsData(38);
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